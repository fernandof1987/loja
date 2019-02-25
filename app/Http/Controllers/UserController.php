<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as Model;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $request['password'] = Hash::make($request['password']);
        $this->model->fill($request->all())->save();
        return response('OK', 200)
            ->header('Content-Type', 'text/plain');
    }

    public function show(Product $product)
    {
        //
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
