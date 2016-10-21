<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <base href="{{url('/resources/assets/front')}}/" />
    <title>Reis Elektronik A.Ş</title>
    <!--SEO Meta Tags-->
    <meta name="description" content="Reis Elektronik A.Ş" />
    <meta name="keywords" content="Reis Elektronik A.Ş" />
    <meta name="author" content="Akademi Yazılım" />
    <!--Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!--Favicon-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!--Master Slider Styles-->
    <link href="masterslider/style/masterslider.css" rel="stylesheet" media="screen">
    <!--Styles-->
    <link href="css/styles.css" rel="stylesheet" media="screen">
    <!--sweet alert-->
    <link href="css/sweetalert.css" rel="stylesheet" media="screen">
    <!--Color Scheme-->
    <link class="color-scheme" href="css/colors/color-default.css" rel="stylesheet" media="screen">
    <!--Color Switcher-->
    <link href="color-switcher/color-switcher.css" rel="stylesheet" media="screen">
    <!--Modernizr-->
    <script src="js/libs/modernizr.custom.js"></script>

    <script src="js/libs/jquery-1.11.1.min.js"></script>
    <script src="js/libs/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="js/libs/jquery.easing.min.js"></script>
    <script src="js/plugins/sweetalert.min.js"></script>
    <!--Adding Media Queries Support for IE8-->
    <!--[if lt IE 9]>
    <script src="js/plugins/respond.js"></script>
    <![endif]-->
    <style type="text/css">
        a.href-disabled { pointer-events: none; cursor: default; }
    </style>
</head>

<!--Body-->
<body>

@if(session()->has('failure'))
    <script>
        swal({
            title: "",
            text: "{{ session()->get('failure') }}",
            type: "error",
            confirmButtonText: "Tamam",
            html: true
        })
    </script>
@endif
@if(session()->has('success'))
    <script>
        swal({
            title: "",
            text: "{{ session()->get('success') }}",
            type: "success",
            confirmButtonText: "Tamam",
            html: true
        })
    </script>
@endif

@if(Route::getFacadeRoot()->current()->uri() != 'dealer-login')
    @if(auth()->guard('user')->guest())
    <!--Login Modal-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h2>Bayimiz değilseniz <a href="{{route('dealer.request')}}">buradan</a> bayilik isteği oluşturabilirsiniz.</h2>
                </div>
                <div class="modal-body">
                    <form class="login-form" method="POST" action="{{route('dealer.login.p')}}">
                        <div class="form-group group">
                            <label for="log-email">E-posta</label>
                            <input type="email" class="form-control" name="log_email" id="log-email" placeholder="E-posta Adresiniz" required>
                        </div>
                        <div class="form-group group">
                            <label for="log-password">Şifre</label>
                            <input type="password" class="form-control" name="log_password" id="log-password" placeholder="Şifreniz" required>
                        </div>
                        
                        <input class="btn btn-success" type="submit" value="Giriş">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endif
