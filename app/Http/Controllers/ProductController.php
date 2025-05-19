<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller{
    public function create(Request $request){
        try{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string', 'max:512']
            ]);
        }catch(Exception $e){
            return redirect()->route('dashboard')->with('error', 'error message: '.$e->getMessage());
        }

        Product::create($request->all());
        return redirect()->route('dashboard');
    }
}
