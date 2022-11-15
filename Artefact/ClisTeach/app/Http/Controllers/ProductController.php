<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ProductController extends Controller
{
    public function show($id, Request $request) {
        $request->merge(['id' => $request->route('id')]);
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer'
        ]);

        if($validator->fails()){
            return redirect(Route("home"));
        }
        return view("product", [
            "id" => $id
        ]);
    }
}
