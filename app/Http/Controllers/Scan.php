<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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

        
        date_default_timezone_set('Asia/Jakarta');
        try{
            DB::beginTransaction();
            $updated = DB::table('registrasis')
            ->where('NPK', $request->npk)
            ->update([
                'hadir' => 1,
                'totalKeluarga' => $request->totalKeluarga,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            
            ]);

            
            DB::commit();
                $request->session()->flash('done', 'Data Kehadiran telah di update');
                return view('manual');
        }
        catch( \Exception $e){
            DB::rollBack();
            $request->session()->flash('warning', 'Data record bermasalah');
                return view('manual');
        }

    }


    public function verif($id, Request $request){


        $regist = DB::table('registrasis')->where('id', $id)->where('hadir', 0)->first();

      if ($regist) {
            DB::table('registrasis')
        ->where('id', $id)
        ->update(['hadir' => 1]);
            return back()->with('done', 'Data Presensi Berhasil');
        }
        else{

             return back()->with('warning', 'Presensi sudah pernah dilakukan');
        }


      
  
    }

    public function scan(){
        return view('manual');
    }

     public function edit(Request $request)
    {
   
   
         $data = DB::table('registrasis')
        ->join('karyawans', 'registrasis.NPK', '=', 'karyawans.NPK')
        ->where('registrasis.NPK', $request->npk) // Specify the table name for NPK
        ->first();
        

         if (!$data) {
        session()->flash('notification', 'Data not found for NPK ' . $request->npk);
        return redirect()->back();
        }
    
        return view('updateData', compact('data'));
        //  return view('mt');
    }

    public function update(Request $request, $id)
    {
  

             // Validate the request
         $existingRecord = DB::table('registrasis')->where('id', $id)->first();

   
     

        // Check if there are any changes
        $hasChanges = (

            $existingRecord->hadir != $request->kehadiran
        );
        

        if ($hasChanges) {
            // Update the record
            $cek = DB::table('registrasis')
                ->where('id', $id)
                ->update([
                    'hadir' => $request->kehadiran,
                   
                    // Add other fields as needed
                ]);
        
            if ($cek) {
                // Flash a success message
                $request->session()->flash('success', 'Data berhasil diperbarui.');
            } else {
                // Flash an error message if update fails
                $request->session()->flash('error', 'Gagal memperbarui data.');
            }
        } else {
            // Flash a message indicating no changes were made
            $request->session()->flash('info', 'Tidak ada perubahan pada data.');
        }

        return redirect()->route('updateByAdmin');
    }


    public function updateByAdmin(){
        return view('update');
    }
}