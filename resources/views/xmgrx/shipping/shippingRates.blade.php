@extends('xmgrx.layouts.main')

@section('panel_content')

    <div id="main" role="main">

        <!-- RIBBON -->
        <div id="ribbon">


            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li>Kargo Firmaları</li>
            </ol>
            <!-- end breadcrumb -->


        </div>
        <!-- END RIBBON -->

        <!-- MAIN CONTENT -->
        <div id="content">

            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark"><i class="fa fa-table fa-fw "></i>
                        {{ $shippingCompany->shipping_company_name }} Oranları
                    </h1>
                </div>
            </div>

            <!-- widget grid -->
            <section id="widget-grid" class="">

                <!-- row -->
                <div class="row">

                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        @if (count($errors))
                            <div class="alert alert-danger fade in">
                                <button class="close" data-dismiss="alert">x</button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('success'))
                        <div class="alert alert-success fade in">
                            <button class="close" data-dismiss="alert">x</button>
                            {{ session()->get('success') }}
                        </div>
                        @endif

                        @if (session()->has('failure'))
                        <div class="alert alert-danger fade in">
                            <button class="close" data-dismiss="alert">x</button>
                            {{ session()->get('failure') }}
                        </div>
                        @endif

                            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">


                                <header>
                                    <h2>{{ $shippingCompany->shipping_company_name }} Fiyatlandırma </h2>
                                </header>

                                <!-- widget div-->

                                <div>
                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->
                                        <input class="form-control" type="text">
                                    </div>
                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body">

                                        <form id="togglingForm" method="post" class="form-horizontal">

                                            <fieldset>
                                                <legend>

                                                </legend>
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">+1 Desi Ücreti <sup>*</sup></label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="_1_desi_ucreti" value="{{ $shippingCompany->shipping_plus_one_per_deci }}" rel="popover-hover" data-placement="top" data-html="true" data-content="Kargo firması için girmiş olduğunuz desi bilgileri 50 Desiye kadar girilebilmektedir. 50'nin üzeri veya girmiş olduğunuz desi miktarının üzerine her +1 desi için eklenecek olan kargo ücreti" />
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Sabit Ucret <sup>*</sup></label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="sabit_ucret" value="{{ $shippingCompany->shipping_fixed_price }}" rel="popover-hover" data-placement="top" data-html="true" data-content="Sabit bir kargo ücreti uygulayacaksanız her sipariş için sabit kargo ücreti girebilirsiniz. Desi bilgilerini kaydetmeniz durumunda desi toplamlarının üzerine sabit ücret eklenecektir." />
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Ücretsiz Kargo <sup>*</sup></label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="ucretsiz_kargo" value="{{ $shippingCompany->shipping_free_shipping_limit }}" rel="popover-hover" data-placement="top" data-html="true" data-content="Alışveriş sepeti toplamı belirlediğiniz Ücretsiz kargo limitini geçtiğinde müşterileriniz ücretsiz kargo hizmetinden faydalanabilirler.<b style=color:red>(Örn: X Lira üzeri ücretsiz Kargo!)</b>" />
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Ücretsiz Desi Limiti <sup>*</sup></label>
                                                    <div class="col-lg-5">
                                                        <input type="text" class="form-control" name="ucretsiz_desi_limiti" value="{{ $shippingCompany->shipping_free_deci_limit }}" rel="popover-hover" data-placement="top" data-html="true" data-content="Ücretsiz kargo miktarı için maksimum ücretsiz desi miktarıdır. Alışveriş sırasındaki desi miktarı ücretsiz desi miktarından fazlaysa, + Desi miktarını sipariş sırasında sistem müşteriden tahsil eder.<b style='color:red'>(Örn: X TL üzeri ücretsiz kargo! Fakat X desiye kadar)</b> Üzeri müşteriden tahsil edilir." />
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <button class="btn btn-default" type="submit">
                                                            <i class="fa fa-eye"></i>
                                                            Oluştur
                                                        </button>
                                                        <a href="{{ route('admin-kargo-firmalari') }}" class="btn btn-danger">
                                                            <i class="fa fa-arrow-left"></i>
                                                            Geri Dön
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            {{ csrf_field() }}
                                        </form>

                                    </div>
                                    <!-- end widget content -->

                                </div>
                                <!-- end widget div -->

                            </div>
                                    <!-- Widget ID (each widget will need unique ID)-->
                            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                                <!-- widget options:
                                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                data-widget-colorbutton="false"
                                data-widget-editbutton="false"
                                data-widget-togglebutton="false"
                                data-widget-deletebutton="false"
                                data-widget-fullscreenbutton="false"
                                data-widget-custombutton="false"
                                data-widget-collapsed="true"
                                data-widget-sortable="false"

                                -->

                                <header>

                                    <div style="margin:6px">{{ $shippingCompany->shipping_company_name }} firmasının bölgelere göre desi düzenlemesi</div>

                                </header>

                                <!-- widget div-->
                                <div>

                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->

                                    </div>
                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body no-padding">

                                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                            <thead>
                                            <tr>
                                                <th data-hide="phone">ID</th>
                                                <th data-class="expand"><i class="text-muted hidden-md hidden-sm hidden-xs"></i> Adı</th>
                                                <th>Durum</th>
                                                <th data-hide="phone,tablet"><i class="txt-color-blue hidden-md hidden-sm hidden-xs"></i> </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{-- */$i=0;/* --}}
                                            {{--@foreach($shippingCompanies as $company)--}}
                                                {{-- */$i++;/* --}}
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            {{--@endforeach--}}
                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- end widget content -->

                                </div>
                                <!-- end widget div -->

                            </div>
                            <!-- end widget -->

                    </article>
                    <!-- WIDGET END -->

                </div>

                <!-- end row -->

            </section>
            <!-- end widget grid -->

        </div>
        <!-- END MAIN CONTENT -->

    </div>

    <!-- Modal ekle -->

@stop

@section('footer_jscript')
    <script type="text/javascript">





        $(document).ready(function() {

            pageSetUp();

            $('#togglingForm').bootstrapValidator({
                feedbackIcons : {
                    valid : 'glyphicon glyphicon-ok',
                    invalid : 'glyphicon glyphicon-remove',
                    validating : 'glyphicon glyphicon-refresh'
                },
                fields : {
                    _1_desi_ucreti : {
                        validators : {
                            notEmpty : {
                                message : '+1 Desi Ücretini giriniz.'
                            },
                            numeric : {
                                message : 'Bir sayı girmelisiniz.'
                            }
                        }
                    },
                    sabit_ucret : {
                        validators : {
                            notEmpty : {
                                message : 'Sabit Ücret giriniz.'
                            },
                            numeric : {
                                message : 'Bir sayı girmelisiniz.'
                            }
                        }
                    },
                    ucretsiz_kargo : {
                        validators : {
                            notEmpty : {
                                message : 'Ücretsiz Kargo Lİmiti giriniz.'
                            },
                            numeric : {
                                message : 'Bir sayı girmelisiniz.'
                            }
                        }
                    },
                    ucretsiz_desi_limiti : {
                        validators : {
                            notEmpty : {
                                message : 'Ücretsiz Desi Limitini giriniz.'
                            },
                            numeric : {
                                message : 'Bir sayı girmelisiniz.'
                            }
                        }
                    }
                }

            }).find('button[data-toggle]').on('click', function() {
                var $target = $($(this).attr('data-toggle'));
                // Show or hide the additional fields
                // They will or will not be validated based on their visibilities
                $target.toggle();
                if (!$target.is(':visible')) {
                    // Enable the submit buttons in case additional fields are not valid
                    $('#form').data('bootstrapValidator').disableSubmitButtons(false);
                }
            });




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
            var responsiveHelper_dt_basic = undefined;
            var responsiveHelper_datatable_fixed_column = undefined;
            var responsiveHelper_datatable_col_reorder = undefined;
            var responsiveHelper_datatable_tabletools = undefined;

            var breakpointDefinition = {
                tablet : 1024,
                phone : 480
            };

            $('#dt_basic').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                        responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_dt_basic.respond();
                }
            });

            /* END BASIC */

            /* COLUMN FILTER  */
            var otable = $('#datatable_fixed_column').DataTable({
                //"bFilter": false,
                //"bInfo": false,
                //"bLengthChange": false
                //"bAutoWidth": false,
                //"bPaginate": false,
                //"bStateSave": true // saves sort state using localStorage
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_datatable_fixed_column) {
                        responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_datatable_fixed_column.respond();
                }

            });

            // custom toolbar
            $("div.toolbar").html('<div class="text-right"><img src="akademilogo.png" alt="Akademi Yazılım" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

            // Apply the filter
            $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

                otable
                        .column( $(this).parent().index()+':visible' )
                        .search( this.value )
                        .draw();

            } );
            /* END COLUMN FILTER */

            /* COLUMN SHOW - HIDE */
            $('#datatable_col_reorder').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_datatable_col_reorder) {
                        responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_datatable_col_reorder.respond();
                }
            });

            /* END COLUMN SHOW - HIDE */

            /* TABLETOOLS */
            $('#datatable_tabletools').dataTable({

                // Tabletools options:
                //   https://datatables.net/extensions/tabletools/button_options
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oTableTools": {
                    "aButtons": [
                        "copy",
                        "csv",
                        "xls",
                        {
                            "sExtends": "pdf",
                            "sTitle": "SmartAdmin_PDF",
                            "sPdfMessage": "SmartAdmin PDF Export",
                            "sPdfSize": "letter"
                        },
                        {
                            "sExtends": "print",
                            "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                        }
                    ],
                    "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
                },
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_datatable_tabletools) {
                        responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_datatable_tabletools.respond();
                }
            });

            /* END TABLETOOLS */

        })

    </script>
@stop