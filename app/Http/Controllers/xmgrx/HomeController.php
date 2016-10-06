<?php

namespace App\Http\Controllers\xmgrx;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;


class HomeController extends AdminController
{
    public function __construct()
    {
        $this->middleware('admin.auth');
        $this->middleware('XSSProtection');
    }

    public function dash()
    {
        return view('xmgrx.home.dash')->with('li_active', 'dash');
    }

    /**
     * @param Request $request
     * AJAX - main.blade
     */
    public function statusChange(Request $request)
    {
        $status = $request->status == 'false' ? '0' : '1';

        switch ($request->table) {
            case 'category': // urun kategorileri
                DB::table('categories')->where('id', $request->id)->update(['category_status' => $status]);
                break;
            case 'brand': // markalar
                DB::table('brands')->where('id', $request->id)->update(['brand_status' => $status]);
                break;
            case 'specificsGroups': // ozellik grupları
                DB::table('specifics_groups')->where('id', $request->id)->update(['specifics_group_status' => $status]);
                break;
            case 'specificsNames': // ozellik adlari
                DB::table('specifics_names')->where('id', $request->id)->update(['specifics_name_status' => $status]);
                break;
            case 'specificsValues': // ozellik degerleri
                DB::table('specifics_values')->where('id', $request->id)->update(['specifics_value_status' => $status]);
                break;
            case 'optionGroups': // secenek gruplari
                DB::table('option_groups')->where('id', $request->id)->update(['option_group_status' => $status]);
                break;
            case 'optionValues': // secenek gruplari
                DB::table('option_values')->where('id', $request->id)->update(['option_value_status' => $status]);
                break;
            case 'contents': // içerikler
                DB::table('contents')->where('id', $request->id)->update(['content_status' => $status]);
                break;
            case 'city': // sehirler
                DB::table('cities')->where('id', $request->id)->update(['city_status' => $status]);
                break;
            case 'shippingCompany': // sehirler
                DB::table('shipping_companies')->where('id', $request->id)->update(['shipping_company_status' => $status]);
                break;
        }
    }




}
