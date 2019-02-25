<?php

namespace App\Http\Controllers;

use App\Models\Category as Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $model;

    function __construct(Model $model){
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function store(Request $request)
    {
        $this->model->fill($request->all())->save();
        return response('OK', 200)
            ->header('Content-Type', 'text/plain');

    }

    public function show($id)
    {
        return $this->model->with('products')->find($id);
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
