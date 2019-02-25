<h4 class="d-none d-lg-block">Categorias </h4>
<span class="oi oi-icon-cart" title="cart" aria-hidden="true"></span>

<ul class="list-group list-group-flush d-none d-lg-block">

    <a href="/" style="text-decoration: none;">
        <li class="list-group-item">
            Todos
            <span class="float-right">
                ({{ $products_count }})
            </span>
        </li>
    </a>

@foreach($categories as $category)
        <a href="/products_by_category/{{ $category->id }}" style="text-decoration: none;">
            <li class="list-group-item">
                {{ $category->name }}
                <span class="float-right">
                    ({{ count($category->products) }})
                </span>
            </li>
        </a>

    {{--
    <button type="button" class="btn btn-primary btn-block bg-info">
        {{ $category->name }}
        <span class="badge badge-light float-right">
            {{ count($category->products) }}
        </span>
    </button>
    <br />
    --}}

@endforeach
</ul>
