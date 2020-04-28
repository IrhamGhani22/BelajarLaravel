@extends('layout/main')

@section('title', 'SMKN 4 BDG | PWPB 20')

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('/assets/kelas.css')}}">
@endsection
    
@section('container')

    <?php

    $title = ' <i class=" fas fa-user-plus ml-2 mr-2 mt-3 "></i> INPUT DATA KELAS';

    if (!empty($kelas)){

    $title = ' <i class=" fas fa-user-edit ml-2 mr-2 mt-3 "></i> EDIT DATA KELAS';

    }
    ?>

    <div class=" col-md-10 content ">
        <form  action="{{ url('kelas', @$kelas->id_kelas)}}" method="POST" >
            <h1 class=" text-white mt-2 ml-2">
                <?= $title ?>
            </h1>
            <hr class="ml-2" style=" border: 1px solid white; width: 99%; ">

            @if(session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
             @endif
                
            {{-- @if (count($errors)>0)
                <div class="alert alert-danger peringatan">
                    <strong><i class="fas fa-exclamation-triangle text-warning"></i> Perhatian</strong>
                    <br>
                    <ul>
                        @foreach ($errors->all()  as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <div class="card border-0 ml-2" style="background:  #252733;;">
                <div class="card-body border" >
                    <a class="text-decoration-none" href="{{url('/DataKelas')}}">
                        <i class="fas fa-arrow-left"></i>Back
                    </a>
                </div>
            </div>
                
            <div class="border p-3 text-white ml-2">
                @csrf

                @if(!empty($kelas))
                    @method('PATCH')
                @endif

                <div class="form-group">
                    <label for="">Kelas</label>
                    <input name="nama_kelas" type="text" class="form-control   @error('nama_kelas') is-invalid @enderror" style="background: #252733; color:gray;"value="{{old('nama_kelas', @$kelas->nama_kelas)}}" placeholder="Kelas">
                    @error('nama_kelas')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jurusan</label>
                    <select class="form-control  @error('jurusan') is-invalid @enderror" name="jurusan" style="background: #252733; color:gray;">
                        <option value="" {{ old('jurusan', @$kelas->jurusan) == '' ? 'selected' : '' }}>- Piilih Jurusan -</option>
                        <option value="Rekayasa Perangkat Lunak"
                         {{ old('jurusan', @$kelas->jurusan) == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                        <option value="Multi Media" 
                        {{ old('jurusan', @$kelas->jurusan) == 'Multi Media' ? 'selected' : '' }}>Multi Media</option>
                        <option value="Teknik Komputer Jaringan"
                         {{ old('jurusan', @$kelas->jurusan) == 'Teknik Komputer Jaringan' ? 'selected' : '' }}>Teknik Komputer Jaringan</option>
                        <option value="Teknik Instalasi Tenaga Listrik" 
                        {{ old('jurusan', @$kelas->jurusan) == 'Teknik Instalasi Tenaga Listrik' ? 'selected' : '' }}>Teknik Instalasi Tenaga Listrik</option>
                        <option value="Teknik Otomasi Industri"
                         {{ old('jurusan', @$kelas->jurusan) == 'Teknik Otomasi Industri' ? 'selected' : '' }}>Teknik Otomasi Industri</option>
                        <option value="Teknik Audio Video"
                         {{ old('jurusan', @$kelas->jurusan) == 'Teknik Audio Video' ? 'selected' : '' }}>Teknik Audio Video</option>
                    </select>
                    @error('jurusan')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Lokasi Ruangan</label>
                    <input name="ruangan" type="text" class="form-control  @error('ruangan') is-invalid @enderror" style="background: #252733; color:gray;"value="{{old('ruangan', @$kelas->ruangan)}}" placeholder="Lokasi Ruangan">
                     @error('ruangan')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="">Wali Kelas</label>
                    <input name="wali_kelas" type="text" class="form-control  @error('wali_kelas') is-invalid @enderror" style="background: #252733; color:gray;"value="{{old('wali_kelas', @$kelas->wali_kelas)}}" placeholder="Wali Kelas">
                    @error('ruangan')
                     <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">SAVE</button>
                <button type="reset" class="btn btn-light">RESET</button>
            </div>
        </form>
    </div>

@endsection