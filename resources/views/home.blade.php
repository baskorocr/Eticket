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
                    <h4 class="card-title">Table Presensi Kehadiran ({{count($data)}} Hadir)</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>NPK</th>
                                    <th>Name</th>
                                    <th>Hadir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $registrasi)
                                <tr>
                                    <td>{{ $data->firstItem() + $index }}</td>
                                    <td>{{ $registrasi->id }}</td>
                                    <td>{{ $registrasi->NPK }}</td>
                                    <td>{{ $registrasi->karyawan }}</td>
                                    <td>{{ $registrasi->hadir }}</td>
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
                    <h4 class="card-title">Table Presensi Kehadiran ({{count($data2)}}  Belum Hadir)</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>NPK</th>
                                    <th>Name</th>
                                    <th>Hadir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data2 as $index => $belum)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $belum->id }}</td>
                                    <td>{{ $belum->NPK }}</td>
                                    <td>{{ $belum->karyawan }}</td>
                                    <td>{{ $belum->hadir }}</td>
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
    <!-- Additional Content -->
    <!-- ============================================================== -->
    <div class="row">
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
    <!-- End Additional Content -->
    <!-- ============================================================== -->
</div>
@endsection
