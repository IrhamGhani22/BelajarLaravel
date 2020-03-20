@extends('layout/main')

@section('title', 'Form Tambah Data Kelas')
    
@section('container')

            <div class=" col-md-10 content ">
                <h1 class=" text-white mt-2 ml-2"> <i class=" fas fa-chalkboard-teacher ml-2 mr-2 mt-3 "></i> FORM DATA KELAS
                </h1>
                <hr class="ml-2" style=" border: 1px solid white; width: 99%; ">

                @if(session('error'))
                <div class="alert alert-error">
                    {{session('error')}}
                </div>
                @endif
                
                @if (count($errors)>0)
                <div class="alert alert-danger peringatan">
                    <strong><i class="fas fa-exclamation-triangle text-warning"></i> Perhatian</strong>
                    <br>
                    <ul>
                        @foreach ($errors->all()  as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card border-0 ml-2" style="background:  #252733;;">
                    <div class="card-body border" >
                        <a class="text-decoration-none" href="{{url('/DataKelas')}}"><i
                                class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>
                </div>
                <form class="border p-3 text-white ml-2" action="{{ url('kelas')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Kelas</label>
                        <input name="nama_kelas" type="text" class="form-control text-white" style="background: #252733;"
                        value="{{old('nama_kelas')}}" placeholder="Kelas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jurusan</label>
                        <select class="form-control text-secondary" name="jurusan" style="background: #252733;">
                        <option value="" {{ old('jurusan') == '' ? 'selected' : '' }}>- Piilih Jurusan -</option>
                        <option value="Rekayasa Perangkat Lunak"
                         {{ old('jurusan') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                        <option value="Multi Media" 
                        {{ old('jurusan') == 'Multi Media' ? 'selected' : '' }}>Multi Media</option>
                        <option value="Teknik Komputer Jaringan"
                         {{ old('jurusan') == 'Teknik Komputer Jaringan' ? 'selected' : '' }}>Teknik Komputer Jaringan</option>
                        <option value="Teknik Instalasi Tenaga Listrik" 
                        {{ old('jurusan') == 'Teknik Instalasi Tenaga Listrik' ? 'selected' : '' }}>Teknik Instalasi Tenaga Listrik</option>
                        <option value="Teknik Otomasi Industri"
                         {{ old('jurusan') == 'Teknik Otomasi Industri' ? 'selected' : '' }}>Teknik Otomasi Industri</option>
                        <option value="Teknik Audio Video"
                         {{ old('jurusan') == 'Teknik Audio Video' ? 'selected' : '' }}>Teknik Audio Video</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Lokasi Ruangan</label>
                        <input name="ruangan" type="text" class="form-control text-white" style="background: #252733;"
                            value="{{old('ruangan')}}" placeholder="Lokasi Ruangan">
                    </div>
                    <div class="form-group">
                        <label for="">Wali Kelas</label>
                        <input name="wali_kelas" type="text" class="form-control text-white" style="background: #252733;"
                            value="{{old('wali_kelas')}}" placeholder="Wali Kelas">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">SAVE</button>
                    <button type="reset" class="btn btn-light">RESET</button>
                </form>
            </div>

@endsection