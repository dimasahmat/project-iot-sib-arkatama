<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // buat function index, store, destroy
    // show, create, edit

    function index()
    {
        $data['title'] = 'User';
        return view('pages.user.index', $data);
    }
}
