@extends('xmgrx.layouts.main')

@section('panel_content')

    <div id="main" role="main">

        <!-- RIBBON -->
        <div id="ribbon">


            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li>İçerikler</li>
            </ol>
            <!-- end breadcrumb -->


        </div>
        <!-- END RIBBON -->

        <!-- MAIN CONTENT -->
        <div id="content">

            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text-o fa-fw "></i>
                        Yeni İçerik
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
                            <a href="{{ route('admin-icerikler') }}" class="btn btn-primary"> İçerikler </a>
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
                                <h2>İçerik/Sayfa Ekle </h2>
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

                                    <form id="togglingForm" method="post" class="form-horizontal">

                                        <fieldset>
                                            <legend>

                                            </legend>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Sayfa Adı <sup>*</sup></label>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="sayfa_adi" />
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Sayfa Türü <sup>*</sup></label>
                                                <div class="col-lg-5">
                                                    <select name="sayfa_turu" class="form-control">
                                                        <option value="">Tür Seç</option>
                                                        @foreach($contentCats as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->content_category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Sayfa Url </label>
                                                <div class="col-lg-5">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">/sayfa/</span>
                                                        <input type="text" class="form-control" name="sayfa_url" />
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Durum </label>
                                                <div class="col-lg-5">
                                                    <div class="smart-form">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="sayfa_durum" checked="checked">
                                                            <i style="left:0" data-swchon-text="Aktif" data-swchoff-text="Pasif"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Kısa Açıklama </label>
                                                <div class="col-lg-5">
                                                    <textarea name="kisa_aciklama" id="" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Sayfa Detayı </label>
                                                <div class="col-lg-5">
                                                    <textarea name="sayfa_detay" id="" class="form-control" rows="5"></textarea>
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
                    sayfa_adi : {
                        validators : {
                            notEmpty : {
                                message : 'Sayfa Adını Giriniz'
                            }
                        }
                    },
                    sayfa_turu : {
                        validators : {
                            notEmpty : {
                                message : 'Sayfa Türünü Seçiniz'
                            }
                        }
                    },
                    company : {
                        validators : {
                            notEmpty : {
                                message : 'The company name is required'
                            }
                        }
                    },
                    // These fields will be validated when being visible
                    job : {
                        validators : {
                            notEmpty : {
                                message : 'The job title is required'
                            }
                        }
                    },
                    department : {
                        validators : {
                            notEmpty : {
                                message : 'The department name is required'
                            }
                        }
                    },
                    mobilePhone : {
                        validators : {
                            notEmpty : {
                                message : 'The mobile phone number is required'
                            },
                            digits : {
                                message : 'The mobile phone number is not valid'
                            }
                        }
                    },
                    // These fields will be validated when being visible
                    homePhone : {
                        validators : {
                            digits : {
                                message : 'The home phone number is not valid'
                            }
                        }
                    },
                    officePhone : {
                        validators : {
                            digits : {
                                message : 'The office phone number is not valid'
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