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
             @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                        @endif
           
            <form id="contact-form" class="mt-5" action="{{ url('cekTiketPost') }}" method="post">
              @csrf
                
                
                
               {{ "\r\n" }}
 
               
                <div class="row justify-content-center justify-items-center">
                <div class="col-2 pt-2 cek">NPK</div>
                <div class="col-1 pt-3 cek ms-5">:</div>
                <div class="col-6 cek"><input class="text-center" type="text" name="npk" id="npk" autocomplete="on" required></div>
                </div>
                
                

               
                
                
                
                <div class="col-lg-12 text-center mt-5">
                  <fieldset>
                     <button type="submit" class="btn btL me-2 ">Cek</button>
                  </fieldset>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




@endsection