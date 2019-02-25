<?php

namespace App\Http\Controllers;

use App\Models\Order as Model;
use Illuminate\Http\Request;
use App\Models\DeliveryDetail;

use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    private $model;

    function __construct(Model $model){
        $this->middleware('auth');
        $this->model = $model;
    }

    public function index()
    {
        $orders = $this->model->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        $categories = \App\Models\Category::all();
        $products_count = \App\Models\Product::count();
        return view('orders', compact('orders', 'categories', 'products_count'));
    }

    public function store(Request $request)
    {
        if(session('cart')){

            $cart = session('cart');

            if($cart->getTotal() > 0){

                $this->model->total = $cart->getTotal() ;
                $this->model->user_id = Auth::user()->id;

                $this->model->save();

                foreach($cart->items as $k => $item){
                    $this->model->items()->create([
                        'product_id' => $k,
                        'price' => $item['price'],
                        'quantity' => $item['quantity']
                    ]);
                }

                $request['order_id'] = $this->model->id;

                //DeliveryDetail::fill()
                //$this->model->details->fill($request->all())->save();
                //dd($request->all());

                $this->model->details()->create([
                    'cep' => $request->cep,
                    'address' => $request->address,
                    'city' => $request->city,
                    'uf' => $request->uf,
                    'obs' => $request->obs
                ]);

                //dd($this->model->details->all());

                $cart->clear();

            }

            return redirect()->action('OrderController@index');

        }



    }


    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
