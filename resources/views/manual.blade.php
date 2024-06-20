@extends('dashboard.app')

@section('content')
 <div class="container-fluid">

 
     @if (session('done'))
           <div class="d-flex justify-content-center align-items-center">
             <div class="alert alert-success">
                {{ session('done') }}
            </div>
           </div>
        @elseif(session('warning'))
           <div class="d-flex justify-content-center align-items-center">
             <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
           </div>
        @endif

    
    <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Presensi</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Presensi </li>
                        </ol>
                    </div>
                   
                </div>
                 <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title text-center">Please Scan on QR Code Position</h4>
                    <div class="d-flex justify-content-center">
                        <div id="reader" style="width:300px; height:330px; margin-bottom: 180px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
               

</div>
@endsection
