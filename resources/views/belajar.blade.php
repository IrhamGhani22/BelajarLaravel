<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<link rel="stylesheet" href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('/assets/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('/assets/belajar.css')}}">

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
                <li class="nav-item mt-1 pt-1 aktif">
                    <h6>
                        <i class="fas fa-users text-white ml-4 " style="font-size: 145%; "></i><a class="nav-link d-inline text-white " href="{{url('/belajar')}}">DATA SISWA</a>
                    </h6>
                </li>
                <li class="nav-item mb-2 mt-2 pt-2 profil pb-2 tengah-keluar">
                    <h6>
                        <i class="fas fa-chalkboard-teacher text-white ml-4 " style="font-size: 145%; "></i><a class="nav-link d-inline text-white " href="{{url('/DataKelas')}}">DATA KELAS</a>
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

            <h1 class=" text-white mt-2 ml-2 "> <i class=" fas fa-users ml-2 mr-2 mt-3 "></i> DATA SISWA
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
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin </th>
                            <th>Golongan Darah </th>
                            <th class="text-center" colspan="2">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $row)
                        <tr>
                             {{-- <td>{{ isset($i) ? ++$i : $i = 1 }}</td> --}}
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $row->nama_lengkap }}</td>
                            <td class="text-center">{{ $row->jenis_kelamin }}</td>
                            <td class="text-center">{{ $row->golongan_darah }}</td>
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

    <script src="{{URL::asset('/asset/bootstrap/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{URL::asset('/asset/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('/asset/bootstrap/js/bootstrap.min.js')}}"></script>

</body>
</html>