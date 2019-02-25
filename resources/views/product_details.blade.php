@extends('layouts.app')

@section('content')
    <div class="container">

            <div class="row">

                <div class="col-md-2">
                    @include('categories')
                </div>

                <div class="col 10">

                    <h4>{{ count($product->categories) > 1 ? 'Categorias: ' : 'Categoria: ' }}
                    @foreach( $product->categories->all() as $k => $category  )
                        {{ $category->name }}
                        {{ $k != (count($product->categories) -1) ? ',' : '' }}
                    @endforeach
                    </h4>
                    <br />

                    <div class="row">

                        <div class="col-md-4 hovereffect">
                            <img src="{{ $product->getImage() }}" width="300px">
                            <div class="overlay">
                                <h2>{{ $product->id }} - {{ $product->name }}</h2><br />
                                <p>
                                    {{ $product->image != 0 ? 'Imagem meramente ilustrativa!' : '' }}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <h3>Código: {{ $product->id }}</h3>
                            <h3>Nome: {{ $product->name }}</h3>
                            <hr />
                            <p><b>Descrição: </b>{{ $product->description }}</p>
                            <p>
                                <b>Valor:</b> R$ {{ number_format($product->price, 2, ',', '.') }} <span class="oi oi-tags"></span>
                            </p>

                            <hr />

                            <form method="POST" action="/cart/add/{{ $product->id }}">

                                @if(isset(session('cart')->items[$product->id]))
                                    <div class="input-group col-md-4">
                                        <input
                                                type="number"
                                                class="form-control"
                                                value="{{ session('cart')->items[$product->id]['quantity'] }}" aria-label=""
                                                name="quantity"
                                                aria-describedby="basic-addon2"
                                                min="1"
                                                required>
                                        <div class="input-group-append">
                                            <input type="submit" class="btn btn-outline-danger" type="button" value="Alterar">
                                        </div>
                                    </div>
                                @else
                                    <div class="input-group col-md-4">
                                        <input
                                                type="number"
                                                class="form-control"
                                                value="1" aria-label=""
                                                name="quantity"
                                                aria-describedby="basic-addon2"
                                                min="1"
                                                required>
                                        <div class="input-group-append">
                                            <input type="submit" class="btn btn-outline-success" type="button" value="Comprar">
                                        </div>
                                    </div>
                                @endif

                            </form>

                        </div>


                    </div>





                </div>
            </div>

    </div>

@endsection