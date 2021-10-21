@extends('layouts.user', ['jmlh_carts' => $jmlh_carts])
@section('title','Semua Menu')
@section('content')
    <!-- JumboTron -->
    <div class class="jumbotron" style="background-color:white;">
        <div data-aos="fade-down" data-aos-offset="300" data-aos-easing="ease-in-sine">
        <div class="container text-center mt-5">
                <img class="ws" src="{{ asset('public/fr/img/foto10.jpg') }}" width="60%" class="text-center">
        </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="background-color:white;" data-aos="fade-up">
            <div class="container">
                <span>Service</span>
                <h2 class="font-weight-bold">Semua Jenis Menu</h2>
                <p class="text-muted font-weight-bold">Kopi Judul menyajikan sejumlah jenis makanan dan minuman dengan kualitas yang baik.</p>
            </div>
    </div>


    <!-- Koleksi Makanan -->
    <div class="jumbotron text-left mt-5" style="background-color:white;" data-aos="zoom-out-up">
        <div class="container">
            <h2 class="font-weight-bold">Kopi</h2>
            <p class="text-muted">Dibuat dari bahan-bahan yang berkualitas.</p>
        </div>

        <div class="container" data-aos="zoom-out-up">
            <div class="container">
                <main class="grid">
                @foreach ($makanan as $cat)
                    <article>
                        <img src="{{ asset( $cat->gambar )}}" alt="">
                        <div class="text">
                            <h3 class="font-weight-bold">{{ $cat->judul }}</h3>
                            <p class="font-weight-bold">Rp {{ number_format($cat->harga, 0, ',', '.')}}</p>
                            <p  >{{ $cat->keterangan }}</p>
                            <br>
                            <a href="{{ route('carts.create', $cat->id) }}" class="btn btn-dark btn-md font-weight-bold" >Pesan</a>
                        </div>
                    </article>
                @endforeach
                </main>
            </div>
        </div>
    </div>

    <!-- Koleksi Minuman -->
    <div class="jumbotron text-left mt-5" style="background-color:white;" data-aos="zoom-out-up">
        <div class="container">
            <h2 class="font-weight-bold">Non Kopi</h2>
            <p class="text-muted">Dibuat dari bahan-bahan yang berkualitas.</p>
        </div>

        <div class="container" data-aos="zoom-out-up">
            <div class="container">
                <main class="grid">
                @foreach ($minuman as $cat)
                    <article>
                        <img src="{{ asset( $cat->gambar )}}" alt="">
                        <div class="text">
                            <h3 class="font-weight-bold">{{ $cat->judul }}</h3>
                            <p class="font-weight-bold">Rp {{ number_format($cat->harga, 0, ',', '.')}}</p>
                            <p  >{{ $cat->keterangan }}</p>
                            <br>
                            <a href="{{ route('carts.create', $cat->id) }}" class="btn btn-dark btn-md font-weight-bold">Pesan</a>
                        </div>
                    </article>
                @endforeach
                </main>
            </div>
        </div>
    </div>



    <!-- Koleksi Makanan -->
    <div class="jumbotron text-left mt-5" style="background-color:white;">
        <div class="container">
            <h2 class="font-weight-bold">Makanan</h2>
            <p class="text-muted">Dibuat dari bahan-bahan yang berkualitas.</p>
        </div>

        <div class="container" data-aos="zoom-out-up">
            <div class="container">
                <main class="grid">
                @foreach ($snack as $cat)
                <article>
                        <img src="{{ asset( $cat->gambar )}}" alt="">
                        <div class="text">
                            <h3 class="font-weight-bold">{{ $cat->judul }}</h3>
                            <p class="font-weight-bold">Rp {{ number_format($cat->harga, 0, ',', '.')}}</p>
                            <p  >{{ $cat->keterangan }}</p>
                            <br>
                            <a href="{{ route('carts.create', $cat->id) }}" class="btn btn-dark btn-md font-weight-bold">Pesan</a>
                        </div>
                    </article>
                @endforeach
                </main>
            </div>
        </div>
    </div>


@endsection