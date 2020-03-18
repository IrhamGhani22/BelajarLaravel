<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/form.css')}}">

</head>
<body>

    <div class="row no-gutters">
        <div class=" col-md-2 side">
            <ul class=" nav flex-column navs">
                <li class=" nav-item bg-primary mb-3 ">
                    <a class=" navbar-brand nav-link text-dark" href=" # ">
                        <h4>SMKN 4 BDG</h4>
                    </a>
                </li>
                <li class=" nav-item pb-3 mb-2 profil ">
                    <div class="row no-gutters">
                        <div class="col-md-4"> <img class=" rounded-circle ml-3 " width=" 50 " height=" 50 " src="/assets/img/irham.jpg " alt=" "></div>
                        <div class="col-md-8 mr-auto">
                            <h6>
                                <a class=" nav-link text-white mt-2">IRHAM</a>
                            </h6>
                        </div>
                    </div>
                </li>
                <li class=" nav-item mb-2 pt-2 pb-2 tengah-keluar">
                    <h6>
                        <i class=" fas fa-tachometer-alt text-white ml-4 " style=" font-size: 145%; "></i><a class=" nav-link d-inline text-white " href=" {{url('/dashboard')}} ">DASHBOARD</a>
                    </h6>
                </li>
                <li class="nav-item mt-1 pt-1 tengah-keluar">
                    <h6>
                        <i class="fas fa-users text-white ml-4 " style="font-size: 145%; "></i><a class="nav-link d-inline text-white " href="{{url('/belajar')}}">DATA SISWA</a>
                    </h6>
                </li>
                <li class="nav-item mb-2 mt-2 pt-2 profil pb-2 tengah-keluar ">
                    <h6>
                        <i class="fas fa-chalkboard-teacher text-white ml-4 " style="font-size: 145%; "></i><a class="nav-link d-inline text-white " href=" {{url('/DataKelas')}} ">DATA KELAS</a>
                    </h6>
                </li>
                <li class="nav-item pt-2 pb-2 mt-2  tengah-keluar">
                    <h6>
                        <i class="fas fa-sign-out-alt text-white ml-4 " style="font-size: 145%; "></i><a class="nav-link d-inline text-white " href="# ">LOGOUT</a>
                    </h6>
                </li>
                <li class=" nav-item pt-2 pb-2 mt-2 " ">
                    <h6>

                    </h6>
                </li>
            </ul>
        </div>

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


    

    <script src="{{URL::asset('/asset/bootstrap/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{URL::asset('/asset/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('/asset/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>