@extends("layout.app")

@section('content')
 <div class="main-banner" id="top" >
    
    <div class="contact-us section up" >
        
    <div class="container" >
      <div class="row justify-content-center">
       
        <div class="col-lg-6" >
            
          <div class="col-lg-12 text-center">
          <div class="section-heading mb-5">
            <h2 class="cek">Registrasi FamGath</h2>
          </div>
        </div>
          <div class="contact-us-content" id="register">
            <div class="pt-1 pb-5 justify-content-center text-center">
                <h2 class="cek">Check Data</h2>
            </div>
            <div class="container ">
             
                <div class="row justify-content-center justify-items-center">
                <div class="col-2 cek">NPK</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">{{ $data[0]->NPK }}</div>
                </div>
                
                <div class="row justify-content-center justify-items-center">
                <div class="col-2 cek ">Nama</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">{{ $data[0]->namaKaryawan }}</div>
                </div>
                
               {{ "\r\n" }}
                <div class="row justify-content-center justify-items-center">
                <div class="col-2 cek">Divisi</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">{{ $data[0]->Divisi }}</div>
                </div>
                <div class="row justify-content-center justify-items-center">
                <div class="col-2 cek">Status</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">{{ $data[0]->Status }}</div>
                </div>
                <div class="row justify-content-center justify-items-center">
                <div class="col-2 cek">Spouse</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">{{ $data[0]->Spouse }}</div>
                </div>
                <div class="row justify-content-center justify-items-center">
                <div class="col-2 cek">Children</div>
                <div class="col-1 cek ms-5">:</div>
                <div class="col-6 cek">{{ $data[0]->Children }}</div>
                </div>

               
                <div class="d-flex justify-content-center align-items-center text-center mt-5">
                 <p class="tambah">*Apabila ada penambahan data keluarga silakan lanjutkan terlebih dahulu</p>
                </div>
                
                <div class="d-flex justify-content-center align-items-center text-center mt-5">
                     <a href="{{  url('/konfirmasi/' . $data[0]->NPK) }}" class="btn btL me-2 ">Lanjutkan</a>
                </div>
                <div class="space"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




@endsection