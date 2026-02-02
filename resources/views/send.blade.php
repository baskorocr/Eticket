@extends('dashboard.app')

@section('content')
<div class="container-fluid">

    {{-- Flash Message --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
    <!-- Presence Table -->
    <!-- ============================================================== -->
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex gap-2 mb-3">
                    <a href="{{route('sendWa')}}" class="btn btn-success">Send All WA</a>
                    <a href="{{route('send.email')}}" class="btn btn-success">Send All Email</a>
                </div>
               
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>NPK</th>
                                <th>Name</th>
                                <th>Email Status</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach ($data as $index => $registrasi)
                            <tr>
                                <td>{{ $data->firstItem() + $index }}</td>
                                <td>{{ $registrasi->id }}</td>
                                <td>{{ $registrasi->NPK }}</td>
                                <td>{{ $registrasi->karyawan->namaKaryawan }}</td>
                                <td>
                                    @if($registrasi->sendEmail == 1)
                                        Sended
                                    @else
                                       idle
                                    @endif
                                </td>
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

</div>

<!-- Ensure jQuery and C3.js are loaded -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.16.0/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>

@endsection
