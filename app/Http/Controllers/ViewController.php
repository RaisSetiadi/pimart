<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(Request $request): View
    {
        $posts = Post::latest()->paginate(9);
        $carousels = Carousel::all();
        return view('user.index', compact('posts', 'topis', 'carousels'));
    }

    public function sneakers(Request $request): View
    {
        $sneaker = Post::Where('category', 'like', 'Sneakers')->latest()->paginate(4);
        $sneakers = Post::Where('category', 'like', 'Sneakers')->latest()->paginate(10);
        $carousels = Carousel::all();

        return view('user.sneakers', compact('sneaker', 'sneakers', 'carousels'));
    }

    public function makanan(Request $request): View
    {
        $makanan = Post::Where('category', 'like', 'Makanan')->latest()->paginate(4);
        $minuman = Post::Where('category', 'like', 'Minuman')->latest()->paginate(9);
        $makanans = Post::Where('category', 'like', 'Makanan')->latest()->paginate(9);
        $carousels = Carousel::all();

        return view('user.makanan', compact('makanan', 'minuman', 'makanans', 'carousels'));
    }

    public function minuman(Request $request): View
    {
        $posts = Post::Where('category', 'like', 'Minuman')->latest()->paginate(9);
        $carousels = Carousel::all();

        return view('user.minuman', compact('posts', 'carousels'));
    }

    public function pakaian(Request $request): View
    {
        $posts = Post::Where('category', 'like', 'Pakaian')->latest()->paginate(9);
        $pants = Post::Where('category', 'like', 'Pants')->latest()->paginate(9);
        $kacamata = Post::Where('category', 'like', 'Kacamata')->latest()->paginate(9);
        $topis = Post::Where('category', 'like', 'Topi')->latest()->paginate(9);
        $tshirt = Post::Where('category', 'like', 'Tshirt')->latest()->paginate(9);
        $carousels = Carousel::all();

        return view('user.pakaian', compact('posts', 'pants', 'topis', 'kacamata', 'tshirt', 'carousels'));
    }
    public function pants(Request $request): View
    {
        $posts = Post::Where('category', 'like', 'Pants')->latest()->paginate(9);
        $carousels = Carousel::all();

        return view('user.pants', compact('posts', 'carousels'));
    }
    public function tshirt(Request $request): View
    {
        $posts = Post::Where('category', 'like', 'Tshirt')->latest()->paginate(9);
        $carousels = Carousel::all();

        return view('user.tshirt', compact('posts', 'carousels'));
    }
    public function kacamata(Request $request): View
    {
        $posts = Post::Where('category', 'like', 'Kacamata')->latest()->paginate(9);
        $carousels = Carousel::all();

        return view('user.kacamata', compact('posts', 'carousels'));
    }
    public function topi(Request $request): View
    {
        $topis = Post::Where('category', 'like', 'Topi')->latest()->paginate(9);
        $carousels = Carousel::all();

        return view('user.topi', compact('topis', 'carousels'));
    }
    public function elektronik(Request $request): View
    {
        $elektroniks = Post::Where('category', 'like', 'Elektronik')->latest()->paginate(9);
        $olahragas = Post::Where('category', 'like', 'Olahraga')->latest()->paginate(9);
        $otomotif = Post::Where('category', 'like', 'Otomotif')->latest()->paginate(9);
        $carousels = Carousel::all();

        return view('user.elektronik', compact('elektroniks', 'olahragas', 'otomotif', 'carousels'));
    }
    public function olahraga(Request $request): View
    {
        $posts = Post::Where('category', 'like', 'Olahraga')->latest()->paginate(9);
        $carousels = Carousel::all();

        return view('user.olahraga', compact('posts', 'carousels'));
    }
    public function otomotif(Request $request): View
    {
        $posts = Post::Where('category', 'like', 'Otomotif')->latest()->paginate(9);
        $carousels = Carousel::all();

        return view('user.otomotif', compact('posts', 'carousels'));
    }

    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('users.show', compact('post'));
    }
}
