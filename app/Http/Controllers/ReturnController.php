<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\ReturnModel;

class ReturnController extends Controller
{
    public function create()
    {
        return view('returns.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_plat' => 'required|string|max:20',
        ]);

        $rental = Rental::where('nomor_plat', $validatedData['nomor_plat'])
                        ->whereNull('tanggal_pengembalian')
                        ->first();
        
        if (!$rental) {
            return redirect('/returns')->with('error', 'Mobil dengan nomor plat tersebut tidak sedang disewa.');
        }

        $tanggalPengembalian = now();
        $jumlahHari = $rental->tanggal_mulai->diffInDays($tanggalPengembalian);
        $totalBiaya = $jumlahHari * $rental->car->tarif_sewa_per_hari;

        $return = new ReturnModel(); 
        $return->rental_id = $rental->id;
        $return->tanggal_pengembalian = $tanggalPengembalian;
        $return->jumlah_hari = $jumlahHari;
        $return->total_biaya = $totalBiaya;
        $return->save();

        $rental->tanggal_pengembalian = $tanggalPengembalian;
        $rental->save();

        return redirect('/dashboard')->with('success', 'Mobil berhasil dikembalikan.');
    }
}
