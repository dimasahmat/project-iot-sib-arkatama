<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HumiditySensor;
use Illuminate\Http\Request;

class HumiditySensorController extends Controller
{
    function index()
    {
        $sensorData = HumiditySensor::orderBy('created_at', 'desc')
            ->limit(20)
            ->get();
        return response()->json([
            'message' => 'Data berhasil diambil',
            'data' => $sensorData,
        ], 200);
    }

    function show($id)
    {
        $sensorData = HumiditySensor::find($id);

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
        $sensorData = HumiditySensor::create($request->all());

        return response()
            ->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $sensorData,
            ], 200);
    }
}
