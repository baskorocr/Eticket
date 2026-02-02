@extends("layout.app")

@section('content')
 <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
              <span class="category">KONVENSI IMPROVEMENT DHARMA POLIMETAL</span>
              <h2>Innovation without Limits </h2>
              </div>
            </div>
            <div class="item item-2">
              <div class="header-text">
                <span class="category">Best Result</span>
                <h2>Get the best result out of your improvement</h2>
               
             
              </div>
            </div>
            <div class="item item-3">
              <div class="header-text">
                <span class="category">Join Us Now!</span>
                <h2>Enhance Your Skills and Knowledge for a Better Future</h2>
               
             
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <!-- <div class="row gx-2">
        <div class="col-lg-12 d-flex justify-content-center justify-item-center">
            <div class="col-2 d-flex justify-content-center justify-item-center">               
                <a href="#register" class="btn btns me-2 ">Konfirmasi!</a>
                
            </div>
            
        </div>
      </div> -->
    </div>
  </div>


  @include('layout.footer')


@endsection