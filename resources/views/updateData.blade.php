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
                            <h2 class="cek">Update Data</h2>
                        </div>
                        <form action="{{ route('update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row justify-content-center justify-items-center mb-3">
                                <div class="col-12 col-md-6">
                                    <div class="pt-3 cek">NPK</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input readonly="readonly" value="{{ $data->NPK }}" class="form-control" type="text" name="NPK" id="name" placeholder="Insert Your NPK here" autocomplete="on" required>
                                </div>
                            </div>

                            <div class="row justify-content-center justify-items-center mb-3">
                                <div class="col-12 col-md-6">
                                    <div class="pt-3 cek">Total anak dan (Istri/Suami)</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input class="form-control" type="number" value="{{ $data->totalKeluarga }}" name="totalKeluarga" id="spouse" placeholder="" required>
                                </div>
                            </div>

                            <div class="row justify-content-center justify-items-center mb-3">
                                <div class="col-12 col-md-6">
                                    <div class="pt-3 cek">Transportasi</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <select class="form-select mt-2" aria-label="Default select example" name="additionalSelect" id="additionalSelect" onchange="showJemput()">
                                        <option value="pribadi">Kendaraan Pribadi</option>
                                        <option value="bus">Bus</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-center justify-items-center mb-3" id="jemput" style="display: none;">
                                <div class="col-12 col-md-6">
                                    <div class="pt-3 cek">Titik Jemput</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <select class="form-select mt-2" aria-label="Default select example" name="jemputSelect" id="jemputSelect">
                                        <option value="cikarang">Cikarang</option>
                                        <option value="serang">Serang</option>
                                        <option value="balaraja">Balaraja</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 text-center mt-5">
                                <fieldset>
                                    <button type="submit" id="konfirmasi" style="margin-bottom: 100px;" class="btn btL me-2  ">Update</button>
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