@endif
<!--Header-->
<header data-offset-top="500" data-stuck="600"><!--data-offset-top is when header converts to small variant and data-stuck when it becomes visible. Values in px represent position of scroll from top. Make sure there is at least 100px between those two values for smooth animation-->

    <!--Search Form-->
    <form class="search-form closed" method="get" role="form" autocomplete="off">
        <div class="container">
            <div class="close-search"><i class="icon-delete"></i></div>
            <div class="form-group">
                <label class="sr-only" for="search-hd">Ürün arayın...</label>
                <input type="text" class="form-control" name="search-hd" id="search-hd" placeholder="Ürün arayın...">
                <button type="submit"><i class="icon-magnifier"></i></button>
            </div>
        </div>
    </form>

    <!--Split Background-->
    <div class="left-bg"></div>
    <div class="right-bg"></div>

    <div class="container">
        <a class="logo" href="{{url('/')}}"><img src="img/logo.png" alt="Reis Elektronik A.Ş"/></a>

        <!--Language / Currency Switchers-->
        <ul class="switchers">
            <li>$
                <ul class="dropdown">
                    <li><a href="#">&euro;</a></li>
                    <li><a href="#">$</a></li>
                </ul>
            </li>
            <li>En
                <ul class="dropdown">
                    <li><a href="#">En</a></li>
                    <li><a href="#">Fr</a></li>
                    <li><a href="#">Gr</a></li>
                </ul>
            </li>
        </ul>

        <!-- top menu -->
        @include('front.layouts.partials.topmenu')

        <!--Toolbar-->
        <div class="toolbar group">
            <button class="search-btn btn-outlined-invert"><i class="icon-magnifier"></i></button>
            <div class="middle-btns">
                <a class="btn-outlined-invert" href="{{route('dealer.profile')}}"><i class="icon-setting-2"></i> <span>Hesabım</span></a>
                @if(auth()->guard('user')->guest())
                <a class="login-btn btn-outlined-invert" href="#" data-toggle="modal" data-target="#loginModal"><i class="icon-profile"></i> <span>Giriş</span></a>
                @else
                <a class="login-btn btn-outlined-invert" href="{{route('dealer.logout')}}"><i class="icon-profile"></i> <span>Çıkış</span></a>
                @endif
            </div>
            <div class="cart-btn">
                
                <!--##############################################
                ################# top box ########################
                ###############################################-->
                {{-- @include('front.layouts.partials.topBox') --}}
                <!--##############################################
                ################# /top box #######################
                ###############################################-->

            </div>
        </div><!--Toolbar Close-->
    </div>
</header><!--Header Close-->


<!--##############################################
################# CONTENT ########################
###############################################-->
@yield('content')
<!--##############################################
################# /CONTENT #######################
###############################################-->

<!--Sticky Buttons-->
<div class="sticky-btns">
    <form class="quick-contact ajax-form" method="post" name="quick-contact">
        <h3>Bize İletin...</h3>
        <p class="text-muted">Her türlü görüş ve önerilerinizi bize iletebilirsiniz.</p>
        <div class="form-group">
            <label for="qc-name">Adınız Soyadınız</label>
            <input class="form-control input-sm" type="text" name="name" id="qc-name" placeholder="Adınız Soyadınız" required>
        </div>
        <div class="form-group">
            <label for="qc-email">E-posta</label>
            <input class="form-control input-sm" type="email" name="email" id="qc-email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="qc-message">Mesajınız</label>
            <textarea class="form-control input-sm" name="message" id="qc-message" placeholder="İletmek istediğiniz mesajı yazınız" required></textarea>
        </div>
        <!-- Validation Response -->
        <div class="response-holder"></div>
        <!-- Response End -->
        <input class="btn btn-success btn-sm btn-block" type="submit" value="Gönder">
    </form>
    <span id="qcf-btn"><i class="fa fa-envelope"></i></span>
    <span id="scrollTop-btn"><i class="fa fa-chevron-up"></i></span>
</div><!--Sticky Buttons Close-->

<!--Subscription Widget-->
<section class="subscr-widget">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-8 col-sm-8">
                <h2 class="light-color">Bültenimize abone olun</h2>

                <!--Mail Chimp Subscription Form-->
                <form class="subscr-form" role="form" action="" target="_blank" method="post" autocomplete="off">
                    <div class="form-group">
                        <label class="sr-only" for="subscr-name">Adınız</label>
                        <input type="text" class="form-control" name="FNAME" id="subscr-name" placeholder="Adınızı giriniz" required>
                        <button class="subscr-next"><i class="icon-arrow-right"></i></button>
                    </div>
                    <div class="form-group fff" style="display: none">
                        <label class="sr-only" for="subscr-email">E-posta</label>
                        <input type="email" class="form-control" name="EMAIL" id="subscr-email" placeholder="E-posta adresinizi giriniz" required>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;"><input type="text" name="b_168a366a98d3248fbc35c0b67_d704057a31" tabindex="-1" value=""></div>
                        <button type="submit" id="subscr-submit"><i class="icon-check"></i></button>
                    </div>
                </form>
                <!--Mail Chimp Subscription Form Close-->
                <p class="p-style2">Gerekli alanları doldurunuz</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1">
                <p class="p-style3">Ürünlerimizle ilgili gelişmelerden, kampanyalardan ve duyurulardan haberdar olmak için bültenimize üye olabilirsiniz.</p>
            </div>
        </div>
    </div>
