@extends("layout.app")

@section('content')
 <div class="main-banner" id="top" >
    
    <div class="contact-us section up" >
        
    <div class="container" >
      <div class="row justify-content-center">
       
        <div class="col-lg-6" >
            
          <div class="col-lg-12 text-center">
          <div class="section-heading mb-5">
           
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

               
               
              
                <div class="d-flex justify-content-center align-items-center text-center mt-5">
                <form id="contact-form" action="{{ url('konfirmasiPost') }}" method="post">
                            @csrf
                            <div class="row justify-content-center justify-items-center">
                               
                                <div class="col-6 cek">
                                    <input hidden value="{{ $data[0]->NPK }}" class="" type="npk" name="npk" id="name"  autocomplete="on" required>
                                </div>
                            </div>
                            {{ "\r\n" }}
                            
                            <div class="col-lg-12 text-center mt-5">
                                <fieldset>
                                    <button type="submit" id="konfirmasi" class="btn btL me-2">Konfirmasi</button>
                                </fieldset>
                            </div>
                        </form>
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