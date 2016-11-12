@foreach($products as $pro)
<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="tile">
        @if( auth()->check() )
        <div class="price-label">{{ nf( $pro->price ) }} <small>{{ $pro->currencyCode }}</small></div>
        @endif
        <a class="img-a" href="{{ route('product.detail', [slug($pro->stockName), $pro->stockID]) }}">
            <img src="data:image/*;base64,{{ base64_encode($pro->stockMainPicture) }}" alt="{{ $pro->stockName }}"/>
        </a>
        <div class="footer">
            <a href="{{ route('product.detail', [slug($pro->stockName), $pro->stockID]) }}">{{ $pro->stockName }}</a>
            <span>{{ $pro->trademarkName }}</span>
            <div class="tools">
                @if(auth()->check())
                <a class="add-cart-btn" href="javascript:;" onclick="addToCart(this, '{{ $pro->stockID }}')"><span>Ekle</span><i class="icon-shopping-cart"></i></a>
                @endif
                <!--Share Button-->
                <div class="share-btn" style="{{ !auth()->check() ? 'right: 0' : '' }}" >
                    <div class="hover-state">
                        <a class="fa fa-facebook-square" href="#"></a>
                        <a class="fa fa-twitter-square" href="#"></a>
                        <a class="fa fa-google-plus-square" href="#"></a>
                    </div>
                    <i class="fa fa-share"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<style type="text/css">
    .tile > .img-a { height:285px ; display:flex; }
    .tile > a > img { max-height:285px; }
    .tile > .footer { height:162px; }
    .tile .footer .tools { position: absolute!important; margin-top: 0!important; bottom:10px!important; right:10px!important; }
</style>