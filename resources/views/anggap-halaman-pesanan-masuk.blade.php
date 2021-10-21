<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pesanan Baru / Daftar Pesanan</h1>

    <table>
        <thead>
            <tr>
                <th style="text-align:left;padding:5px 20px;">Nama Pemesan</th>
                <th style="text-align:left;padding:5px 20px;">Menu</th>
                <th style="text-align:left;padding:5px 20px;">Total</th>
            </tr>
        </thead>
        <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td style="text-align:left;padding:5px 20px;">{{ $order->nama_pemesan }}</td>
                        <td style="text-align:left;padding:5px 20px;">
                            @foreach($order->menus as $menu)
                                {{$menu->judul . "(" . $menu->harga . " * " . $menu->pivot->quantity . " = " . ($menu->harga * $menu->pivot->quantity) . ")" . ", "}}
                            @endforeach
                        </td >
                        <td style="text-align:left;padding:5px 20px;">Rp
                            @php
                                $total = 0;
                                foreach($order->menus as $menu){
                                    $total += ($menu->harga * $menu->pivot->quantity);
                                }
                            @endphp
                            {{ number_format($total, 0, '.', '.') }}
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</body>
</html>