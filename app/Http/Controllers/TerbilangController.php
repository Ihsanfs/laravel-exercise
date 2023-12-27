<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerbilangController extends Controller
{
    public function index()
    {
        return view('terbilang');
    }

    public function terbilang(Request $request)
    {
        $number = $request->input('number');
        $number1 = $request->input('number1');
        $number = str_replace('.', '', $number);
        $number1 = str_replace('.', '', $number1);
        $operasi = $number - $number1;
        if (empty($operasi)) {
            return redirect()->back()->withErrors(['number' => 'Input angka harus diisi.']);
        }

        $terbilang = $this->convertToTerbilang($operasi);

        return view('terbilang', compact('number', 'number1', 'terbilang','operasi'));
    }

    private function convertToTerbilang($x)
    {
        $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

        if ($x < 12) {
            return " " . $angka[$x];
        } elseif ($x < 20) {
            return $this->convertToTerbilang($x - 10) . " belas";
        } elseif ($x < 100) {
            return $this->convertToTerbilang($x / 10) . " puluh" . $this->convertToTerbilang($x % 10);
        } elseif ($x < 200) {
            return "seratus" . $this->convertToTerbilang($x - 100);
        } elseif ($x < 1000) {
            return $this->convertToTerbilang($x / 100) . " ratus" . $this->convertToTerbilang($x % 100);
        } elseif ($x < 2000) {
            return "seribu" . $this->convertToTerbilang($x - 1000);
        } elseif ($x < 1000000) {
            return $this->convertToTerbilang($x / 1000) . " ribu" . $this->convertToTerbilang($x % 1000);
        } elseif ($x < 1000000000) {
            return $this->convertToTerbilang($x / 1000000) . " juta" . $this->convertToTerbilang($x % 1000000);
        }
    }
}
