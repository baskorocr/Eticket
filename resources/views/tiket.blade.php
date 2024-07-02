@extends("layout.app")

@section('content')
 <div class="main-banner" id="top" >
    
    <div class="contact-us section up" >
        
    <div class="container" >
      <div class="row justify-content-center">
       
        <div class="col-lg-6" >
            
          <div class="col-lg-12 text-center">
          <div class="section-heading mb-5 justify-content-center align-items-center">
            <h2 class="cek ps-2">Cek Tiket</h2>
          </div>
        </div>
          <div class="contact-us-content" id="register">
             @if (session('tidak'))
           <div class="d-flex justify-content-center align-items-center">
             <div class="alert alert-danger">
                {{ session('tidak') }}
            </div>
           </div>
           @else

            @if (session('success'))
           <div class="d-flex justify-content-center align-items-center">
             <div class="alert alert-success">
                {{ session('success') }}
            </div>
           </div>
           @elseif (session('error'))
           <div class="d-flex justify-content-center align-items-center">
             <div class="alert alert-danger">
                {{ session('error') }}
            </div>
           </div>
           @endif

            <div class="row mb-5">
                <div class="col d-flex justify-content-center align-items-center">
                    <div style="background-color: white;">
                        {!! DNS2D::getBarcodeHTML($data[0]->id, 'QRCODE') !!}
                    </div>
                </div>
            </div>

            <div class="container mt-3">
             
                <div class="row justify-content-center justify-items-center mt-2">
                <div class="col-2 cek">ID</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">{{ $data[0]->id }}</div>
                </div>
                
                <div class="row justify-content-center justify-items-center mt-2">
                <div class="col-2 cek ">NPK</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">{{ $data[0]->NPK }}</div>
                </div>
                <div class="row justify-content-center justify-items-center mt-2">
                <div class="col-2 cek ">Nama</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">{{ $data[0]->namaKaryawan }}</div>
                </div>
               
                <div class="row justify-content-center justify-items-center mt-2">
                <div class="col-2 cek ">Total Peserta</div>
                <div class="col-1 cek ms-5">:</div>
                
                <div class="col-6 cek">{{ $data[0]->totalKeluarga+1 }}</div>
                </div>
              
                <div class="row justify-content-center justify-items-center mt-2">
                <div class="col-2 cek ">Kendaraan</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">{{ $data[0]->Transportasi }}</div>
                </div>
                <div class="row justify-content-center justify-items-center mt-2">
                <div class="col-2 cek ">Titik Jemput</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">
                  
                  @if($data[0]->titikJemput == NULL)
                  tidak ada titik jemput
                  @else 
                  {{ $data[0]->titikJemput }}
                  
                @endif</div>
                </div>
             
                
                
              
              </div>
            </div>
           @endif
          </div>
          
        </div>
      </div>
      @if(!empty($data) && $data[0] != NULL)
      <div class="row justify-content-center">
                <div class="col-lg-6 text-center mt-3">
                    <a href="{{ route('edit', $data[0]->id) }}" class="btn btL">Update</a>
                </div>

                 
      </div>
      @endif

    </div>
  </div>




@endsection 