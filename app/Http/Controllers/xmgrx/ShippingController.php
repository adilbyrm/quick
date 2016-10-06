<?php

namespace App\Http\Controllers\xmgrx;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Region;
use Validator;

class ShippingController extends AdminController
{
    public function __construct()
    {
        $this->middleware('admin.auth');
        $this->middleware('XSSProtection');
        $this->middleware('VerifyGETCsrfToken', ['only' => ['defaultCities', 'shippingCompanyDel']]); // CSRF for GET method
    }

    public function cities() {
        $cities = DB::table('cities')->get();
        return view('xmgrx.shipping.cities')->with(['li_active' => 'cities', 'cities' => $cities]);
    }

    public function regions()
    {
        return view('xmgrx.shipping.regions')->with(['li_active' => 'regions', 'regions' => Region::all()]);
    }

    /**
     * @param Request $request
     * AJAX - regions.blade
     */
    public function moveCity(Request $request)
    {
        if(count($request->cityValues) && $request->selectedRegion) {
            DB::table('cities')->whereIn('id', $request->cityValues)->update(['region_id' => $request->selectedRegion]);
        }
    }

    /**
     * farkli bolgelere tasinan illeri ilk haline getir.
     *
     */
    public function defaultCities()
    {
        DB::update('UPDATE cities SET region_id=default_region_id');
        return back();
    }

    /**
     * kargo firmalari
     */
    public function shippingCompanies()
    {
        $shippingCompanies = DB::table('shipping_companies')->get();
        return view('xmgrx.shipping.shippingCompanies')->with(['li_active' => 'shipping', 'shippingCompanies' => $shippingCompanies]);
    }

    public function shippingCompanyAdd(Request $request)
    {
        $rules = [
            'firma_adi' => 'required|max:50',
            'min_kullanim_limiti' => 'numeric',
            'max_kullanim_limiti' => 'numeric',
            'kapida_nakit_ucreti' => 'numeric',
            'kapida_kredi_ucreti' => 'numeric'
        ];

        $messages = [
            'firma_adi.required' => 'Lütfen Firma Adını giriniz',
            'min_kullanim_limiti.numeric' => 'Lütfen geçerli bir Minimum Kullanim Limiti giriniz.',
            'max_kullanim_limiti.numeric' => 'Lütfen geçerli bir Maksimum Kullanım Limiti giriniz.',
            'kapida_nakit_ucreti.numeric' => 'Lütfen geçerli bir Kapıda Nakit Ücreti giriniz.',
            'kapida_kredi_ucreti.numeric' => 'Lütfen geçerli bir Kapıda Kredi Kartı Ücreti giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $shippingPayBuyer = $request->alici_odemeli_kargo == 'on' ? '1' : '0'; // alici odemeli kargo
        $shippingCashOdStatus = $request->kapida_nakit == 'on' ? '1' : '0'; // kapida nakit odeme
        $shippingCardOdStatus = $request->kapida_kredi == 'on' ? '1' : '0'; // kapida kredi karti ile odeme

        $create = DB::table('shipping_companies')->insert([
            'shipping_company_name' => $request->firma_adi,
            'shipping_pay_buyer' => $shippingPayBuyer,
            'shipping_min_limit_for_cod' => $request->min_kullanim_limiti,
            'shipping_max_limit_for_cod' => $request->max_kullanim_limiti,
            'shipping_cash_od_status' => $shippingCashOdStatus,
            'shipping_cash_price' => $request->kapida_nakit_ucreti,
            'shipping_card_od_status' => $shippingCardOdStatus,
            'shipping_card_price' => $request->kapida_kredi_ucreti,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime
        ]);

        if($create) {
            return back()->with('success', 'Yeni bir kargo firmasi eklenmiştir');
        }

        return back()->with('failure', 'Yeni firma oluştururken sorun oluştu');
    }

    /**
     * @param Request $request
     * @return $this|string
     * AJAX -getModalForm- shippingCompanies.blade
     */
    public function shippingCompanyEdit(Request $request)
    {
        $html = '';
        $shippingCompany = DB::table('shipping_companies')->where('id', $request->ID)->first();
        if(count($shippingCompany)) {
            $html = view('xmgrx.ajax-views.shippingCompanyEditXHR')->with('shippingCompany', $shippingCompany);
        }
        return $html;
    }

    public function shippingCompanyEditP(Request $request)
    {
        $rules = [
            'firma_adi' => 'required|max:50',
            'min_kullanim_limiti' => 'numeric',
            'max_kullanim_limiti' => 'numeric',
            'kapida_nakit_ucreti' => 'numeric',
            'kapida_kredi_ucreti' => 'numeric'
        ];

        $messages = [
            'firma_adi.required' => 'Lütfen Firma Adını giriniz',
            'min_kullanim_limiti.numeric' => 'Lütfen geçerli bir Minimum Kullanim Limiti giriniz.',
            'max_kullanim_limiti.numeric' => 'Lütfen geçerli bir Maksimum Kullanım Limiti giriniz.',
            'kapida_nakit_ucreti.numeric' => 'Lütfen geçerli bir Kapıda Nakit Ücreti giriniz.',
            'kapida_kredi_ucreti.numeric' => 'Lütfen geçerli bir Kapıda Kredi Kartı Ücreti giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $shippingPayBuyer = $request->alici_odemeli_kargo == 'on' ? '1' : '0'; // alici odemeli kargo
        $shippingCashOdStatus = $request->kapida_nakit == 'on' ? '1' : '0'; // kapida nakit odeme
        $shippingCardOdStatus = $request->kapida_kredi == 'on' ? '1' : '0'; // kapida kredi karti ile odeme

        $update = DB::table('shipping_companies')->where('id', $request->shippingID)->update([
            'shipping_company_name' => $request->firma_adi,
            'shipping_pay_buyer' => $shippingPayBuyer,
            'shipping_min_limit_for_cod' => $request->min_kullanim_limiti,
            'shipping_max_limit_for_cod' => $request->max_kullanim_limiti,
            'shipping_cash_od_status' => $shippingCashOdStatus,
            'shipping_cash_price' => $request->kapida_nakit_ucreti,
            'shipping_card_od_status' => $shippingCardOdStatus,
            'shipping_card_price' => $request->kapida_kredi_ucreti,
            'updated_at' => new \Datetime
        ]);

        if($update) {
            return back()->with('success', 'Kargo firmasi düzenlenmiştir');
        }

        return back()->with('failure', 'Kargo firması düzenlenirken sorun oluştu');
    }

    public function shippingCompanyDel(Request $request)
    {
        DB::table('shipping_companies')->where('id', $request->shippingID)->delete();
        return back();
    }

    public function shippingRatesEdit(Request $request)
    {
        $shippingCompany = DB::table('shipping_companies')->where('id', $request->shippingID)->first();
        return view('xmgrx.shipping.shippingRates')->with(['li_active' => 'shipping', 'shippingCompany' => $shippingCompany]);
    }
}