</section><!--Subscription Widget Close-->

<!--Footer-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="info">
                    <a class="logo" href="{{url('/')}}"><img src="img/logo.png" alt="Reis Elektronik A.Ş"/></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    <div class="social">
                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube-square"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-tumblr-square"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-vimeo-square"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-pinterest-square"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h2>Latest news</h2>
                <ul class="list-unstyled">
                    <li>25 May <a href="#">Nemo enim ipsam voluptatem</a></li>
                    <li>01 May <a href="#">Neque porro quisquam est</a></li>
                    <li>16 Apr <a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li>10 Jan <a href="#">Sed ut perspiciatis unde</a></li>
                </ul>
            </div>
            <div class="contacts col-lg-3 col-md-3 col-sm-3">
                <h2>İletişim Bilgileri</h2>
                <p class="p-style3">
                    4120 Lenox Avenue, New York, NY,<br/>
                    10035 76 Saint Nicholas Avenue<br/>
                    <a href="mailto:mail@bushido.com">mail@bushido.com</a><br/>
                    +48 543765234<br/>
                    +48 555 234 54 34<br/>
                </p>
            </div>
        </div>
        <div class="copyright">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <p>&copy; {{Date('Y')}} Reis Elektronik A.Ş. Tüm hakları saklıdır. by Akademi Yazılım</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="payment">
                        <img src="img/payment/visa.png" alt="Visa"/>
                        <img src="img/payment/paypal.png" alt="PayPal"/>
                        <img src="img/payment/master.png" alt="Master Card"/>
                        <img src="img/payment/discover.png" alt="Discover"/>
                        <img src="img/payment/amazon.png" alt="Amazon"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><!--Footer Close-->



<!--Javascript (jQuery) Libraries and Plugins-->

<script src="js/plugins/bootstrap.min.js"></script>
<script src="js/plugins/smoothscroll.js"></script>
<script src="js/plugins/jquery.validate.min.js"></script>
<script src="js/plugins/icheck.min.js"></script>
<script src="js/plugins/jquery.placeholder.js"></script>
<script src="js/plugins/jquery.stellar.min.js"></script>
<script src="js/plugins/jquery.touchSwipe.min.js"></script>
<script src="js/plugins/jquery.shuffle.min.js"></script>
<script src="js/plugins/lightGallery.min.js"></script>
<script src="js/plugins/owl.carousel.min.js"></script>
<script src="js/plugins/masterslider.min.js"></script>
<script src="mailer/mailer.js"></script>
<script src="js/scripts.js"></script>
<script src="color-switcher/color-switcher.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    // single product add
    function addToCart(elem, prodcutID) {
        $.ajax({
            url: '{{ route("add-to-cart") }}',
            method: "POST",
            data: {prodcutID: prodcutID},
            beforeSend: function() {
                $(elem).addClass('href-disabled')
            },
            complete: function() {
                $(elem).removeClass('href-disabled');
                getTopBox();
            },
            success: function(resp) {
                swal({
                    title: "",
                    text: resp.message,
                    type: resp.type,
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        }).fail(function(xhr, status, error) {
            swal({
                title: "",
                text: xhr.responseText,
                type: "error",
                confirmButtonText: "Tamam"
            })
        })
    }
    // /single product add

    // get top menu box
    function getTopBox() {
        $.post('{{ route("get-top-menu-box") }}', function(resp) {
            $(".cart-btn").html(resp);
        })
    }
    getTopBox();
    // /get top menu box

    // one cart delete
    function deleteTheCart(elem) {
        var cartID = $(elem).data('id');
        $.post('{{ route("delete-the-cart") }}', {cartID: cartID}, function(resp) {
            getTopBox();
        })
    }
    // one cart delete
</script>

</body><!--Body Close-->
</html>