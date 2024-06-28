@extends('dashboard.app')

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Sales Chart and browser state-->
    <!-- ============================================================== -->
   

    <!-- ============================================================== -->
    <!-- Presence Table -->
    <!-- ============================================================== -->
    <div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Jumlah Peserta hadir : {{$countHadir}}</h4>
                <!-- Search Input -->
               
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>NPK</th>
                                <th>Name</th>
                                <th>Hadir</th>
                                <th>Total Keluarga</th>
                                <th>Total anak dan istri by SunFish</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach ($data as $index => $registrasi)
                            <tr>
                                <td>{{ $data->firstItem() + $index }}</td>
                                <td>{{ $registrasi->id }}</td>
                                <td>{{ $registrasi->NPK }}</td>
                                <td>{{ $registrasi->karyawan }}</td>
                                <td>{{ $registrasi->hadir }}</td>
                                <td>{{ $registrasi->totalKeluarga }}</td>
                                <td>{{ $registrasi->BaseData }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- ============================================================== -->
    <!-- Absence Table -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Jumlah Peserta Belum hadir : {{$countBelumHadir}} </h4>
                     <!-- Search Input -->
                
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>NPK</th>
                                    <th>Name</th>
                                    <th>Hadir</th>
                                    <th>Total Keluarga</th>
                                    <th>total anak dan istri by SunFish</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data2 as $index => $belum)
                                <tr>
                                    <td>{{ $data2->firstItem() +$index  }}</td>
                                    <td>{{ $belum->id }}</td>
                                    <td>{{ $belum->NPK }}</td>
                                    <td>{{ $belum->karyawan }}</td>
                                    <td>{{ $belum->hadir }}</td>
                                    <td>{{ $belum->totalKeluarga }}</td>
                                     <td>{{ $belum->BaseData }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $data2->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Additional Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-4 no-block">
                        <h5 class="card-title mb-0 align-self-center">Presensi Presentase</h5>
                        
                    </div>
                    <div id="visitor" style="height:260px; width:100%;"></div>
                    <ul class="list-inline mt-4 text-center font-12">
                       
                        <li><i class="fa fa-circle text-success"></i> Hadir</li>
                        <li><i class="fa fa-circle " style="color:#FF7F3E"></i> Belum Hadir</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-4 justify-content-center">
                        <h5 class="card-title mb-0 align-self-center">Data Sistem Konfirmasi VS Data Sunfish</h5>
                      
                       
                    </div>
                     <div class="row">
                        <div class="col">
                            <div class="text-center">Total Data Konfirmasi</div>
                            <div class="text-center mt-5">{{$totalKaryawan}}</div>
                        </div>
                        <div class="col">
                            <div class="text-center">Total Data Karyawan Di Sunfish</div>
                            <div class="text-center mt-4">{{$karyawan}}</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center" style="font-size:20px; padding-top:43px; "> Aktual Sistem :</div>
                    <div class="d-flex justify-content-center" style="font-size:70px; ; padding-bottom:20px;"> {{intval(($totalKaryawan/$karyawan)*100)}}%</div>
                    <div class="d-flex justify-content-center mb-2"> Dari total keseluruhan data di sunfish</div>
                   
                    
                      
                </div>
            </div>
        </div>
        
        
        
      
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-4 justify-content-center">
                        <h5 class="card-title mb-0 align-self-center">Counting Jumlah Peserta</h5>
                      
                       
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="text-center">Total Konfirmasi Karyawan</div>
                            <div class="text-center mt-4">{{$totalKaryawan}}</div>
                        </div>
                        <div class="col">
                            <div class="text-center">Total Anggota keluarga Karyawan</div>
                            <div class="text-center mt-4">{{$totalKeluarga}}</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center" style="font-size:20px; padding-top:50px; "> Total:</div>
                    <div class="d-flex justify-content-center" style="font-size:67px; "> {{$total}}</div>
                     <div class="d-flex justify-content-center mb-3" style=" padding-top:15px;">Peserta</div>
                    
                      
                </div>
            </div>
        </div>
       
    </div>
    <!-- ============================================================== -->
    <!-- End Additional Content -->
    <!-- ============================================================== -->
</div>


<!-- Ensure jQuery and C3.js are loaded -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.16.0/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>







<script>

$(document).ready(function(){
    "use strict";
    var chart = c3.generate({
        bindto: '#visitor',
        data: {
            columns: [
                
                ['Belum Hadir', {{$countBelumHadir}}],
                ['Hadir', {{$countHadir}}],
              
            ],
            type: 'donut',
            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
        },
        donut: {
            label: {
                show: false
            },
            title: "Presentase",
            width: 20,
        },
        legend: {
            hide: true
        },
        color: {
            pattern: ['#FF7F3E', '#24d2b5']
        }

        
    });
   

   

});
</script>
@endsection
