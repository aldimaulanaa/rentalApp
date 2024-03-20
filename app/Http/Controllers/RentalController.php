<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Car;

class RentalController extends Controller
{

    public function create()
    {
        $cars = Car::all();
        return view('rentals.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'car_id' => 'required|exists:cars,id',
        ]);

        $car = Car::findOrFail($validatedData['car_id']);
        $rentals = Rental::where('car_id', $car->id)
                         ->where(function ($query) use ($validatedData) {
                             $query->where('tanggal_mulai', '<=', $validatedData['tanggal_mulai'])
                                   ->where('tanggal_selesai', '>=', $validatedData['tanggal_selesai']);
                         })
                         ->orWhere(function ($query) use ($validatedData) {
                             $query->where('tanggal_mulai', '>=', $validatedData['tanggal_mulai'])
                                   ->where('tanggal_selesai', '<=', $validatedData['tanggal_selesai']);
                         })
                         ->orWhere(function ($query) use ($validatedData) {
                             $query->where('tanggal_mulai', '<=', $validatedData['tanggal_mulai'])
                                   ->where('tanggal_selesai', '>=', $validatedData['tanggal_selesai']);
                         })
                         ->exists();

        if ($rentals) {
            return redirect('/rentals')->with('error', 'Mobil tidak tersedia pada tanggal tersebut.');
        }

        $rental = Rental::create([
            'user_id' => auth()->user()->id, 
            'car_id' => $validatedData['car_id'],
            'tanggal_mulai' => $validatedData['tanggal_mulai'],
            'tanggal_selesai' => $validatedData['tanggal_selesai'],
        ]);
        return redirect('/dashboard')->with('success', 'Mobil berhasil disewa!');
    }
}
