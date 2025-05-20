<?php

namespace App\Http\Controllers;

use App\Models\Villages;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Mengambil villages berdasarkan district_id (kecamatan)
    $district_id = $request->query('district_id');
    
    if ($district_id) {
        $villages = Villages::where('district_id', $district_id)->get();
    } else {
        $villages = Villages::all(); 
    }

    return response()->json($villages, 200);
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
    public function show(Villages $village)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Villages $village)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Villages $village)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Villages $village)
    {
        //
    }
}
