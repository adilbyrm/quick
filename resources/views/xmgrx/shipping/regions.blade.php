@extends('xmgrx.layouts.main')

@section('panel_content')

    <div id="main" role="main">

        <!-- RIBBON -->
        <div id="ribbon">


            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li>Teslimat Bölgeleri</li>
            </ol>
            <!-- end breadcrumb -->


        </div>
        <!-- END RIBBON -->

        <!-- MAIN CONTENT -->
        <div id="content">

            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text-o fa-fw "></i>
                        Teslimat Bölgeleri
                    </h1>
                </div>
            </div>

            <!-- widget grid -->
            <section id="widget-grid" class="">

                <!-- row -->
                <div class="row">

                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-md-3">
                            <p>
                                <a href="{{ route('admin-default-cities', ['_token' => csrf_token()]) }}" class="btn btn-primary"> İlk Haline Getir </a>
                            </p>
                        </div>
                        <div style="clear:both"></div>
                        <form id="togglingForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @foreach($regions as $region)
                            <div class="col-md-3">
                                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" >
                                    <header><div style="margin:6px;padding-left:8px">{{ $region->region_name }} Bölgesi</div></header>
                                    <div>
                                        <div class="widget-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <select multiple name="cities{{$region->id}}[]" id="cities{{$region->id}}" style="height:220px" class="form-control custom-scroll">
                                                            @foreach($region->citiesOfRegion as $city)
                                                                <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-7 col-lg-7 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="col-lg-12">
                                                                <select name="regions{{$region->id}}" id="regions{{$region->id}}" class="form-control">
                                                                    @foreach($regions as $region2)
                                                                        @if($region->id != $region2->id)
                                                                            <option value="{{ $region2->id }}">{{ $region2->region_name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <a hre="javascript:void(0)" onclick="return moveCities({{ $region->id }})" class="btn btn-primary" type="submit">
                                                            <i class="fa fa-share-square-o"></i>
                                                            Bölgesine Taşı
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {!! csrf_field() !!}
                        </form>
                    </article>
                    <!-- WIDGET END -->

                </div>

                <!-- end row -->

            </section>
            <!-- end widget grid -->

        </div>
        <!-- END MAIN CONTENT -->

    </div>



@stop

@section('footer_jscript')
    <script type="text/javascript">
        function moveCities(id) {
            from = $('#cities'+id);
            selectedRegion = $('#regions'+id).val();
            to = $('#cities'+selectedRegion);
            var opt = from.find(':selected');
            cityValues = from.val();
            for(i=0; i<opt.length; i++) {
                temp = opt[i];
                opt[i].remove();
                to.append(temp);
            }

            if(opt.length) {
                console.log(cityValues+" "+selectedRegion);
                data = {cityValues:cityValues, selectedRegion:selectedRegion};

                $.post('{{ route("admin-sehir-tasi") }}', data);
            }


            return false;
        }

        $(document).ready(function() {

            pageSetUp();






            /* // DOM Position key index //

             l - Length changing (dropdown)
             f - Filtering input (search)
             t - The Table! (datatable)
             i - Information (records)
             p - Pagination (paging)
             r - pRocessing
             < and > - div elements
             <"#id" and > - div with an id
             <"class" and > - div with a class
             <"#id.class" and > - div with an id and class

             Also see: http://legacy.datatables.net/usage/features
             */

            /* BASIC ;*/


        })

    </script>
@stop