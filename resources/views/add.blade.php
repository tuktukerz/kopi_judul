@extends('layouts.user', ['jmlh_carts' => $jmlh_carts])
@section('title','Tambah Menu')
@push('top')
<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
@endpush
@section('content')
    <div class="text-center mt-5">
        @if($errors->any())
            {!! implode('', $errors->all('<div class="text-danger mb-3 font-weight-bold">:message</div>')) !!}
        @endif
        <form action="{{ route('carts.store', $menu) }}" method="post">
            @csrf
                <img src="{{ asset($menu->picture) }}" alt="" class="img-fluid my-3 rounded" width="300px">
            <div style="width:400px;margin:auto" class="mt-4">
                <div class="input-group mb-4">
                    <input name="request" type="text" class="form-control font-weight-bold " placeholder="Request" aria-label="request">
                </div>
            </div>
            <h4 class="mb-2 font-weight-bold">{{$menu->judul}}</h4>
            <h4 class="mb-5 font-weight-bold">Rp {{number_format($menu->harga, 0, '.', '.')}}</h4>
            <p class="font-weight-bold"> {{ $menu->keterangan }}</p>
            <div style="width:200px;margin:auto" class="my-5 d-flex">
                    <button id="kurang" class="btn btn-danger" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <input min="1" name="quantity" type="number" id="jumlah" class="form-control text-center font-weight-bold" placeholder="Jumlah" aria-label="quantity">
                    <button id="tambah" class="btn btn-success"  type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
            </div>
            <button type="submit" class="btn btn-dark font-weight-bold block">Add To Cart</button>
        </form>
    </div>
@endsection

@push('bottom')
<script>
    const form = document.querySelector('#jumlah');
    const kurang = document.querySelector('#kurang');
    const tambah = document.querySelector('#tambah');

    console.log([form, kurang, tambah])

    kurang.addEventListener('click', e => {
        if(form.value > 1){
            form.value -= 1;
        }
    });
        tambah.addEventListener('click', e => {
            form.value = +form.value + 1;
        });
</script>
@endpush