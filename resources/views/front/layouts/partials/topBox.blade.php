
<a class="btn btn-outlined-invert" href="shopping-cart.html"><i class="icon-shopping-cart-content"></i><span>{{ count($carts) }}</span></a>

<!--Cart Dropdown-->
<div class="cart-dropdown">
    <span></span><!--Small rectangle to overlap Cart button-->
    @if(count($carts))
        <div class="body">
            <table>
                <tr>
                    <th>Ürün</th>
                    <th>Adet</th>
                    <th>Fiyat</th>
                </tr>
                @foreach($carts as $cart)
                <tr class="item">
                    <td><div class="delete"></div><a href="#">{{ $cart->Name }}</a></td>
                    <td><input type="text" value="{{ $cart->ProductCount }}"></td>
                    <td class="price">89 005 $</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="footer group">
            <div class="buttons">
                <a class="btn btn-outlined-invert" href="checkout.html"><i class="icon-download"></i>Checkout</a>
                <a class="btn btn-outlined-invert" href="shopping-cart.html"><i class="icon-shopping-cart-content"></i>To cart</a>
            </div>
            <div class="total">93 389 $</div>
        </div>
    @else
        <div class="body">Sepetinizde henüz ürün bulunmamaktadır!</div>
    @endif
</div><!--Cart Dropdown Close-->
