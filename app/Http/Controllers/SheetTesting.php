<?php

namespace App\Http\Controllers;

use App\Providers\Google\GoogleSheetService;

class SheetTesting extends Controller
{
    private $googleSheetService;
    public function __construct(GoogleSheetService $googleSheetService)
    {
        $this->googleSheetService = $googleSheetService;
    }
    public function getSheets(string $spreadsheetId)
    {
        try {
            $sheets = $this->googleSheetService->getSheets($spreadsheetId);
            return response()->json($sheets);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
