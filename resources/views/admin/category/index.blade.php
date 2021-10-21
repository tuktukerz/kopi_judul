@extends('template_backend.home')
@section('title', 'Semua Kategori')
@section('content')
@section('ctg_idx','active')
@section('main','active')

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
                                                                <h6 class="text-muted font-semibold">Jumlah Kategori</h6>
                                                                <h6 class="font-extrabold mb-0">{{ $jmlh_ctg }}</h6>
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
                                                    <h3>Semua Kategori</h3>
                                                    <p class="text-subtitle text-muted">Semua Kategori</p>
                                                </div>
                                                <div class="col-12 col-md-6 order-md-2 order-first">
                                                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                                                            <li class="breadcrumb-item active" aria-current="page">Semua Kategori</li>
                                                        </ol>
                                                    </nav>
                                                </div>
                                            </div>

                                    <!-- GO TO CREATE -->
                                    <a href="{{ route('category.create')}}" class="btn btn-info btn-sm mb-5">Tambah Kategori</a>
                                    <section class="section">
                                        <div class="row" id="basic-table">
                                            <div class="col-12 col-md-12">
                                                <div class="card">
                                                    <!-- Table with outer spacing -->
                                                    <div class="table-responsive">
                                                        <table class="table table-lg">
                                                            <thead>
                                                                <tr>
                                                                    <th>No </th>
                                                                    <th>Nama Kategori</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                        <?php $no = 1; ?>
                                                                        @foreach ($category as $result => $cat)
                                                                        <tr>
                                                                            <td class="text-bold-500">{{ $no++ }}</td>
                                                                            <td class="text-bold-500">{{ $cat->nama }}</td>
                                                                            <td class="text-bold-500">
                                                                                <form action="{{ route('category.destroy', $cat->id) }}" method="POST">
                                                                                    <a href="{{ route('category.edit',$cat->id )}}" class="btn btn-success btn-sm">Edit</a>
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                 </div>
                            </div>
                        </div>

@endsection
