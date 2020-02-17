<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = 'path';
    protected $primaryKey = 'file_id';

    public function file_kandidat()
    {
        return $this->belongsToMany(Kandidat::class, 'file_kandidats');
    }
}
