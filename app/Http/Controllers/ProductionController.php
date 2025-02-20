<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Product;

class ProductionController extends Controller
{
    public function index()
    {
        $productions = Production::all();
        $products = Product::select('PCB')->distinct()->get();
        return view('production', compact('productions', 'products'));
    }

    public function destroy($id)
    {
        Production::destroy($id);
        return response()->json(['success' => true]);
    }
}