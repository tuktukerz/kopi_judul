@extends('template_backend.home')
@section('title','Laporan')
@section('content')
@section('lprn','active')

                        <div class="page-content">
                                <div class="page-heading">
                                    <div class="page-title">
                                        <div class="row">
                                            <div class="col-12 col-md-6 order-md-1 order-last">
                                                <h3>Pesanan Selesai</h3>
                                                <p class="text-subtitle text-muted">Semua Pesanan Yang Selesai</p>
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
                                                            <th>Id</th>
                                                            <th>Nama</th>
                                                            <th>Pesanan</th>
                                                            <th>Tanggal</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->id }}</td>
                                                            <td>{{ $order->nama_pemesan }}</td>
                                                            <td><a href="{{ route('orders.show', $order) }}">Lihat Pesanan</a></td>
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

@endsection
