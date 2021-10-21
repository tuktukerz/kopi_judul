@extends('template_backend.home')
@section('title', 'Semua Menu')
@section('content')
@section('mn_idx','active')
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
                                                                <h6 class="text-muted font-semibold">Jumlah Menu</h6>
                                                                <h6 class="font-extrabold mb-0">{{ $jmlh_menu }}</h6>
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
                                                    <h3>Semua Menu</h3>
                                                    <p class="text-subtitle text-muted">Semua Menu</p>
                                                </div>
                                                <div class="col-12 col-md-6 order-md-2 order-first">
                                                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                                                            <li class="breadcrumb-item active" aria-current="page">Semua Menu</li>
                                                        </ol>
                                                    </nav>
                                                </div>
                                            </div>
                                    </div>

                                    <!-- GO TO CREATE -->
                                    <a href="{{ route('menu.create')}}" class="btn btn-info btn-sm mb-5">Tambah Menu</a>
                                    <section class="section">
                                        <!-- <table id="table_id" class="display">
                                            <thead>
                                                <tr>
                                                    <th>TR</th>
                                                    <th>Column 2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Row 1 Data 1</td>
                                                    <td>Row 1 Data 2</td>
                                                </tr>
                                                <tr>
                                                    <td>Row 2 Data 1</td>
                                                    <td>Row 2 Data 2</td>
                                                </tr>
                                            </tbody>
                                        </table> -->
                                         <div class="card">
                                            <div class="card-body">
                                                <table class="table table-striped" id="table1">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Menu</th>
                                                            <th>Nama Kategori</th>
                                                            <th>Harga</th>
                                                            <th>Keterangan</th>
                                                            <th>Gambar</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $no = 1; ?>
                                                    @foreach ($menu as $result => $cat)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $cat->judul }}</td>
                                                            <td>{{ $cat->category->nama }}</td>
                                                            <td>{{ number_format($cat->harga) }}</td>
                                                            <td>{{ $cat->keterangan }}</td>
                                                            <td><img class="img-fluid" src="{{ asset( $cat->picture )}}" style="width:80px;"></td>
                                                            <td>
                                                            <form action="{{ route('menu.destroy', $cat->id) }}" method="POST">
                                                                    <a href="{{ route('menu.edit',$cat->id )}}" class="btn btn-success btn-sm">Edit</a>
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
                                    </section>
                        </div>
</div>

@endsection
