<li class="product col-md-4">
    <div class="card_container">
        <div class="card-img-container">
            @if ($product->cover)
                <img class="card_img" width="150" height="125"
                     src="{{ asset('storage/'.$product->cover) }}"
                     alt="{{ $product->title }}">
            @endif
        </div>
        <div class="card-name-container">
            <p>{{ $product->name }}</p>
        </div>
        <div class="card-price-container">
            <p>{{ $product->price }} €</p>
        </div>
        <div class="card-description-container">
            <h5>Description: </h5>
            <p>{{ $product->description }}</p>
        </div>
        <a onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->cover }}');">
            <button class="card-button">Add</button>
        </a>
    </div>
</li>


