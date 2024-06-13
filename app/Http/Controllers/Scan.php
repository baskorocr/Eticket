<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Scan extends Controller
{
    public function index()
    {
        return view('scan');
    }
}