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
        // $siswa = DB::table('data_siswa')->paginate(5);

        // return view('DataSiswa', compact('siswa'));
        $siswa = \App\Siswa::paginate(5);

        return view('DataSiswa', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.form');
    }

    public function store(Request $request)
    {

        $rule = [
            'nis'            => 'required|numeric|unique:data_siswa',
            'file'           => 'image',
            'nama_lengkap'   => 'required|string',
            'jenis_kelamin'  => 'required',
            'golongan_darah' => 'required'
        ];
        $this->validate($request, $rule);

        // dd($request->all());
        $input = $request->all();
        $status = \App\Siswa::create($input);

        if ($request->hasFile('file')) {
            $request->file('file')->move('assets/img/', $request->file('file')->getClientOriginalName());
            $status->file = $request->file('file')->getClientOriginalName();
            $status->save();
        }

        // unset($input['_token']);
        // $status = \DB::table('data_siswa')->insert($input);


        // $siswa = new \App\Siswa;
        // $siswa->nis = $input['nis'];
        // $siswa->file = $input['file'];
        // $siswa->nama_lengkap = $input['nama_lengkap'];
        // $siswa->jenis_kelamin = $input['jenis_kelamin'];
        // $siswa->golongan_darah = $input['golongan_darah'];
        // $status  = $siswa->save();


        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/siswa/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function edit(Request $request, $id)
    {
        $data['siswa'] =  \DB::table('data_siswa')->find($id);
        return view('siswa.form', $data);
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'nis'            => 'required|numeric',
            'file'           => '',
            'nama_lengkap'   => 'required|string',
            'jenis_kelamin'  => 'required',
            'golongan_darah' => 'required'
        ];
        $this->validate($request, $rule);

        $input = $request->all();

        $siswa = \App\Siswa::find($id);
        $status = $siswa->update($input);

        if ($request->hasFile('file')) {
            $request->file('file')->move('assets/img/', $request->file('file')->getClientOriginalName());
            $siswa->file = $request->file('file')->getClientOriginalName();
            $siswa->update();
        }

        // unset($input['_token']);
        // unset($input['_method']);

        // $status = \DB::table('data_siswa')->where('id', $id)->update($input);




        // $siswa->nis = $input['nis'];
        // $siswa->nama_lengkap = $input['nama_lengkap'];
        // $siswa->jenis_kelamin = $input['jenis_kelamin'];
        // $siswa->golongan_darah = $input['golongan_darah'];
        // $status  = $siswa->save();

        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/siswa/create')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy(Request $request, $id)
    {

        // $status = \DB::table('data_siswa')->where('id', $id)->delete();

        $siswa = \App\Siswa::find($id);
        $status = $siswa->delete();

        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/siswa/create')->with('error', 'Data gagal dihapus');
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $siswa = DB::table('data_siswa')
            ->where('nama_lengkap', 'like', "%" . $search . "%")
            ->orWhere('jenis_kelamin', 'like', "%" . $search . "%")
            ->orWhere('golongan_darah', 'like', "%" . $search . "%")
            ->paginate(5);

        return view('DataSiswa', compact('siswa'));
    }
}