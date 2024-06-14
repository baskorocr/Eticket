<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $registrasis = DB::table('registrasis')
            ->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')
            ->where('registrasis.hadir', 1)
            ->select('registrasis.*', 'karyawan.namaKaryawan as karyawan')
            ->get();
        return view('home', ['data'=> $registrasis]);
    }
}
