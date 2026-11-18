@include ('includes.header')
    
    <div id="cart-table">

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        
        <table>
            <tr>
                <th>Book</th>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
            @foreach($items as $item)
            <tr>
                <td><img src="{{ $item->book->image }}" alt="{{ $item->book->title }}"></td>
                <td><h2>{{ $item->book->title }}</h2><br><p id="table-author">{{ $item->book->author }}</p></td>
                <td>{{ $item->book->price }} RSD</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->book->price * $item->quantity, 2) }} RSD</td>
                <td>
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr id="table-l-row">
                <td></td>
                <td></td>
                <td></td>
                <td class="table-total">Total:</td>
                <td class="table-total">{{ number_format($total_price, 2) }} RSD</td>
                <td></td>
            </tr>
        </table>
        <div id="cart-a">
            <a href="{{ route('catalog') }}">← Continue Shopping</a>
            <a href="{{ route('checkout') }}">Checkout →</a>
        </div>
    </div>
@include ('includes.footer')