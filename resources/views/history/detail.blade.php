<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Checkout </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- icons boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    @include('components.navigasi')
    <!-- end navbar -->
    <div class="container">
        <div class="row">
            <div class="cold-md-12">
                <div class="card" style="margin-top:150px;">

                    <div class="card-body">
                        <h2>Berhasil Checkout</h2>
                        <h6>Pesanan Anda Berhasil di Checkout Selanjutnya untuk pembayaran Silahkan COD <strong>Kampus {{ $pesanan->pembayaran }} </strong>dengan Nominal : <strong>RP. {{number_format($pesanan->jumlah_harga)}}</strong></h6>
                    </div>
                </div>
                <div class="card" style="margin-top:20px; margin-bottom: 50px;">
                    <div class="card-body">
                        <h3><i class="bi bi-cart"></i>Detail Pemesanan</h3>
                        @if (!empty($pesanan))
                        <p align="right">Tanggal Pesan :{{ $pesanan->tanggal }}</p>
                        <table class="table">
                            <thead>
                                <tr class="table-secondary">
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Jumlah_harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>

                                    <td>{{ $pesanan_detail->posts->nama_produk }}</td>
                                    <td align="left">Rp.{{ number_format($pesanan_detail->posts->harga) }}</td>
                                    <td>{{ $pesanan_detail->jumlah }}</td>
                                    <td align="right">Rp.{{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                                    <td align="right"><strong> Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right"><strong>Pembayaran :</strong></td>
                                    <td align="right"><strong>Cod Kampus {{$pesanan->pembayaran }}</strong></td>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right"><strong>Total Yang Harus Di Bayar :</strong></td>
                                    <td align="right"><strong> Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-top: 150px; margin-bottom: 50px;">

            </div>
        </div>
    </div>

    <!-- footer start -->
    @include('components.footer')
    <!-- end footer  -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>