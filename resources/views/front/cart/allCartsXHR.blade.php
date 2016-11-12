@if (count($carts))
    <section class="shopping-cart">
        <div class="container">
            <div class="row">

                <!--Items List-->
                <div class="col-lg-9 col-md-9">
                    <h2 class="title"></h2>
                    <table class="items-list">
                        <tr>
                            <th>&nbsp;</th>
                            <th>Ürün Adı</th>
                            <th>Fiyat</th>
                            <th>Adet</th>
                            <th>Toplam</th>
                        </tr>
                        <!--Item-->
                        @foreach ($carts as $cart)
                        <tr class="item first">
                            <td class="thumb"><a href="{{ route('product.detail', [slug($cart->stockName), $cart->ProductID]) }}"><img style="max-width:152px" src="data:image/*;base64,{{ base64_encode($cart->stockMainPicture) }}" alt="{{ $cart->stockName }}"/></a></td>
                            <td style="font-size:18px" class="name"><a href="{{ route('product.detail', [slug($cart->stockName), $cart->ProductID]) }}">{{ $cart->stockName }}</a></td>
                            <td class="price">{{ nf( $cart->price ) }} <small>{{ $cart->currencyCode }}</small></td>
                            <td class="qnt-count">
                                <a class="incr-btn" href="#">-</a>
                                <input class="quantity form-control" type="text" name="quantity" data-id="{{ $cart->cartID }}" value="{{ $cart->ProductCount }}">
                                <a class="incr-btn" href="#">+</a>
                            </td>
                            <td class="total">{{ nf( $cart->price * $cart->ProductCount ) }} <small>{{ $cart->currencyCode }}</small></td>
                            <td class="delete"><i onclick="deleteTheCart(this)" class="icon-delete" data-id="{{ $cart->cartID }}"></i></td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <!--Sidebar-->
                <div class="col-lg-3 col-md-3" style="background-color: #f9f9f9;">
                    <h3>Sepet Toplamları</h3>
                    <form class="cart-sidebar" method="post">
                        <div class="cart-totals">
                            <table>
                                <tr>
                                    <td>KDV Hariç</td>
                                    <td class="total align-r">{{ nf( $total['total'] - $total['totalVat'] ) }} TL</td>
                                </tr>
                                <tr class="devider">
                                    <td>KDV</td>
                                    <td class="align-r">{{ nf( $total['totalVat'] ) }} TL</td>
                                </tr>
                                <tr>
                                    <td>Genel Toplam</td>
                                    <td class="total align-r">{{ nf( $total['total'] ) }} TL</td>
                                </tr>
                            </table>
                            <a class="btn btn-primary btn-sm btn-block" href="javascript:;" id="update-cart" onclick="updateCart()">Sepeti Güncelle</a>
                            <input type="submit" class="btn btn-success btn-block" name="to-checkout" value="Siparişi Tamamla">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!--Shopping Cart Close-->
@else
    <section class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-lg-offset-3">
                    <a href="{{ route('homepage') }}" class="title btn btn-success btn-block">Sepetinizde henüz ürün bulunmamaktadır.</a>
                </div>
            </div>
        </div>
    </section>
    <section class="shopping-cart"></section>
@endif
<script type="text/javascript">
    $(".incr-btn").on("click", function(e) {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
         // Don't allow decrementing below 1
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
        e.preventDefault();
    });
</script>
<style type="text/css">
    small { font-size:14px; font-style: italic}
</style>