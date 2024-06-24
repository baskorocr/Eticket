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
            ->select('registrasis.*', 'karyawan.namaKaryawan as karyawan', DB::raw('karyawan.Spouse + karyawan.Children as BaseData '))
            ->paginate(10);
        $belumHadir = DB::table('registrasis')
            ->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')
            ->where('registrasis.hadir', 0)
            ->select('registrasis.*', 'karyawan.namaKaryawan as karyawan', DB::raw('karyawan.Spouse + karyawan.Children as BaseData '))
            ->paginate(10);

      
        
     $totalKaryawan = DB::table('karyawan')->count();
   
     $totalKeluargas = DB::table('registrasis')->sum('totalKeluarga');
     $total = $totalKaryawan+$totalKeluargas;
        return view('home', ['data'=> $registrasis, 'data2' => $belumHadir, 'total'=>$total,'totalKaryawan'=>$totalKaryawan, 'totalKeluarga'=>$totalKeluargas, ]);
    }

    
    public function overData(){
          $dataOver = DB::table('registrasis as r')
        ->join('karyawan as k', 'r.NPK', '=', 'k.NPK')
        ->select('r.*', DB::raw('(k.spouse + k.children) as BaseData'), 'k.namaKaryawan')
        ->whereRaw('r.totalKeluarga > (k.spouse + k.children)')
        ->paginate(10);

        return view('overData', ['dataOver' => $dataOver]);
    }
}
