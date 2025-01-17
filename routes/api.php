<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Providers\Google\GoogleSheetService;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Google API
Route::get('/sheets/{spreadsheetId}', [GoogleSheetService::class, 'getSheets']);
Route::get('/sheets/{spreadsheetId}/{sheetName}', [GoogleSheetService::class, 'getSheetIdByName']);
Route::get('/sheets/{spreadsheetId}/{sheetName}/{range}', [GoogleSheetService::class, 'getData']);
