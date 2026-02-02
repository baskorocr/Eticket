<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\registrasi;
use Illuminate\Support\Str;
use DNS2D;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;


class karyawan extends Controller
{
    public function balik()
    {
        return redirect()->route('cekTiket');
    }
    public function search(Request $request)
    {
        $npk = $request->query('npk');
        $npk = (int) $npk;



        $db = DB::table('karyawans')->where('NPK', '=', $npk)->get();
        $count = count($db);

        if ($count != 0) {
            $data = $db;
            return view('register', ['data' => $data]);

        } else {

            $request->session()->flash('warning', 'NPK Tidak di temukan');
            return redirect()->to(url('/') . '/#register');

        }
        //  return view('mt');




    }

    public function konfirmasi($id, Request $request)
    {
        $cek = count(DB::table('registrasis')->where('NPK', '=', $id)->get());

        if ($cek == 0) {
            $db = DB::table('karyawans')->where('NPK', '=', $id)->get();
            $data = $db;
            return view('konfirmasi', ['data' => $data]);

        } else {
            $request->session()->flash('done', 'NPK Telah Terdaftar');
            return redirect()->to(url('/') . '/#register');

        }
        //  return view('mt');

    }

    public function konfirmasiPost(Request $request)
    {

      
        $registerCount = registrasi::where('NPK', $request->npk)->count();
    

        $uuid = Str::uuid();
        try {

            if($registerCount == 0){
                registrasi::create([
                    'id' => $uuid,
                    'NPK' => $request->npk,
                   
    
                ]);
                $request->session()->flash('regstrasi', 'Registrasi Berhasil');
            }
            else{
                $request->session()->flash('warning', 'NPK Sudah Terpakai');

            }

            
            return redirect()->to(url('/') . '/#register');
        } catch (\Exception $e) {
            echo $e;
        }
        //  return view('mt');
    }

    public function cekTiket()
    {

        return view('cekTiket');
    }

    public function cekTiketPost(Request $request)
    {
        $data = DB::table('registrasis')->join('karyawans', 'registrasis.NPK', '=', 'karyawans.NPK')->select("registrasis.NPK", "registrasis.id", "karyawans.namakaryawan", )->where('registrasis.NPK','=',$request->npk)->get();
        $count = count($data);
    

        if($count != 0){

            return view('tiket', ['data' => $data]);
        }
        else{

            $request->session()->flash('tidak', 'Tidak ada data Peserta!');
            return view('tiket');
        }

    }


    public function send(){
        
        $data = registrasi::with('karyawan')->paginate(20);
 
        return view('send', ['data' => $data]);
    }

    public function sendWa(){
        $data = registrasi::with('karyawan')->where('sendWa', 0)
        ->whereNotNull('Nomer')
        ->get();

 
      

   

        foreach ($data as $registrasi) {

        
            $response = $this->fonnte($registrasi); // kirim pesan dan dapatkan respons

            if ($response && isset($response->status) && $response->status == true) {
                // ✅ Pesan berhasil dikirim
                $registrasi->sendWa = 1;
                $registrasi->save();
            } else {
                // ❌ Gagal kirim
                \Log::error("Gagal kirim WA ke {$registrasi->karyawan->namaKaryawan} ({$registrasi->Nomer})", [
                    'response' => $response
                ]);
                session()->flash('error', 'Gagal mengirim nomer ke ' . $registrasi->NPK);

            }
        }

        session()->flash('status', 'Email berhasil dikirim ke semua penerima.');

    return redirect()->back();

    }


    public function fonnte($data){
        header('Access-Control-Allow-Origin: *');

        header('Access-Control-Allow-Methods: GET, POST');

    
        $message = "Semangat Pagi, 
        
Bapak/Ibu diundang untuk menghadiri Konvensi Improvement Dharma Polimetal XVIII.
Kehadiran Bapak/Ibu sangat kami harapkan sebagai bagian dari upaya untuk terus memperkuat komitmen perusahaan dalam melakukan improvement.

Detail acara:
- 📅 Tanggal: 10 Mei 2025
- 🕗 Waktu: 08:00 WIB
- 📍 Tempat: Auditorium Dharma Polimetal Tbk
- 👕 Dresscode: Batik

Informasi Anda yang telah terdaftar:
- Nama: {$data->karyawan->namaKaryawan}
- NPK: {$data->karyawan->NPK}

Mohon tunjukan pesan ini ke panitia, untuk melakukan pendatan kehadiran.


Terima kasih atas perhatiannya.
Semangat Pagi, Salam Improvement.
Panitia Konvensi Improvement Dharma Polimetal XVIII
";


    
    
    
        header("Access-Control-Allow-Headers: X-Requested-With");
        $curl = curl_init();
        $token = "66g9FzV9n6sGzMUyEP@H";
        $target =  $data->Nomer;
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $target,
                    'message' => $message,
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    "Authorization: $token" //change TOKEN to your actual token
                ),
            )
        );
    
        $response = curl_exec($curl);
       
    
        
     
        curl_close($curl);
        return json_decode($response);
    }

    public function sendEmail(){
        $data = registrasi::with('karyawan')->where('sendEmail', 0)
        ->whereNotNull('email')
        ->get();

     
   


        

        foreach ($data as $registrasi) {
            try {
                Mail::to($registrasi->email)->send(new sendMail($registrasi));
                // Update status pengiriman email jika berhasil
                $registrasi->update(['sendEmail' => 1]);
            } catch (\Exception $e) {
                // Jika terjadi error, kirimkan pesan error
                dd($e);
                session()->flash('error', 'Gagal mengirim email ke ' . $registrasi->email);
                continue;
            }
        }

         // Flash success message
    session()->flash('status', 'Email berhasil dikirim ke semua penerima.');

    return redirect()->back();
       
   
    }
}
