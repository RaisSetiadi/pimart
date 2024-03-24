<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pakaian </title>
    <link rel="website icon" type="png" href="{{ asset('image/logoPi.jpeg') }} ">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="website icon" type="png" href="{{ asset('image/pi.png') }} ">
    <!-- icons boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    @include('components.navigasi')

    <!-- end navbar -->
    <!-- carousel -->
    @include('components.carousel')

    <!-- end carousel -->

    <!-- card hot product apparel -->
    <div class="container" style="background-color:#2FA860;">
        <div class="row justify-content-center">
            <div class="col-md-12 judul-diskon">
                <h2>Hot Product</h2>
            </div>
            @foreach ($posts as $post)
            <div class="col-md-3 mb-5 hot-product">
                <div class="card">
                    <a href="#"> <img src="{{ asset('/storage/posts/' . $post->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->nama_produk }}</h5></a>
                        <p class="card-text">IDR {{ $post->harga }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end card -->


    <!-- content t-shirt -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 judul-tshirt">
                <h2>T-Shirt</h2>
            </div>
            @foreach ($tshirt as $data)
            <div class="col-md-3 mt-5 Tshirt">
                <div class="card">
                    <a href="{{ route('detail.tshirt', $data->id) }}"> <img src="{{ asset('/storage/posts/' . $data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama_produk }}</h5>
                        <p class="card-text">IDR {{ $data->harga }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end content t-shirt -->

    <!-- content pants -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 judul-celana">
                <h2>Pants</h2>
            </div>
            @foreach ($pants as $data)
            <div class="col-md-3 mt-5 celana">
                <div class="card">
                    <a href="{{ route('detail.pants', $data->id) }} "> <img src="{{ asset('/storage/posts/' . $data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama_produk }}</h5>
                        <p class="card-text">IDR {{ $data->harga }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end content pants -->

    <!-- carousel apparel -->
    @include('components.carousel')
    <!-- end carousel -->

    <!-- card content kacamata -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 judul-kacamata">
                <h2>Kacamata</h2>
            </div>
            @foreach ($kacamata as $data)
            <div class="col-md-3 mt-5 kacamata">
                <div class="card">
                    <a href="{{route('detail.kacamata',$data->id)}}"> <img src="{{ asset('/storage/posts/' . $data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama_produk }}</h5>
                        <p class="card-text">IDR {{ $data->harga }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end content kacamata -->

    <!-- card content kacamata -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 judul-topi">
                <h2>Topi</h2>
            </div>
            @foreach ($topis as $data)
            <div class="col-md-3 mt-5 topi">
                <div class="card">
                    <a href="{{ route('detail.topi',$data->id) }}" class="card-img-top" alt="..."><img src="{{ asset('/storage/posts/' . $data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama_produk }}</h5>
                        <p class="card-text">IDR {{ $data->harga }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end content kacamata -->



    <!-- footer start -->
    @include('components.footer')
    <!-- end footer  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>