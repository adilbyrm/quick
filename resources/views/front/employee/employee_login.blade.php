@extends('front.layouts.main')

@section('content')

        <!--Page Content-->
<div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li>Login/ register</li>
    </ol><!--Breadcrumbs Close-->

    <!--Login / Register-->
    <section class="log-reg container">
        <h2>Login/ register</h2>
        <p class="large">Use social accounts</p>
        <div class="social-login">
            <a class="facebook" href="#"><i class="fa fa-facebook-square"></i></a>
            <a class="google" href="#"><i class="fa fa-google-plus-square"></i></a>
            <a class="twitter" href="#"><i class="fa fa-twitter-square"></i></a>
        </div>
        <div class="row">
            <!--Login-->
            <div class="col-lg-5 col-md-5 col-sm-5">
                <form method="post" class="login-form">
                    <div class="form-group group">
                        <label for="log-email2">Email</label>
                        <input type="email" class="form-control" name="log-email2" id="log-email2" placeholder="Enter your email" required>
                        <a class="help-link" href="#">Forgot email?</a>
                    </div>
                    <div class="form-group group">
                        <label for="log-password2">Password</label>
                        <input type="text" class="form-control" name="log-password2" id="log-password2" placeholder="Enter your password" required>
                        <a class="help-link" href="#">Forgot password?</a>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                    <input class="btn btn-success" type="submit" value="Login">
                </form>
            </div>
            <!--Registration-->
            <div class="col-lg-7 col-md-7 col-sm-7">
                <form method="post" class="registr-form">
                    <div class="form-group group">
                        <label for="rf-email">Email</label>
                        <input type="email" class="form-control" name="rf-email" id="rf-email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group group">
                        <label for="rf-password">Password</label>
                        <input type="password" class="form-control" name="rf-password" id="rf-password" placeholder="Enter password" required>
                    </div>
                    <div class="form-group group">
                        <label for="rf-password-repeat">Repeat password</label>
                        <input type="password" class="form-control" name="rf-password-repeat" id="rf-password-repeat" placeholder="Repeat password" required>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> I have read and agree with the terms</label>
                    </div>
                    <input class="btn btn-success" type="submit" value="Register">
                </form>
            </div>
        </div>
    </section><!--Login / Register Close-->

    @include('front.layouts.partials.cozumortaklari')

</div><!--Page Content Close-->

@stop