@extends("layout.app")

@section('content')
 <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
                <span class="category">Family Gathering</span>
                <h2>Enjoy With Your Family </h2>
                <p>Make memories together with family, enjoy the beautiful moments created every time with laughter together. </p>
               
              </div>
            </div>
            <div class="item item-2">
              <div class="header-text">
                <span class="category">Best Result</span>
                <h2>Get the best result out of your effort</h2>
                <p>You are allowed to use this template for any educational or commercial purpose. You are not allowed to re-distribute the template ZIP file on any other website.</p>
             
              </div>
            </div>
            <div class="item item-3">
              <div class="header-text">
                <span class="category">Online Learning</span>
                <h2>Online Learning helps you save the time</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporious incididunt ut labore et dolore magna aliqua suspendisse.</p>
             
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="row gx-2">
        <div class="col-lg-12 d-flex justify-content-center justify-item-center">
            <div class="col-2 d-flex justify-content-center justify-item-center">               
                <a href="#register" class="btn btns me-2 ">Registrasi</a>
                
            </div>
            
        </div>
      </div>
    </div>
  </div>
    <div class="contact-us section" id="register">
        
    <div class="container">
      <div class="row">
        <div class="col-lg-6  align-self-center">
          <div class="section-heading">
            <div class="special-offer">
              <span class="offer mt-3"></span>
              <h6>Dharma Polimetal, <em>Family Gathering</em> Present</h6>
              <h6>Tanggal: <em>6 Juli 2024</em></h6>
              <h4>Lokasi : <em> Atlantis Water Adventure, Ancol</em></h4>
              
            </div>
          </div>
        </div>
        <div class="col-lg-6">
            
          <div class="col-lg-12 text-center">
          <div class="section-heading mb-5">
            
        @if (session('warning'))
           <div class="d-flex justify-content-center align-items-center">
             <div class="alert alert-danger">
                {{ session('warning') }}
            </div>
           </div>
        @elseif(session('done'))
           <div class="d-flex justify-content-center align-items-center">
             <div class="alert alert-warning">
                {{ session('done') }}
            </div>
           </div>
        @elseif(session('regstrasi'))
           <div class="d-flex justify-content-center align-items-center">
             <div class="alert alert-success">
                {{ session('regstrasi') }}
            </div>
           </div>   
        @endif
            <h2>Registrasi FamGath</h2>
          </div>
        </div>
          <div class="contact-us-content">
            <div class="pt-1 pb-5 justify-content-center text-center">
                <h2 class="cek">Masukan NPK Kamu</h2>
            </div>
            <form id="contact-form" action="{{ url('registrasi') }}" method="get">
              @csrf
                <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                    <input class="text-center" type="npk" name="npk" id="name" placeholder=" Insert Your NPK in Here" autocomplete="on" required>
                  </fieldset>
                </div>
                
                <div class="col-lg-12 text-center">
                  <fieldset>
                    <button type="submit" id="form-submit" class="orange-button">Cari</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('layout.footer')


@endsection