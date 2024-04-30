<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Like;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        $image = Image::all();

        $likeCounts = [];
        foreach($image as $img) {
            $likeCounts[$img->id] = Like::where('image_id', $img->id)->count();
        }

        return view("guest", [
            "data" => $image,
            "likeCounts" => $likeCounts
        ]);
    }
}
