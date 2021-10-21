@extends('template_backend.home')
@section('title','Edit Kategori')
@section('content')

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
                        <div class="page-heading">
                            <div class="page-title">
                                <div class="row">
                                    <div class="col-12 col-md-6 order-md-1 order-last">
                                        <h3>Edit Kategori</h3>
                                        <p class="text-subtitle text-muted">Tambah kategori produk</p>
                                    </div>
                                    <div class="col-12 col-md-6 order-md-2 order-first">
                                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
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
                                                    <form class="form form-vertical" action="{{ route('category.update', $category->id) }}" method="POST">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="first-name-vertical">Nama Kategori</label>
                                                                        <input type="text" id="first-name-vertical"
                                                                            class="form-control" name="nama" value="{{ $category->nama }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-end">
                                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit Kategori</button>
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
