<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\pdfdatas;

class PdfController extends Controller
{
    public function uploadPdf(Request $request)
    {
        // Validasi input
        $request->validate([
            'pdf-upload' => 'required|mimes:pdf|max:2048',  // Maksimal ukuran file 2MB
            'kode' => 'required|integer',
            'note' => 'nullable|string|max:300',
            'bukti' => 'required|image|mimes:png,jpg,jpeg|max:2048', // Validasi file bukti
        ]);

        // Upload file PDF ke storage
        if ($request->hasFile('pdf-upload')) {
            $pdfFile = $request->file('pdf-upload');

            // Membuat nama file dengan tambahan nama 'pdf_' + timestamp + '.pdf'
            $pdfFileName = 'pdf_' . time() . '.pdf';

            // Simpan file PDF ke folder storage/public/pdfs
            $pdfFilePath = $pdfFile->storeAs('public/pdfs', $pdfFileName);

            // Upload file bukti
            if ($request->hasFile('bukti')) {
                $buktiFile = $request->file('bukti');

                // Membuat nama file bukti
                $buktiFileName = 'bukti_' . time() . '.' . $buktiFile->getClientOriginalExtension();

                // Simpan file bukti ke folder storage/public/bukti
                $buktiFilePath = $buktiFile->storeAs('public/bukti', $buktiFileName);
            }

            // Simpan informasi ke database
            pdfdatas::create([
                'file_path' => $pdfFilePath,
                'bukti' => $buktiFilePath ?? null, // Simpan path bukti jika ada
                'kode' => $request->kode,
                'note' => $request->note,
            ]);
            return redirect('/')->with('success', 'PDF dan bukti berhasil diupload dan disimpan.');
        }
        return redirect('/gagal')->with('error', 'Gagal mengupload PDF.');
    }
}
