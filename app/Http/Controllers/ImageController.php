<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index() {
        // get semua gambar di direktori images
        $images = Storage::files('images');

        // konversi path file ke URL publik
        $imageUrls = array_map(function ($image) {
            return Storage::url($image);
        }, $images);

        return view('upload', [
            'data' => $imageUrls
        ]);
    }

    public function store(Request $request) {
        // validasi file yang dikirim user
        $request->validate([
            'image' => 'required|file|mimes:png,jpg,webp|max:2048'
        ]);

        $image = $request->file('image'); // mengambil file
        $randomImageName = $image->hashName(); // mengubah nama file menjadi random
        $image->storeAs('images', $randomImageName); // menyimpan file ke folder storage/app/public/images

        return redirect()->back()->with('success', 'Gambar berhasil diupload');
    }
}
