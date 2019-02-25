<br />


<div class="row">

@forelse($products as $key => $product)


        <div class="col-md-4 col-sm-6 col-xs-12 d-flex align-items-stretch">
            <div class="card mb-4 shadow-sm" style="width: 18rem;">

                <div class="hovereffect">
                    <img
                        {{--src="https://c-lj.gnst.jp/public/img/common/noimage.jpg?20190126050038"--}}
                        {{--src="https://i4-malwee.a8e.net.br/gg/camisa-polo-slim-adulto-malwee_167082708_1000042378652VAP.jpg"--}}
                        src="{{ $product->getImage() }}"
                         {{--height="250px"--}}
                         width="100%"
                         alt="{{ $product->name }}"/>
                    <div class="overlay">
                        <h2>{{ $product->id }} - {{ $product->name }}</h2><br />
                        <p>
                            {{ $product->image != 0 ? 'Imagem meramente ilustrativa!' : '' }}
                            <a href="/product/{{ $product->id }}">Detalhes</a>
                        </p>
                    </div>
                </div>

                <div class="card-body">
                    <a href="/product/{{ $product->id }}" style="text-decoration: none">
                        <span class="text-info">
                            <b>{{ $product->id }} - {{ $product->name }}</b>
                        </span>
                    </a><br />
                    <small class="card-text">{{ $product->description }}</small><br />
                    <!--div class="d-flex justify-content-between align-items-center"-->


                        <small class="text-muted">
                            <b>{{ count($product->categories) > 1 ? 'Categorias: ' : 'Categoria: ' }}</b>
                            @foreach($product->categories as $k => $category)
                                {{ $category->name }}
                                {{ $k != (count($product->categories) -1) ? ',' : '' }}
                            @endforeach
                        </small> <br />

                        <small class="text-success font-weight-bold">
                            R$ {{ number_format($product->price, 2, ',', '.') }} <span class="oi oi-tags"></span>
                        </small> <br/>

                        <a href="/product/{{ $product->id }}" class="btn btn-outline-info form-control ">
                            Detalhes
                        </a>

                    <!--/div-->
                </div>
            </div>
        </div>
@empty
    @if(app('request')->input('search_keyword'))
        <div>
            Nenhum produto encontrado com a palavra '{{ app('request')->input('search_keyword') }}'
        </div>
        &nbsp;<a href="{{ URL::previous() }}" class="btn btn-outline-info">Voltar</a>
    @else
        <div>
            Nenhum produto encontrado!
        </div>
        &nbsp;<a href="{{ URL::previous() }}" class="btn btn-outline-info">Voltar</a>
    @endif
@endforelse
</div>

<div class="d-flex justify-content-around">


    @if(!isset($search_keyword))
        {{ $products->links() }}
    @else
        {{ $products->appends(['search_keyword' => $search_keyword ])->links() }}
    @endif

</div>

