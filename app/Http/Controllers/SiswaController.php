<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function Coba1()
    {
        echo '<h1>Succses coba pindahkan Route ke Controller</h1>';
    }
    public function Coba2()
    {
        return view('ViewDua');
    }
    public function Caba3()
    {
        return view('ViewTiga');
    }


    public function index()
    {
        $data['siswa'] = DB::table('data_siswa')
            ->orderBy('jenis_kelamin')
            ->get();
        return view('DataSiswa', $data);
    }

    public function create()
    {
        return view('siswa.form');
    }

    public function store(Request $request)
    {

        $rule = [
            'nis'            => 'required|numeric|unique:data_siswa',
            'nama_lengkap'   => 'required|string',
            'jenis_kelamin'  => 'required',
            'golongan_darah' => 'required'
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = \DB::table('data_siswa')->insert($input);

        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/siswa/create')->with('error', 'Data gagal ditambahkan');
        }
    }
}