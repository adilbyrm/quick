@extends('xmgrx.layouts.main')

@section('panel_content')
<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>Anasayfa</li>
        </ol>
        <!-- end breadcrumb -->
    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Anasayfa </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                <ul id="sparks" class="">
                    <li class="sparks-info">
                        <h5> Sipariş <span class="txt-color-blue">$47,171</span></h5>
                        <div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
                            1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471, 5000
                        </div>
                    </li>
                    <li class="sparks-info">
                        <h5> Üye <span class="txt-color-greenDark"></i>&nbsp;2447</span></h5>
                        <div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
                            110,150,300,130,400,240,220,310,220,300, 270, 210
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- widget grid -->
        <section id="widget-grid" class="">
            <!-- row -->
            <div class="row">
                <article class="col-sm-12 col-md-12 col-lg-6"></article>
            </div>
            <!-- end row -->
        </section>
        <!-- end widget grid -->
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN PANEL -->
@stop