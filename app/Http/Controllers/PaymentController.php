<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //

    public function showPaymentForm()
    {
        // Mengirim opsi pembayaran ke view untuk ditampilkan dalam form
        return view('pesan.checkout');
    }

    public function processPayment(Request $request)
    {
        // Validasi data input
        $request->validate([
            'payment_option' => 'required|in:cod_kampus1,cod_kampus2',
            // Tambahkan validasi lain sesuai kebutuhan (misalnya untuk detail pembayaran lainnya)
        ]);

        // Mendapatkan opsi pembayaran yang dipilih
        $selectedPaymentOption = $request->input('payment_option');

        // Proses pembayaran sesuai opsi yang dipilih
        if ($selectedPaymentOption === 'cod_kampus1') {
            // Lakukan proses pembayaran COD di kampus 1...
            return redirect()->route('history.index')->with('success', 'Your order will be delivered to campus 1. Please prepare cash for payment upon delivery.');
        } elseif ($selectedPaymentOption === 'cod_kampus2') {
            // Lakukan proses pembayaran COD di kampus 2...
            return redirect()->route('history.index')->with('success', 'Your order will be delivered to campus 2. Please prepare cash for payment upon delivery.');
        }

        // Jika opsi pembayaran tidak valid, redirect dengan pesan kesalahan
        return redirect()->back()->with('error', 'Invalid payment option selected.');
    }
}
