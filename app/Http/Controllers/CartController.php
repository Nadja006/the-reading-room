<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); //Get logged-in user

        $cart = $user->cart()->first(); //Get users cart

        $total_price = 0;

        if(!$cart){
            $items = collect(); //If cart is empty, make empty collection
            return view('cart', compact('items', 'total_price'));
        }
        else{
            $items = $cart->items()->get(); //Get users items

            foreach ($items as $item) {
                $total_price += $item->book->price * $item->quantity; //Total price of cart
            }

            return view('cart', compact('items', 'total_price'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $user = Auth::user(); //Get logged-in user

        $cart = $user->cart()->firstOrCreate([]); //Get user's cart, or create it if he doesn't have it

        $book = Book::findOrFail($id); //Find book that user chose

        $item = $cart->items()->where('book_id', $id)->first(); //Get item object of specific cart

        if($book->stock < 1){
            // Dont't add book to the cart
            return redirect()->route('single_book')->with('error', 'Book is out of stock!');
        }

        $maxQuantity = $item ? $book->stock - $item->quantity : $book->stock; //Max quantity that user can add to the cart

        $validated = $request->validate([ //Get quantity of books that user wants to put in the cart
            'quantity' => 'required|integer|min:1|max:' . $maxQuantity 
        ]);

        if($item){
            $item->quantity += $validated['quantity']; //Add user quantity to quantity
            $item->save();
        }
        else{ //If book doesn't exist in the cart create new record
            $cart->items()->create([
                'book_id' => $book->id,
                'quantity' => $validated['quantity']
            ]);
        }

        return redirect()->route('catalog')->with('success', 'Book successfully added to cart!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user(); //Get logged-in user

        $cart = $user->cart()->first(); //Get users cart

        $item = $cart->items()->where('id', $id)->firstOrFail(); //Get item object of specific cart

        $item->delete(); //Delete chosen item

        return redirect()->route('cart')->with('success', 'Item successfully removed from cart!');
    }
}
