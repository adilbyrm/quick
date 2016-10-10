@extends('front.layouts.main')

@section('content')

        <!--Page Content-->
<div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="/">Anasayfa</a></li>
        <li>Giriş</li>
    </ol><!--Breadcrumbs Close-->

    <!--Login / Register-->
    <section class="log-reg container">
        
        <h2>Giriş</h2>
        <div class="row">
            <!--Login-->
            <div class="col-lg-5 col-md-5 col-sm-5">
                @if(session()->has('failure'))
                    <div class="alert alert-danger">{{session()->get('failure')}}</div>
                @endif
                <form class="login-form" method="POST" action="{{route('dealer.login.p')}}">
                    <div class="form-group group">
                        <label for="log-email2">E-posta</label>
                        <input type="email" class="form-control" name="log_email" id="log-email2" placeholder="E-posta Adresiniz" required>
                    </div>
                    <div class="form-group group">
                        <label for="log-password2">Şifre</label>
                        <input type="password" class="form-control" name="log_password" id="log-password2" placeholder="Şifreniz" required>
                    </div>
                    
                    <input class="btn btn-success" type="submit" value="Giriş">
                    {{ csrf_field() }}
                </form>
            </div>
            <!--Registration-->
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="registr-form" style="min-height:287px;text-align:center;padding-top:90px">
                    <h1>Bayimiz değilseniz <a href="{{route('dealer.request')}}">buradan</a> bayilik isteği oluşturabilirsiniz.</h1>
                </div>
            </div>
        </div>
    </section><!--Login / Register Close-->

    @include('front.layouts.cozumortaklari')

</div><!--Page Content Close-->

@stop