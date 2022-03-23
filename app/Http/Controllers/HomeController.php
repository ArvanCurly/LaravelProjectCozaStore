<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
       /**
     * Show the form for creating a new resource.
     *
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $types = Type::all();

        return view('frontend.home-02',compact('categories','types'));

    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prod()
    {
        $produits = Produit::all();
        $categories = Category::all();
        $types = Type::all();
        return view('frontend.product',compact('produits','types','categories'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Produit $produit)
    {
        return view('frontend.product-detail',compact('produit'));
    }




}
