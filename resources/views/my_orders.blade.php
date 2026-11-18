@include ('includes.header')

<div id="orders">
    <h1>My Orders</h1>
    <p>Here you can view all your orders.</p>
    
    @if($orders->isEmpty())
        <p id="no-orders">You haven't placed any orders yet.</p>
    @else
        <div id="order-section">
            @foreach($orders as $order)

                <div class="order-items">

                    <div class="order-header">
                        <h2>Order #{{ $order->id }}</h2>
                        <div>
                            <div>
                                <img src="{{ asset('images/home/calendar-date.png') }}" alt="Calendar">
                                <p>{{ $order->created_at->format('d.m.Y.') }}</p>
                            </div>
                            <p>{{ $order->status }}</p>
                        </div>
                    </div>

                    @foreach($order->items as $item)
                        <div class="order-body">
                            <img src="{{ asset($item->book->image) }}" alt="{{ $item->book_title }}">
                            <div>
                                <h2>{{ $item->book_title }}</h2>
                                <p>{{ $item->book->author }}</p>
                                <div>
                                    <p>Quantity: {{ $item->quantity }}</p>
                                    <p>Unit price: {{ number_format($item->unit_price, 2) }} RSD</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <h1>Total: {{ number_format($order->total_price, 2) }} RSD</h1>
                </div>

            @endforeach
        </div>
    @endif
</div>

@include ('includes.footer')