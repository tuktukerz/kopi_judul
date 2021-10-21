@extends('layouts.user', ['jmlh_carts' => $jmlh_carts])
@section('title','Keranjang')
@section('content')
    <h1 class="text-center font-weight-bold my-3 mt-5">Your Order</h1>
        <div class="text-center">
            @if($errors->any())
                {!! implode('', $errors->all('<div class="text-danger mb-3 font-weight-bold">:message</div>')) !!}
            @endif
        </div>
    <table class="table font-weight-bold">
  <thead>
    <tr>
      <th scope="col">Pesanan</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Request</th>
      <th  scope="col">Harga</th>
      <th  scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
      @forelse ($carts as $index =>  $cart)
        <tr>
            <td>{{ $cart->menu->judul }}</td>
            <td>{{ $cart->quantity }}</td>
            <td>{{ $cart->request }}</td>
            <td>Rp {{ number_format($cart->menu->harga * $cart->quantity) }}</td>
            <td>
                <form action="{{ route('carts.delete', $index) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm font-weight-bold">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center py-3 font-weight-bold">Belum ada menu yang dipilih</td>
        </tr>
      @endforelse
  </tbody>
</table>

    <form action="{{ route('orders.store') }}" method="post" class="mt-5 text-center">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input name="nama_pemesan" type="text" class="form-control font-weight-bold" placeholder="Nama Pemesan" aria-label="nama_pemesan" aria-describedby="basic-addon1">
                    </div>
                </div>
                    <div class="col-md-6">
                        <input name="no_meja" type="number" class="form-control font-weight-bold" placeholder="No Meja" aria-label="no_meja" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark font-weight-bold mt-3">Buat Pesanan</button>
    </form>
@endsection
