<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Provinces;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        return response()->json(Provinces::all(), 200);
    }

    public function show($id)
    {
        $province = Provinces::find($id);
        if (!$province) {
            return response()->json(['message' => 'Province not found'], 404);
        }
        return response()->json($province, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $province = Provinces::create($request->all());
        return response()->json($province, 201);
    }

    public function update(Request $request, $id)
    {
        $province = Provinces::find($id);
        if (!$province) {
            return response()->json(['message' => 'Province not found'], 404);
        }

        $province->update($request->all());
        return response()->json($province, 200);
    }

    public function destroy($id)
    {
        $province = Provinces::find($id);
        if (!$province) {
            return response()->json(['message' => 'Province not found'], 404);
        }

        $province->delete();
        return response()->json(['message' => 'Province deleted'], 200);
    }
}
