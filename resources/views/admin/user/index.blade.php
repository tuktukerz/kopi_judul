@extends('template_backend.home')
@section('title', 'List User')
@section('content')
@section('adm_idx','active')
@section('mainz','active')

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
                                                    <h3>Semua Admin</h3>
                                                    <p class="text-subtitle text-muted">Semua Admin</p>
                                                </div>
                                                <div class="col-12 col-md-6 order-md-2 order-first">
                                                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                                                            <li class="breadcrumb-item active" aria-current="page">Semua Admin</li>
                                                        </ol>
                                                    </nav>
                                                </div>
                                            </div>
                                    </div>

                                    <!-- GO TO CREATE -->
                                    <a href="{{ route('user.create')}}" class="btn btn-info btn-sm mb-5">Tambah User</a>
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
                                                            <th>Nama User</th>
                                                            <th>Email</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($user as $result => $cat)
                                                        <tr>
                                                            <td>{{ $cat->id }}</td>
                                                            <td>{{ $cat->name }}</td>
                                                            <td>{{ $cat->email }}</td>
                                                            <td>
                                                            <form action="{{ route('user.destroy', $cat->id) }}" method="POST">
                                                                    <a href="{{ route('user.edit',$cat->id )}}" class="btn btn-success btn-sm">Edit</a>
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
