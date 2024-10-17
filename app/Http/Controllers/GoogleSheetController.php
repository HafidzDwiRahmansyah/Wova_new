<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class GoogleSheetController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:2048',
            'description' => 'required|string|max:255',
        ]);

        $description = $request->input('description');

        // Kirim data ke Google Sheets
        $this->sendToGoogleSheets($description);

        return redirect()->back()->with('success', 'Data berhasil dikirim ke Google Sheets!');
    }

    private function sendToGoogleSheets($description)
    {
        $client = new Google_Client();
        $client->setAuthConfig(config('google.credentials_path'));
        $client->addScope(Google_Service_Sheets::SPREADSHEETS);

        $service = new Google_Service_Sheets($client);
        $spreadsheetId = config('google.spreadsheet_id');
        $range = 'Sheet1!A:B';
        $values = [
            [$description],
        ];
        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => 'RAW'
        ];
        $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
    }
}
