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
}