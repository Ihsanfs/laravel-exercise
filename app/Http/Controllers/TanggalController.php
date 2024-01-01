<?php

namespace App\Http\Controllers;

use App\Models\Tanggal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TanggalController extends Controller
{
   public function index(){

    $tanggalSekarang = Carbon::now()->toDateString();
    $dataSekarang = Tanggal::where('tanggal', $tanggalSekarang)->get();
    if ($dataSekarang->isEmpty()) {
        // Jika tidak ada data untuk tanggal sekarang, ambil data dari tanggal sebelumnya
        $tanggalSebelumnya = Carbon::now()->subDay()->toDateString();
        $dataSebelumnya = Tanggal::where('tanggal', $tanggalSebelumnya)->get();

        // Tambahkan data dengan tanggal sebelumnya ke tanggal sekarang
        foreach ($dataSebelumnya as $data) {
            $dataBaru = new Tanggal();
            $dataBaru->tanggal = $tanggalSekarang;
            $dataBaru->nama_barang = $data->nama_barang;
            $dataBaru->kode = $data->kode;
            // Sesuaikan field lainnya jika ada
            $dataBaru->save();
        }

        // Ambil ulang data untuk tanggal sekarang setelah penambahan data
        $dataSekarang = Tanggal::where('tanggal', $tanggalSekarang)->get();

    }
        return view('tanggal_auto.index')->with('data', $dataSekarang);
   }
}
