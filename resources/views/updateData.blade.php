@extends('dashboard.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Kehadiran Manual</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Kehadiran</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="{{ route('update', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-md-12">NPK</label>
                            <div class="col-md-12">
                                <input type="text" readonly class="form-control form-control-line" value="{{ $data->NPK }}" name="npk">
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" readonly class="form-control form-control-line" value="{{ $data->namaKaryawan }}">
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-md-12">Kehadiran</label>
                            <div class="col-md-12">
                                <select class="form-select mt-2" aria-label="Default select example" name="kehadiran" id="transportasi" onchange="showJemput()">
                                    <option value="1">Hadir</option>
                                    <option value="0">Tidak Hadir</option>
                                </select>
                            </div>
                        </div>
                        
                       
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
