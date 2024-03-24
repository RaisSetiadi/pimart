@extends('layouts.appAdmin')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts </title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="min-height: 100vh;">
    @include('sweetalert::alert')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data-Data Barang Penjualan Pi Mart</h3>

                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('admin.create') }}" class="btn btn-md btn-success mb-3"><i class="bi bi-plus-lg"></i>Tambah Data</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">FOTO DEPAN</th>
                                    <th scope="col">FOTO BELAKANG</th>
                                    <th scope="col">NAMA PRODUK</th>
                                    <th scope="col">HARGA</th>
                                    <th scope="col">STOK</th>
                                    <th scope="col">DESKRIPSI</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/posts/' . $post->image) }}" class="rounded" style="width: 100px">
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/posts/' . $post->foto_depan) }}" class="rounded" style="width: 100px">
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/posts/' . $post->foto_belakang) }}" class="rounded" style="width: 100px">
                                    </td>
                                    <td>{{ $post->nama_produk }}</td>
                                    <td>{{ $post->harga }}</td>
                                    <td>{{ $post->stok }}</td>
                                    <td>{!! $post->deskripsi !!}</td>
                                    <td>
                                        <label class="category">
                                            {{ $post->category }}
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
                                            <a href="{{ route('admin.destroy', $post->id) }}" class="btn btn-danger" data-confirm-delete="true"><i class="bi bi-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Post belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</body>

</html>

@endsection