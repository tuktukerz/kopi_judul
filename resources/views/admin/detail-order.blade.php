@extends('template_backend.home')
@section('title','Detail Order')
@section('content')
                        <div class="page-content">
                                <div class="page-heading">
                                    <div class="page-title">
                                        <div class="row">
                                            <div class="col-12 col-md-6 order-md-1 order-last">
                                                <h3>Detail Order #{{ $order->id }} / ({{ $order->nama_pemesan }})</h3>
                                                <p class="text-subtitle text-muted">Semua detail dari order seperti menu dan request.</p>
                                            </div>
                                        </div>


                                    <!-- Tabel -->
                                    <section class="section">
                                         <div class="card">
                                            <div class="card-body">
                                                <table class="table table-striped" id="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Jumlah</th>
                                                            <th>Harga</th>
                                                            <th>Request</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($order->menus as $menu)
                                                        <tr>
                                                            <td>{{ $menu->judul }}</td>
                                                            <td>{{ $menu->pivot->quantity }}</td>
                                                            <td>Rp {{ number_format($menu->harga, 0, '.', '.') }}</td>
                                                            <td>{{$menu->pivot->request }}</td>
                                                            <td>Rp {{ number_format($menu->pivot->quantity * $menu->harga, 0, '.', '.') }}</td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </section>
                                    </div>
                                </div>
                        </div>

@endsection
