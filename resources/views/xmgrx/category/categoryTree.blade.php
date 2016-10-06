@extends('xmgrx.layouts.main')

@section('panel_content')

    <div id="main" role="main">

        <!-- RIBBON -->
        <div id="ribbon">


            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li>Kategeori Ağacı</li>
            </ol>
            <!-- end breadcrumb -->


        </div>
        <!-- END RIBBON -->

        <!-- MAIN CONTENT -->
        <div id="content">

            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark"><i class="fa fa-indent fa-fw "></i>
                        Kategori Ağacı
                    </h1>
                </div>
            </div>

            <!-- widget grid -->
            <section id="widget-grid" class="">

                <!-- row -->
                <div class="row">

                    <!-- NEW WIDGET START -->
                    <article class="col-sm-12">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget well" id="wid-id-0">

                            <header>
                                <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                                <h2>My Data </h2>
                            </header>
                            <!-- widget div-->
                            <div>

                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">
                                    <!-- This area used as dropdown edit box -->

                                </div>
                                <!-- end widget edit box -->

                                <!-- widget content -->
                                <div class="widget-body">

                                    <div id="nestable-menu">
                                        <button type="button" class="btn btn-default" data-action="expand-all">
                                            Tümünü Aç
                                        </button>
                                        <button type="button" class="btn btn-default" data-action="collapse-all">
                                            Tümünü Kapat
                                        </button>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6 col-lg-4">

                                            <h6>Kategori ağacını sürükle/bırak yöntemiyle yapılandırabilirsiniz.</h6>

                                            <div class="dd" id="nestable">
                                                <ol class="dd-list">
                                                    {!! $tree !!}
                                                </ol>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-4">
                                            <p></p>
                                            <p><a href="javascript:void(0)" id="kaydet" class="btn btn-primary">Kaydet</a><span id="treeResp"></span></p>
                                        </div>
                                    </div>
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

                <!-- row -->

                <!-- end row -->

            </section>
            <!-- end widget grid -->

        </div>
        <!-- END MAIN CONTENT -->

    </div>

@stop

@section('footer_jscript')
    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            pageSetUp();

            // PAGE RELATED SCRIPTS

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // activate Nestable for list 1
            $('#nestable').nestable({
                group : 1,
                maxDepth : 10
            });

            // surukle birak ile duzenlenen kategori agacini kaydet.
            $('#kaydet').click(function() {
                var e = $('#nestable').data('output', $('#nestable-output'));
                var list = e.length ? e : $(e.target), output = list.data('output');
                if (window.JSON) {
                    // var tree = window.JSON.stringify(list.nestable('serialize'));
                    var tree = list.nestable('serialize');
                    $.post('{{ route("admin-kategoriAgaci-duzenle") }}', {tree}, function(resp) {
                        $('#treeResp').fadeIn().html('<span style="color:green"> Kategoriler düzenlenmiştir.</span>')
                                                .delay(3000)
                                                .fadeOut(300, function() { $(this).find('span').remove(); });
                    })
                } else {
                    alert('Bunun için JSON destekleyen bir tarayıcı gerekmektedir.');
                }

            })



            $('#nestable-menu').on('click', function(e) {
                var target = $(e.target), action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });
        })

    </script>
@stop