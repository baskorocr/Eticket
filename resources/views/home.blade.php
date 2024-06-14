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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body text-center ">
                                <h4 class="card-title text-center">Please Scan on QR Code Position</h4>
                        
                                 <div class="d-flex justify-content-center">
                                    <div id="reader" style="width:300px; height:300px; margin-bottom: 180px"></div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Table Presensi Kehadiran</h4>
                             
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                               
                                                <th>Id</th>
                                                <th>NPK</th>
                                                <th>Name</th>
                                                <th>Hadir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($data as $registrasi)

                                           <tr>
                                                <td>
                                                   {{ $registrasi->id}}
                                                </td>
                                                <td>
                                                   {{ $registrasi->NPK}}
                                                </td>
                                                <td>
                                                   {{ $registrasi->karyawan}}
                                                </td>
                                                 <td>
                                                   {{ $registrasi->hadir}}
                                                </td>
                                           </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Column -->
                    
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex mb-4 no-block">
                                    <h5 class="card-title mb-0 align-self-center">Presensi Presentase</h5>
                                    <div class="ms-auto">
                                        <select class="form-select b-0">
                                            <option selected="">Today</option>
                                            <option value="1">Tomorrow</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="visitor" style="height:260px; width:100%;"></div>
                                <ul class="list-inline mt-4 text-center font-12">
                                    <li><i class="fa fa-circle text-purple"></i> Tablet</li>
                                    <li><i class="fa fa-circle text-success"></i> Desktops</li>
                                    <li><i class="fa fa-circle text-info"></i> Mobile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Sales Chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>
@endsection
