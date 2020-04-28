@extends('layout/main')

@section('title', 'SMKN 4 BDG | PWPB 20')

@section('style')
    <link rel="stylesheet" href="{{ URL::asset('/assets/dashboard.css')}}">
@endsection
    
@section('container')

        <div class=" col-md-10 content ">
            <div class=" jumbotron mt-5 text-white shadow-lg ml-2" style=" background-color: #25293a; ">
                <h1 class=" display-4 ">HELLO, ADMIN</h1>
                <p class=" lead ">Selamat datang di Web Admin Pengelolaan Data SMKN 4 Bandung</p>
                <hr class=" my-4 ">
                <p></p>
                <a class=" btn btn-primary btn-lg text-dark " href=" # " role=" button ">Kelola Data</a>
            </div>
        </div>
     
@endsection