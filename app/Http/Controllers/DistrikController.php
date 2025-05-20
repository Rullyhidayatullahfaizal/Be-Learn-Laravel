<?php

namespace App\Http\Controllers;

use App\Models\Districts;
use App\Models\Distrik;
use Illuminate\Http\Request;

class DistrikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Mengambil districts berdasarkan regency_id (kota/kabupaten)
    $regency_id = $request->query('regency_id');
    
    if ($regency_id) {
        $districts = Districts::where('regency_id', $regency_id)->get();
    } else {
        $districts = Districts::all(); 
    }

    return response()->json($districts, 200);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Districts $distrik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Districts $distrik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Districts $distrik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Districts $distrik)
    {
        //
    }
}
