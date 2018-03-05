<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use App\Monster;

class MonsterController extends Controller
{
    //  Store uploaded images by existing file name and save in storage/app/public folder.

    public function index()
    {
        $monsters = Monster::all()->sortBy('id');
//        return view('master', ['monster' => $monsters]);
        return $monsters;
    }

    public function show(Monster $id)
    {
        return view('master', ['monster' => $id]);
    }

    public function create()
    {
//        return view('master');
    }

    public function store(Request $request)
    {
//        dd($request);
        echo 'function store in use' ;
//        var_dump($request);

        var_dump(request('name'));
        var_dump(request('description'));
        var_dump(request('aggression_level'));
//        var_dump($request);
//        var_dump(request('monster_image'));

//        $this->validate(request(), [
//
//            'name' => 'required',
//            'description' => 'required',
//            'aggression_level' => 'required',
//            'monster_image' => 'required',

//            ]);

        $exploded = explode(',', request('monster_image'));
        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0], 'jpeg'))
            $extension = 'jpeg';
        else $extension = 'png';


        $filename = request('name').'.'.$extension;
        $monster_image_name = str_replace(' ', '_', $filename);
        $path = storage_path('app/public/img').'/'.$monster_image_name;

        file_put_contents($path, $decoded);

        Monster::forceCreate([

            'name' => request('name'),
            'description' => request('description'),
            'aggression_level' => request('aggression_level'),
            'monster_image_name' => $monster_image_name

        ]);

        return ['message' => 'Yep Monster Actually Created'];
    }
}

