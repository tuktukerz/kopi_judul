@extends('template_backend.home')
@section('title','Tambah Kategori')
@section('content')
@section('adm_crt','active')
@section('mainz','active')

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible show fade">
        {{ $error }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endforeach
@endif

@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible show fade">
    {{ Session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif

<div class="page-heading">
                    <div class="page-content">
                        <section class="row">
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon purple">
                                                            <i class="iconly-boldShow"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Jumlah Admin</h6>
                                                        <h6 class="font-extrabold mb-0">{{ $jmlh_user }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="page-heading">
                            <div class="page-title">
                                <div class="row">
                                    <div class="col-12 col-md-6 order-md-1 order-last">
                                        <h3>Tambah admin</h3>
                                        <p class="text-subtitle text-muted">Tambah admin</p>
                                    </div>
                                    <div class="col-12 col-md-6 order-md-2 order-first">
                                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <!-- Basic Vertical form layout section start -->
                            <section id="basic-vertical-layouts">
                                    <div class="row match-height">
                                        <div class="col-md-6 col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form form-vertical" action="{{ route('user.store')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="first-name-vertical">Nama Admin</label>
                                                                            <input type="text" id="first-name-vertical"
                                                                                class="form-control" name="name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="first-name-vertical">Email</label>
                                                                            <input type="email" id="first-name-vertical"
                                                                                class="form-control" name="email">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="first-name-vertical">Password</label>
                                                                            <input type="password" id="first-name-vertical"
                                                                                class="form-control" name="password">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 d-flex justify-content-end mt-5">
                                                                        <button type="submit"
                                                                            class="btn btn-primary me-1 mb-1">Simpan Admin</button>
                                                                        <button type="reset"
                                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <!-- // Basic Vertical form layout section end -->
                        </div>
                    </div>


@endsection
