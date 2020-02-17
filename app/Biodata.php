<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $primaryKey = 'biodata_id';

    protected $fillable = ['nama','deskripsi','kredensial','kandidat_id'];

    public function Kandidat(){
        $this->belongsTo(Kandidat::class);
    }
}
