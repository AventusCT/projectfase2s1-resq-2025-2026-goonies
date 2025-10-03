<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $producten = Product::query();

        if ($status) {
            $producten->where('status', $status);
        }

        return view('producten', [
            'producten' => $producten->get(),
        ]);
    }
}
