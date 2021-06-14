<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\BrandProduct;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cates = Category::all();
        $brands = BrandProduct::all();
        $products = Product::all();
        return view('pages.home', compact('cates','brands','products'));
    }
    public function logout(){
        Auth::logout();
        return redirect('/home');
    }
}
