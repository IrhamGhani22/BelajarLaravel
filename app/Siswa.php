<?php

namespace App;

use illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $table = "data_siswa";

    protected $fillable = [
        'nis', 'file', 'nama_lengkap', 'jenis_kelamin', 'golongan_darah'
    ];
}