<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogDataController extends Controller
{
    function index()
    {
        $data['title'] = 'Log Data';
        return view('pages.log', $data);
    }
}
