@extends('front.layouts.main')

@section('content')
        <!--Page Content-->
<div class="page-content">

    <!--Hero Slider-->
    <section class="hero-slider">
        <div class="master-slider" id="hero-slider">

            <!--Slide 1-->
            <div class="ms-slide" data-delay="7">
                <div class="overlay"></div>
                <img src="masterslider/blank.gif" data-src="img/hero/slideshow/slide_4.jpg" alt="Car Audio"/>
                <h2 style="width: 456px; left: 110px; top: 110px;" class="light-color ms-layer" data-effect="top(50,true)" data-duration="700" data-delay="250" data-ease="easeOutQuad">Car Audio</h2>
                <p style="width: 456px; left: 110px; top: 210px;" class="light-color ms-layer" data-effect="back(500)" data-duration="700" data-delay="500" data-ease="easeOutQuad">Massive Car Audio</p>
                <div style="left: 110px; top: 300px;" class="ms-layer button" data-effect="bottom(50,true)" data-duration="600" data-delay="950" data-ease="easeOutQuad"><a class="btn btn-primary" href="#">İncele</a></div>
            </div>

            <!--Slide 2-->
            <div class="ms-slide" data-delay="7">
                <span class="overlay"></span>
                <img src="masterslider/blank.gif" data-src="img/hero/slideshow/slide_5.jpg" alt="Car Speaker"/>
                <h2 style="width: 456px; left: 110px; top: 110px;" class="light-color ms-layer" data-effect="bottom(50,true)" data-duration="700" data-delay="250" data-ease="easeOutQuad">Car Speaker</h2>
                <p style="width: 456px; left: 110px; top: 210px;" class="light-color ms-layer" data-effect="bottom(50,true)" data-duration="700" data-delay="500" data-ease="easeOutQuad">Soundmax Car Speaker</p>
                <div style="left: 110px; top: 300px;" class="ms-layer button" data-effect="rotatebottom(30|90,long,br,true)" data-duration="600" data-delay="950" data-ease="easeOutQuad"><a class="btn btn-primary" href="#">İncele</a></div>
            </div>

            <!--Slide 3-->
            <div class="ms-slide" data-delay="7">
                <div class="overlay"></div>
                <img src="masterslider/blank.gif" data-src="img/hero/slideshow/slide_6.jpg" alt="Android"/>
                <h2 style="width: 456px; left: 110px; top: 110px;" class="light-color ms-layer" data-effect="left(50,true)" data-duration="700" data-delay="250" data-ease="easeOutQuad">Android</h2>
                <p style="width: 456px; left: 110px; top: 210px;" class="light-color ms-layer" data-effect="left(50,true)" data-duration="700" data-delay="500" data-ease="easeOutQuad">Newfron OEM</p>
                <div style="left: 110px; top: 300px;" class="ms-layer button" data-effect="left(50,true)" data-duration="600" data-delay="950" data-ease="easeOutQuad"><a class="btn btn-primary" href="#">İncele</a></div>
            </div>

        </div>
    </section><!--Hero Slider Close-->

    <!--
    <section class="cat-tiles">
        <div class="container">
            {{-- <h2>Browse categories</h2> --}}
            <div class="row">
               
                <div class="category col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <a href="#">
                        <img src="img/categories/1.jpg" alt="1"/>
                        <p>Category name</p>
                    </a>
                </div>
                
                @foreach($productGroups as $gr)
                <div class="category col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <a href="#">
                        <img src="data:image/jpeg;base64,{{ base64_encode($gr->Picture) }}" alt="{{ $gr->Name }}"/>
                        <p>{{ $gr->Name }}</p>
                    </a>
                </div>
               @endforeach 
            </div>
        </div>
    </section>-->

    <!--Catalog Grid-->
    <section class="catalog-grid">
        <div class="container">
            {{-- <h2 class="primary-color">Ürünler</h2> --}}
            <div class="row">
                <!--Tile-->
                
                    {!! $productHtml !!}
                
            </div>
        </div>
    </section><!--Catalog Grid Close-->

