@extends('dashboard.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Update Data Karyawan</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Update Data Karyawan</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%;">
                {{ Session::get('success') }}
               
            </div>
            @endif
            @if(Session::has('notification'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 100%;">
                {{ Session::get('notification') }}
                
            </div>
            @endif

            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 100%;">
                {{ Session::get('error') }}
               
            </div>
            @endif
            @if(Session::has('info'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 100%;">
                {{ Session::get('info') }}
              
            </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="{{ url('tiketUpdate') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">NPK</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line" value="" name="npk" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
