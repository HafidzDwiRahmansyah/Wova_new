<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function showPaymentPage()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false; // Ubah ke true jika di production
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Data transaksi untuk mendapatkan snap token
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => 10000, // Jumlah total pembayaran (contoh: 10,000)
            ],
            'customer_details' => [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '081234567890',
            ]
        ];

        // Mendapatkan snap token dari Midtrans
        $snapToken = Snap::getSnapToken($params);

        // Kirim snap token ke view
        return view('payments', compact('snapToken'));
    }

    public function paymentSuccess(Request $request)
    {
        // Ambil data dari session
        $formData = session('form_data');

        // Format dan kirim data ke Google Sheets
        if ($formData) {
            $values = [array_map(function ($item) {
                return is_array($item) ? '' : $item;
            }, array_values($formData))];

            // Kirim data ke Google Sheets
            $result = $this->appendDataToSheet($values);

            // Hapus data dari session setelah dikirim
            session()->forget('form_data');

            if ($result) {
                return redirect('/')->with('success', 'Data berhasil dikirim setelah pembayaran!');
            } else {
                return redirect('/gagal')->with('error', 'Data gagal dikirim.');
            }
        }

        return redirect('/gagal')->with('error', 'Tidak ada data untuk dikirim.');
    }
}
