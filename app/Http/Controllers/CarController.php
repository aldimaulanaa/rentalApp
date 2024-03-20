<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'merek' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'nomor_plat' => 'required|string|max:20|unique:cars',
            'tarif_sewa_per_hari' => 'required|numeric|min:0',
        ]);

        Car::create($validatedData);

        return redirect('/cars')->with('success', 'Mobil berhasil ditambahkan!');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $cars = Car::where('merek', 'like', "%$searchTerm%")
                    ->orWhere('model', 'like', "%$searchTerm%")
                    ->get();
        
        return view('cars.index', compact('cars'));
    }
}
