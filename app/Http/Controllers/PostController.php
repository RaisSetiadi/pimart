<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index(Request $request): View
    {
        $posts = Post::latest()->paginate(5);
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.index', compact('posts'));
    }
    public function create(): View
    {
        return view('admin.create');
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
            'foto_depan'     => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'foto_belakang'     => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'nama_produk'     => 'required|min:5',
            'harga'   => 'required|min:5',
            'stok'   => 'required|min:2',
            'deskripsi'   => 'required|min:10',
            'category'  => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());
        $foto_depan = $request->file('foto_depan');
        $foto_depan->storeAs('public/posts', $foto_depan->hashName());
        $foto_belakang = $request->file('foto_belakang');
        $foto_belakang->storeAs('public/posts', $foto_belakang->hashName());

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'foto_depan'     => $foto_depan->hashName(),
            'foto_belakang'     => $foto_belakang->hashName(),
            'nama_produk'     => $request->nama_produk,
            'harga'   => $request->harga,
            'stok'   => $request->stok,
            'deskripsi'   => $request->deskripsi,
            'category' => $request->category,

        ]);

        //redirect to index
        return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //delete image
        Storage::delete('public/posts/' . $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('admin.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'foto_depan'     => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'foto_belakang'     => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'nama_produk'     => 'required|min:5',
            'harga'   => 'required|min:5',
            'stok'   => 'required|min:2',
            'deskripsi'   => 'required|min:10'
        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());
            $foto_depan = $request->file('foto_depan');
            $foto_depan->storeAs('public/posts', $foto_depan->hashName());
            $foto_belakang = $request->file('foto_belakang');
            $foto_belakang->storeAs('public/posts', $foto_belakang->hashName());

            //delete old image
            Storage::delete('public/posts/' . $post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'foto_depan' => $foto_depan->hashName(),
                'foto_belakang' => $foto_belakang->hashName(),
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
        } else {

            //update post without image
            $post->update([
                'nama_produk'     => $request->nama_produk,
                'harga'   => $request->harga,
                'stok'   => $request->stok,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function pesanan(Request $request): View
    {
        $pesanan_details = PesananDetail::latest()->paginate(5);
        $pesanan = Pesanan::latest()->paginate(5);
        return view('admin.pesanan', compact('pesanan_details'));
    }
}
