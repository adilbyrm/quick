@extends('front.layouts.main')

@section('content')
<!--Page Content-->
<div class="page-content">

    <!--Breadcrumbs-->
    <ol class="breadcrumb">
        <li><a href="{{ route('homepage') }}">Anasayfa</a></li>
        <li>Satış Ekranı</li>
    </ol><!--Breadcrumbs Close-->

    <!--Orders History-->
    <section class="order-history extra-space-bottom">
        <div class="col-md-10 col-lg-10 col-sm-10">
            <div class="inner">
            	<div class="panel panel-default"><div class="panel-heading" style="text-align:center">Seçilen Ürünler</div></div>
                <table class="table-bordered">
                    <tbody>
	                    <tr>
	                        <th>Barkodu</th>
	                        <th>Ürün Adı</th>
	                        <th>Markası</th>
	                        <th>Reyonu</th>
	                        <th>Miktarı</th>
	                        <th>Birimi</th>
	                        <th>Fiyatı</th>
	                        <th>Tutarı</th>
	                    </tr>
	                    <script type="text/javascript">
	                    	for(var i=0; i<20; i++){
	                    		document.write("<tr>" + "<td>&nbsp;</td>".repeat(8) + "</tr>");
	                    	}
	            		</script>
                    
                    </tbody>
                </table>
            </div>

            

            <div class="bottom-field" style="margin-top:20px">
            	<div class="col-md-4 col-lg-4 col-sm-4">a</div>
            	<div class="col-md-2 col-lg-2 col-sm-2">b</div>
            	<div class="col-md-2 col-lg-2 col-sm-2">c</div>
            	<div class="col-md-4 col-lg-4 col-sm-4">d</div>
            </div>

           <div style="clear:both"></div>
            
            <div class="" style="margin-top:20px">
            	<div class="col-md-12 col-lg-6 col-sm-12" style="padding:0">
            		<div class="panel panel-default">
            			<div class="panel-heading" style="text-align:center">Fiş Bilgileri</div>
		                <div class="panel-body" style="padding:0">
			                <table class="table-bordered">
			                    <tbody>
				                    <tr>
				                        <td>CH Numarası / Adı</td>
				                        <td></td>
				                    </tr>
				                    <tr>
				                        <td>CH Bakiyesi</td>
				                        <td></td>
				                    </tr>
				                    <tr>
				                        <td>CH Limiti</td>
				                        <td></td>
				                    </tr>
				                    <tr>
				                        <td>Personel Numarası / Adı</td>
				                        <td></td>
				                    </tr>
				                    <tr>
				                        <td>Fiş Numarası</td>
				                        <td></td>
				                    </tr>
			                    	<tr>
				                        <td>Fiş Tarihi / Saati</td>
				                        <td></td>
				                    </tr>
			                    </tbody>
			                </table>
		                </div>
	                </div>
            	</div>
            	<div class="col-md-6 col-lg-3 col-sm-6">
            		<div class="panel panel-default">
            			<div class="panel-heading" style="text-align:center">KDV Dağılımları</div>
		                <div class="panel-body" style="padding:0">
			                <table class="table-bordered">
			                    <tbody>
				                    <tr>
				                        <th>KDV</th>
				                        <th>Tutar</th>
				                        <th>KDV Tutarı</th>
				                    </tr>
				                    <script type="text/javascript">
				                    	for(var i=0; i<5; i++){
				                    		document.write("<tr>" + "<td>&nbsp;</td>".repeat(3) + "</tr>");
				                    	}
				            		</script>
			                    
			                    </tbody>
			                </table>
		                </div>
	                </div>
            	</div>
            	<div class="col-md-6 col-lg-3 col-sm-6">
            		<div class="panel panel-default">
            			<div class="panel-heading" style="text-align:center">İşlemler</div>
		                <div class="panel-body islemler" style="text-align:center">
			                <a alt="Çarp" title="Çarp" href="javascript:;" class="btn btn-default btn-xs">X</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">7</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">8</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">9</a><br>
			                <a alt="Giriş (Enter)" title="Giriş (Enter)" href="javascript:;" class="btn btn-success btn-xs">--</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">4</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">5</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">6</a><br>
			                <a href="javascript:;" class="btn btn-danger  btn-xs">Sil</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">1</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">2</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">3</a><br>
			                <a alt="Ekranı Temizle" title="Ekranı Temizle" href="javascript:;" class="btn btn-primary btn-xs">C</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">,</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">0</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">İ</a><br>
			                <a href="javascript:;" class="btn btn-primary btn-xs">N</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">K</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">T</a>
			                <a href="javascript:;" class="btn btn-primary btn-xs">V</a>
		                </div>
	                </div>
            	</div>
            </div>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-2">
            <div class="inner">
            	<div class="panel panel-default"><div class="panel-heading" style="text-align:center">Ürün Kısayolları</div></div>
                <table class="table-bordered">
                    <tbody>
                    <tr>
                        <th>No</th>
                        <th>Ürün Adı</th>
                        <th>Fiyatı</th>
                    </tr>
                    <script type="text/javascript">
                    	for(var i=0; i<36; i++){
                    		document.write("<tr>" + "<td>&nbsp;</td>".repeat(3) + "</tr>");
                    	}
            		</script>
                    
                    </tbody>
                </table>
            </div>
        </div>
        <div style="clear:both"></div>
    </section><!--Orders History Close-->
</div><!--Page Content Close-->
<style type="text/css">
	.order-history table { font-size:14px!important; }
	.order-history table th { padding:1px 5px!important; border-radius:0!important;font-weight:normal!important; }
	.order-history table td:first-child { border-left:none!important; }
	.order-history table td:last-child { border-right:none!important; }
	.order-history table td { padding:0px 5px!important; }
	.order-history table { min-width:auto!important; }
	.order-history .bottom-field > div { height:100px;border:3px solid #ddd; display:flex;align-items:center;justify-content:center; border-width: 6px 3px 6px 3px }
	.order-history .bottom-field > div:first-child { border-left-width: 6px }
	.order-history .bottom-field > div:last-child { border-right-width: 6px }
	.islemler > a { display:inline-block; width:36px; height:25px;text-align: center; margin-bottom:10px; padding:2px 10px!important; }
	@media all and (min-width: 1200px) {
		.islemler > a {
			
		}
	}
</style>
@stop