<?php

namespace App\Http\Controllers;

use App\Models\Product as Model;
use Illuminate\Http\Request;

use App\Models\Category;

class ProductController extends Controller
{
    private $model;

    function __construct(Model $model){
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->model->fill($request->all())->save();
        return response('OK', 200)
            ->header('Content-Type', 'text/plain');

    }

    public function show($id, Category $categories)
    {
        $product = $this->model->with('categories')->find($id);
        $products_count = $this->model->count();
        $categories = $categories->all();
        return view('product_details', compact('product', 'categories', 'products_count'));
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
