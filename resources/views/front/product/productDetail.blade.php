@extends('front.layouts.main')

@section('content')
<!--Page Content-->
<div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
        <li><a href="#">Kategori</a></li>
        <li>{{ $stockCard->stockName }}</li>
    </ol><!--Breadcrumbs Close-->

    <!--Catalog Single Item-->
    <section class="catalog-single">
        <div class="container">
            <div class="row">

                <!--Product Gallery-->
                <div class="col-lg-6 col-md-6">
                    <div class="prod-gal master-slider" id="prod-gal">
                        <!--Slide1-->
                        <div class="ms-slide">
                            <img src="../masterslider/blank.gif" data-src="img/catalog/product-gallery/1.jpg" alt="Lorem ipsum"/>
                            <img class="ms-thumb" src="data:image/*;base64,{{ base64_encode($stockCard->stockMainPicture) }}" />
                        </div>
                        <!--Slide2-->
                        <div class="ms-slide">
                            <img src="../masterslider/blank.gif" data-src="img/catalog/product-gallery/2.jpg" alt="Lorem ipsum"/>
                            <img class="ms-thumb" src="img/catalog/product-gallery/th_2.jpg" alt="thumb" />
                        </div>
                    </div>
                </div>

                <!--Product Description-->
                <div class="col-lg-6 col-md-6">
                    <h1>{{ $stockCard->stockName }}</h1>

                    {{-- <div class="old-price">815,00 $</div> --}}
                    @if(auth()->check())
                    <div class="price">{{ nf($stockCard->price) }} {{ $stockCard->currencyCode }}</div>

                    <div class="buttons group">
                        <div class="qnt-count">
                            <a class="incr-btn" href="#">-</a>
                            <input id="quantity" class="form-control" type="text" value="1">
                            <a class="incr-btn" href="#">+</a>
                        </div>
                        <a class="btn btn-primary btn-sm" href="javascript:;" onclick="addToCart(this, '{{ $stockCard->stockID }}')"><i class="icon-shopping-cart"></i>Sepete Ekle</a>
                        {{-- <a class="btn btn-success btn-sm" href="#"><i class="icon-heart"></i>Add to wishlist</a> --}}
                    </div>
                    @else
                    <div class="btn btn-primary btn-sm" data-toggle="modal" data-target="#loginModal">Ürün fiyatını görebilmek için giriş yapmanız gerekmektedir.</div>
                    @endif
                    <p class="p-style2" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical">{{ $stockCard->Explanation }}</p>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-5">
                            <h3>Paylaş</h3>
                            <div class="social-links">
                                <a href="#"><i class="fa fa-tumblr-square"></i></a>
                                <a href="#"><i class="fa fa-facebook-square"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-7">
                            <h3>Marka</h3>
                            <div class="tags">
                                <a href="#">{{ $stockCard->trademarkName }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="promo-labels">
                        <div><i class="fa fa-truck"></i>Ücretsiz Kargo</div>
                        <div data-content="Türkiye'nin her iline teslimat vardır."><i class="fa fa-space-shuttle"></i>Her yere teslimat</div>
                        <div><i class="fa fa-shield"></i>Güvenli alışveriş</div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--Catalog Single Item Close-->

    <!--Tabs Widget-->
    <section class="tabs-widget">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#specs" data-toggle="tab">Teknik Özellikler</a></li>
            <li><a href="#descr" data-toggle="tab">Açıklama</a></li>
            {{-- <li><a href="#review" data-toggle="tab">Reviews</a></li> --}}
        </ul>
        <div class="tab-content">
            <!--Tab1 (Tech Specs)-->
            <div class="tab-pane fade in active" id="specs">
                <div class="container">
                    <div class="row">
                        <section class="tech-specs">
                            <div class="container">
                                <div class="row">
                                    <!--Column 1-->
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <!--Item-->
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-3"><i class="icon-expand"></i><span>Fit</span></div>
                                                <div class="col-lg-8 col-md-8 col-sm-9"><p class="p-style2">Adjustable nosepads and durable frame fits any face. Extra nosepads in two sizes.</p></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-3"><i class="icon-tv-monitor"></i><span>Display</span></div>
                                                <div class="col-lg-8 col-md-8 col-sm-9"><p class="p-style2">High resolution display is the equivalent of a 25 inch high definition screen from eight feet away.</p></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!--Column 2-->
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <!--Item-->
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4"><i class="icon-expand"></i><span>Fit</span></div>
                                                <div class="col-lg-8 col-md-8 col-sm-8"><p class="p-style2">Adjustable nosepads and durable frame fits any face. Extra nosepads in two sizes.</p></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4"><i class="icon-tv-monitor"></i><span>Display</span></div>
                                                <div class="col-lg-8 col-md-8 col-sm-8"><p class="p-style2">High resolution display is the equivalent of a 25 inch high definition screen from eight feet away.</p></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <!--Tab2 (Description)-->
            <div class="tab-pane fade" id="descr">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-5">
                            <img class="center-block" src="data:image/*;base64,{{ base64_encode($stockCard->stockMainPicture) }}" alt="Description"/>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            <p class="p-style2">{{ $stockCard->Explanation }}</p>

                        </div>
                    </div>
                </div>
            </div>

            <!--Tab3 (Reviews)-->
            {{-- <div class="tab-pane fade" id="review">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-lg-offset-1">
                            
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section><!--Tabs Widget Close-->


    @include('front.layouts.partials.cozumortaklari')
</div><!--Page Content Close-->
@stop