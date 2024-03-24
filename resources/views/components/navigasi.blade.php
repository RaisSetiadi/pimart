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

                    <form action="" method="GET">
                        <div class="container-input">
                            <input type="text" placeholder="Search" name="cari" class="input" value="{{ old('cari') }}">
                            <span class="icon">
                                <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </span>
                            <button class="btn btn-primary" value="search" type="submit">
                                <!-- <i class="fas fa-search fa-sm"></i> -->
                            </button>

                        </div>
                    </form>

                    <!-- end search -->
                    <?php

                    use Illuminate\Support\Facades\Auth;

                    $pesanan_utama = App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

                    if (!empty($pesanan_utama)) {
                        $notif = App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                    }

                    ?>
                    <ul class="navbar-nav ms-auto">
                        @auth
                        <li class="nav-item dropdown" style="margin-right: 200px; height:50px; width:20px; margin-bottom:40px;">
                            <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="fw-bold ps-1" style="text-transform: uppercase">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/home"><i class="bi bi-layout-text-sidebar-reverse"></i>Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{route('history.index')}}"><i class="bi bi-person"></i>Riwayat</a></li>
                                <li><a class="dropdown-item" href="{{route('profile.index')}}"><i class="bi bi-person"></i>Profile</a></li>
                                <li class="nav-item">

                                    <a href="{{route('pesan.checkout')}}"><i class="bi bi-cart-plus" style="font-size: 20px; margin-top: 100px; margin-left:30px;"></i></a>
                                    @if(!empty($notif))
                                    <span class="badge bg-secondary">{{$notif}}</span></h1></a>
                                    @endif
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