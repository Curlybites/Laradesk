<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {   
        $cities = City::withCount('barangays')->get();
        // $barangayCount = City::withCount('barangays')->get();
        
        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // Assuming color is stored as a hex code
        ]);

        City::create($request->only('name', 'color'));

        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }


    public function indexBarangays($id)
    {
        $city = City::findOrFail($id);
        $barangays = Barangay::where('city_id', $city->id)->paginate(10);
        
        return view('cities.barangays.index', compact('city', 'barangays'));
    }

    public function createBarangay($id)
    {   
        $city = City::findOrFail($id);
        return view('cities.barangays.create', compact('city'));
    }

    public function storeBarangay(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string', 
        ]);

        Barangay::create([
            'name' => $validatedData['name'],
            'color' => $validatedData['color'],
            'city_id' => $city->id,
        ]);
    
        return redirect()->route('cities.barangays.index', $city)->with('success', 'Barangay created successfully.');
    }

}
