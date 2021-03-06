@extends('layout/main')

@section('title', 'SMKN 4 BDG | PWPB 20')

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('/assets/kelas.css')}}">
@endsection

@section('container')


        <div class=" col-md-10 content ">

            <h1 class=" text-white mt-2 ml-2 "> <i class=" fas fa-chalkboard-teacher ml-2 mr-2 mt-3 "></i> DATA KELAS
                <a class=" btn btn-dark ml-2 " style=" margin-top: -10px; background: #252733; " href="{{ url('/kelas/create') }}">
                    <h4 class=" d-inline "> <i class=" fas fa-plus "></i></h4>
                </a>
                <a class=" btn btn-dark " style=" margin-top: -10px; margin-left:60%; background: #252733; " href="{{ url('/kelas') }}">
                    <h4 class=" d-inline "><i class="fas fa-sync-alt"></i></h4>
                </a>
            </h1>
            <hr style=" border: 1px solid white; width: 97%; ">

            <div class="flash-data" data-flashdata="{{session('success')}}"></div>

            {{-- @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check"></i>  {{session('success')}}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-times"></i>  {{session('error')}}
            </div>
            @endif --}}

            <form action="{{ url('/kelas/search')}}" method="GET">
                <div class=" row no-gutterss " style=" width: 101%; ">
                    <div class=" col-md-6 mt-2 ">
                        <span class=" text-white ml-3 ">Show</span>
                        <select class=" form-control form-control-sm d-inline " style=" width: 11.5%; background: #252733; ">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                        <span class=" text-white ">Entries</span>
                    </div>
                    <div class=" col-md-6 ">
                        <div class=" input-group mb-2 w-50 float-right ">
                            <input type=" text " name="search" class=" form-control cari text-white" placeholder=" Search " value="{{ old('search') }}" aria-label=" Recipient 's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text" id="basic-addon2">
                                    <a class="text-decoration-none text-secondary" href=""><i
                                            class="fas fa-search"></i></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

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
                                <a href="{{ url('/kelas/' . $row->id_kelas . '/edit') }}">
                                    <button class="btn btn-success "><i class="fas fa-edit text-white"></i>
                                    </button>
                                </a>
                            </td>
                            <td class="text-center">
                                {{-- <form action="{{ url('/kelas', $row->id_kelas) }}" method="POST">
                                    @method('DELETE')
                                    @csrf --}}
                                <a href="/kelas/delete/{{$row->id_kelas}}" class="tombol-hapus">
                                    <button type="submit" class="btn btn-danger ">
                                        <i class="fas fa-trash-alt text-white"></i>
                                    </button>
                                </a>
                                {{-- </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td scope="row" colspan="9">
                                {{-- {!! $kelas->appends(Request::except('page'))->render() !!} --}}
                                {{ $kelas->appends(Request::all())->links() }}
                                    <script>
                                        $('.pagination').addClass('pagination');
                                        $('.pagination li').addClass('page-item');
                                        $('.pagination li a').addClass('page-link');
                                        $('.pagination span').addClass('page-link');                            
                                     </script>
                                    {{-- <ul class="pagination  mb-1 float-right ">
                                        <li class="page-item "><a class="page-link pegi" href="#">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link pegi" href="#">1</a>
                                        </li>
                                        <li class="page-item"><a class="page-link pegi" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link pegi" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link pegi" href="#">Next</a></li>
                                    </ul> --}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
        </div>
    </div>
  
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/kelas.js')}}"></script>
@endsection
