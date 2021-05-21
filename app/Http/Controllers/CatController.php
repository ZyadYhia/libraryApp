<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index()
    {
        //to get all records from Cats
        $cats = Cat::get();

        //dump and die method for show and exit
        //work with symphony package
        // dd($cats);

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
        ]);
        Cat::create([
            'name' => $request->name,
            'desc' => $request->desc,
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
        ]);
        Cat::findOrFail($id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);
        return redirect(url('/cats'));
    }
    public function delete($id)
    {
        Cat::findOrFail($id)->delete();
        return redirect(url('/cats'));
    }
}
