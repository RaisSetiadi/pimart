<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profile User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-title {
            font-size: 2rem;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-card {
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .profile-icon {
            font-size: 2rem;
            color: #007bff;
            margin-bottom: 20px;
        }

        .profile-form label {
            font-weight: bold;
            color: #333;
        }

        .profile-form .form-control {
            border-radius: 5px;
            border-color: #ccc;
        }

        .profile-form .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .btn-save {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            width: 100%;
            transition: all 0.3s;
        }

        .btn-save:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('components.navigasi')
    <!-- End Navbar -->

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto" style="margin-top: 150px;">
                <h2 class="profile-title"><i class="bi bi-person profile-icon"></i> Profile User</h2>
                <div class="card profile-card">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td width="10">:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td width="10">:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td width="10">:</td>
                                    <td>{{ $user->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>No hp</td>
                                    <td width="10">:</td>
                                    <td>{{ $user->nohp }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto" style="margin-top: 150px;">
                <div class="card profile-card">
                    <div class="card-body">
                        <h4><i class="bi bi-pencil"></i>Edit</h4>
                        <form method="POST" action="{{ route('profile.update') }}" class="profile-form">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required placeholder="Masukkan Email">
                            </div>
                            <div class="mb-3">
                                <label for="nohp" class="form-label">Nomor Handphone</label>
                                <input id="nohp" type="text" class="form-control" name="nohp" value="{{ $user->nohp }}" required placeholder="Masukkan Nomor HP">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea id="alamat" class="form-control" name="alamat" required placeholder="Masukkan Alamat">{{ $user->alamat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan Password">
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Ulang Password">
                            </div>
                            <button type="submit" class="btn btn-danger btn-save">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
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