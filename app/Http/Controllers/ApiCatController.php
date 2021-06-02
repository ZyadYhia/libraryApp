<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;
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
}
