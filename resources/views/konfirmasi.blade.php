@extends("layout.app")

@section('content')
 <div class="main-banner" id="top">
    <div class="contact-us section up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="col-lg-12 text-center">
                        <div class="section-heading mb-5 justify-content-center align-items-center">
                            <h2 class="cek ps-2">Family Gathering 2024</h2>
                        </div>
                    </div>
                    <div class="contact-us-content" id="register">
                        <div class="pt-1 pb-5 justify-content-center text-center">
                            <h2 class="cek">Konfirmasi</h2>
                            <p class="cek mt-3 notif text-justify">
                               Karyawan tidak dihitung. Jika status single isi dengan 0.
                            </p>
                        </div>
                        <form id="contact-form" action="{{ url('konfirmasiPost') }}" method="post">
                            @csrf
                            <div class="row justify-content-center justify-items-center">
                               
                                <div class="col-6 cek">
                                    <input hidden value="{{ $data[0]->NPK }}" class="" type="npk" name="npk" id="name" placeholder=" Insert Your NPK in Here" autocomplete="on" required>
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        var button = document.getElementById('konfirmasi');
        button.disabled = true;
    });

    function showJemput() {
        var additionalSelect = document.getElementById('additionalSelect');
        var jemput = document.getElementById('jemput');
        if (additionalSelect.value === 'bus') {
            jemput.style.display = 'flex';
        } else {
            jemput.style.display = 'none';
        }
    }
</script>
@endsection
