@include ('includes.header')
    <div class="register-form" id="checkout">
        <h1>Checkout</h1>
        <p>Please enter your information.</p>
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <label for="recipient_name">Recipient name</label><br>
            <input type="text" name="recipient_name" id="recipient_name" placeholder="Enter your name" required><br>

            <label for="phone">Phone number</label><br>
            <input type="text" name="phone" id="phone" placeholder="111-22-333" required><br>

            <label for="address_line">Address</label><br>
            <input type="text" name="address_line" id="address_line" placeholder="Enter your address" required><br>

            <label for="city">City</label><br>
            <input type="text" name="city" id="city" placeholder="Enter your city" required><br>

            <label for="postal_code">Postal code</label><br>
            <input type="text" name="postal_code" id="postal_code" placeholder="Enter your postal code" required><br>

            <label for="country">Country</label><br>
            <input type="text" name="country" id="country" placeholder="Enter your country" required><br>

            <button type="submit">Place order</button>
        </form>
    </div>
@include ('includes.footer')