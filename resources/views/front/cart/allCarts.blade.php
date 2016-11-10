@extends('front.layouts.main')

@section('content')
<!--Page Content-->
<div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
        <li>Sepetim</li>
    </ol><!--Breadcrumbs Close-->

    <!--Shopping Cart-->
    <div id="all-cart">
        <div id="loader" class="loader loader-default is-active" half></div>
    </div>
    
    <script type="text/javascript">
        $('.cart-btn').remove();
        $(function() {
            allCart();
        })
    </script>

    @include('front.layouts.partials.cozumortaklari')

</div><!--Page Content Close-->
@stop