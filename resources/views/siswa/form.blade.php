@extends('layout/main')

@section('title', 'Form Tambah Data Siswa')
    
@section('container')

    <?php

        $action = 'input';
        $disabled = '';
        $title = ' <i class=" fas fa-user-plus ml-2 mr-2 mt-3 "></i> INPUT DATA SISWA';

    if (!empty($siswa)){

        $action = 'edit';
        $disabled = 'readonly';
        $title = ' <i class=" fas fa-user-edit ml-2 mr-2 mt-3 "></i> EDIT DATA SISWA';
    }
    ?>

    <div class=" col-md-10 content ">
        <form action="{{ url('siswa', @$siswa->id) }}" method="POST" enctype="multipart/form-data">

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
                    <a class="text-decoration-none" href="{{url('/belajar')}}">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

            
            <div class="border p-3 text-white ml-2">
                @csrf

                @if(!empty($siswa))
                    @method('PATCH') 
                @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input name="nis" id="nis" type="number" class="form-control  @error('nis') is-invalid @enderror" style="background: #252733; color:gray;"
                              value="{{old('nis', @$siswa->nis)}}" placeholder="NIS" <?= $disabled ?> >
                        @error('nis')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                          
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input name="nama_lengkap" id="nama" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                              value="{{old('nama_lengkap', @$siswa->nama_lengkap)}}" placeholder="Nama Lengkap"  style="background: #252733; color:gray;">
                         @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
    
                    <label for="">Jenis Kelamin</label><br>
                    <div class="custom-control custom-radio mb-1">
                        <input type="radio" id="customRadio1" name="jenis_kelamin" class="custom-control-input @error('jenis_kelamin') is-invalid @enderror" value="L" {{old('jenis_kelamin', @$siswa->jenis_kelamin) == 'L' ? 'checked' : ''}}>                 
                        <label class="custom-control-label" for="customRadio1">L</label>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                     <div class="custom-control custom-radio mb-2">
                        <input type="radio" id="customRadio2" name="jenis_kelamin" class="custom-control-input @error('jenis_kelamin') is-invalid @enderror" value="P" {{old('jenis_kelamin', @$siswa->jenis_kelamin) == 'P' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="customRadio2">P</label>
                        @error('jenis_kelamin') 
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="goldar">Golongan Darah</label>
                          <select class="form-control @error('golongan_darah') is-invalid @enderror" id="goldar" name="golongan_darah" style="background: #252733; color:gray;">
                            <option value=""   {{ old('golongan_darah', @$siswa->golongan_darah) == '' ? 'selected' : '' }}>- Pilih Goldar -</option>
                            <option value="A"  {{ old('golongan_darah', @$siswa->golongan_darah) == 'A' ? 'selected' : '' }} >A</option>
                            <option value="B"  {{ old('golongan_darah', @$siswa->golongan_darah) == 'B' ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ old('golongan_darah', @$siswa->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                            <option value="O"  {{ old('golongan_darah', @$siswa->golongan_darah) == 'O' ? 'selected' : '' }}>O</option>
                          </select>
                          @error('golongan_darah')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                          @enderror
                     </div>
                      <br>
                      <button type="submit" class="btn btn-primary">SAVE</button>
                      <button type="reset" class="btn btn-light">RESET</button>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="file" name="file" id="chooseFile" class="form-control-file add  @error('file') is-invalid @enderror" >
                        <?php if ($action == "edit") { ?>
                            <img id="preview" class="img-edit"  src="{{asset('assets/img/'.$siswa->file)}}" alt="" width="260" height="260">
                            <input type="hidden" name="file" id="chooseFile" class="form-control-file  @error('file') is-invalid @enderror" value="{{old('file', $siswa->file)}}">
                        <?php } ?>
                        <div class="box">
                            <img id="preview" src="{{asset('assets/img/no-image.jpg')}}" alt="" width="260" height="260">
                        </div>
                       
                        @error('file')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                   
                </div>
            </div>
                
        </div>
    </form>
</div>
        
         
@endsection