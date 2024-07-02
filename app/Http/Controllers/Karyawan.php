<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\registrasi;
use Illuminate\Support\Str;
use DNS2D;


class Karyawan extends Controller
{
    public function search(Request $request)
    {
        $npk = $request->query('npk');
        $npk = (int) $npk;



        $db = DB::table('karyawan')->where('NPK', '=', $npk)->get();
        $count = count($db);

        if ($count != 0) {
            $data = $db;
            return view('register', ['data' => $data]);

        } else {

            $request->session()->flash('warning', 'NPK Tidak di temukan');
            return redirect()->to(url('/') . '/#register');

        }




    }

    public function konfirmasi($id, Request $request)
    {
        $cek = count(DB::table('registrasis')->where('NPK', '=', $id)->get());

        if ($cek == 0) {
            $db = DB::table('karyawan')->where('NPK', '=', $id)->get();
            $data = $db;
            return view('konfirmasi', ['data' => $data]);

        } else {
            $request->session()->flash('done', 'NPK Telah Terdaftar');
            return redirect()->to(url('/') . '/#register');

        }

    }

    public function konfirmasiPost(Request $request)
    {

      
    

        $uuid = Str::uuid();
        try {

            if($request->select != 'tidak'){
                if($request->additionalSelect == "bus"){
                    registrasi::create([
                        'id' => $uuid,
                        'NPK' => $request->npk,
                        'totalKeluarga'=> $request->totalKeluarga,
                        'Transportasi' => $request->additionalSelect,
                        'titikJemput' => $request->jemputSelect,

                    ]);
                    
                }
                else{
                    registrasi::create([
                        'id' => $uuid,
                        'NPK' => $request->npk,
                        'totalKeluarga'=> $request->totalKeluarga,
                        'Transportasi' => $request->additionalSelect,
                        'titikJemput' => null,

                    ]);


                }
                
                
            }
            
          

            $request->session()->flash('regstrasi', 'Registrasi Berhasil');
            return redirect()->to(url('/') . '/#register');
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function cekTiket()
    {

        return view('cekTiket');
    }

    public function cekTiketPost(Request $request)
    {
        $data = DB::table('registrasis')->join('karyawan', 'registrasis.NPK', '=', 'karyawan.NPK')->select("registrasis.NPK", "registrasis.id", "registrasis.Transportasi", "registrasis.totalKeluarga", "registrasis.titikJemput", "karyawan.namaKaryawan", )->where('registrasis.NPK','=',$request->npk)->get();
        $count = count($data);
    

        if($count != 0){

            return view('tiket', ['data' => $data]);
        }
        else{

            $request->session()->flash('tidak', 'Tidak ada data Tiket!');
            return view('tiket');
        }



        
    }
}
