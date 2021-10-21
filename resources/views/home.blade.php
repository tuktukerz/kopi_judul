@extends('template_backend.home')
@section('title','Dashboard')
@section('content')
@section('dashboard','active')



<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->

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
                                                        <h6 class="text-muted font-semibold">Total Pesanan</h6>
                                                        <h6 class="font-extrabold mb-0">{{ $jmlh_order }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon blue">
                                                            <i class="iconly-boldBookmark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Total Kategori</h6>
                                                        <h6 class="font-extrabold mb-0">{{ $jmlh_kat }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon green">
                                                            <i class="iconly-boldBookmark"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Total Menu</h6>
                                                        <h6 class="font-extrabold mb-0">{{ $jmlh_menu }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon red">
                                                            <i class="iconly-boldAdd-User"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Total Admin</h6>
                                                        <h6 class="font-extrabold mb-0">{{ $jmlh_user }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>


                                <div class="page-content">
                                        <div class="page-heading">
                                            <div class="page-title">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 order-md-1 order-last">
                                                        <h3>Pesanan Masuk</h3>
                                                        <p class="text-subtitle text-muted">Semua Pesanan Yang Masuk</p>
                                                    </div>
                                                </div>


                                            <!-- Tabel -->
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
                                                        <table class="table table-striped" id="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Invoice</th>
                                                                    <th>No Meja</th>
                                                                    <th>Nama</th>
                                                                    <th>Pesanan</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Total</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            @forelse($new_orders as $order)
                                                                <tr>
                                                                    <td>{{ $order->id }}</td>
                                                                    <td>{{ $order->no_meja }}</td>
                                                                    <td>{{ $order->nama_pemesan }}</td>
                                                                    <td><a href="{{ route('orders.show', $order) }}">Lihat Detail</a></td>
                                                                    <td>{{ $order->created_at->format('d F Y') }}</td>
                                                                    <td>Rp 
                                                                        @php
                                                                            $total = 0;
                                                                            foreach($order->menus as $menu){
                                                                                $total += ($menu->pivot->quantity * $menu->harga);
                                                                            }
                                                                        @endphp
                                                                        {{ number_format($total, 0, '.', '.') }}
                                                                    </td>
                                                                    <td>
                                                                        <form action="{{ route('orders.confirm', $order) }}" method="post" class="inline">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                                                                        </form>
                                                                        <form action="{{ route('orders.reject', $order) }}" method="post" class="inline">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                @empty
                                                                <tr>
                                                                    <td colspan="6" style="text-align:center;padding:15px;">No entries found</td>
                                                                </tr>
                                                            @endforelse

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </section>
                                            </div>
                                        </div>
                                </div>

                                
                                <div class="page-content">
                                        <div class="page-heading">
                                            <div class="page-title">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 order-md-1 order-last">
                                                        <h3>Pesanan Sedang Diproses</h3>
                                                        <p class="text-subtitle text-muted">Semua Pesanan Yang Masuk</p>
                                                    </div>
                                                </div>


                                            <!-- Tabel -->
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
                                                                    <th>Invoice</th>
                                                                    <th>No Meja</th>
                                                                    <th>Nama</th>
                                                                    <th>Pesanan</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Total</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            @forelse($confirmed_orders as $order)
                                                                <tr>
                                                                    <td>{{ $order->id }}</td>
                                                                    <td>{{ $order->no_meja }}</td>
                                                                    <td>{{ $order->nama_pemesan }}</td>
                                                                    <td>
                                                                            <a href="{{ route('orders.show', $order) }}">Lihat Detail</a>
                                                                    </td>
                                                                    <td>{{ $order->created_at->format('d F Y') }}</td>
                                                                    <td>Rp 
                                                                        @php
                                                                            $total = 0;
                                                                            foreach($order->menus as $menu){
                                                                                $total += ($menu->pivot->quantity * $menu->harga);
                                                                            }
                                                                        @endphp
                                                                        {{ number_format($total, 0, '.', '.') }}
                                                                    </td>
                                                                    <td >
                                                                        <form action="{{ route('orders.finish', $order) }}" method="post" class="inline-block">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                                                        </form>
                                                                        <form action="{{ route('orders.reject', $order) }}" method="post" class="inline-block">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                @empty
                                                                <tr>
                                                                    <td colspan="6" style="text-align:center;padding:15px;">No entries found</td>
                                                                </tr>
                                                            @endforelse

                                                            </tbody>
                                                        </table>
                                                                            

                                                        <div class="py-5">
                                                            {{ $confirmed_orders->links()  }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            </div>
                                        </div>
                                </div>



</div>
@endsection
