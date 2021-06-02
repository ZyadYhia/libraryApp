<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Http\Response;

class ApiCatController extends Controller
{
    public function index()
    {
        $cats = Cat::paginate(3);
        return CatResource::collection($cats);
    }

    public function show($id)
    {
        $cat = Cat::find($id);
        if ($cat == null) {
            return response()->json([
                'status' => 'notFound'
            ], 404);
        }
        return new CatResource($cat);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'required|image|max:2048|mimes:jpg,jpeg,png',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }
        $imgPath = Storage::putFile("cats", $request->img);
        $cat = Cat::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath,
        ]);
        return
            response()->json([
                'msg' => 'created successfuly',
                'cat' => new CatResource($cat)
            ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }

        $cat =  Cat::find($id);
        if ($cat == null) {
            return response()->json([
                'msg' => '404 not found',
            ], 404);
        }
        // if the category has some data in another tabletion
        if ($cat->books->count() > 0) {
            return response()->json([
                'msg' => 'cannot delete this item, please delete its books first',
            ], 500);
        }


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
        return
            response()->json([
                'msg' => 'created successfuly',
                'cat' => new CatResource($cat)
            ], 200);
    }

    public function delete($id)
    {
        $cat = Cat::find($id);
        if ($cat == null) {
            return response()->json([
                'msg' => '404 not found',
            ], 404);
        }

        Storage::delete($cat->img);
        $cat->delete();

        return response()->json([
            'msg' => "$cat->name Category deleted successfuly"
        ], 200);
    }
}
