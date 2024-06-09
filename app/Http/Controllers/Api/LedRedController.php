<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LedRed;
use Illuminate\Http\Request;

class LedRedController extends Controller
{
    function index()
    {
        $ledData = LedRed::orderBy('created_at', 'desc')
            ->get();
        return response()->json([
            'message' => 'Data berhasil diambil',
            'data' => $ledData
        ], 200);
    }

    function show($id)
    {
        $ledData = LedRed::find($id);

        if ($ledData) {
            return response()
                ->json([
                    'message' => 'Data berhasil diambil',
                    'data' => $ledData,
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
        $ledData = LedRed::create($request->all());

        return response()
            ->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $ledData
            ], 200);
    }
}
