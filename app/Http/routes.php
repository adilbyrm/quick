<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([ 'prefix' => 'xmgrx', 'namespace' => 'xmgrx', 'middleware' => 'web' ], function () {

	Route::get('/', ['as' => 'admin-dash', 'uses' => 'HomeController@dash']);
	Route::post('status-change', ['as' => 'admin-status-change', 'uses' => 'HomeController@statusChange']); // AJAX - main.blade

	##################### Kategoriler #####################
	Route::get('kategoriler/{parentID?}', ['as' => 'admin-kategoriler', 'uses' => 'CategoryController@categories']);
	Route::get('kategori-agaci', ['as' => 'admin-kategori-agaci', 'uses' => 'CategoryController@categoryTree']);
	Route::post('kategori-agaci-duzenle', ['as' => 'admin-kategoriAgaci-duzenle', 'uses' => 'CategoryController@categoryTreeEdit']); // AJAX - categoryTree.blade
	Route::post('kategori-getir', ['as' => 'admin-kategori-getir', 'uses' => 'CategoryController@getCategory']); // AJAX - categoryAdd.blade
	Route::get('kategori-resim-sil/{categoryID}/{imageName}', ['as' => 'admin-kategori-resim-sil', 'uses' => 'CategoryController@categoryImageDel']);
	Route::post('kategori-resim-ekle/{categoryID}', ['as' => 'admin-kategori-resim-ekle', 'uses' => 'CategoryController@categoryImageAdd']);
	Route::get('kategori-ekle', ['as' => 'admin-kategori-ekle', 'uses' => 'CategoryController@categoryAdd']);
	Route::post('kategori-ekle', ['as' => 'admin-kategori-ekle-p', 'uses' => 'CategoryController@categoryAddP']);
	Route::get('kategori-duzenle/{categoryID}', ['as' => 'admin-kategori-duzenle', 'uses' => 'CategoryController@categoryEdit']);
	Route::post('kategori-duzenle/{categoryID}', ['as' => 'admin-kategori-duzenle-p', 'uses' => 'CategoryController@categoryEditP']);
	Route::get('kategori-sil/{categoryID}', ['as' => 'admin-kategori-sil', 'uses' => 'CategoryController@categoryDel']);
	##################### /Kategoriler #####################

	##################### Markalar #####################
	Route::get('markalar', ['as' => 'admin-markalar', 'uses' => 'BrandController@brands']);
	Route::post('marka-logo-ekle/{brandID}', ['as' => 'admin-marka-logo-ekle', 'uses' => 'BrandController@brandLogoAdd']);
	Route::get('marka-logo-sil/{brandID}/{logoName}', ['as' => 'admin-marka-logo-sil', 'uses' => 'BrandController@brandLogoDel']);
	Route::get('marka-ekle', ['as' => 'admin-marka-ekle', 'uses' => 'BrandController@brandAdd']);
	Route::post('marka-ekle', ['as' => 'admin-marka-ekle-p', 'uses' => 'BrandController@brandAddP']);
	Route::get('marka-duzenle/{brandID}', ['as' => 'admin-marka-duzenle', 'uses' => 'BrandController@brandEdit']);
	Route::post('marka-duzenle/{brandID}', ['as' => 'admin-marka-duzenle-p', 'uses' => 'BrandController@brandEditP']);
	Route::get('marka-sil/{brandID}', ['as' => 'admin-marka-sil', 'uses' => 'BrandController@brandDel']);
	##################### /Markalar #####################

	##################### Ürün Özellik Grupları #####################
	Route::get('ozellik-gruplari', ['as' => 'admin-ozellik-gruplari', 'uses' => 'ProductSpecificsController@specificsGroups']);
	Route::post('ozellik-grubu-ekle', ['as' => 'admin-ozellik-grup-ekle-p', 'uses' => 'ProductSpecificsController@specificsGroupAddP']);
	Route::post('ozellik-grup-duzenle', ['as' => 'admin-ozellik-grup-duzenle', 'uses' => 'ProductSpecificsController@specGroupEdit']); // AJAX -getModalForm- specGroups.blade
	Route::post('ozellik-grup-duzenle/{specGroupID}', ['as' => 'admin-ozellik-grup-duzenle-p', 'uses' => 'ProductSpecificsController@specGroupEditP']);
	Route::get('ozellik-grup-sil/{specGroupID}', ['as' => 'admin-ozellik-grup-sil', 'uses' => 'ProductSpecificsController@specGroupDel']);
	##################### /Ürün Özellikler Grupları #####################

	##################### Ürün Özellik Adları #####################
	Route::get('ozellik-adlari/{specGroupID}', ['as' => 'admin-ozellik-adlari', 'uses' => 'ProductSpecificsController@specificsNames']);
	Route::post('ozellik-adi-ekle/{specGroupID}', ['as' => 'admin-ozellik-adi-ekle-p', 'uses' => 'ProductSpecificsController@specificsNamesAddP']);
	Route::post('ozellik-adi-duzenle', ['as' => 'admin-ozellik-adi-duzenle', 'uses' => 'ProductSpecificsController@specNameEdit']); // AJAX -getModalForm- specNames.blade
	Route::post('ozellik-adi-duzenle/{specNameID}', ['as' => 'admin-ozellik-adi-duzenle-p', 'uses' => 'ProductSpecificsController@specNameEditP']);
	Route::get('ozellik-adi-sil/{specNameID}', ['as' => 'admin-ozellik-adi-sil', 'uses' => 'ProductSpecificsController@specNameDel']);
	##################### Ürün /Özellik Adları #####################

	##################### Ürün Özellik Değerleri #####################
	Route::get('ozellik-degerleri/{specNameID}', ['as' => 'admin-ozellik-degerleri', 'uses' => 'ProductSpecificsController@specificsValues']);
	Route::post('ozellik-deger-ekle/{specNameID}', ['as' => 'admin-ozellik-deger-ekle-p', 'uses' => 'ProductSpecificsController@specificsValuesAddP']);
	Route::post('ozellik-deger-duzenle', ['as' => 'admin-ozellik-deger-duzenle', 'uses' => 'ProductSpecificsController@specValueEdit']); // AJAX -getModalForm- specValue.blade
	Route::post('ozellik-deger-duzenle/{specValueID}', ['as' => 'admin-ozellik-deger-duzenle-p', 'uses' => 'ProductSpecificsController@specValueEditP']);
	Route::get('ozellik-deger-sil/{specValueID}', ['as' => 'admin-ozellik-deger-sil', 'uses' => 'ProductSpecificsController@specValueDel']);
	##################### Ürün /Özellik Değerleri #####################

	##################### Ürün Varyant Grupları #####################
	Route::get('secenek-gruplari', ['as' => 'admin-secenek-gruplari', 'uses' => 'ProductOptionController@optionGroups']);
	Route::post('secenek-grubu-ekle', ['as' => 'admin-secenek-grup-ekle-p', 'uses' => 'ProductOptionController@optionGroupAddP']);
	Route::post('secenek-grup-duzenle', ['as' => 'admin-secenek-grup-duzenle', 'uses' => 'ProductOptionController@optionGroupEdit']); // AJAX -getModalForm- optionGroups.blade
	Route::post('secenek-grup-duzenle/{optionGroupID}', ['as' => 'admin-secenek-grup-duzenle-p', 'uses' => 'ProductOptionController@optionGroupEditP']);
	Route::get('secenek-grup-sil/{optionGroupID}', ['as' => 'admin-secenek-grup-sil', 'uses' => 'ProductOptionController@optionGroupDel']);
	##################### Ürün /Varyant Grupları #####################

	##################### Ürün Varyant Degerleri #####################
	Route::get('secenek-degerleri/{optionGroupID}', ['as' => 'admin-secenek-degerleri', 'uses' => 'ProductOptionController@optionValues']);
	Route::post('secenek-degeri-ekle/{optionGroupID}', ['as' => 'admin-secenek-deger-ekle-p', 'uses' => 'ProductOptionController@optionValueAddP']);
	Route::post('secenek-deger-duzenle', ['as' => 'admin-secenek-deger-duzenle', 'uses' => 'ProductOptionController@optionValueEdit']); // AJAX -getModalForm- optionGroups.blade
	Route::post('secenek-deger-duzenle/{optionValueID}', ['as' => 'admin-secenek-deger-duzenle-p', 'uses' => 'ProductOptionController@optionValueEditP']);
	Route::post('secenek-resim-ekle/{optionValueID}', ['as' => 'admin-secenek-resim-ekle', 'uses' => 'ProductOptionController@optValImageAdd']);
	Route::get('secenek-resim-sil/{optionValueID}/{imageName}', ['as' => 'admin-secenek-resim-sil', 'uses' => 'ProductOptionController@optValImageDel']);
	##################### Ürün /Varyant Degerleri #####################

	##################### İçerikler #####################
	Route::get('icerikler', ['as' => 'admin-icerikler', 'uses' => 'ContentController@contents']);
	Route::get('icerik-ekle', ['as' => 'admin-icerik-ekle', 'uses' => 'ContentController@contentAdd']);
	Route::post('icerik-ekle', ['as' => 'admin-icerik-ekle-p', 'uses' => 'ContentController@contentAddP']);
	Route::get('icerik-duzenle/{contentID}', ['as' => 'admin-icerik-duzenle', 'uses' => 'ContentController@contentEdit']);
	Route::post('icerik-duzenle/{contentID}', ['as' => 'admin-icerik-duzenle-p', 'uses' => 'ContentController@contentEditP']);
	Route::get('icerik-sil/{contentID}', ['as' => 'admin-icerik-sil', 'uses' => 'ContentController@contentDel']);
	##################### /İçerikler #####################

	##################### bolgeler/sehirler #####################
	Route::get('sehirler', ['as' => 'admin-sehirler', 'uses' => 'ShippingController@cities']);
	Route::get('teslimat-bolgeleri', ['as' => 'admin-teslimat-bolgeleri', 'uses' => 'ShippingController@regions']);
	Route::post('sehir-tasi', ['as' => 'admin-sehir-tasi', 'uses' => 'ShippingController@moveCity']); // AJAX  regions.blade
	Route::get('default-cities', ['as' => 'admin-default-cities', 'uses' => 'ShippingController@defaultCities']);
	##################### /bolgeler/sehirler #####################

	##################### kargo #####################
	Route::get('kargo-firmalari', ['as' => 'admin-kargo-firmalari', 'uses' => 'ShippingController@shippingCompanies']);
	Route::post('kargo-firma-ekle', ['as' => 'admin-kargo-firma-ekle-p', 'uses' => 'ShippingController@shippingCompanyAdd']);
	Route::post('kargo-firma-duzenle', ['as' => 'admin-kargo-firma-duzenle', 'uses' => 'ShippingController@shippingCompanyEdit']);// AJAX -getModalForm- shippingCompanies.blade
	Route::post('kargo-firma-duzenle/{shippingID}', ['as' => 'admin-kargo-firma-duzenle-p', 'uses' => 'ShippingController@shippingCompanyEditP']);
	Route::get('kargo-firma-sil/{shippingID}', ['as' => 'admin-kargo-firma-sil', 'uses' => 'ShippingController@shippingCompanyDel']);
	Route::get('kargo-oranlari-duzenle/{shippingID}', ['as' => 'admin-kargo-oranlari-duzenle', 'uses' => 'ShippingController@shippingRatesEdit']);
	##################### /kargo #####################

	##################### uye/bayi #####################

	##################### /uye/bayi #####################

	Route::get('urunler', function () {
		dd(auth()->guard('admin')->check());
	});

});

