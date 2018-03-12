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

        $monsters = Monster::latest('created_at')->get();
//        return view('master', ['monster' => $monsters]);
        var_dump($monsters);
        return $monsters;
    }

    public function show(Monster $id)
    {
        var_dump('$id');
        return view('master', ['monsters' => $id]);
    }

    public function create()
    {
//        return view('master');
    }

    public function store(Request $request)
    {
        echo 'function store in use' ;
        var_dump(request('name'));
        var_dump(request('description'));
        var_dump(request('aggression_level'));

//        $this->validate(request(), [
//
//            'name' => 'required',
//            'description' => 'required',
//            'aggression_level' => 'required',
//            'monster_image' => 'required',

//            ]);

//        $exploded = explode(',', request('monster_image'));
//        $decoded = base64_decode($exploded[1]);
//        if(str_contains($exploded[0], 'jpeg'))
//            $extension = 'jpeg';
//        else $extension = 'png';
//
//        $filename = request('name').'.'.$extension;
//        $monster_image_name = str_replace(' ', '_', $filename);
//        $path = 'public/img'.'/'.$monster_image_name;

//        file_put_contents($path, $decoded);


        // I still need to replace this with ::create and add some validation.
        Monster::forceCreate([

            'name' => request('name'),
            'description' => request('description'),
            'aggression_level' => request('aggression_level'),
//            'monster_image_name' => $monster_image_name
            'monster_image_name' => request('monster_image')

        ]);

        return ['message' => 'Yep Monster Actually Created'];
    }

    public function delete(Monster $id)
    {


        var_dump('sup, it got here at least.');
        var_dump($id['id']);
        Monster::findOrFail($id['id']);
        Monster::destroy($id['id']);

//        return redirect('/monsters');
    }
    public function update(Request $request, Monster $id)
    {
        var_dump('we are in the update function');
        var_dump(request('id'));
        $monster = Monster::findOrFail($id['id']);

        var_dump($monster);
        Monster::where('id', request('id'))->update([
            'name' => request('name'),
            'description' => request('description'),
            'aggression_level' => request('aggression_level')
        ]);



        var_dump($request);

    }

}

