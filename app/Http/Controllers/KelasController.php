<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    {
        // $kelas = DB::table('t_kelas')->paginate(5);

        // return view('DataKelas', compact('kelas'));

        $kelas = \App\Kelas::paginate(5);

        return view('DataKelas', compact('kelas'));
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

        // unset($input['_token']);
        // $status = \DB::table('t_kelas')->insert($input);

        $status = \App\Kelas::create($input);

        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/kelas/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit(Request $request,  $id_kelas)
    {
        // $data['kelas'] =  \DB::table('t_kelas')->where('id_kelas', $id_kelas)->first();
        // return view('kelas.form', $data);

        $kelas = \App\Kelas::find($id_kelas);

        return view('kelas.form', compact('kelas'));
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
        // unset($input['_token']);
        // unset($input['_method']);

        // $status = \DB::table('t_kelas')->where('id_kelas', $id_kelas)->update($input);

        $kelas = \App\Kelas::find($id_kelas);
        $status = $kelas->update($input);

        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/kelas/create')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy(Request $request, $id_kelas)
    {

        // $status = \DB::table('t_kelas')->where('id_kelas', $id_kelas)->delete();

        $kelas = \App\Kelas::find($id_kelas);
        $status = $kelas->delete();

        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/kelas/create')->with('error', 'Data gagal dihapus');
        }
    }
    public function search(Request $request)
    {
        $search = $request->search;

        $kelas = DB::table('t_kelas')
            ->where('nama_kelas', 'like', "%" . $search . "%")
            ->orWhere('jurusan', 'like', "%" . $search . "%")
            ->orWhere('ruangan', 'like', "%" . $search . "%")
            ->orWhere('wali_kelas', 'like', "%" . $search . "%")
            ->paginate(5);

        return view('DataKelas', compact('kelas'));
    }
}