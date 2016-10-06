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
                        Yeni Marka
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
                            <a href="{{ route('admin-markalar') }}" class="btn btn-primary"> Markalar </a>
                        </p>
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget" id="wid-id-5" data-widget-colorbutton="false"	data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
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
                                <h2>Marka Ekle </h2>
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

                                    @if (count($errors))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    @if (session()->has('failure'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('failure') }}
                                        </div>
                                    @endif

                                    <form id="togglingForm" method="post" class="form-horizontal" enctype="multipart/form-data">

                                        <fieldset>
                                            <legend>

                                            </legend>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Marka Adı <sup>*</sup></label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="marka_adi" />
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Resim </label>
                                                <div class="col-lg-5">
                                                    <input type="file" class="form-control" name="resim" />
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Durum </label>
                                                <div class="col-lg-5">
                                                    <div class="smart-form">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="marka_durum" checked="checked">
                                                            <i style="left:0" data-swchon-text="Aktif" data-swchoff-text="Pasif"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Sıra </label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="sira" />
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Keywords </label>
                                                <div class="col-lg-5">
                                                    <input name="keywords" class="form-control tagsinput" value="" data-role="tagsinput" style="display: none;">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Description </label>
                                                <div class="col-lg-5">
                                                    <textarea name="description" id="" class="form-control" rows="5"></textarea>
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

@stop

@section('footer_jscript')
    <script type="text/javascript">




        $(document).ready(function() {

            pageSetUp();

            // toggle form

            $('#togglingForm').bootstrapValidator({
                feedbackIcons : {
                    valid : 'glyphicon glyphicon-ok',
                    invalid : 'glyphicon glyphicon-remove',
                    validating : 'glyphicon glyphicon-refresh'
                },
                fields : {
                    marka_adi : {
                        validators : {
                            notEmpty : {
                                message : 'Marka Adı giriniz'
                            }
                        }
                    },

                    sira : {
                        validators : {
                            digits : {
                                message : 'Bir sayı giriniz.'
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
                    $('#togglingForm').data('bootstrapValidator').disableSubmitButtons(false);
                }
            });

            // end toggle form



        })

    </script>
@stop