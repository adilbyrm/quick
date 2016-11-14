@extends('front.layouts.main')

@section('content')

<!--Page Content-->
<div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
        <li>İletişim</li>
    </ol><!--Breadcrumbs Close-->

    <div class="container"><h2>İletişim</h2></div>

    <!--Google Map-->
    <section class="map container">
        <iframe src="https://mapsengine.google.com/map/embed?mid=z9oKbgTKTnnE.kA0JHR7kBWYU" width="800" height="400" style="border:0"></iframe>
    </section><!--Google Map Close-->

    <!--Contacts-->
    <section class="container">
        <div class="row">
            <!--Contact Info-->
            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-sm-5">
                <h3>İletişim Bilgileri</h3>
                <div class="cont-info-widget">
                    <ul>
                        <li><i class="fa fa-building"></i>İstoç Toptancılar Çarşısı 15. Ada<br/>No:1-3-5-7 Bağcılar - İstanbul  </li>
                        <li><a href="#"><i class="fa fa-envelope"></i>info[at]reiselektronik.com.tr</a></li>
                        <li><i class="fa fa-phone"></i>(0212) 659 63 20-21</li>
                        <li><i class="fa fa-fax"></i>(0212) 659 63 22</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-7">
                <h3>Buradan bize mesaj gönderebilirsiniz</h3>
                <form class="contact-form ajax-form" method="post">
                    <div class="form-group">
                        <label class="sr-only" for="cf-name">İsim</label>
                        <input type="text" class="form-control" name="name" id="cf-name" placeholder="İsim">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="cf-email">E-posta</label>
                        <input type="email" class="form-control" name="email" id="cf-email" placeholder="E-Posta adresiniz">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="cf-message">Mesajınız</label>
                        <textarea class="form-control" name="message" id="cf-message" rows="5" placeholder="Mesajınız"></textarea>
                    </div>
                    <!-- Validation Response -->
                    <div class="response-holder"></div>
                    <!-- Response End -->
                    <input class="btn btn-primary" type="submit" value="Gönder">
                </form>
            </div>
        </div>
    </section><!--Contacts Close-->

   @include('front.layouts.partials.cozumortaklari')

</div><!--Page Content Close-->
@stop