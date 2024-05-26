<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VehicleController extends Controller
{
    public function index()
    {
        return VehicleResource::collection(Vehicle::all());
    }

    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'brand' => 'required',
                'model' => 'required',
                'plate_number' => 'required',
                'insurance_date' => 'required',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
        $insuranceDate = Carbon::createFromFormat('Y-m-d', $request->insurance_date)->format('d-m-Y');
        $vehicle = Vehicle::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'plate_number' => $request->plate_number,
            'insurance_date' => $insuranceDate,
        ]);
    
        return new VehicleResource($vehicle);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'brand' => 'nullable',
            'model' => 'nullable',
            'plate_number' => 'nullable',
            'insurance_date' => 'nullable|date',
        ]);        
        $vehicle->update($request->all());
        return new VehicleResource($vehicle);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->update([
            'deleted_at' => 0
        ]);

        $vehicle->delete();

        return response()->json([
            'data' => [],
            'message' => 'User was deleted'
        ]);
    }
}
