<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Check Out</title>
    <link rel="stylesheet" href="{{asset('css/cekout.css')}}">
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Ringkasan Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <p>Periksa item anda dan pilih pengiriman anda
                                    untuk lebih baik item pesanan pengalaman</p>
                                <img src="{{ asset('/storage/posts/'.$posts->image) }}" alt="" srcset="">
                            </div>
                            <div class="col-md-6">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, autem aspernatur natus eligendi alias harum odio fugiat culpa neque quam at earum odit. Optio, natus. Est iste ullam modi quod!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>