<!--
    <section class="tabs-widget">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#bestsel" data-toggle="tab">Bestseller items</a></li>
            <li><a href="#onsale" data-toggle="tab">Items on sale</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="bestsel">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>X-MAS LIGHT IPHONE LENS<span>$14.95</span></div></div>
                                </div>
                                <img src="img/media/1.jpg" alt="1"/>
                            </a>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Hedadset for iPhone<span>$19.40</span></div></div>
                                </div>
                                <img src="img/media/2.jpg" alt="2"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$24.15</span></div></div>
                                </div>
                                <img src="img/media/3.jpg" alt="3"/>
                            </a>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$24.15</span></div></div>
                                </div>
                                <img src="img/media/4.jpg" alt="4"/>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$24.15</span></div></div>
                                </div>
                                <img src="img/media/5.jpg" alt="5"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="onsale">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$14.95</span></div></div>
                                </div>
                                <img src="img/media/6.jpg" alt="6"/>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$19.40</span></div></div>
                                </div>
                                <img src="img/media/7.jpg" alt="7"/>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$19.40</span></div></div>
                                </div>
                                <img src="img/media/8.jpg" alt="8"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$14.95</span></div></div>
                                </div>
                                <img src="img/media/9.jpg" alt="9"/>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$19.40</span></div></div>
                                </div>
                                <img src="img/media/10.jpg" alt="10"/>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <a class="media-link" href="#">
                                <div class="overlay">
                                    <div class="descr"><div>Product Name<span>$19.40</span></div></div>
                                </div>
                                <img src="img/media/11.jpg" alt="11"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gray-bg gallery-widget">
        <div class="container">
            <h2>Product gallery</h2>
            <div class="filters">
                <a class="active" href="#" data-group="all">All</a>
                <a href="#" data-group="camera">Camera</a>
                <a href="#" data-group="flash">Flash</a>
                <a href="#" data-group="lenses">Lenses</a>
                <a href="#" data-group="video">Video</a>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item" data-groups='["camera"]' data-src="img/gallery-widget/1.jpg">
                    <a href="img/gallery-widget/1.jpg">
                        <div class="overlay"><span><i class="icon-expand"></i></span></div>
                        <img src="img/gallery-widget/th_1.jpg" alt="1"/>
                    </a>
                </div>
                <div class="gallery-item" data-groups='["camera"]' data-src="img/gallery-widget/2.jpg">
                    <a href="img/gallery-widget/2.jpg">
                        <div class="overlay"><span><i class="icon-expand"></i></span></div>
                        <img src="img/gallery-widget/th_2.jpg" alt="2"/>
                    </a>
                </div>
                <div class="gallery-item" data-groups='["video"]' data-src="https://www.youtube.com/watch?v=hdEAWW7tZSA">
                    <a href="https://www.youtube.com/watch?v=hdEAWW7tZSA">
                        <div class="overlay"><span><i class="icon-music-play"></i></span></div>
                        <img src="img/gallery-widget/th_3.jpg" alt="3"/>
                    </a>
                </div>
                <div class="gallery-item" data-groups='["lenses"]' data-src="img/gallery-widget/4.jpg">
                    <a href="img/gallery-widget/4.jpg">
                        <div class="overlay"><span><i class="icon-expand"></i></span></div>
                        <img src="img/gallery-widget/th_4.jpg" alt="4"/>
                    </a>
                </div>
                <div class="gallery-item" data-groups='["flash"]' data-src="img/gallery-widget/5.jpg">
                    <a href="img/gallery-widget/5.jpg">
                        <div class="overlay"><span><i class="icon-expand"></i></span></div>
                        <img src="img/gallery-widget/th_5.jpg" alt="5"/>
                    </a>
                </div>
                <div class="gallery-item" data-groups='["flash"]' data-src="img/gallery-widget/6.jpg">
                    <a href="img/gallery-widget/6.jpg">
                        <div class="overlay"><span><i class="icon-expand"></i></span></div>
                        <img src="img/gallery-widget/th_6.jpg" alt="6"/>
                    </a>
                </div>
            </div>
        </div>
    </section>
-->
    @include('front.layouts.partials.cozumortaklari')

</div><!--Page Content Close-->
@stop    
    
