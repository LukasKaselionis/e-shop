<ul class="card_list row">
    @foreach($products as $productsItem)
        @include('components.products_list_item', ['product' => $productsItem])
    @endforeach
</ul>



