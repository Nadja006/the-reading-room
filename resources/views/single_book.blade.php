@include ('includes.header')
        <div id="hero-single-book">
            <img src="{{ asset($single_book->image) }}" alt="{{ $single_book->title }}">
            <div>
                <p>{{ $single_book->category->name }}</p>
                <h1>{{ $single_book->title }}</h1>
                <h2>by {{ $single_book->author }}</h2>
                <p>{{ $single_book->description }}</p>
                <h1>{{ $single_book->price }} RSD</h1>
                <p>Availability: {{ $single_book->stock }} in stock</p>
                <form action="{{ route('cart.store', $single_book->id) }}" method="POST">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" max="{{ $single_book->stock }}" required>
                    <button type="submit">Add to cart</button>
                </form>
            </div>
        </div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
@include ('includes.footer')