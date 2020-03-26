<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    {
        $data['kelas'] = DB::table('t_kelas')
            ->orderBy('nama_kelas')
            ->get();
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
            'ruangan'    => 'required',
            'wali_kelas' => 'required|min:3'
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

    public function edit(Request $request,  $id_kelas)
    {
        $data['kelas'] =  \DB::table('t_kelas')->where('id_kelas', $id_kelas)->first();
        return view('kelas.form', $data);
    }

    public function update(Request $request, $id_kelas)
    {

        $rule = [
            'nama_kelas' => 'required|bail',
            'jurusan'    => 'required',
            'ruangan'    => 'required',
            'wali_kelas' => 'required|min:3'
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);

        $status = \DB::table('t_kelas')->where('id_kelas', $id_kelas)->update($input);

        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/kelas/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function destroy(Request $request, $id_kelas)
    {

        $status = \DB::table('t_kelas')->where('id_kelas', $id_kelas)->delete();

        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/kelas/create')->with('error', 'Data gagal dihapus');
        }
    }
}