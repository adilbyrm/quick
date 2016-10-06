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
                        Kargo Firmaları
                    </h1>
                </div>
            </div>

            <!-- widget grid -->
            <section id="widget-grid" class="">

                <!-- row -->
                <div class="row">

                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <p>
                            <a href="#" data-toggle="modal" data-target="#ekle" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Ekle </a>
                        </p>
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

                                    <div style="margin:6px">Kargo Firmaları</div>

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
                                            @foreach($shippingCompanies as $company)
                                                {{-- */$i++;/* --}}
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $company->shipping_company_name }}</td>
                                                    <td>
                                                        <div class="smart-form">
                                                            <label class="toggle">
                                                                <input type="checkbox" name="" onchange="statusChange(this, '{{ $company->id }}', 'shippingCompany')" {{ $company->shipping_company_status=='1' ? 'checked="checked"' : '' }}>
                                                                <i style="left:0" data-swchon-text="Aktif" data-swchoff-text="Pasif"></i>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin-kargo-oranlari-duzenle', $company->id) }}" rel="tooltip" data-placement="top" data-original-title="Kargo Oranlarını Düzenle" class="btn btn-labeled btn-primary"> <i class="glyphicon glyphicon-pencil"></i> </a>
                                                        <a href="javascript:void(0)" onclick="editShippingCompany('{{ $company->id }}')"  rel="tooltip" data-placement="top" data-original-title="Kargo Firmasını Düzenle" class="btn btn-labeled btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
                                                        <a href="javascript:void(0)"
                                                           onclick="warning('{{ route("admin-kargo-firma-sil", [$company->id, "_token" => csrf_token()]) }}', 'Kargo firmasını silmek istediğinizden emin misiniz?')"
                                                           rel="tooltip" data-placement="top" data-original-title="Firmayı Sil"
                                                           class="btn btn-labeled btn-danger"><i class="glyphicon glyphicon-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
    <div class="modal fade" id="ekle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Yeni Firma Ekle</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin-kargo-firma-ekle-p') }}" id="form" class="form-horizontal">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Firma İsmi </label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="firma_adi" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Alıcı Ödemeli Kargo </label>
                                    <div class="col-lg-5">
                                        <div class="smart-form">
                                            <label class="toggle">
                                                <input type="checkbox" name="alici_odemeli_kargo">
                                                <i style="left:0" data-swchon-text="Aktif" data-swchoff-text="Pasif"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5>Kapıda Ödeme</h5>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Minimum Kullanım Limiti </label>
                                    <div class="col-lg-7">
                                        <input type="text" value="0.00" class="form-control" name="min_kullanim_limiti" rel="tooltip" data-placement="top" data-original-title="Kapıda Ödeme Kullanımı için gereken minimum sepet tutarı. Kullanılmayacaksa 0.00 olarak kalmalıdır." />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Maksimum Kullanım Limiti </label>
                                    <div class="col-lg-7">
                                        <input type="text" value="0.00" class="form-control" name="max_kullanim_limiti" rel="tooltip" data-placement="top" data-original-title="Kapıda Ödeme Kullanımı için gereken maksimum sepet tutarı. Kullanılmayacaksa 0.00 olarak kalmalıdır."  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Kapıda Nakit Ödeme Kullanımı </label>
                                    <div class="col-lg-5">
                                        <div class="smart-form">
                                            <label class="toggle">
                                                <input type="checkbox" name="kapida_nakit">
                                                <i style="left:0" data-swchon-text="Aktif" data-swchoff-text="Pasif"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Kapıda Nakit Ödeme Ücreti </label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="kapida_nakit_ucreti" value="0.00" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Kapıda Kredi Kartı Ödeme Kullanımı </label>
                                    <div class="col-lg-5">
                                        <div class="smart-form">
                                            <label class="toggle">
                                                <input type="checkbox" name="kapida_kredi">
                                                <i style="left:0" data-swchon-text="Aktif" data-swchoff-text="Pasif"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label">Kapıda Kredi Kartı Ödeme Ücreti </label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="kapida_kredi_ucreti" value="0.00" />
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-lg-5 control-label"></label>
                                    <div class="col-lg-7">
                                        <button type="submit" class="btn btn-primary">Ekle</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! csrf_field() !!}
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="getModal"></div>

@stop

@section('footer_jscript')
    <script type="text/javascript">



        function editShippingCompany(ID) {

            $.post('{{ route("admin-kargo-firma-duzenle") }}', {ID:ID}, function(resp) {
                if(!resp.length){
                    alert();
                    return false;
                }
                $('#getModal').html(resp);
                $('#duzenle').modal('show');
                $('#form2').bootstrapValidator({
                    fields : {
                        firma_adi : {
                            validators : {
                                notEmpty : {
                                    message : 'Firma Adı giriniz.'
                                }
                            }
                        },
                        min_kullanim_limiti : {
                            validators : {
                                numeric : {
                                    message : 'Bir sayı girmelisiniz.'
                                }
                            }
                        },
                        max_kullanim_limiti : {
                            validators : {
                                numeric : {
                                    message : 'Bir sayı girmelisiniz.'
                                }
                            }
                        },
                        kapida_nakit_ucreti : {
                            validators : {
                                numeric : {
                                    message : 'Bir sayı girmelisiniz.'
                                }
                            }
                        },
                        kapida_kredi_ucreti : {
                            validators : {
                                numeric : {
                                    message : 'Bir sayı girmelisiniz.'
                                }
                            }
                        }
                    }
                });
                $('#duzenle').on('hidden.bs.modal', function (e) {
                    $('#getModal').html('');
                })
            });

        }

        $(document).ready(function() {

            pageSetUp();

            $('#form').bootstrapValidator({
                feedbackIcons : {
                    valid : 'glyphicon glyphicon-ok',
                    invalid : 'glyphicon glyphicon-remove',
                    validating : 'glyphicon glyphicon-refresh'
                },
                fields : {
                    firma_adi : {
                        validators : {
                            notEmpty : {
                                message : 'Firma Adı giriniz.'
                            }
                        }
                    },
                    min_kullanim_limiti : {
                        validators : {
                            numeric : {
                                message : 'Bir sayı girmelisiniz.'
                            }
                        }
                    },
                    max_kullanim_limiti : {
                        validators : {
                            numeric : {
                                message : 'Bir sayı girmelisiniz.'
                            }
                        }
                    },
                    kapida_nakit_ucreti : {
                        validators : {
                            numeric : {
                                message : 'Bir sayı girmelisiniz.'
                            }
                        }
                    },
                    kapida_kredi_ucreti : {
                        validators : {
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