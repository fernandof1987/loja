@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-2">
                @include('categories')
            </div>

            <div class="col 10">
                <h4>Carrinho de Compras <span class="oi oi-cart large"></span></h4>

                <br/>

                @forelse($cart->items as $k => $i)

                    <div class="row">
                        <div class="col-md-4">
                            Produto: {{ $i['name'] }} <br />
                            Cód: {{ $k }}<br />
                            Quantidade: {{ $i['quantity'] }} <br />
                            Preco: R$ {{ number_format($i['price'], 2, ',', '.') }} <br />
                            Total: R$ {{ number_format($i['quantity'] * $i['price'], 2, ',', '.') }}<hr />
                            <a class="btn btn-outline-info" href="/product/{{ $k }}">Detalhes / Alterar</a>
                            <a class="btn btn-outline-danger" href="/cart/remove/{{ $k }}">Remover</a>
                        </div>
                        <div class="col-md-3 hovereffect">
                            <img src="{{ $cart->getImage($k) }}" width="200px" />
                            <div class="overlay">
                                <h2>{{ $k }} - {{ $i['name'] }}</h2><br />
                                <p>
                                    Imagem meramente ilustrativa!
                                </p>
                            </div>
                        </div>
                    </div>


                        <hr />
                @empty
                   <div class="alert alert-danger">
                       Nenhum produto no carrinho!
                   </div>
                @endforelse

                <div class="alert alert-info">
                    <b>Quantidade de Itens: </b>{{ count($cart->items) }}<br />
                    <b>Valor Total: </b> R$ {{ number_format($cart->getTotal(), 2, ',', '.') }}
                </div>

                {{--
                @if(count($cart->items) > 0)
                    <form method="POST" action="order/store">
                        <button class="btn btn-success form-control" type="submit">
                            <span class="oi oi-check"></span>
                            Finalizar compra
                        </button>
                    </form>

                    <br />
                 --}}

                    @if(count($cart->items) > 0)

                        @if(isset(Auth::user()->name))
                        <button
                            type="button"
                            class="btn btn-success form-control"
                            data-toggle="modal"
                            data-target="#modal_address"
                            data-whatever="@mdo">
                           Finalizar compra
                        </button>
                        @else
                        <a href="/login" class="btn btn-success form-control">
                            Finalizar a Compra
                        </a>
                        @endif

                    @endif




            </div>
        </div>
    </div>



    <div class="modal fade" id="modal_address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dados de Entrega</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="order/store">

                        <div class="form-group row">
                            <label for="cep" class="col-sm-2 col-form-label">CEP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="cep" name="cep" value="{{ old('cep') }}"
                                       maxlength="8"
                                       required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Endereco</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Ex: Av Paulista, 5000" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-sm-2 col-form-label">Cidade</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="uf" class="col-sm-2 col-form-label">UF</label>
                            <div class="col-sm-10">
                                {{--
                                <input type="text" class="form-control" id="uf" name="uf"
                                       maxlength="2"
                                       required>
                                 --}}
                                <select name="uf" class="form-control" if="uf" required>
                                    <option value=""></option>
                                    <option value='AC'>AC</option>
                                    <option value='AL'>AL</option>
                                    <option value='AM'>AM</option>
                                    <option value='AP'>AP</option>
                                    <option value='BA'>BA</option>
                                    <option value='CE'>CE</option>
                                    <option value='DF'>DF</option>
                                    <option value='ES'>ES</option>
                                    <option value='GO'>GO</option>
                                    <option value='MA'>MA</option>
                                    <option value='MG'>MG</option>
                                    <option value='MS'>MS</option>
                                    <option value='MT'>MT</option>
                                    <option value='PA'>PA</option>
                                    <option value='PB'>PB</option>
                                    <option value='PE'>PE</option>
                                    <option value='PI'>PI</option>
                                    <option value='PR'>PR</option>
                                    <option value='RJ'>RJ</option>
                                    <option value='RN'>RN</option>
                                    <option value='RO'>RO</option>
                                    <option value='RR'>RR</option>
                                    <option value='RS'>RS</option>
                                    <option value='SC'>SC</option>
                                    <option value='SE'>SE</option>
                                    <option value='SP'>SP</option>
                                    <option value='TO'>TO</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="obs" class="col-sm-2 col-form-label">Obervação Pedido</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="obs"></textarea>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button class="btn btn-primary" type="submit">Finalizar Pedido</button>

                    </form>
                </div>
                {{--
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-primary" type="submit">Finalizar Pedido</button>
                </div>
                --}}

            </div>
        </div>
    </div>

@endsection