@extends('layouts.user', ['jmlh_carts' => $jmlh_carts])
@section('title','Home')
@section('content')
    <!-- Jumbotron -->
    <div class class="jumbotron" style="background-color:white;">
        <div data-aos="fade-down" data-aos-offset="300" data-aos-easing="ease-in-sine">
        <div class="container text-center mt-5">
                <img class="ws" src="{{ asset('public/fr/img/foto5.jpg') }}" width="60%" class="text-center">
                <h1 class="display-5 font-weight-bold mt-4">Kopi Judul</h1>
                <p class="lead mt-3">Identitas dari jiwa seluruh karya tulis</p>
                <a href="{{ route('allmenu')}}" class="btn btn-small font-weight-bold text-white" style="background-color:#171717;">Pesan Sekarang</a>
        </div>
        </div>
    </div>

    <!-- Tentang Judul -->
    <div class="text-center mt-5">
        <span>About</span>
            <h2 class="font-weight-bold">Tentang Kopi Judul</h2>
            <div class="container">
                <div class="row" >
                    <div class="col-md-6 mt-5" data-aos="fade-up-right">
                        <img class="ws" src="{{ asset('public/fr/img/jdl.jpeg') }}" width="200px">
                    </div>
                    <div class="col-md-6 mt-5 d-flex align-items-center" data-aos="fade-up-left">
                        <p class="text-left font-weight-bold">Kopi Judul adalah sebuah perusahaan yang bergerak di bidang kuliner, khususnya minuman kopi. Kedai kopi dengan cita rasa yang khas serta tempat yang nyaman untuk para kalian yang sedang lelah bekerja dan sebagainya.</p>
                    </div>
                </div>
            </div>
    </div>


    <!-- Koleksi -->
        <div class="text-center mt-5" data-aos="zoom-in">
            <span>Service</span>
            <h2 class="font-weight-bold">Kategori Menu</h2>
        </div>

        <div class="container text-center mt-5 " data-aos="zoom-in">
            <div class="row ">
                <div class="col-md-4">
                    <img src="{{ asset('public/fr/img/09.jpg')}}" width="50%" class="ws">
                    <h5 class="font-weight-bold mt-3">Kopi</h5>
                  </div>
                <div class="col-md-4">
                  <img src="{{ asset('public/fr/img/13.jpg') }}" width="50%" class="ws">
                  <h5 class="font-weight-bold mt-3">Non Kopi</h5>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('public/fr/img/111.jpg') }}" width="50%" class="ws">
                    <h5 class="font-weight-bold mt-3">Makanan</h5>
                  </div>
            </div>
        </div>

        <!-- Kontak Kami -->
        <div class="text-center mt-5" data-aos="fade-up" data-aos-duration="500" data-aos-anchor-placement="top-center">
            <span>Info</span>
            <h2 class="font-weight-bold">Kontak Kami</h2>
            <p class="text-muted font-weight-bold">Untuk booking tempat bisa hubungi kontak dibawah ini.</p>
        </div>

        <div class="container mt-5" >
            <div class="row ">
                <div class="col-6 ">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.67564467869!2d106.7034392!3d-6.1415946!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1f4ed9e0ea3ec0dc!2sKOPI%20JUDUL!5e0!3m2!1sid!2sid!4v1624309683928!5m2!1sid!2sid" width="100%"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-6 font-weight-bold" >
                    <p>Operasional : </p>
                    <p>Selasa - Minggu</p>
                    <p>16.00 - 23.00 WIB</p>
                    <p>082114326415</p>
                    <p>5, Jl. Veteran I No.35, RT.1/RW.6, Pegadungan, Kalideres, West Jakarta City, Jakarta 11830</p>
                    <p>Instagram : @kopijudul</p>

                  </div>
            </div>
        </div>
@endsection

