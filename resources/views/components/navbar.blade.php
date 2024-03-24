<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
    <div class="container-fluid">
        <a href="/home"><img src="{{ asset('image/logoPi.jpeg') }}" alt="" srcset="" style="height:100px; margin-left:20px;"></a>
        <!-- <a class="navbar-brand" href="/home">Panda SHOP</a> -->
        <center>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user.sneakers')}}">Sepatu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user.pakaian')}}">Pakaian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user.elektronik')}}">Barang Second</a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link active" aria-current="page" href="{{route('user.makanan')}}">Makanan</a>
                    </li>
                    <?php

                    use Illuminate\Support\Facades\Auth;
                    use App\Models\Pesanan;

                    $userId = Auth::id();
                    $jumlahPesanan = Pesanan::where('user_id', $userId)->count();
                    ?>


                    <!-- end search -->

                    <ul class="navbar-nav ms-auto">
                        @auth
                        <li class="nav-item dropdown" style="margin-right: 200px; height:50px; width:20px; margin-bottom:40px;">
                            <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="fw-bold ps-1" style="text-transform: uppercase">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/home"><i class="bi bi-layout-text-sidebar-reverse"></i>Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{route('profile.index')}}"><i class="bi bi-person"></i>Profile</a></li>
                                <li class="nav-item">

                                    <a href="{{route('pesan.checkout')}}"><i class="bi bi-cart-plus" style="font-size: 20px; margin-top: 100px; margin-left:30px;"></i></a>
                                    <span class="badge bg-secondary">{{$jumlahPesanan}}</span></h1></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i>Logout</button>
                                </form>
                            </ul>
                        </li>

                        @endauth
                    </ul>
                </ul>
        </center>

    </div>
    </div>
</nav>