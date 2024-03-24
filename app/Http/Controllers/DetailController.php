<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function sneakers($id)
    {
        $sneaker = Post::where('id', $id)->first();
        $sepatu = Post::Where('category', 'like', 'Sneakers')->latest()->paginate(10);
        return view('detail.sneakers', compact('sneaker', 'sepatu'));
    }
    public function tshirt($id)
    {
        $tshirt = Post::where('id', $id)->first();
        $baju = Post::Where('category', 'like', 'Tshirt')->latest()->paginate(10);
        return view('detail.tshirt', compact('tshirt', 'baju'));
    }
    public function makanan($id)
    {
        $makanans = Post::where('id', $id)->first();
        return view('detail.makanan', compact('makanans'));
    }
    public function minuman($id)
    {
        $minuman = Post::where('id', $id)->first();
        return view('detail.minuman', compact('minuman'));
    }
    public function pants($id)
    {
        $pants = Post::where('id', $id)->first();
        $celana = Post::Where('category', 'like', 'Pants')->latest()->paginate(10);
        return view('detail.pants', compact('pants', 'celana'));
    }
    public function kacamata($id)
    {
        $kacamata = Post::where('id', $id)->first();
        $kacamataa = Post::Where('category', 'like', 'Kacamata')->latest()->paginate(10);
        return view('detail.kacamata', compact('kacamata', 'kacamataa'));
    }
    public function topi($id)
    {
        $topis = Post::where('id', $id)->first();
        $topi = Post::Where('category', 'like', 'Topi')->latest()->paginate(10);
        return view('detail.topi', compact('topis', 'topi'));
    }
    public function elektronik($id)
    {
        $elektronik = Post::where('id', $id)->first();
        return view('detail.elektronik', compact('elektronik'));
    }
    public function olahraga($id)
    {
        $olahraga = Post::where('id', $id)->first();
        return view('detail.olahraga', compact('olahraga'));
    }
    public function otomotif($id)
    {
        $otomotif = Post::where('id', $id)->first();
        return view('detail.otomotif', compact('otomotif'));
    }
}
