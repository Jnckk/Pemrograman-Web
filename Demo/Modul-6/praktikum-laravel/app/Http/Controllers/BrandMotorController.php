<?php
// app/Http/Controllers/BrandMotorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandMotor;

class BrandMotorController extends Controller
{
    public function index()
    {
        $brands = BrandMotor::all();
        return response()->json($brands, 200);
    }

    public function show($id)
    {
        $brand = BrandMotor::find($id);

        if (!$brand) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        return response()->json($brand, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'tahun' => 'required',
        ]);

        $brand = BrandMotor::create($request->all());

        return response()->json($brand, 201);
    }

    public function update(Request $request, $id)
    {
        $brand = BrandMotor::find($id);

        if (!$brand) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        $brand->update($request->all());

        return response()->json($brand, 200);
    }

    public function destroy($id)
    {
        $brand = BrandMotor::find($id);

        if (!$brand) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        $brand->delete();

        return response()->json(['message' => 'Brand deleted'], 200);
    }
}
