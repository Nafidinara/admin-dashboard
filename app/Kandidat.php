<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $primaryKey = 'kandidat_id';

    protected $fillable = ['nama','kelamin'];

    public function Penghargaans(){
        return $this->hasMany(Penghargaan::class);
    }

    public function Biodata()
{
    return $this->hasOne(Biodata::class);
}

public function file_kandidat()
    {
        return $this->belongsToMany(File::class, 'file_kandidats');
    }
}