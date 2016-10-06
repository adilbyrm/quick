<div class="modal fade" id="duzenle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Ürün Seçenek Grupları</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin-secenek-grup-duzenle-p', $optionGroup->id) }}" id="form2" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Adı </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="adi" value="{{ $optionGroup->option_group_name }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Sıra </label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="sira" value="{{ $optionGroup->option_group_order }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label"></label>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary">Düzenle</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>