Route::get('/xmgrx/login', ['middleware' => 'web', 'as' => 'admin-login', 'uses' => 'xmgrx\AuthController@adminLogin']);
Route::post('/xmgrx/login', ['middleware' => 'web', 'as' => 'admin-login-p', 'uses' => 'xmgrx\AuthController@adminLoginP']);
Route::get('/xmgrx/logout', ['middleware' => ['web', 'admin.auth'], 'as' => 'admin-logout', 'uses' => 'xmgrx\AuthController@adminLogout']);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    //Route::get('/', function() {

		// dd(auth()->guard('admin')->check());
		// dd(auth()->guard('admin')->user()->username);
		
		// dd(DB::table('Products')->get());
		
		// dd(DB::table('Products')->where('RowID', '3')->get());

		/*$guid = getGUID();
		DB::statement("INSERT INTO 
			Products (Name, RowAddDateTime, RowAddUserNo, RowEditDateTime, RowEditUserNo, ID, Status, _SynchronizationID_)
			VALUES ('testttts224', '2016-09-28 15:31:38.000', 1, '2016-09-28 15:31:38.000', 1, '614', 0, '$guid')");*/
	//});

    Route::get('/', ['uses' => 'HomeController@homepage']);
	Route::get('dealer-login', ['uses' => 'DealerController@login']);
});
