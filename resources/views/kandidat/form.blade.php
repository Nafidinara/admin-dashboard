@extends('main.sidebar')

@section('content')
<form method="POST" action="{{url('kandidat/addproses')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h1>Biodata</h1>
    <style>
    .star{
        color: red;
    }
    </style>
    <div class="form-group col-md-6">
        <label for="inputName">Nama Lengkap<sup class="star">*</sup></label>
        <input name="nama" type="text" class="form-control" id="inputName" placeholder="Robert John Doe"  required>
    </div>

    <div class="form-group col-md-4">
        <label for="inputName">Jenis Kelamin<sup class="star">*</sup></label>
        <select class="form-control" name="kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
            <option value="Yang Lain">Yang lain</option>
        </select>
    </div>

    <div class="form-group col-md-8">
        <label for="inputAddress">Alamat<sup class="star">*</sup></label>
        <input type="text" name="alamat" class="form-control" id="inputAddress" placeholder="Jl.Suka Maju Gang no" required>
    </div>
    <div class="row col-md-12">
        <div class="form-group col-md-4">
            <label for="inputCity">Kabupaten<sup class="star">*</sup></label>
            <input type="text" name="kabupaten" class="form-control" id="inputCity" placeholder="Wakanda" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputProvince">Provinsi<sup class="star">*</sup></label>
            <input type="text" name="provinsi" class="form-control" id="inputProvince" placeholder="Papua Barat" required>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="form-group col-md-4">
            <label>Visi<sup class="star">*</sup></label>
            <textarea name="visi" class="form-control" id="editor" required></textarea>
        </div>
        <div class="form-group col-md-6">
            <label>Misi<sup class="star">*</sup></label>
            <textarea name="misi" class="form-control" id="editor2" required></textarea>
        </div>
    </div>
    <div class="form-group col-md-8">
        <label>Biografi</label>
        <textarea name="biografi" class="form-control" id="editor3"></textarea>
    </div>
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputInstagram">Instagram</label>
            <input name="instagram" type="url" class="form-control" id="inputInstagram" placeholder="https://instagram.com"
                pattern="https://.*">
        </div>
        <div class="form-group col-md-6">
            <label for="inputFacebook">Facebook</label>
            <input name="facebook" type="url" class="form-control" id="inputFacebook" placeholder="https://facebook.com"
                pattern="https://.*">
        </div>
        <div class="form-group col-md-6">
                <label for="inputTelfon">No.Telfon</label>
                <input name="telfon" type="text" class="form-control" id="inputTelfon" placeholder="ex : 0812345678" max="15">
            </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="row col-md-12 ml-0 card-header">
                <div class="col-md-6">
                      <h3 class="mt-2">Penghargaan</h3>
                </div>
                <div class="col-md-6">
                     <button type="button" class="btn btn-info add_field_button float-right mt-2">Tambah Penghargaan</button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group input_fields_wrap mt-lg-4">
                    <div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="inputNamaP">Nama<sup class="star">*</sup></label>
                                <input name="namap" type="text" class="form-control" id="inputNamaP" placeholder="Wakanda" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputKredensialP">Kredensial</label>
                                <input name="kredensialp" type="text" class="form-control" id="inputKredensialP" placeholder="Wakanda">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDeskripsiP">Deskripsi<sup class="star">*</sup></label>
                            <textarea name="deskripsip" class="form-control" id="inputDeskripsiP" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-md-4">
        <label for="inputPic">Foto Kandidat<sup class="star">*</sup></label>
        <input name="foto" type="file" class="form-control" id="inputPic" required>
    </div>

    <div class="col-md-12 row mt-lg-5">
        <div class="col-md-4">
                <a>
                        <a href="{{ url('kandidat.index') }}" class="btn btn-danger btn-block">Cancel</a>
                </a>
        </div>
        <div class="col-md-4">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
</form>

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<script>
    var konten = document.getElementById("editor");
    var konten2 = document.getElementById("editor2");
    var konten3 = document.getElementById("editor3");
    CKEDITOR.replace(konten, {
        language: 'en-gb'
    });

    CKEDITOR.replace(konten2, {
        language: 'en-gb'
    });

    CKEDITOR.replace(konten3, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>

<script>
var max_fields      = 10;
	var wrapper   		= $(".input_fields_wrap");
	var add_button      = $(".add_field_button");
	
	var x = 1;
	$(add_button).click(function(e){
		e.preventDefault();
		if(x < max_fields){
			x++;
			$(wrapper).append('<div><a href="#" class="ml-3 remove_field"><button class="btn"><i class="fa fa-close"></i></button></a><div class="row col-md-12"><div class="form-group col-md-4"><label for="inputNamaP">Nama</label><input type="text" class="form-control" id="inputNamaP" placeholder="Wakanda"></div><div class="form-group col-md-4"><label for="inputNamaP">Kredensial</label><input type="text" class="form-control" id="inputNamaP" placeholder="Wakanda"></div></div><div class="form-group col-md-6"><label for="inputNamaP">Deskripsi</label><textarea class="form-control" id="inputNamaP" rows="3"></textarea></div></div>');
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){
		e.preventDefault(); $(this).parent('div').remove(); x--;
    $( 'input[name="mytext[]"]' ).each(function(index) {
    		$( this ).val(index+1);
    });
	})
</script>
@endsection
