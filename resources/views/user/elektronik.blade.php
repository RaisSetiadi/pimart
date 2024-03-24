<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Bekas</title>
    <link rel="website icon" type="png" href="{{ asset('image/logoPi.jpeg') }} ">
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
    <!-- carousel -->
    @include('components.carousel')
    <!-- end carousel -->

    <!-- card hot product apparel -->
    <div class="container mt-5" style="background-color:#2FA860;">
        <div class="row justify-content-center">
            <div class="col-md-12 judul-diskon">
                <h2>Hot Product</h2>
            </div>
            @foreach ($elektroniks as $data)
            <div class="col-md-3 mb-5 hot-product">
                <div class="card">
                    <a href="#"> <img src="{{ asset('/storage/posts/' . $data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama_produk }}</h5>
                        <p class="card-text">IDR {{ $data->harga }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- end card -->


    <!-- content kacamata -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 judul-elektronik">
                <h2>Elektronik</h2>
            </div>
            @foreach ($elektroniks as $data)
            <div class="col-md-3 mt-5 mb-3 elektronik">
                <div class="card">
                    <a href="{{route('detail.elektronik',$data->id)}}">
                        <img src="{{ asset('/storage/posts/' . $data->image) }}" class="card-img-top" alt="..."></a>
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

    <!-- carousel apparel -->
    @include('components.carousel')
    <!-- end carousel -->


    <!-- content olahraga -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 judul-olahraga">
                <h2>Olahraga</h2>
            </div>
            @foreach ($olahragas as $data)
            <div class="col-md-3 olahraga">
                <div class="card">
                    <a href="{{ route('detail.olahraga',$data->id)}} }}" class="card-img-top" alt="..."> <img src="{{ asset('/storage/posts/' . $data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama_produk }}</h5>
                        <p class="card-text">IDR {{ $data->harga }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end content olahraga -->

    <!-- content otomotif -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 judul-otomotif">
                <h2>Otomotif</h2>
            </div>
            @foreach ($otomotif as $data)
            <div class="col-md-3 otomotif">
                <div class="card">
                    <a href="{{route('detail.otomotif',$data->id) }}" class="card-img-top" alt="..."> <img src="{{ asset('/storage/posts/' . $data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->nama_produk }}</h5>
                        <p class="card-text">IDR {{ $data->harga }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end content otomotif -->


    <!-- footer start -->
    @include('components.footer')
    <!-- end footer  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>