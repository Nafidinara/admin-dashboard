<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penghargaan extends Model
{
    protected $fillable = [
        'nama','deskripsi','kredensial','kandidat_id'
    ];

    protected $primaryKey = 'penghargaan_id';

    public function Kandidats(){
        $this->belongsTo(Penghargaan::class);
    }
}
