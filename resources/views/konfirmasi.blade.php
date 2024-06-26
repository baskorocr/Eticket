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
                                <div class="col-3 pt-3 cek">NPK</div>
                                <div class="col-1 pt-3 cek ms-5">:</div>
                                <div class="col-6 cek">
                                    <input readonly="readonly" value="{{ $data[0]->NPK }}" class="" type="npk" name="npk" id="name" placeholder=" Insert Your NPK in Here" autocomplete="on" required>
                                </div>
                            </div>
                            {{ "\r\n" }}
                            <div class="row justify-content-center justify-items-center mt-2" id="tambah">
                                <div class="col-3 pt-3 cek">Total anak dan (Istri/Suami)</div>
                                <div class="col-1 pt-3 cek ms-5">:</div>
                                <div class="col-6 cek">
                                    <input class="" type="wa" name="totalKeluarga" id="spouse" placeholder="" required>
                                </div>
                            </div>
                            <div class="row justify-content-center justify-items-center">
                                <div class="col-3 pt-3 cek">Transportasi</div>
                                <div class="col-1 pt-3 cek ms-5">:</div>
                                <div class="col-6 cek">
                                    <select class="form-select mt-2" aria-label="Default select example" name="additionalSelect" id="additionalSelect" onchange="showJemput()">
                                        <option value="pribadi">Kendaraan Pribadi</option>
                                        <option value="bus">Bus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-center justify-items-center mt-2" id="jemput" style="display: none;">
                                <div class="col-3 pt-3 cek">Titik Jemput</div>
                                <div class="col-1 pt-3 cek ms-5">:</div>
                                <div class="col-6 cek">
                                    <select class="form-select mt-2" aria-label="Default select example" name="jemputSelect" id="jemputSelect">
                                        <option value="cikarang">Cikarang</option>
                                        <option value="serang">Serang</option>
                                        <option value="balaraja">Balaraja</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-2 pt-3 ms-2 cek">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms" required style="width: 2px; height:20px">
                                </div>
                                <div class="col-9 pt-3 ms-2 cek text-justify">
                                    <label class="form-check-label ml-3" for="terms" style="font-size:9.5px">
                                        Saya setuju, bila terjadi hal manipulatif terhadap data ini. Saya siap bertanggung jawab kepada perusahaan, terkait data yang saya kirimkan bila mana terjadi suatu temuan
                                    </label>
                                </div>
                                <div class="col-12 text-justify">
                                    <div class="invalid-feedback">Anda harus menyetujui syarat dan ketentuan sebelum melanjutkan.</div>
                                </div>
                            </div>
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
