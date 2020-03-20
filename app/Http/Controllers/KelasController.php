<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    {
        $data['kelas'] = DB::table('t_kelas')->get();
        return view('DataKelas', $data);
    }

    public function create()
    {
        return view('kelas.form');
    }

    public function store(Request $request)
    {

        $rule = [
            'nama_kelas' => 'required|bail|unique:t_kelas',
            'jurusan'    => 'required',
            'ruangan'    => 'required|alpha_num',
            'wali_kelas' => 'required|min:3|alpha'
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        $status = \DB::table('t_kelas')->insert($input);

        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/kelas/create')->with('error', 'Data gagal ditambahkan');
        }
    }
}