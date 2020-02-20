<?php

namespace App\Http\Controllers;

use App\Biodata;
use App\File as AppFile;
use App\FileKandidat;
use App\Kandidat;
use App\Penghargaan;
use Exception;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kandidat = Kandidat::all();
        return view('kandidat.kandidat',['kandidat' => $kandidat]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kelamin' => 'required',
            'alamat' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'biografi' => 'nullable',
            'instagram' => 'nullable',
            'facebook' => 'nullable',
            'telfon' => 'nullable|digits_between:1,14',
            'namap' => 'required',
            'kredensialp' => 'nullable',
            'deskripsip' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png|max:5120'
        ]);

        $nama = $request->nama;
        $kelamin = $request->kelamin;
        $alamat = $request->alamat;
        $kabupaten = $request->kabupaten;
        $provinsi = $request->provinsi;
        $visi = $request->visi;
        $misi = $request->misi;
        $biografi = $request->biografi;
        $instagram = $request->instagram;
        $facebook = $request->facebook;
        $telfon = $request->telfon;
        $namap = $request->namap;
        $kredensialp = $request->kredensialp;
        $deskripsip = $request->deskripsip;
        $foto = $request->file('foto');


        try{
            DB::beginTransaction();
            $kandidat = Kandidat::create([
                'nama' => $nama,
                'kelamin' => $kelamin
            ]);
            $kandidat->save();
            $kandidat_id = $kandidat->kandidat_id;

            $biodata = Biodata::create([
                'alamat' => $alamat.', '.$kabupaten.', '.$provinsi,
                'biografi' => $biografi,
                'instagram' => $instagram,
                'facebook' => $facebook,
                'telfon' => $telfon,
                'visi' => $visi,
                'misi' => $misi,
                'kandidat_id' =>$kandidat_id
            ]);
            $biodata->save();

            $penghargan = Penghargaan::create([
                'nama' => $namap,
                'deskripsi' => $deskripsip,
                'kredensial' => $kredensialp,
                'kandidat_id' => $kandidat_id
            ]);
            $penghargan->save();

            /**storing file
            into database*/
            $file_name = $kandidat_id.'Kandidat'.'.jpg';
            Storage::disk('public')->putFileAs('file/kandidat',new File($foto),$file_name);
            $files = AppFile::create([
                'path' => $file_name
            ]);
            $files->save();


            /**storing data
            into pivot table*/
            $file_kandidat = FileKandidat::create([
                'file_id' => $files->file_id,
                'kandidat_id' => $kandidat_id
            ]);
            $file_kandidat->save();

            DB::commit();

        } catch(Exception $e){
            DB::rollBack();

        }
        return redirect('kandidat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Db::beginTransaction();
            $kandidat = Kandidat::find($id);
            $kandidat_id = $kandidat->kandidat_id;

            $biodata = Biodata::where('kandidat_id','=',$kandidat_id)->get();

            $penghargan = Penghargaan::where('kandidat_id','=',$kandidat_id)->get();

            $file_pivot = FileKandidat::where('kandidat_id','=',$kandidat_id)->get();
            
            foreach($file_pivot as $item){
                $file_id = $item->file_id;
            }

            $file = AppFile::where('file_id','=',$file_id)->first();

            dd($kandidat,$biodata,$penghargan,$file_pivot,$file);

        }catch(Exception $e){
            dd($e);
        }
    }
}
