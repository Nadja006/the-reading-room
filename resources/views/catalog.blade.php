@include ('includes.header')
        <div id="hero-catalog" class="hero">
            <h1>Our Collection</h1>
            <h2>Find your next favorite story among our carefully selected books.</h2>
            <p>30 books available</p>
        </div>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <div id="book-section">
            @foreach ($books as $book)
            <div id="single-book">
                <div>
                    <img src="{{ asset($book->image) }}" alt="{{ $book->title }}">
                </div>
                <div>
                    <p id="category-p">{{ $book->category->name }}</p>
                    <h2>{{ $book->title }}</h2>
                    <p id="book-author">{{ $book->author }}</p>
                    <p id="book-price">{{ $book->price }} RSD</p>
                    <a href="{{ route('single_book', $book->id) }}">View Details</a>
                </div>
            </div>
            @endforeach
            {{ $books->links() }}
        </div>
@include ('includes.footer')