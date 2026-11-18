<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user(); //Get logged-in user

        $cart = $user->cart; //Get user's cart

        if (!$cart || $cart->items()->doesntExist()) { //If cart doesn't exist or there is no items, go to cart
            return redirect()->route('cart');
        }

        $items = $cart->items()->get(); //Get items from the user's cart

        $total_price = 0;

        foreach($items as $item){
            $total_price += $item->book->price * $item->quantity; //Total price of order
        }

        $validated = $request->validate([ //Get user input from checkout
            'recipient_name' => 'required|string|max:25',
            'phone' => 'required|string|max:25',
            'address_line' => 'required|string|max:125',
            'city' => 'required|string|max:125',
            'postal_code' => 'required|string|max:25',
            'country' => 'required|string|max:125',
        ]);

        DB::transaction(function () use ($user, $cart, $items, $total_price, $validated){

            $order = Order::create([ //Make new order
                'user_id' => $user->id,
                'total_price' => $total_price,
                'status' => 'pending',
            ]);

            OrderAddress::create([ //Create new record in order_address table
                'order_id' => $order->id,
                'recipient_name' => $validated['recipient_name'],
                'phone' => $validated['phone'],
                'address_line' => $validated['address_line'],
                'city' => $validated['city'],
                'postal_code' => $validated['postal_code'],
                'country' => $validated['country'],
            ]);

            foreach($items as $item){ //Create record in order_items table for each book
                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $item->book->id,
                    'book_title' => $item->book->title,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->book->price,
                ]);
                $item->book->decrement('stock', $item->quantity);
            }

            $cart->items()->delete();

        });

        return redirect()->route('catalog')->with('success', 'Your order has been placed successfully!');
    }

    /**
     * Show user's orders.
     */
    public function my_orders()
    {
        $user = Auth::user(); //Get logged-in user

        $orders = $user->orders()->latest()->get(); //Get user's orders

        foreach($orders as $order){
            $items = $order->items()->get(); //Get order items

            $order->setAttribute('items', $items); //Set attribute, every order should have specific items
        }

        return view('my_orders', compact('orders'));
        
    }
}
