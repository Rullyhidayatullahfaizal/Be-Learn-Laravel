<?php

namespace App\Http\Controllers;

use App\Models\Regencies;
use Illuminate\Http\Request;

class SubdistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Mengambil regencies berdasarkan province_id
    $province_id = $request->query('province_id');
    
    if ($province_id) {
        $regencies = Regencies::where('province_id', $province_id)->get();
    } else {
        $regencies = Regencies::all(); 
    }

    return response()->json($regencies, 200);
}

    /**
     * Show the form for creating a new resource.
     */
    
}
