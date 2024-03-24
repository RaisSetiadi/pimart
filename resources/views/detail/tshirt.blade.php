<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Keterangan Produk</title>
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
    <!-- content pesan  -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 detail">
                <div class="card">
                    <div class="card-header">
                        <p>{{ $tshirt->nama_produk }}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 detail-produk">
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('/storage/posts/' . $tshirt->image) }}" class="rounded mx-auto d-block " alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('/storage/posts/' . $tshirt->foto_depan) }}" class="rounded mx-auto d-block " alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('/storage/posts/' . $tshirt->foto_belakang) }}" class="rounded mx-auto d-block " alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-6 deskripsi">
                                <h4 style="color: #333; font-weight: bold;">{{ $tshirt->nama_produk }}</h4>
                                <p style="color: #666; font-size: 16px;">Start from</p>
                                <table class="table1">
                                    <tbody>
                                        <tr>
                                            <td style="color: #666;">IDR</td>
                                            <td></td>
                                            <td style="color: #333; font-weight: bold;">{{ $tshirt->harga }}</td>
                                        </tr>
                                        <tr>
                                            <td style="color: #666;">Stok</td>
                                            <td></td>
                                            <td style="color: #333; font-weight: bold;">{{ $tshirt->stok }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <center>
                                    <form action="{{ route('pesan.pesan', $tshirt->id) }}" method="POST">
                                        @csrf
                                        <input type="text" class="form-control" name="jumlah_pesan" required="" placeholder="Jumlah pesanan">
                                        <div class="d-grid gap-2 col-6 mx-auto" style="margin-top:40px;">
                                            <a href="#" class="btn btn-dark" type="button" style="background-color: #553;">Masukkan Keranjang</a>
                                        </div>
                                    </form>
                                </center>
                                <!-- deskripsi -->
                                <div class="col-md-12 keterangan" style="margin-top: 20px;">
                                    <h4 style="color: #333; font-weight: bold;">Authentic. Guaranteed.</h4>
                                    <p style="color: #666; font-size: 16px;">Kami memeriksa secara menyeluruh setiap pembelian yang
                                        Anda lakukan dan menerapkan jaminan perusahaan kami terhadap keabsahan
                                        produk. Garansi berlaku selama 2 hari setelah produk diterima dari jasa
                                        pengiriman.
                                        Jika Anda memiliki kekhawatiran tentang produk yang Anda beli,
                                        silakan hubungi Layanan Pelanggan dan Spesialis kami</p>
                                </div>
                                <!-- end deskripsi -->

                                <!-- deskripsi note -->
                                <div class="col-md-12 note" style="margin-top: 20px;">
                                    <h4 style="color: #333; font-weight: bold;">Note</h4>
                                    <p style="color: #666; font-size: 16px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam possimus ut
                                        doloremque soluta deserunt, commodi iste porro voluptatibus dicta sint
                                        laboriosam repellat distinctio culpa omnis perspiciatis delectus amet! Eum,
                                        pariatur.</p>
                                </div>
                                <!-- end deskripsi note -->
                            </div>
                            <div class="col-md-12 description">
                                <h4>Description</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima aspernatur reiciendis
                                    blanditiis perferendis. Totam, suscipit omnis porro consequuntur nisi in ab
                                    aspernatur.
                                    Voluptatem perspiciatis voluptatum dignissimos non assumenda, architecto
                                    exercitationem?Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minima aspernatur reiciendis blanditiis perferendis. Totam, suscipit omnis porro
                                    consequuntur nisi in ab aspernatur.
                                    Voluptatem perspiciatis voluptatum dignissimos non assumenda, architecto
                                    exercitationem?</p>
                            </div>
                            <hr style="background-color: black; margin-top:20px;">
                            <div class="col-md-12 mt-5">
                                <div id="products" class="container">
                                    <div class="row">
                                        @foreach($baju as $data)
                                        <div class="col-md-2 mb-2 product">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset('/storage/posts/' . $data->image) }}" class="card-img-top" alt="...">
                                                    <h5 class="card-title">{{ $data->nama_produk }}</h5>
                                                    <p class="card-text">{{$data->harga}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- Produk lainnya akan dimuat secara dinamis -->
                                    </div>
                                </div>
                                <div id="viewMoreBtnWrapper" class="text-center">
                                    <button id="viewMoreBtn">&#8595; View More Products</button> <!-- Tanda panah ke bawah -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end content pesan -->
    <!-- footer start -->
    @include('components.footer')
    <!-- end footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        // Data produk tambahan yang akan dimuat
        const additionalProducts = [{
                image: "{{ asset('/storage/posts/' . $data->image) }}",
                title: "{{$data->nama_produk}}",
                description: "{{$data->deskripsi}}"
            },
            {
                image: "{{ asset('/storage/posts/' . $data->image) }}",
                title: "{{$data->nama_produk}}",
                description: "{{$data->deskripsi}}"
            },
            {
                image: "{{ asset('/storage/posts/' . $data->image) }}",
                title: "{{$data->nama_produk}}",
                description: "{{$data->deskripsi}}"
            },
            {
                image: "{{ asset('/storage/posts/' . $data->image) }}",
                title: "{{$data->nama_produk}}",
                description: "{{$data->deskripsi}}"
            },
            {
                image: "{{ asset('/storage/posts/' . $data->image) }}",
                title: "{{$data->nama_produk}}",
                description: "{{$data->deskripsi}}"
            }
        ];

        // Fungsi untuk memuat produk tambahan
        function loadMoreProducts() {
            const productsContainer = document.querySelector("#products .row");
            additionalProducts.forEach(product => {
                const productCard = document.createElement("div");
                productCard.classList.add("col-md-4", "mb-4");
                productCard.innerHTML = `
            <div class="card">
                <img src="${product.image}" class="card-img-top" alt="${product.title} Image" style="width:150px;">
                <div class="card-body">
                    <h5 class="card-title">${product.title}</h5>
                    <p class="card-text">${product.description}</p>
                </div>
            </div>
        `;
                productsContainer.appendChild(productCard);
            });
            document.getElementById("viewMoreBtn").style.display = "none"; // Sembunyikan tanda panah setelah memuat semua produk
        }

        // Event listener untuk tanda panah "View More Products"
        document.getElementById("viewMoreBtn").addEventListener("click", loadMoreProducts);
    </script>

</body>

</html>