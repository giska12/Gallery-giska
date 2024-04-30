<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImagGalleryController extends Controller
{

    public function album(){
        $albums = ImageGallery::select('title')->distinct()->where('user_id', auth()->user()->id)->get();
        return view("album.idex", [
            "data" => $albums,
        ]);
    }

    public function index()
    {
        $image = Image::where("user_id", auth()->user()->id)->get();

        return view("album.create", [
            "data" => $image
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            "title" => "required"
        ]);

        $album = ImageGallery::find($id);
        $album->update($request->all());

        if ($album) {
            return redirect()->back()->with("success", "Berhasil mengubah album");
        }

        return redirect()->back()->with("error", "Gagal mengubah album");
    }

    public function delete($id)
    {
        $album = ImageGallery::find($id)->delete();

        if ($album) {
            return redirect()->back()->with("success", "Berhasil menghapus album");
        }

        return redirect()->back()->with("error", "Gagal menghapus album");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {
            foreach ($request->images as $data) {
                ImageGallery::create([
                    "user_id" => Auth::user()->id,
                    "title" => $request->title,
                    "image_id" => $data
                ]);
            }
            return redirect()->back()->with('success', 'Album created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create album. Please try again.');
        }
    }


    public function show($title) {
        $album = ImageGallery::with("images")->where("title", $title)->get();
        return view("album.show", [
            "data" => $album,
        ]);
    }

    public function deleteAlbum ($title) {
        $albums = ImageGallery::where("title",$title)->get();
        foreach ($albums as $album) {
            $album->delete();
        }

        if ($album) {
            return redirect()->back()->with("success", "Berhasil menghapus album");
        }

        return redirect()->back()->with("error", "Gagal menghapus album");
    }


}
