<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\BatchUpdateSpreadsheetRequest;
use Google\Service\Sheets\AddSheetRequest;
use Google\Service\Sheets\SheetProperties;
use Google\Service\Sheets\ValueRange;
use Google_Service_Sheets;
use Google_Service_Sheets_AddSheetRequest;
use Google_Service_Sheets_BatchUpdateSpreadsheetRequest;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    // protected $spreadsheetId;
    protected $spreadsheetId;
    protected $client;
    protected $service;

    public function __construct()
    {
        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig(storage_path('../storage/wova-430108-7688b603d534.json')); // pastikan jalur ini benar

        $this->service = new \Google_Service_Sheets($client);
        $this->spreadsheetId = '10vI8isIa9rV3a2r40RVX8RYJc9mL0nl_cocXuhVU0Sc'; // ID spreadsheet Anda

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false; // Set true untuk mode produksi
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index(Request $request)
    {
        return view('form');
    }

    // Menyimpan data ke Google Sheets
    public function submitForm(Request $request)
    {
        // Validasi input
        try {
            $request->validate([
                'kode' => 'nullable|string',

                'full_name' => 'nullable|string',
                'birth_date' => 'nullable|date',

                'whatsapp_number' => 'nullable|string',
                'email' => 'nullable|email',
                'linkedin' => 'nullable|url',
                'domicile' => 'nullable|string',
                'social_media' => 'nullable|string',

                // Work experience validation
                'work_experience' => 'nullable|array',
                'work_experience.*.company_name' => 'nullable|string',
                'work_experience.*.company_location' => 'nullable|string',
                'work_experience.*.position' => 'nullable|string',
                'work_experience.*.year_range' => 'nullable|string',
                'work_experience.*.tasks' => 'nullable|string',

                // Internship experience validation
                'magang_experience' => 'nullable|array',
                'magang_experience.*.company_name' => 'nullable|string',
                'magang_experience.*.company_location' => 'nullable|string',
                'magang_experience.*.position' => 'nullable|string',
                'magang_experience.*.year_range' => 'nullable|string',
                'magang_experience.*.tasks' => 'nullable|string',

                // Volunteer experience validation
                'volunteer_experience' => 'nullable|array',
                'volunteer_experience.*.company_name' => 'nullable|string',
                'volunteer_experience.*.company_location' => 'nullable|string',
                'volunteer_experience.*.position' => 'nullable|string',
                'volunteer_experience.*.year_range' => 'nullable|string',
                'volunteer_experience.*.tasks' => 'nullable|string',

                // Organization experience validation
                'organization_name' => 'nullable|string',
                'organization_position' => 'nullable|string',
                'organization_year_range' => 'nullable|string',
                'organization_tasks' => 'nullable|string',

                // Education validation
                'education' => 'nullable|array',
                'education.*.university_name' => 'nullable|string',
                'education.*.degree' => 'nullable|string',
                'education.*.major' => 'nullable|string',
                'education.*.education_year_range' => 'nullable|string',
                'education.*.gpa' => 'nullable|string',

                // Highschool validation
                'highschool_name' => 'nullable|string',
                'highschool_major' => 'nullable|string',
                'highschool_year_range' => 'nullable|string',
                'highschool_avg_grade' => 'nullable|string',

                // Skills validation
                'hardskill' => 'nullable|string',
                'softskill' => 'nullable|string',
                'language' => 'nullable|string',
                'software' => 'nullable|string',

                // Certificates validation
                'internship_certificate' => 'nullable|string',
                'seminar_certificate' => 'nullable|string',
                'other_certificate' => 'nullable|string',

                // References validation
                'reference_name' => 'nullable|string',
                'reference_position' => 'nullable|string',
                'reference_contact' => 'nullable|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors()); // Lihat error validasi jika ada
        }


        // Ambil semua data input kecuali _token
        $data = $request->except('_token');

        // Filter data kosong
        $filteredData = array_filter($data, function ($value) {
            return !is_null($value) && $value !== '' && $value !== [];
        });

        // Fungsi untuk memformat pengalaman ke dalam format string
        function formatExperience($experiences)
        {
            if (empty($experiences)) {
                return 'null'; // Mengembalikan 'null' jika array kosong
            }

            return array_map(function ($experience) {
                // Pastikan year_range memiliki format yang tepat, bisa jadi hanya satu tahun atau rentang tahun
                $yearRange = isset($experience['year_range']) ? $experience['year_range'] : 'Tidak Diketahui';

                return "Nama Perusahaan: {$experience['company_name']}, Lokasi: {$experience['company_location']}, Jabatan: {$experience['position']}, Waktu: {$yearRange}, Pekerjaan: {$experience['tasks']}";
            }, $experiences);
        }

        function formatEducation($education)
        {
            if (empty($education)) {
                return 'null'; // Mengembalikan 'null' jika array kosong
            }

            return implode("\n", array_map(function ($edu) {
                $yearRange = isset($edu['education_year_range']) ? $edu['education_year_range'] : 'Tidak Diketahui';
                return "Nama Universitas: {$edu['university_name']}, Tingkat/derajat: {$edu['degree']}, Jurusan: {$edu['major']}, Waktu: {$yearRange}, IPK: {$edu['gpa']}";
            }, $education));
        }


        // Format pengalaman kerja, magang, dan volunteer ke string dengan pemisah newline
        $filteredData['work_experience'] = isset($filteredData['work_experience']) && is_array($filteredData['work_experience'])
            ? implode("\n", formatExperience($filteredData['work_experience']))
            : 'null';

        $filteredData['magang_experience'] = isset($filteredData['magang_experience']) && is_array($filteredData['magang_experience'])
            ? implode("\n", formatExperience($filteredData['magang_experience']))
            : 'null';

        $filteredData['volunteer_experience'] = isset($filteredData['volunteer_experience']) && is_array($filteredData['volunteer_experience'])
            ? implode("\n", formatExperience($filteredData['volunteer_experience']))
            : 'null';

        // Format pendidikan ke dalam format string dengan pemisah newline
        if (isset($filteredData['education']) && is_array($filteredData['education'])) {
            $filteredData['education'] = array_map(function ($edu) {
                $yearRange = isset($edu['education_year_range']) ? $edu['education_year_range'] : 'Tidak Diketahui';
                return "Nama Universitas: {$edu['university_name']}, Tingkat/derajat: {$edu['degree']}, Jurusan: {$edu['major']}, waktu: {$yearRange}, IPK: {$edu['gpa']}";
            }, $filteredData['education']);
            $filteredData['education'] = implode("\n", $filteredData['education']);
        }

        // dd(['form_data' => $filteredData]);

        if (!empty($filteredData)) {
            session(['form_data' => $filteredData]);
        }

        // Arahkan pengguna ke halaman pembayaran
        return redirect()->route('payment.page');
    }



    // Fungsi submit payment yang sudah diperbarui
    public function submitPayment(Request $request)
    {
        // Ambil data dari sesi
        $form_data = session('form_data');

        // dd($form_data);

        if ($form_data) {
            // Ambil token transaksi dari request
            $orderId = $request->input('order_id');
            $transactionToken = $request->input('_token');

            // Verifikasi transaksi ke Midtrans
            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . base64_encode(env('MIDTRANS_SERVER_KEY') . ':'),
            ])->get('https://api.sandbox.midtrans.com/v2/' . $orderId . '/status');

            $transactionStatus = $response->json();

            // Pastikan transactionStatus adalah array dan memiliki kunci 'transaction_status'
            if (isset($transactionStatus['transaction_status'])) {
                // Cek apakah statusnya adalah "settlement" atau "capture"
                $status = $transactionStatus['transaction_status'];

                // dd($status);

                if ($status === 'settlement' || $status === 'Success' || $status === 'capture') {
                    // Format data pengalaman

                    // dd($form_data);

                    $formData = $form_data;

                    // dd($formData);

                    // Panggil fungsi untuk menyimpan data ke Google Sheets
                    $this->appendDataToSheet($formData);

                    // Hapus session setelah data dikirim ke Google Sheets
                    session()->forget('form_data');

                    return redirect('/')->with('success', 'Pesanan berhasil !');
                } elseif ($status === 'pending') {
                    // Jika transaksi masih dalam status pending
                    return response()->json(['success' => false, 'message' => 'Pembayaran masih pending.']);
                } elseif ($status === 'deny') {
                    // Jika pembayaran ditolak
                    return response()->json(['success' => false, 'message' => 'Transaksi ditolak.']);
                } else {
                    // Tangani status lainnya jika ada
                    return response()->json(['success' => false, 'message' => 'Status transaksi: ' . $status]);
                }
            } else {
                // Jika tidak ada status transaksi yang valid
                return response()->json(['success' => false, 'message' => 'Status transaksi tidak valid. Silakan coba lagi.']);
            }
        }

        return response()->json(['success' => false, 'message' => 'Data tidak ditemukan di sesi. Silakan ulangi pengisian.']);
    }

    private function appendDataToSheet($formData)
    {
        try {
            // Dapatkan tanggal hari ini dengan format d-m-Y
            $sheetName = date('d-m-Y');

            // Cek apakah lembar dengan tanggal tersebut sudah ada
            if (!$this->checkIfSheetExists($sheetName)) {
                // Jika belum ada, buat lembar baru dengan nama tanggal tersebut
                $this->createNewSheet($sheetName);
            }

            // Siapkan nilai untuk Google Sheets
            $values = [
                [
                    $formData['kode'] ?? '',
                    $formData['full_name'] ?? '',
                    $formData['birth_date'] ?? '',
                    $formData['whatsapp_number'] ?? '',
                    $formData['email'] ?? '',
                    $formData['linkedin'] ?? '',
                    $formData['domicile'] ?? '',
                    $formData['social_media'] ?? '',
                    $formData['work_experience'] ?? '',
                    $formData['magang_experience'] ?? '',
                    $formData['volunteer_experience'] ?? '',
                    $formData['organization_name'] ?? '',
                    $formData['organization_position'] ?? '',
                    $formData['organization_year_range'] ?? '',
                    $formData['organization_tasks'] ?? '',
                    $formData['highschool_name'] ?? '',
                    $formData['highschool_major'] ?? '',
                    $formData['highschool_year_range'] ?? '',
                    $formData['highschool_avg_grade'] ?? '',
                    $formData['education'] ?? '',
                    $formData['hardskill'] ?? '',
                    $formData['softskill'] ?? '',
                    $formData['language'] ?? '',
                    $formData['software'] ?? '',
                    $formData['internship_certificate'] ?? '',
                    $formData['seminar_certificate'] ?? '',
                    $formData['other_certificate'] ?? ''
                ]
            ];

            // Siapkan body untuk API request
            $body = new \Google_Service_Sheets_ValueRange([
                'values' => $values
            ]);

            // Pilihan parameter untuk request
            $params = [
                'valueInputOption' => 'RAW' // Atau 'USER_ENTERED'
            ];

            // Lakukan append data ke Google Sheets di lembar sesuai dengan tanggal hari ini
            $result = $this->service->spreadsheets_values->append(
                $this->spreadsheetId,
                $sheetName . '!A1', // Menambahkan data ke lembar dengan nama tanggal hari ini
                $body,
                $params
            );

            // dd($result);

            return $result;
        } catch (\Exception $e) {
            dd('Error: ' . $e->getMessage());
        }
    }

    private function checkIfSheetExists($sheetName)
    {
        try {
            $spreadsheet = $this->service->spreadsheets->get($this->spreadsheetId);
            foreach ($spreadsheet->getSheets() as $sheet) {
                if ($sheet->getProperties()->getTitle() === $sheetName) {
                    return true;
                }
            }
            return false;
        } catch (\Exception $e) {
            dd('Error: ' . $e->getMessage());
            return false;
        }
    }

    // Fungsi untuk membuat lembar baru
    private function createNewSheet($sheetName)
    {
        try {
            $addSheetRequest = new \Google_Service_Sheets_AddSheetRequest([
                'properties' => [
                    'title' => $sheetName
                ]
            ]);

            $batchUpdateRequest = new \Google_Service_Sheets_BatchUpdateSpreadsheetRequest([
                'requests' => [
                    ['addSheet' => $addSheetRequest]
                ]
            ]);

            $response = $this->service->spreadsheets->batchUpdate($this->spreadsheetId, $batchUpdateRequest);

            return $response;
        } catch (\Exception $e) {
            dd('Error while creating sheet: ' . $e->getMessage());
            return false;
        }
    }


    public function showPaymentPage(Request $request)
    {
        // Data transaksi yang diperlukan untuk Midtrans Snap
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => 100000,
            ],
            // Data pembeli dan lainnya bisa ditambahkan
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('payment-page', ['snapToken' => $snapToken]);
    }
}
