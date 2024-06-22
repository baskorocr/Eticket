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
                             <li class="breadcrumb-item"><a href="javascript:void(0)">Presensi</a></li>
                            <li class="breadcrumb-item active">Verifikasi</li>
                        </ol>
                    </div>
                   
                </div>
               
                <div class="row">
                    <!-- Column -->
                    
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2" action="{{ url('manualPresensi') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">NPK</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="11230551"
                                               readonly="readonly" class="form-control form-control-line" value="{{$data[0]->NPK}}" name="npk">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Nama</label>
                                        <div class="col-md-12">
                                            <input type="text" readonly="readonly"
                                                class="form-control form-control-line" value="{{$data[0]->namaKaryawan}}" >
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Total Anggota Keluarga (Anak/Istri/Suami) by Sunfish</label>
                                        <div class="col-md-12">
                                            <input type="text" 
                                                class="form-control form-control-line" readonly value="{{$data[0]->BaseData}}" name="totalKeluarga">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Total Anggota Keluarga (Anak/Istri/Suami)</label>
                                        <div class="col-md-12">
                                            <input type="text" 
                                                class="form-control form-control-line" value="{{$data[0]->totalKeluarga}}" name="totalKeluarga">
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update data dan kehadiran</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                </div>

</div>
@endsection
