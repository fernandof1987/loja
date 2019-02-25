<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;

//use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    private $cart;
    /**
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    public function index()
    {
        if (!session('cart')) {
            session(['cart' => $this->cart]);
            session()->save();
        }

        $categories = \App\Models\Category::all();
        $products_count = \App\Models\Product::count();
        //$products = \App\Models\Product::find([session('cart')['items']]);

        //dd($products);
        //dd(session('cart'));

        return view('cart', [
            'cart' => session('cart'),
            'categories' => $categories,
            'products_count' => $products_count,
            //'products' => $products
        ]);
    }
    public function add($id, Request $request)
    {
        $cart = $this->getCart();

        $product = Product::find($id);
        $cart->add($id, $product->name, $product->price, $request->quantity);
        session(['cart' => $cart]);
        session()->save();
        //dd(count(session('cart')->items));
        //dd(session()->all());
        return redirect('/cart');
    }

    private function getCart()
    {
        if(session('cart')) {
            $cart = session()->get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }
    public function remove($id)
    {
        $cart = $this->getCart();
        $cart->remove($id);
        session(['cart' => $cart]);
        session()->save();
        return back();
    }

    public function clear(){
        session()->forget('cart');
        $this->cart->clear();
    }

    public function all(){
        dd(session()->all());
        dd($this->cart->all());
    }

}
