<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Scan extends Controller
{
    
    public function postScanPresensi(Request $request){

        
        $updated = DB::table('registrasis')
            ->where('id', $request->id)
            ->update(['hadir' => 1]);

        if ($updated) {
            return response()->json(['message' => 'Scan data successfully updated!'], 200);
        } else {
            return response()->json(['message' => 'No records updated.'], 400);
        }
    }

    public function manualPresensi(Request $request){

        $updated = DB::table('registrasis')
            ->where('NPK', $request->npk)
            ->update([
                'hadir' => 1,
                'totalKeluarga' => $request->totalKeluarga
            
            ]);

        
        if ($updated == 1) {
             $request->session()->flash('done', 'Data Kehadiran telah di update');
              return view('manual');

        } else {
            $request->session()->flash('warning', 'Data Kehadiran telah kerecord');
              return view('manual');
        }

    }


    public function verif($id, Request $request){


        $regist = DB::table('registrasis')->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')->select('registrasis.*','karyawan.namaKaryawan', DB::raw('karyawan.Spouse + karyawan.Children as BaseData '))->where('id', $id)->get();
      
    
        if($regist[0]->hadir == 0){
              return view('verif',['data'=>$regist]);
        }
        else{
              $request->session()->flash('warning', 'Data Kehadiran sudah diisi');
              return view('manual');
        }

      

    }

    public function scan(){
        return view('manual');
    }
}