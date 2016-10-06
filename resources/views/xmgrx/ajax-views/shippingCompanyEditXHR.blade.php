<div class="modal fade" id="duzenle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Ürün Özellik Grupları</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin-kargo-firma-duzenle-p', $shippingCompany->id) }}" id="form2" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Firma İsmi </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="firma_adi" value="{{ $shippingCompany->shipping_company_name }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Alıcı Ödemeli Kargo </label>
                                <div class="col-lg-5">
                                    <div class="smart-form">
                                        <label class="toggle">
                                            <input type="checkbox" name="alici_odemeli_kargo" {{ $shippingCompany->shipping_pay_buyer=='1' ? 'checked="checked"' : '' }}>
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
                                    <input type="text" value="{{ $shippingCompany->shipping_min_limit_for_cod }}" class="form-control" name="min_kullanim_limiti" rel="tooltip" data-placement="top" data-original-title="Kapıda Ödeme Kullanımı için gereken minimum sepet tutarı. Kullanılmayacaksa 0.00 olarak kalmalıdır." />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Maksimum Kullanım Limiti </label>
                                <div class="col-lg-7">
                                    <input type="text" value="{{ $shippingCompany->shipping_max_limit_for_cod }}" class="form-control" name="max_kullanim_limiti" rel="tooltip" data-placement="top" data-original-title="Kapıda Ödeme Kullanımı için gereken maksimum sepet tutarı. Kullanılmayacaksa 0.00 olarak kalmalıdır."  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Kapıda Nakit Ödeme Kullanımı </label>
                                <div class="col-lg-5">
                                    <div class="smart-form">
                                        <label class="toggle">
                                            <input type="checkbox" name="kapida_nakit" {{ $shippingCompany->shipping_cash_od_status=='1' ? 'checked="checked"' : '' }}>
                                            <i style="left:0" data-swchon-text="Aktif" data-swchoff-text="Pasif"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Kapıda Nakit Ödeme Ücreti </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="kapida_nakit_ucreti" value="{{ $shippingCompany->shipping_cash_price }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Kapıda Kredi Kartı Ödeme Kullanımı </label>
                                <div class="col-lg-5">
                                    <div class="smart-form">
                                        <label class="toggle">
                                            <input type="checkbox" name="kapida_kredi" {{ $shippingCompany->shipping_card_od_status=='1' ? 'checked="checked"' : '' }}>
                                            <i style="left:0" data-swchon-text="Aktif" data-swchoff-text="Pasif"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Kapıda Kredi Kartı Ödeme Ücreti </label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="kapida_kredi_ucreti" value="{{ $shippingCompany->shipping_card_price }}" />
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-lg-5 control-label"></label>
                                <div class="col-lg-7">
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