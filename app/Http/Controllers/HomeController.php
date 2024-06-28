<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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

        $countHadir = $registrasis->total();

        $belumHadir = DB::table('registrasis')
            ->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')
            ->where('registrasis.hadir', 0)
            ->select('registrasis.*', 'karyawan.namaKaryawan as karyawan', DB::raw('karyawan.Spouse + karyawan.Children as BaseData '))
            ->paginate(10);

            $countBelumHadir = $belumHadir->total();

      
     $karyawan = DB::table("karyawan")->count();

     $totalKaryawan = DB::table('registrasis')->count();
   
     $totalKeluargas = DB::table('registrasis')->sum('totalKeluarga');

     $total = $totalKaryawan+$totalKeluargas;
        return view('home', ['data'=> $registrasis,'karyawan'=>$karyawan, 'data2' => $belumHadir, 'total'=>$total,'totalKaryawan'=>$totalKaryawan, 'totalKeluarga'=>$totalKeluargas, 'countHadir'=>$countHadir, 'countBelumHadir'=>$countBelumHadir ]);
    }

    
    public function overData(){
          $dataOver = DB::table('registrasis as r')
    ->join('karyawan as k', 'r.NPK', '=', 'k.NPK')
    ->select('r.*', DB::raw('(k.spouse + k.children) as BaseData'), 'k.namaKaryawan')
    ->whereRaw('r.totalKeluarga > (k.spouse + k.children)')->paginate(10);
        $countData = $dataOver->total();
 
        return view('overData', ['dataOver' => $dataOver, 'countData'=> $countData]);
    }


 public function search(Request $request)
{
    $searchTerm = $request->search;
    $data = '';

    if (!empty($searchTerm)) {
        $registrasis = DB::table('registrasis') ->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')
                        ->where('registrasis.NPK', 'LIKE', '%'.$searchTerm.'%')
                        ->get(); // Fetching data using get() to retrieve results

        foreach ($registrasis as $key => $registrasi) {
            $data .= '<tr>'.
                        '<td>'.($key+1).'</td>'.
                        '<td>'.$registrasi->id.'</td>'.
                        '<td>'.$registrasi->NPK.'</td>'.
                        '<td>'.$registrasi->namaKaryawan.'</td>'.
                        '<td>'.$registrasi->hadir.'</td>'.
                        '<td>'.$registrasi->totalKeluarga.'</td>'.
                        '<td>'.$registrasi->Spouse + $registrasi->Children.'</td>'.
                    '</tr>';
        }
    }
    else{
        $registrasis = DB::table('registrasis')->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')
                        ->paginate(10); // Paginate all results if no search te->paginate(10);
        foreach ($registrasis as $key => $registrasi) {
            $data .= '<tr>'.
                        '<td>'.($key+1).'</td>'.
                        '<td>'.$registrasi->id.'</td>'.
                        '<td>'.$registrasi->NPK.'</td>'.
                        '<td>'.$registrasi->namaKaryawan.'</td>'.
                        '<td>'.$registrasi->hadir.'</td>'.
                        '<td>'.$registrasi->totalKeluarga.'</td>'.
                        '<td>'.$registrasi->Spouse + $registrasi->Children.'</td>'.
                    '</tr>';
        }
    }

    return response()->json($data); // Returning JSON response for AJAX request
}





public function allData(){

    $registrasis = DB::table('registrasis')
            ->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')
            ->select('registrasis.*', 'karyawan.namaKaryawan as karyawan', DB::raw('karyawan.Spouse + karyawan.Children as BaseData '))
            ->paginate(10);

    

    return view('alldata',['data'=>$registrasis]);

}

