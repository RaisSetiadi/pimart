<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PembayaranController extends Controller
{
    //
    public function index(): View
    {
        $pembayaran = Pembayaran::latest()->paginate(5);
        return view('pembayaran.index', compact('pembayaran'));
    }
    public function create(): View
    {
        return view('pembayaran.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'tempat'     => 'required|min:5'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/carousel', $image->hashName());

        //create post
        Pembayaran::create([
            'image'     => $image->hashName(),
            'tempat'     => $request->tempat

        ]);

        //redirect to index
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
