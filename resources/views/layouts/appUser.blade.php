<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama </title>
    <link rel="website icon" type="png" href="{{asset('image/logoPi.jpeg')}} ">
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><b>STONE ISLAND</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 deskripsi">
                                <p>Stone Island jackets are highly acclaimed fashion products coveted by enthusiasts of high-quality apparel. Renowned for their innovative design, durable materials, and distinctive aesthetic, these jackets have become symbols of style and status in the fashion world.</p>
                                <div class="parent">
                                    <button class="button">View More</button>
                                </div>
                            </div>
                            <div class="col-md-3 image">
                                <img src="{{asset('image/st.jpeg')}}" alt="" srcset="">
                            </div>
                            <div class="col-md-3 deskripsi">
                                <p>Stone Island jackets are highly acclaimed fashion products coveted by enthusiasts of high-quality apparel. Renowned for their innovative design, durable materials, and distinctive aesthetic, these jackets have become symbols of style and status in the fashion world.</p>
                                <div class="parents">
                                    <button class="button">View More</button>
                                </div>
                            </div>
                            <div class="col-md-3 image">
                                <img src="{{asset('image/st.jpeg')}}" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- card produk -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3 judul-sneakers">
                <a href="{{route('user.sneakers')}}" style="text-decoration:none; color:black;">
                    <h5>Sneakers</h5>
                </a>

            </div>
            @foreach($sneakers as $data)
            <div class="col-md-3 mt-3 mb-3 sneakers">
                <div class="card">
                    <img src="{{ asset('/storage/posts/'.$data->image) }}" alt="">
                    <a href="#"><button type="button" class="button">Obral</button></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$data->nama_produk}}</h5>
                        <p class="card-text">RP {{$data->harga}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- end card produk sneaker-->

    <!-- card Makanan dan Minuman -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3 judul-makanan">
                <a href="{{route('user.makanan')}}" style="text-decoration: none; color:black;">
                    <h5>Makanan Dan Minuman</h5>
                </a>

            </div>
            @foreach($makanan as $data)
            <div class="col-md-3 mt-3 mb-3 makanan">
                <div class="card">
                    <a href="#"><img src="{{ asset('/storage/posts/'.$data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$data->nama_produk}}</h5></a>
                        <p class="card-text">RP {{$data->harga}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($minuman as $data)
            <div class="col-md-3 mt-3 mb-3 minuman">
                <div class="card">
                    <a href="#"><img src="{{ asset('/storage/posts/'.$data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$data->nama_produk}}</h5></a>
                        <p class="card-text">RP {{$data->harga}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- end card makanan dan minuman -->

    <!-- card pakaian -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3 judul-sneakers">
                <a href="{{route('user.pakaian')}}" style="text-decoration: none; color:black;">
                    <h5>Pakaian</h5>
                </a>

            </div>
            @foreach($pants as $post)
            <div class="col-md-3 mt-3 mb-3 pakaian">
                <div class="card">
                    <a href="#"><img src="{{ asset('/storage/posts/'.$post->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->nama_produk}}</h5></a>
                        <p class="card-text">RP {{$post->harga}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end card pakaian -->

    <!-- card barang bekas -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3 judul-barangbekas">
                <a href="{{route('user.elektronik')}}" style="text-decoration: none; color:black;">
                    <h5>Barang Bekas</h5>
                </a>

            </div>
            @foreach($elektronik as $data)
            <div class="col-md-3 mt-3 mb-3 barangbekas">
                <div class="card">
                    <a href="#"><img src="{{ asset('/storage/posts/'.$data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$data->nama_produk}}</h5></a>
                        <p class="card-text">RP {{$data->harga}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end card barang bekas -->


    <!-- footer start -->
    @include('components.footer')
    <!-- end footer  -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>