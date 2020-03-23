@extends('layout/main')

@section('title', 'Form Tambah Data Siswa')
    
@section('container')

          <div class=" col-md-10 content ">
              <h1 class=" text-white mt-2 ml-2"> <i class=" fas fa-user-edit ml-2 mr-2 mt-3 "></i> FORM DATA SISWA
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
                      <a class="text-decoration-none" href="{{url('/belajar')}}"><i
                              class="fas fa-arrow-left"></i> Back
                      </a>
                  </div>
              </div>
              <form class="border p-3 text-white ml-2" action="{{ url('siswa', @$siswa->id) }}" method="POST">
                  @csrf

                  @if(!empty($siswa))
                      @method('PATCH')
                  @endif

                  <div class="form-group">
                      <label for="">NIS</label>
                      <input name="nis" type="number" class="form-control text-white" style="background: #252733;"
                          value="{{old('nis', @$siswa->nis)}}" placeholder="NIS">
                  </div>
                  
                  <div class="form-group">
                      <label for="">Nama Lengkap</label>
                      <input name="nama_lengkap" type="text" class="form-control text-white"
                          value="{{old('nama_lengkap', @$siswa->nama_lengkap)}}" placeholder="Nama Lengkap"  style="background: #252733;">
                  </div>

                  <label for="">Jenis Kelamin</label><br>
                    <div class="custom-control custom-radio mb-1">
                      <input type="radio" id="customRadio1" name="jenis_kelamin" class="custom-control-input" value="L" {{old('jenis_kelamin', @$siswa->jenis_kelamin) == 'L' ? 'checked' : ''}}>
                      <label class="custom-control-label" for="customRadio1">L</label>
                    </div>
                    <div class="custom-control custom-radio mb-2">
                      <input type="radio" id="customRadio2" name="jenis_kelamin" class="custom-control-input" value="P" {{old('jenis_kelamin', @$siswa->jenis_kelamin) == 'P' ? 'checked' : ''}}>
                      <label class="custom-control-label" for="customRadio2">P</label>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Golongan Darah</label>
                      <select class="form-control text-secondary" name="golongan_darah" style="background: #252733;">
                        <option value=""   {{ old('golongan_darah', @$siswa->golongan_darah) == '' ? 'selected' : '' }}>- Pilih Goldar -</option>
                        <option value="A"  {{ old('golongan_darah', @$siswa->golongan_darah) == 'A' ? 'selected' : '' }} >A</option>
                        <option value="B"  {{ old('golongan_darah', @$siswa->golongan_darah) == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ old('golongan_darah', @$siswa->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O"  {{ old('golongan_darah', @$siswa->golongan_darah) == 'O' ? 'selected' : '' }}>O</option>
                      </select>
                    </div>
                  <br>
                  <button type="submit" class="btn btn-primary">SAVE</button>
                  <button type="reset" class="btn btn-light">RESET</button>
              </form>
          </div>
         
@endsection