<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $posts = Post::latest()->paginate(4);
        $sneakers = Post::Where('category', 'like', 'Sneakers')->latest()->paginate(9);
        $pants = Post::Where('category', 'like', 'Pants')->latest()->paginate(9);
        $elektronik = Post::Where('category', 'like', 'Elektronik')->latest()->paginate(9);
        $makanan = Post::Where('category', 'like', 'Makanan')->latest()->paginate(4);
        $minuman = Post::Where('category', 'like', 'Minuman')->latest()->paginate(9);
        $carousels = Carousel::all();
        return view('home', compact('posts', 'sneakers', 'pants', 'elektronik', 'makanan', 'minuman', 'carousels'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('adminHome');
    }

    /**
     * Show the application dashboard.

     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cari(Request $request)
    {
        $keyword = $request->input('cari');

        // mengambil data dari table pegawai sesuai pencarian data
        $sneaker = Post::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);
        $makanan = Post::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);
        $posts = Post::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);
        $minuman = Post::where('nama_produk', 'like', "%" . $keyword . "%")->paginate(10);


        // mengirim data pegawai ke view index
        return view('layouts.appUser', compact('sneaker', 'makanan', 'posts', 'minuman'));
    }
}
