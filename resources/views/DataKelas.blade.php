@extends('layout/main')

@section('title', 'Data Kelas XI ')

@section('container')


        <div class=" col-md-10 content ">

            <h1 class=" text-white mt-2 ml-2 "> <i class=" fas fa-chalkboard-teacher ml-2 mr-2 mt-3 "></i> DATA KELAS
                <a class=" btn btn-dark ml-2 " style=" margin-top: -10px; background: #252733; " href="{{ url('/siswa/create') }}">
                    <h4 class=" d-inline "> <i class=" fas fa-plus "></i></h4>
                </a>
            </h1>
            <hr style=" border: 1px solid white; width: 97%; ">

            <center>
                <table class=" table table-bordered table-dark " style=" width: 98%; ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Ruangan </th>
                            <th>Wali Kelas</th>
                            <th class="text-center" colspan="2">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $row)
                        <tr>
                             {{-- <td>{{ isset($i) ? ++$i : $i = 1 }}</td> --}}
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $row->nama_kelas }}</td>
                            <td >{{ $row->jurusan }}</td>
                            <td class="text-center">{{ $row->ruangan }}</td>
                            <td >{{ $row->wali_kelas }}</td>
                            <td class="text-center">
                                <a href="#">
                                    <button class="btn btn-success "><i class="fas fa-edit text-white"></i>
                                    </button>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="#">
                                    <button class="btn btn-danger ">
                                        <i class="fas fa-trash-alt text-white"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
  
@endsection
