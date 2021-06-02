<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{
    public function index()
    {
        //to get all records from Cats
        $cats = Cat::paginate(3);
        //see Views folder
        //we can use / or . 
        //first paramater in the element of the array to use in view
        return view('cats.index', ['cats' => $cats,]);
    }


    public function show($id)
    {
        //to get all records from Cats where id = ...
        $cat = Cat::findOrFail($id);
        return view('cats.show', ['cat' => $cat,]);
    }


    public function create()
    {
        return view('cats.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'required|image|max:2048|mimes:jpg,jpeg,png',
        ]);
        $imgPath = Storage::putFile("cats", $request->img);
        Cat::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath,
        ]);
        return redirect(url('/cats'));
    }


    public function edit($id)
    {
        $cat = Cat::findOrFail($id);
        return view('cats.edit', ['cat' => $cat,]);
    }


    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'required|image|max:2048|mimes:jpg,jpeg,png',
        ]);
        $cat =  Cat::findOrFail($id);
        $imgPath = $cat->img;
        if ($request->hasFile('img')) {
            Storage::delete($imgPath);
            $imgPath = Storage::putFile("cats", $request->img);
        }
        $cat->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath,
        ]);
        return redirect(url('/cats'));
    }


    public function delete($id)
    {
        $cat = Cat::findOrFail($id);
        Storage::delete($cat->img);
        $cat->delete();
        return redirect(url('/cats'));
    }

    public function latest($num)
    {
        $cats = Cat::orderBy('id', 'DESC')->take($num)->get();
        return view('cats.latest', ['num' => $num, 'cats' => $cats,]);
    }

    public function search(Request $request)
    {
        $cats = Cat::where('name', 'LIKE', "%$request->search%")->get();
        return view('cats.search', ['cats' => $cats,]);
    }
}
