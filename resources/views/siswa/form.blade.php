@extends('layout/main')

@section('title', 'Form Tambah Data Siswa')
    
@section('container')

        <div class=" col-md-10 content ">
            <h1 class=" text-white mt-2 ml-2"> <i class=" fas fa-user-edit ml-2 mr-2 mt-3 "></i> FORM DATA SISWA
            </h1>
            <hr style=" border: 1px solid white; width: 97%; ">
            @if(session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
            @endif
            
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <strong>Perhatian</strong>
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
                    <a class="text-decoration-none" href="{{url('/belajar')}}"><i
                            class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
            </div>
            <form class="border p-3 text-white ml-2" action="{{ url('siswa')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">NIS</label>
                    <input name="nis" type="number" class="form-control text-white" style="background: #252733;"
                        value="{{old('nis')}}" placeholder="NIS">
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input name="nama_lengkap" type="text" class="form-control text-white"
                        value="{{old('nama_lengkap')}}" placeholder="Nama Lengkap"  style="background: #252733;">
                </div>
                <label for="">Jenis Kelamin</label><br>
                <div class="form-check">  
                    <label class="form-check-label" for="">         
                    <input class="form-check-input" type="radio" name="jenis_kelamin"  value="L">        
                      L
                    </label>
                  </div>
                  <div class="form-check mb-3">
                    <label class="form-check-label" for="">
                    <input class="form-check-input" type="radio" name="jenis_kelamin"  value="P">
                      P
                    </label>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Golongan Darah</label>
                    <select class="form-control" name="golongan_darah" style="background: #252733;">
                      <option value="">- Pilih Goldar -</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="AB">AB</option>
                      <option value="O">O</option>
                    </select>
                  </div>
                <br>
                <button type="submit" class="btn btn-primary">SAVE</button>
                <button type="reset" class="btn btn-light">RESET</button>
            </form>
        </div>
         
@endsection