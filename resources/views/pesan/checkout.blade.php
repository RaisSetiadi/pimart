<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Checkout</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .checkout-title {
            font-size: 2rem;
            color: #333;
            text-align: left;
            margin-bottom: 30px;
        }

        .item-card {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .item-image {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }

        .item-info {
            padding-left: 20px;
        }

        .total-price {
            font-size: 1rem;
            font-weight: bold;
            text-align: end;
            margin-top: 15px;
        }

        .checkout-btn {
            width: auto;
            padding: 8px 20px;
            font-size: 1rem;
            border-radius: 5px;
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
            transition: all 0.3s;
        }

        .checkout-btn:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .delete-btn {
            padding: 5px 10px;
            font-size: 0.8rem;
        }

        .delete-btn-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('components.navigasi')
    <!-- End Navbar -->

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 150px;">
                <h2 class="checkout-title"><i class="bi bi-cart"></i> Checkout</h2>
                @if(!empty($pesanan))
                <p class="text-end">Tanggal Pesan: {{ $pesanan->tanggal }}</p>
                @foreach($pesanan_details as $pesanan_detail)
                <div class="card item-card">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <img src="{{ asset('/storage/posts/' . $pesanan_detail->posts->image) }}" class="rounded item-image">
                        </div>
                        <div class="col-md-6 item-info">
                            <h5 class="card-title">{{ $pesanan_detail->posts->nama_produk }}</h5>
                            <p class="card-text">Harga: Rp.{{ number_format($pesanan_detail->posts->harga) }}</p>
                            <p class="card-text">Jumlah: {{ $pesanan_detail->jumlah }}</p>
                            <p class="card-text">Jumlah Harga: Rp.{{ number_format($pesanan_detail->jumlah_harga) }}</p>
                        </div>
                        <div class="col-md-3">
                            <form action="{{ route('pesan.delete', $pesanan_detail->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm('Apakah Anda Yakin ?');"><i class="bi bi-trash"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="card item-card">
                    <div class="text-center">
                        <p class="total-price">Total Harga: Rp.{{ number_format($pesanan->jumlah_harga) }}</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('pesan.konfirmasi') }}" class="btn btn-success checkout-btn mt-3" onclick="return confirm('Apakah Anda Yakin, Akan Checkout ?');"><i class="bi bi-cart-check"></i> Checkout</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')
    <!-- End Footer -->

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>