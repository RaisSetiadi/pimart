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
            <div class="card" style="margin-top: 150px; margin-bottom: 50px;">
                <div class="card-body">
                    <h3><i class="bi bi-cart"></i>Riwayat Pemesanan</h3>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 50px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($pesanans as $pesanan)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$pesanan->tanggal}}</td>
                            <td>
                                @if($pesanan->status == 1)
                                Sudah Pesan & Belum Di Bayar
                                @else
                                Sudah Di bayar
                                @endif
                            </td>
                            <td>RP. {{number_format($pesanan->jumlah_harga)}}</td>
                            <td>
                                <a href="{{route('history.detail',$pesanan->id)}}" class="btn btn-primary">
                                    <i class="fa fa-info"></i>Detail</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

    <!-- footer start -->
    @include('components.footer')
    <!-- end footer  -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>