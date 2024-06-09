<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buzzer;
use Illuminate\Http\Request;

class BuzzerController extends Controller
{
    function index()
    {
        $buzzerData = Buzzer::orderBy('created_at', 'desc')
            ->get();
        return response()->json([
            'message' => 'Data berhasil diambil',
            'data' => $buzzerData
        ], 200);
    }

    function show($id)
    {
        $buzzerData = Buzzer::find($id);

        if ($buzzerData) {
            return response()
                ->json([
                    'message' => 'Data berhasil diambil',
                    'data' => $buzzerData,
                ], 200);
        } else {
            return response()
                ->json(['message' => 'Data tidak ditemukan'], 404);
        }
    }

    function store(Request $request)
    {
        $request->validate([
            'value' => [
                'required',
                'boolean',
            ]
        ]);
        $buzzerData = Buzzer::create($request->all());

        return response()
            ->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $buzzerData
            ], 200);
    }
}
