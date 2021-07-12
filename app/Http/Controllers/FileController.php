<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    function getFile($filename)
    {
        $file = Storage::disk('public')->get($filename);

        return (new Response($file, 200))
            ->header('Content-Type', 'image/jpeg');

        $files = Storage::files("public");
        $images = array();
        foreach ($files as $key => $value) {
            $value = str_replace("public/", "", $value);
            array_push($images, $value);
        }
        return view('show', ['images' => $images]);
    }
}
