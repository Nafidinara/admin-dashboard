@extends('main.sidebar')

@section('content')
<form>
    <h1>Biodata</h1>
    <div class="form-group col-md-6">
        <label for="inputName">Nama Lengkap</label>
        <input type="text" class="form-control" id="inputName" placeholder="Robert John Doe">
    </div>

    <div class="form-group col-md-4">
        <label for="inputName">Jenis Kelamin</label>
        <select class="form-control">
            <option value="1">Laki-laki</option>
            <option value="2">Perempuan</option>
            <option value="3">Yang lain</option>
        </select>
    </div>

    <div class="form-group col-md-8">
        <label for="inputAddress">Alamat</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Jl.Suka Maju Gang no">
    </div>
    <div class="row col-md-12">
        <div class="form-group col-md-4">
            <label for="inputCity">Kabupaten</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Wakanda">
        </div>
        <div class="form-group col-md-4">
            <label for="inputProvince">Provinsi</label>
            <input type="text" class="form-control" id="inputProvince" placeholder="Papua Barat">
        </div>
    </div>
    <div class="form-group col-md-8">
        <label for="inputVisi">Visi</label>
        <textarea class="form-control" id="editor" rows="3"></textarea>
    </div>
    <div class="form-group col-md-10">
        <label for="inputVisi">Misi</label>
        <textarea class="form-control" id="editor2" rows="5"></textarea>
    </div>
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputInstagram">Instagram</label>
            <input type="url" class="form-control" id="inputInstagram" placeholder="https://instagram.com"
                pattern="https://.*">
        </div>
        <div class="form-group col-md-6">
            <label for="inputFacebook">Facebook</label>
            <input type="url" class="form-control" id="inputFacebook" placeholder="https://facebook.com"
                pattern="https://.*">
        </div>
        <div class="form-group col-md-6">
                <label for="inputTelfon">No.Telfon</label>
                <input type="tel" class="form-control" id="inputTelfon" placeholder="ex : 0812345678"
                    pattern="[0-9]{15}">
            </div>
    </div>
    <div class="col-md-12 row mt-lg-5">
        <div class="col-md-4">
                <a>
                        <a href="{{ url('kandidat') }}" class="btn btn-danger btn-block">Cancel</a>
                </a>
        </div>
        <div class="col-md-4">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
</form>

<script>
    var konten = document.getElementById("editor");
    var konten2 = document.getElementById("editor2");
    CKEDITOR.replace(konten, {
        language: 'en-gb'
    });

    CKEDITOR.replace(konten2, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;

</script>
@endsection
