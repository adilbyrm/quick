@foreach($products as $pro)
<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="tile">
        <div class="badges">
            <span class="sale"></span>
        </div>
        <div class="price-label">{{ nf($pro->Price) }} <small>TL</small></div>
        <a href="{{ route('product-detail', [slug($pro->stockName), $pro->stockID]) }}"><img src="img/catalog/tiles/1.jpg" alt="1"/></a>
        <div class="footer">
            <a href="{{ route('product-detail', [slug($pro->stockName), $pro->stockID]) }}">{{ $pro->stockName }}</a>
            <span>{{ $pro->trademarkName }}</span>
            <div class="tools">
                <div class="rate">
                    <span class="active"></span>
                    <span class="active"></span>
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                </div>
                <!--Add To Cart Button-->
                {{-- @if(auth()->check()) --}}
                <a class="add-cart-btn" href="javascript:;" onclick="addToCart(this, '{{ $pro->stockID }}')"><span>Ekle</span><i class="icon-shopping-cart"></i></a>
                {{-- @endif --}}
                <!--Share Button-->
                <div class="share-btn">
                    <div class="hover-state">
                        <a class="fa fa-facebook-square" href="#"></a>
                        <a class="fa fa-twitter-square" href="#"></a>
                        <a class="fa fa-google-plus-square" href="#"></a>
                    </div>
                    <i class="fa fa-share"></i>
                </div>
                <!--Add To Wishlist Button-->
                {{-- <a class="wishlist-btn" href="#">
                    <div class="hover-state">Wishlist</div>
                    <i class="fa fa-plus"></i>
                </a> --}}
            </div>
        </div>
    </div>
</div>
@endforeach