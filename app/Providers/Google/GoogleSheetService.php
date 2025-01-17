<?php

namespace App\Providers\Google;

use Google\Client;
use Google\Service\Sheets;

class GoogleSheetService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName(config('google.application_name'));
        $this->client->setScopes(config('google.scopes'));
        $this->client->setAuthConfig(config('google.service.file'));
        $this->service = new Sheets($this->client);
    }

    protected function getA1(int $columnNumber)
    {
        $result = '';
        while ($columnNumber > 0) {
            $remainder = ($columnNumber - 1) % 26;
            $result = chr(65 + $remainder) . $result;
            $columnNumber = (int)(($columnNumber - $remainder) / 26);
        }
        return $result;
    }

    public function getSheets(string $spreadsheetId)
    {
        try {
            $spreadsheet = $this->service->spreadsheets->get($spreadsheetId);
            $sheets = $spreadsheet->getSheets();
            $sheetInfo = [];
            foreach ($sheets as $sheet) {
                $sheetInfo[] = [
                    'id' => $sheet->getProperties()->getSheetId(),
                    'name' => $sheet->getProperties()->getTitle(),
                    'columns' => $sheet->getProperties()->gridProperties->columnCount,
                    'rows' => $sheet->getProperties()->gridProperties->rowCount,
                    'frozen_column' => $sheet->getProperties()->gridProperties->frozenColumnCount,
                    'frozen_row' => $sheet->getProperties()->gridProperties->frozenRowCount,
                ];
            }
            return response()->json($sheetInfo);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getSheetIdByName(string $spreadsheetId, string $sheetName)
    {
        try {
            $spreadsheet = $this->service->spreadsheets->get($spreadsheetId);
            $sheets = $spreadsheet->getSheets();
            foreach ($sheets as $sheet) {
                if ($sheet->getProperties()->getTitle() === $sheetName) {
                    return response()->json([
                        'id' => $sheet->getProperties()->getSheetId(),
                        'name' => $sheet->getProperties()->getTitle(),
                    ]);
                }
            }
            return response()->json(['error' => 'Sheet not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function getData($spreadsheetId, $sheetName, $range)
    {
        $data = $this->service->spreadsheets_values->get($spreadsheetId, $range)->getValues();
        $sheet = $this->getSheetIdByName($spreadsheetId, $sheetName)->getData();
        $columns = array_map('strtolower', $data[0]);
        $columns = array_map(function ($columns) {
            $result = preg_replace('/[^a-zA-Z0-9\s]/', '', $columns);
            $result = preg_replace('/\s+/', '_', $result);
            return $result;
        }, $columns);
        $rows = [];
        foreach (array_slice($data, 1) as $index => $value) {
            $row = [];
            foreach ($columns as $colIndex => $column) {
                $row[$column] = $value[$colIndex] ?? null;
            }
            $row['_sheet_id'] = $sheet->id ?? null;
            $row['_sheet_name'] = $sheet->name ?? null;
            $row['_row_number'] = $index + 2;
            $rows[] = $row;
        }
        return response()->json($rows)->getData();
    }
}
