<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class ImageController extends Controller
{
    //  Store uploaded images by existing file name and save in storage/app/public folder.

    public function upload(Request $request) {
//        return $request->all();

//        var_dump($request->file('monster_image')->getClientOriginalName());

        if ($request->hasFile('monster_image')) {
//            $imageName = $request->image->getClientOriginalName();
            $imageName = $request->file('monster_image')->getClientOriginalName();
            $request->file('monster_image')->storeAs( 'public/img', $imageName);
        }
//        return redirect('/monsters');
//        dd($request->file('monster_image'));
    }

    // Grab image from storage (edit, resize or whatever else) and show to user.

    public function show(Filesystem $filesystem, $path)
    {

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
            'source_path_prefix' => 'public/img',
            'cache_path_prefix' => 'public/img/.cache',
            'base_url' => 'img',
        ]);

        return $server->getImageResponse($path, request()->all());
    }
}

