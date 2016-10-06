<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="">
                        <img src="akademilogo.png" alt="me" class="online" />
						<span>
							Akademi Yazılım
						</span>

                    </a>

				</span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <ul>
            <li class="{{ $li_active == 'dash' ? 'active' : '' }}">
                <a href="{{ url('xmgrx')  }}" title="Anasayfa"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Anasayfa</span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Ürün Yönetimi</span></a>
                <ul>
                    <li>
                        <a href="flot.html">Ürünler</a>
                    </li>
                    <li class="{{ $li_active == 'category' ? 'active' : '' }}">
                        <a href="{{ url('xmgrx/kategoriler')  }}">Kategoriler</a>
                    </li>
                    <li>
                        <a href="#">Toplu Ürün Güncelle</a>
                        <ul>
                            <li>
                                <a href="fa.html">Kategori Tabanlı</a>
                            </li>
                            <li>
                                <a href="glyph.html">Ürün Tabanlı</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ $li_active == 'brands' ? 'active' : '' }}">
                        <a href="{{ route('admin-markalar') }}">Markalar</a>
                    </li>
                    <li class="{{ $li_active == 'specs' ? 'active' : '' }}">
                        <a href="{{ route('admin-ozellik-gruplari') }}">Ürün Özellikleri</a>
                    </li>
                    <li class="{{ $li_active == 'options' ? 'active' : '' }}">
                        <a href="{{ route('admin-secenek-gruplari') }}">Varyant Sistemi</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-file-text-o"></i> <span class="menu-item-parent">İçerik Yönetimi</span></a>
                <ul>
                    {{--<li>--}}
                        {{--<a href="table.html">İçerik Kategorileri</a>--}}
                    {{--</li>--}}
                    <li class="{{ $li_active == 'content' ? 'active' : '' }}">
                        <a href="{{ route('admin-icerikler') }}">İçerikler</a>
                    </li>
                    <li>
                        <a href="jqgrid.html">Yorumlar</a>
                    </li>
                    <li>
                        <a href="jqgrid.html">Öneriler</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Üye/Bayi Yönetimi</span></a>
                <ul>
                    <li>
                        <a href="form-elements.html">Üyeler/Bayiler</a>
                    </li>
                    <li>
                        <a href="form-templates.html">Üye/Bayi Grupları</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">Sipariş Yönetimi</span></a>
                <ul>
                    <li>
                        <a href="form-elements.html">Siparişler</a>
                    </li>
                    <li>
                        <a href="form-templates.html">Hatalı Ödeme Kayıtları</a>
                    </li>
                    <li>
                        <a href="form-templates.html">Belirsiz Ödeme Kayıtları</a>
                    </li>
                    <li class="{{ $li_active == 'shipping' ? 'active' : '' }}">
                        <a href="{{ route('admin-kargo-firmalari') }}">Kargo Firmaları</a>
                    </li>
                    <li class="{{ $li_active == 'regions' ? 'active' : '' }}">
                        <a href="{{ route('admin-teslimat-bolgeleri') }}">Teslimat Bölgeleri</a>
                    </li>
                    <li class="{{ $li_active == 'cities' ? 'active' : '' }}">
                        <a href="{{ route('admin-sehirler') }}">Şehirler</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-money"></i> <span class="menu-item-parent">Ödeme Ayarları</span></a>
                <ul>
                    <li>
                        <a href="form-elements.html">Banka Hesapları</a>
                    </li>
                    <li>
                        <a href="form-templates.html">Pos Yönetimi</a>
                    </li>
                    <li>
                        <a href="validation.html">Kurlar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-gears"></i> <span class="menu-item-parent">Genel Ayarlar</span></a>
                <ul>
                    <li>
                        <a href="form-elements.html">Tanımlamalar</a>
                        {{-- iletisim, vergi, slider secim, logo, favicon, keywords, description vs. --}}
                    </li>
                    <li>
                        <a href="form-templates.html">Menü Yönetimi</a>
                    </li>
                    <li>
                        <a href="bootstrap-forms.html">Dosya Yönetimi</a>
                    </li>
                    <li>
                        <a href="bootstrap-validator.html">Ek Ayarlar</a>
                        {{-- siteyi kapat/ac, varsayilan kdv, varsayilan para birimi(kur), sayfada gosterilen urun adedi, uyeliksiz alisverisi ac/kapat vs. --}}
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">Görüntü Ayarları</span></a>
                <ul>
                    <li>
                        <a href="form-elements.html">Slider Yönetimi</a>
                    </li>
                    <li>
                        <a href="form-templates.html">Banner Yönetimi</a>
                    </li>
                    <li>
                        <a href="validation.html">Popup Yönetimi</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-clock-o"></i> <span class="menu-item-parent">Kampanya Yönetimi</span></a>
                <ul>
                    <li>
                        <a href="form-elements.html">Hediye Çeki</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
			<span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

</aside>