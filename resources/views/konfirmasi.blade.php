@extends("layout.app")

@section('content')
 <div class="main-banner" id="top" >
    
    <div class="contact-us section up" >
        
    <div class="container" >
      <div class="row justify-content-center">
       
        <div class="col-lg-6" >
            
          <div class="col-lg-12 text-center">
          <div class="section-heading mb-5 justify-content-center align-items-center">
            <h2 class="cek ps-2">Registrasi FamGath</h2>
          </div>
        </div>
          <div class="contact-us-content" id="register">
            <div class="pt-1 pb-5 justify-content-center text-center">
                <h2 class="cek">Konfirmasi</h2>
                <p class="cek mt-3 notif">Isi 0, bila tidak ada tambahan keluarga</p>
                 
                
                 <p class="cek  notif">Isi (-), bila ada pengurangan keluarga. Ex:(-1)</p>
            </div>
           
            <form id="contact-form" action="{{ url('konfirmasiPost') }}" method="post">
              @csrf
                <div class="row justify-content-center justify-items-center">
                <div class="col-2 pt-3 cek">NPK</div>
                <div class="col-1 pt-3 cek ms-5">:</div>
                <div class="col-6 cek"><input readonly="readonly" value="{{ $data[0]->NPK }}" class="" type="npk" name="npk" id="name" placeholder=" Insert Your NPK in Here" autocomplete="on" required></div>
                </div>
                
                
               {{ "\r\n" }}
 
               
               
                
                 <div class="row justify-content-center justify-items-center">
                <div class="col-2 pt-3 cek">Nomer Whatsapp</div>
                <div class="col-1 pt-3 cek ms-5">:</div>
                <div class="col-6 cek"><input class="" type="wa" name="wa" id="name" autocomplete="on" required></div>
                </div>
                <div class="row justify-content-center justify-items-center">
    <div class="col-2 pt-3 cek">Bersedia ikut</div>
    <div class="col-1 pt-3 cek ms-5">:</div>
    <div class="col-6 cek">
        <select class="form-select mt-2" aria-label="Default select example" name="select" id="select" onchange="showAdditionalRow()">
            <option selected>Select an option</option>
            <option value="bersedia">Bersedia</option>
            <option value="tidak">Tidak</option>
        </select>
    </div>
</div>
<div class="row justify-content-center justify-items-center mt-2" id="tambah" style="display: none; " onchange="add()">
    <div class="col-2 pt-3 cek">Tambah keluarga</div>
    <div class="col-1 pt-3 cek ms-5">:</div>
    <div class="col-6 cek">
        <select class="form-select mt-2" aria-label="Default select example" name="add" id="add">
             <option value="tidak">Tidak</option>
            <option value="ya">Ya</option>
          
            <!-- Add additional options here -->
        </select>
    </div>
</div>

 <div class="row justify-content-center justify-items-center " style="display: none;" id='add1'>
                <div class="col-2 pt-3 cek">Spouse</div>
                <div class="col-1 pt-3 cek ms-5">:</div>
                <div class="col-6 cek"><input class="" type="wa" name="spouse" id="spouse" ></div>
</div>
 <div class="row justify-content-center justify-items-center"  style="display: none;" id='add2'>
                <div class="col-2 pt-3 cek">Children</div>
                <div class="col-1 pt-3 cek ms-5">:</div>
                <div class="col-6 cek"><input class="" type="wa" name="children" id="children" ></div>
                </div>

<div class="row justify-content-center justify-items-center mt-2" id="baju" style="display: none;">
    <div class="col-2 pt-3 cek">Ukuran Baju</div>
    <div class="col-1 pt-3 cek ms-5">:</div>
    <div class="col-6 cek">
        <select class="form-select mt-2" aria-label="Default select example" name="baju" id="baju">
            
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
            <option value="XXXL">XXXL</option>
            <!-- Add additional options here -->
        </select>
    </div>
</div>

<div class="row justify-content-center justify-items-center" id="additionalRow" style="display: none;">
    <div class="col-2 pt-3 cek">Transportasi</div>
    <div class="col-1 pt-3 cek ms-5">:</div>
    <div class="col-6 cek">
        <select class="form-select mt-2" aria-label="Default select example" name="additionalSelect" id="additionalSelect" onchange="showJemput()">
            <option value="pribadi">Kendaraan Pribadi</option>
            <option value="bus">Bus</option>
            
            <!-- Add additional options here -->
        </select>
    </div>
</div>

<div class="row justify-content-center justify-items-center mt-2" id="jemput" style="display: none;">
    <div class="col-2 pt-3 cek">Titik Jemput</div>
    <div class="col-1 pt-3 cek ms-5">:</div>
    <div class="col-6 cek">
        <select class="form-select mt-2" aria-label="Default select example" name="jemputSelect" id="jemputSelect">
            <option selected>Select an option</option>
            <option value="cikarang">Cikarang</option>
            <option value="serang">Serang</option>
            <option value="balaraja">Balaraja</option>
            <!-- Add additional options here -->
        </select>
    </div>
</div>






               
                
                
                
                <div class="col-lg-12 text-center mt-5">
                  <fieldset>
                     <button type="submit" class="btn btL me-2 ">Registrasi</button>
                  </fieldset>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    function showAdditionalRow() {
        // Get select element
        var selectElement = document.getElementById('select');
        // Get additional row
        var additionalRow = document.getElementById('additionalRow');
        var baju = document.getElementById('baju');
        var tambah = document.getElementById('tambah');
        console.log(tambah);

        // Check if the selected value is "bersedia"
        if (selectElement.value === 'bersedia') {
            // Show additional row
            additionalRow.style.display = 'flex';
            baju.style.display = 'flex';
            tambah.style.display = 'flex';
        } else {
            // Hide additional row
            additionalRow.style.display = 'none';
            baju.style.display = 'none';
            tambah.style.display = 'none';
        }
    }

    function showJemput() {
        // Get select element
        var additionalSelect = document.getElementById('additionalSelect');
        // Get jemput row
        var jemput = document.getElementById('jemput');
        

        // Check if the selected value is "bus"
        if (additionalSelect.value === 'bus') {
            // Show jemput row
            jemput.style.display = 'flex';
           
        } else {
            // Hide jemput row
            jemput.style.display = 'none';
          
        }
    }

    function add(){
      var additionalSelect = document.getElementById('add');
        // Get jemput row
        var add1 = document.getElementById('add1');
        var add2 = document.getElementById('add2');

        if (additionalSelect.value === 'ya') {
            // Show jemput row
            add1.style.display = 'flex';
            add2.style.display = 'flex';
           
        } else {
            // Hide jemput row
             add1.style.display = 'none';
            add2.style.display = 'none';
          
        }

    }
</script>




@endsection