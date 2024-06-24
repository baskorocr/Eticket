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
                    <h4 class="card-title">OverData compare by data Sunfish </h4>
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
                                @foreach ($dataOver as $index => $overData)
                                    <tr>
                                        <td>{{ $dataOver->firstItem() + $index }}</td>
                                        <td>{{ $overData->id }}</td>
                                        <td>{{ $overData->NPK }}</td>
                                        <td>{{ $overData->namaKaryawan }}</td>
                                        <td>{{ $overData->hadir }}</td>
                                        <td>{{ $overData->totalKeluarga }}</td>
                                        <td>{{ $overData->BaseData }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $dataOver->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Absence Table -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Additional Content -->
    <!-- ============================================================== -->
</div>


<!-- Ensure jQuery and C3.js are loaded -->

@endsection
