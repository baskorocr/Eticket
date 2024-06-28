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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">All Data</li>
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
                <h4 class="card-title">Tabel Konfirmasi All Peserta</h4>
                <!-- Search Input -->
                 <div class="mb-3">
                    <input type="text" id="search" class="form-control" placeholder="Search...">
                </div>
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
                                <td>@if($registrasi->hadir == 1) hadir @else tidak hadir @endif</td>
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
   
    <!-- ============================================================== -->
    <!-- End Additional Content -->
    <!-- ============================================================== -->
</div>


<!-- Ensure jQuery and C3.js are loaded -->


<script>
    $(document).ready(function(){
    $('#search').on('keyup', function(){
        var query = $(this).val();
        $.ajax({
            url: "/etiket/search",
            type: "GET",
            data: {'search': query},
            success: function(data){
                $('#table-body').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.error("Error occurred: " + textStatus + ", " + errorThrown);
                $('#table-body').html('<tr><td colspan="5">An error occurred while fetching data. Please try again later.</td></tr>');
            }
        });
    });
});

</script>




@endsection
