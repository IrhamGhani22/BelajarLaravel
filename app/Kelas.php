<?php

namespace App;

use illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $table = 't_kelas';

    public $primaryKey = 'id_kelas';

    protected $fillable = [
        'nama_kelas', 'jurusan', 'ruangan', 'wali_kelas'
    ];
}