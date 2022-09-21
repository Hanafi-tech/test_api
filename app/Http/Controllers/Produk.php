<?php

namespace App\Http\Controllers;

use App\Models\MProduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Produk extends Controller
{

    public function response($produk)
    {
        return response()->json([
            'message' => [
                'Produk' => $produk,
                'Code' => '2009900',
                'Response' => 'Successful',
            ]
        ]);
    }

    public function create(Request $request)
    {
        $d = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $poduk = MProduk::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        if (!Auth::attempt($d)) {
            return response()->json([
                'message' => [
                    'Code' => '4019900',
                    'Response' => 'Unauthorized (Invalid API Key)',
                ]
            ], 401);
        }

        return $this->response($poduk);
    }
}