public function downloadOverData()
{
    // Fetch your data using the DB facade
       // Fetch your data using the DB facade
        $registrasis = DB::table('registrasis')
            ->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')
            ->select('registrasis.*', 'karyawan.namaKaryawan as karyawan', DB::raw('karyawan.Spouse + karyawan.Children as BaseData '))
            ->get();

        $hadir = DB::table('registrasis')
            ->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')
            ->where('registrasis.hadir', 1)
            ->select('registrasis.*', 'karyawan.namaKaryawan as karyawan', DB::raw('karyawan.Spouse + karyawan.Children as BaseData '))
            ->get();

        $belumHadir = DB::table('registrasis')
            ->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')
            ->where('registrasis.hadir', 0)
            ->select('registrasis.*', 'karyawan.namaKaryawan as karyawan', DB::raw('karyawan.Spouse + karyawan.Children as BaseData '))
            ->get();

        $dataOver = DB::table('registrasis as r')
            ->join('karyawan as k', 'r.NPK', '=', 'k.NPK')
            ->select('r.*', DB::raw('(k.spouse + k.children) as BaseData'), 'k.namaKaryawan')
            ->whereRaw('r.totalKeluarga > (k.spouse + k.children)')
            ->get();
        
         $kendaraanPribadi = DB::table('registrasis')
            ->join('karyawan', 'registrasis.npk', '=', 'karyawan.npk')
            ->select('registrasis.*', 'karyawan.namaKaryawan as karyawan', DB::raw('karyawan.Spouse + karyawan.Children as BaseData '))->where('Transportasi', '=', 'pribadi')
            ->get();

        // Generate CSV content
        $csvContent = $this->generateCsvContent($registrasis, $hadir, $belumHadir, $dataOver, $kendaraanPribadi);

        // Set headers for download
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="data_export.csv"',
        ];

        // Return response with CSV content
        return response()->streamDownload(function () use ($csvContent) {
            echo $csvContent;
        }, 'data_export.csv', $headers);
    }

    private function generateCsvContent($registrasis, $hadir, $belumHadir, $dataOver, $kendaraanPribadi)
    {
        // Initialize CSV content
        $csvContent = '';

        // Add headers for each section
        $csvContent .= "=== Registrasi ===\n";
        $csvContent .= "ID, NPK, Karyawan, Hadir, totalKeluarga, BaseData, Transportasi\n";
       
      
        foreach ($registrasis as $row) {
            $csvContent .= "{$row->id}, {$row->NPK}, {$row->karyawan},{$row->hadir},{$row->totalKeluarga} ,{$row->BaseData}, {$row->Transportasi}\n";
        }

        $csvContent .= "\n=== Hadir ===\n";
        $csvContent .= "ID, NPK, Karyawan, Hadir, totalKeluarga, BaseData, Transportasi\n";
        foreach ($hadir as $row) {
            $csvContent .= "{$row->id}, {$row->NPK}, {$row->karyawan}, {$row->hadir},{$row->totalKeluarga} ,{$row->BaseData}, {$row->Transportasi}\n";
        }

        $csvContent .= "\n=== Belum Hadir ===\n";
        $csvContent .= "ID, NPK, Karyawan, Hadir, totalKeluarga, BaseData, Transportasi\n";
        foreach ($belumHadir as $row) {
            $csvContent .= "{$row->id}, {$row->NPK}, {$row->karyawan},{$row->hadir},{$row->totalKeluarga} ,{$row->BaseData}, {$row->Transportasi}\n";
        }

        $csvContent .= "\n=== Data Over ===\n";
        $csvContent .= "ID, NPK, Karyawan, Hadir, totalKeluarga, BaseData, Transportasi\n";
     
       
        foreach ($dataOver as $row) {
            $csvContent .= "{$row->id}, {$row->NPK}, {$row->namaKaryawan}, {$row->hadir},{$row->totalKeluarga} ,{$row->BaseData}, {$row->Transportasi}\n";
        }


         $csvContent .= "=== Kendaraan pribadi ===\n";
        $csvContent .= "ID, NPK, Karyawan, Hadir, totalKeluarga, BaseData, Transportasi\n";
         foreach ($kendaraanPribadi as $row) {
            $csvContent .= "{$row->id}, {$row->NPK}, {$row->karyawan}, {$row->hadir},{$row->totalKeluarga} ,{$row->BaseData}, {$row->Transportasi}\n";
        }

        return $csvContent;
    }

public function downloadArea(){
    return view('downloadArea');
}




}
