<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    //
    public function index(): View
    {
        $carousels = Carousel::latest()->paginate(5);
        return view('carousel.index', compact('carousels'));
    }
    public function create(): View
    {
        return view('carousel.create');
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
            'title'     => 'required|min:5',
            'deskripsi'   => 'required|min:5'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/carousel', $image->hashName());

        //create post
        Carousel::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'deskripsi'   => $request->deskripsi
        ]);

        //redirect to index
        return redirect()->route('carousel.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get post by ID
        $carousel = Carousel::findOrFail($id);

        //render view with post
        return view('carousel.edit', compact('carousel'));
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
            'image'     => 'image|mimes:jpeg,jpg,png,webp|max:2048',
            'title'     => 'required|min:5',
            'deskripsi'   => 'required|min:5'
        ]);

        //get post by ID
        $carousel = Carousel::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/carousel', $image->hashName());

            //delete old image
            Storage::delete('public/carousel/' . $carousel->image);

            //update post with new image
            $carousel->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'deskripsi'   => $request->deskripsi
            ]);
        } else {

            //update post without image
            $carousel->update([
                'title'     => $request->title,
                'deskripsi'   => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('carousel.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
