<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileKandidat extends Model
{
    protected $fillable = ['file_id','kandidat_id'];

    protected $primaryKey = 'file_kandidat_id';
}

