<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    private $paginator;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->paginator = 9;
    }

    public function index(Request $request, Product $products, Category $categories){

        if($request->search_keyword){
            $products = $products->search($request->search_keyword)->paginate($this->paginator);
            $search_keyword = $request->search_keyword;
        }elseif(session('products_by_category')) {
            $products = session('products_by_category');
        }else{
            $products = $products->paginate($this->paginator);
        }

        $categories = $categories->all();
        $products_count = Product::count();

        return view('home', compact('products','categories', 'search_keyword', 'products_count'));
    }

    public function filterProductsByCategory($category_id, Category $categories){
        $products_by_category = $categories->find($category_id)->products()->paginate($this->paginator);
        return redirect()->action('HomeController@index')->with('products_by_category', $products_by_category);
    }

    public function searchProducts(Request $request, Product $product){
        return redirect()->action('HomeController@index', ['search_keyword' => $request->keyword ]);
    }
}
