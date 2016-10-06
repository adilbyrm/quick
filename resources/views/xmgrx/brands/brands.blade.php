@extends('xmgrx.layouts.main')

@section('panel_content')

    <div id="main" role="main">

        <!-- RIBBON -->
        <div id="ribbon">


            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li>Markalar</li>
            </ol>
            <!-- end breadcrumb -->


        </div>
        <!-- END RIBBON -->

        <!-- MAIN CONTENT -->
        <div id="content">

            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark"><i class="fa fa-table fa-fw "></i>
                        Markalar
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
                            <a href="{{ route('admin-marka-ekle') }}" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Ekle </a>
                        </p>

                        @if (session()->has('success'))
                            <div class="alert alert-success fade in">
                                <button class="close" data-dismiss="alert">x</button>
                                {{ session()->get('success') }}
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

                                    <div style="margin:6px">Markalar</div>

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
                                                <th data-hide="phone,tablet"><i class="txt-color-blue hidden-md hidden-sm hidden-xs"></i> Sıra</th>
                                                <th data-class="expand"><i class="text-muted hidden-md hidden-sm hidden-xs"></i> Marka Adı</th>
                                                <th data-hide="phone"><i class="text-muted hidden-md hidden-sm hidden-xs"></i> Resim</th>
                                                <th>Durum</th>
                                                <th data-hide="phone,tablet"><i class="txt-color-blue hidden-md hidden-sm hidden-xs"></i> </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{-- */$i=0;/* --}}
                                            @foreach($brands as $brand)
                                                {{-- */$i++;/* --}}
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $brand->brand_order }}</td>
                                                    <td>{{ $brand->brand_name }}</td>
                                                    <td>
                                                        @if( !empty($brand->brand_logo) && file_exists($brandLogoDestination.$brand->brand_logo))
                                                            <a href="javascript:void(0);" rel="tooltip" data-placement="top" data-original-title="<img width='150' src='{{ $brandLogoUrl.$brand->brand_logo }}' class='online' />" data-html="true" class="btn btn-labeled btn-primary"><i class="glyphicon glyphicon-camera"></i></a>
                                                            <a href="javascript:void(0);" onclick="warning('{{ route("admin-marka-logo-sil", [$brand->id, $brand->brand_logo, '_token' => csrf_token() ]) }}', 'Bu resimi kaldırmak istediğinize emin misiniz?')" rel="tooltip" data-placement="top" data-original-title="Resimi Kaldır" class="btn btn-labeled btn-danger"><i class="glyphicon glyphicon-minus-sign"></i></a>
                                                        @endif
                                                        <a href="javascript:void(0);" onclick="imageAdd('{{ route("admin-marka-logo-ekle", $brand->id) }}', '{{ $brand->brand_name }}')" rel="tooltip" data-placement="top" data-original-title="Yeni Resim" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-labeled"><i class="glyphicon glyphicon-plus-sign"></i></a>
                                                    </td>
                                                    <td>
                                                        <div class="smart-form">
                                                            <label class="toggle">
                                                                <input type="checkbox" name="marka_durum" onchange="statusChange(this, '{{ $brand->id }}', 'brand')" {{ $brand->brand_status=='1' ? 'checked="checked"' : '' }}>
                                                                <i style="left:0" data-swchon-text="Aktif" data-swchoff-text="Pasif"></i>
                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('admin-marka-duzenle', $brand->id) }}" rel="tooltip" data-placement="top" data-original-title="Düzenle" class="btn btn-labeled btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
                                                        <a href="javascript:void(0);" onclick="warning('{{ route("admin-marka-sil", [$brand->id, "_token" => csrf_token()]) }}', 'Markayı silmek istediğinize emin misiniz? ')" rel="tooltip" data-placement="top" data-original-title="Markayı Sil" class="btn btn-labeled btn-danger"> <i class="glyphicon glyphicon-trash"></i> </a>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Article Post</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="" id="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="resim" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Ekle
                                </button>
                            </div>
                        </div>
                        {!! csrf_field() !!}
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop

@section('footer_jscript')
    <script type="text/javascript">

        $(document).ready(function() {

            pageSetUp();

            $('#form').bootstrapValidator({
                feedbackIcons : {
                    valid : 'glyphicon glyphicon-ok',
                    invalid : 'glyphicon glyphicon-remove',
                    validating : 'glyphicon glyphicon-refresh'
                },
                fields : {
                    resim : {
                        validators : {
                            notEmpty : {
                                message : 'Resim seçiniz'
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