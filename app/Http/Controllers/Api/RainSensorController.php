<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RainSensor;
use Illuminate\Http\Request;

class RainSensorController extends Controller
{
    function index()
    {
        $sensorData = RainSensor::orderBy('created_at', 'desc')
            ->limit(20)
            ->get();
        return response()->json([
            'message' => 'Data berhasil diambil',
            'data' => $sensorData,
        ], 200);
    }

    function show($id)
    {
        $sensorData = RainSensor::find($id);

        if ($sensorData) {
            return response()
                ->json([
                    'message' => 'Data berhasil diambil',
                    'data' => $sensorData,
                ], 200);
        } else {
            return response()
                ->json(['message' => 'Data not found'], 404);
        }
    }

    function store(Request $request)
    {
        $request->validate([
            'value' => [
                'required',
                'numeric',
            ]
        ]);
        $sensorData = RainSensor::create($request->all());

        return response()
            ->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $sensorData,
            ], 200);
    }
}
