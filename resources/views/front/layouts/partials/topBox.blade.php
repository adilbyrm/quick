
<a class="btn btn-outlined-invert" href="shopping-cart.html"><i class="icon-shopping-cart-content"></i><span>{{ count($carts) }}</span></a>

<!--Cart Dropdown-->
<div class="cart-dropdown">
    <span></span><!--Small rectangle to overlap Cart button-->
    @if(auth()->check())
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
                        <td><div onclick="deleteTheCart(this)" class="delete" data-id="{{ $cart->cartID }}"></div><a href="#{{ $cart->ProductID }}">{{ $cart->Name }}</a></td>
                        <td><input type="text" value="{{ $cart->ProductCount }}"></td>
                        <td class="price">{{ nf($cart->Price) }} TL</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="footer group">
                <div class="buttons">
                    <a class="btn btn-outlined-invert" href="checkout.html"><i class="icon-download"></i>Tamamla</a>
                    <a class="btn btn-outlined-invert" href="shopping-cart.html"><i class="icon-shopping-cart-content"></i>Sepete Git</a>
                </div>
                <div class="total">{{ nf(Cart::totalCart()) }} TL</div>
            </div>
        @else
            <div class="body">Sepetinizde henüz ürün bulunmamaktadır!</div>
        @endif
    @else
        <div class="body">Giriş yapmalısınız!</div>
    @endif
</div><!--Cart Dropdown Close-->
