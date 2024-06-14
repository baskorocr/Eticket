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
}