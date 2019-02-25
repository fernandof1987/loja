<?php

namespace App\Http\Controllers;

use App\Models\OrderItem as Model;
use Illuminate\Http\Request;

class OrderItemController extends Controller
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
        //
    }

    public function show(OrderItem $orderItem)
    {
        //
    }

    public function edit(OrderItem $orderItem)
    {
        //
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        //
    }

    public function destroy(OrderItem $orderItem)
    {
        //
    }
}
