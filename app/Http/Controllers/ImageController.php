<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ImageController extends Controller
{

    public function index() {
        $image = Image::where("user_id", auth()->user()->id)->get();

        $likeCounts = [];
        foreach($image as $img) {
            $likeCounts[$img->id] = Like::where('image_id', $img->id)->count();
        }

        return view("welcome", [
            "data" => $image,
            "likeCounts" => $likeCounts
        ]);
    }
    public function tambahGambar(Request $request){
        return view("image.create");
    }

    public function edit($id)
{
    $image = Image::findOrFail($id);
    return view("image.edit", compact('image'));
}

    public function create(Request $request) {
        $request->validate([
            "title" => "required",
            "decription" => "string"
        ]);

        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => Auth::user()->id,
        ];


        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = str::slug($request->title) . '-' . time() . '.' . $extension;
            $request->file('image')->storeAs('images', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $membuatImage = Image::create($data);

        if ($membuatImage) {
            return redirect()->back()->with("success", "Berhasil membuat image");
        }

        return redirect()->back()->with("error", "Gagal membuat image");

    }


    public function update($id, Request $request) {
        $request->validate([
            "title" => "required",
            "description" => "string"
        ]);

        $image = Image::find($id);

        $image->title = $request->title;
        $image->description = $request->description;

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = Str::slug($request->title) . '-' . time() . '.' . $extension;
            $request->file('image')->storeAs('images', $imageName, 'public');
            $image->image = $imageName;
        }

        $image->save();

        return redirect()->back()->with('success', 'Image berhasil diupdate.');
    }



    public function delete($id) {
        $image = Image::find($id);

        if ($image) {
            $image->delete();
            return redirect()->back();
        }

        return redirect()->back()->with("error", "Gagal delete image");
    }

    public function like($id)
    {
        $image = Image::find($id);
        $user_id = auth()->id();

        $existingLike = Like::where('user_id', $user_id)->where('image_id', $image->id)->first();

        if ($existingLike) {
            $existingLike->delete();
        }else{
            $likes = new Like([
                'user_id' => $user_id,
                'image_id' => $image->id,
                'user' => Auth::user()->name,
            ]);

            $likes->save();
        }

        return redirect()->back();
    }

}
