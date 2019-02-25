@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-2">
                @include('categories')
            </div>

            <div class="col 10">
                <h4>Pedidos</h4>
                <table class="table table-dark table-striped ">
                    <thead class="text-info">
                        <tr>
                            <th>Pedido</th>
                            <th>Total</th>
                            <th>Qtd. Itens</th>
                            <th>Data</th>
                            <th>Detalhes Produtos</th>
                            {{--<th>CEP</th>--}}
                            <th>Endereço</th>
                            <th>Cidade</th>
                            {{--<th>UF</th>--}}
                            {{--<th>OBS</th>--}}
                        </tr>
                    </thead>
                    @forelse($orders as $order)
                        <tbody>
                            <tr
                                class="clickable"
                                data-toggle="collapse"
                                data-target="#group-of-rows-{{$order->id}}"
                                aria-expanded="false"
                                aria-controls="group-of-rows-{{ $order->id }}">

                                <td>{{ $order->id}}</td>
                                <td>R$ {{ number_format($order->total, 2, ',', '.') }}</td>
                                <td>{{ count($order->items) }}</td>
                                <td>{{  date( 'd/m/Y' , strtotime($order->created_at)) }}</td>
                                <td>
                                    <a href="#" class="text-white text-info" style="text-decoration: none">
                                        <span class="oi oi-plus"></span>
                                    </a>
                                </td>
                                {{--<td>{{ $order->details->cep }}</td>--}}
                                <td>{{ $order->details->address }}</td>
                                <td>{{ $order->details->city }}</td>
                                {{--<td>{{ $order->details->uf }}</td>--}}
                                {{--}}<td>{{ $order->details->obs }}</td>--}}
                            </tr>
                        </tbody>
                        <thead id="group-of-rows-{{ $order->id }}" class="collapse table-light text-info ">
                            <tr>
                                <th>Itens</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="group-of-rows-{{ $order->id }}" class="collapse table-light text-dark">
                            @foreach($order->items as $ki => $item)
                                <tr>
                                    <td>{{ $ki +1 }}</td>
                                    <td>{{ $item->product_id }} - {{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                                    <td>R$ {{ number_format($item->quantity * $item->price, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    @empty
                        <tr>
                            <td colspan="7">
                                Você ainda não finalizou nenhum pedido!
                            </td>
                        <tr>
                    @endforelse

                </table>

                <div class="d-flex justify-content-around">
                    {{ $orders->links() }}
                </div>



            </div>
        </div>

    </div>

@endsection