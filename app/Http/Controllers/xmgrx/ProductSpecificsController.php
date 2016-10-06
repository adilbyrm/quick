<?php

namespace App\Http\Controllers\xmgrx;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductSpecificsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('admin.auth');
        $this->middleware('XSSProtection');
        $this->middleware('VerifyGETCsrfToken', ['only' => ['specGroupDel', 'specNameDel', 'specValueDel']]);
    }

    public function specificsGroups()
    {
        $specGroups = DB::table('specifics_groups')->orderBy('specifics_group_order')->get();
        return view('xmgrx.product.specGroups')->with(['li_active' => 'specs', 'specGroups' => $specGroups]);
    }

    public function specificsGroupAddP(Request $request)
    {
        $rules = [
            'adi' => 'required'
        ];

        $messages = [
            'adi.required' => 'Özellik Grubu Adı giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::table('specifics_groups')->insert([
            'specifics_group_name' => $request->adi,
            'specifics_group_order' => $request->sira,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime
        ]);

        return back();
    }


    public function specGroupEdit(Request $request)
    {
        $html = '';
        $specGroup = DB::table('specifics_groups')->where('id', $request->ID)->first();
        if(count($specGroup)) {
            $html = view('xmgrx.ajax-views.specGroupEditXHR')->with('specGroup', $specGroup);
        }
        return $html;
    }

    public function specGroupEditP(Request $request)
    {
        $rules = [
            'adi' => 'required'
        ];

        $messages = [
            'adi.required' => 'Özellik Grubu Adı giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::table('specifics_groups')->where('id', $request->specGroupID)->update([
            'specifics_group_name' => $request->adi,
            'specifics_group_order' => $request->sira,
            'updated_at' => new \Datetime
        ]);

        return back()->with('success', 'İşlem başarıyla gerçekleştirilmiştir');
    }

    public function specGroupDel(Request $request)
    {
        DB::table('specifics_groups')->where('id', $request->specGroupID)->delete();
        return back();
    }

    public function specificsNames(Request $request)
    {

        $specGroup = DB::table('specifics_groups')->select('specifics_group_name', 'id')->where('id', $request->specGroupID)->first();
        if(!$specGroup) {
            return redirect()->route('admin-ozellik-gruplari');
        }
        $specNames = DB::table('specifics_names')->where('specifics_groups_id', $request->specGroupID)->orderBy('specifics_name_order')->get();
        return view('xmgrx.product.specNames')->with(['li_active' => 'specs', 'specNames' => $specNames, 'specGroup' => $specGroup]);
    }

    public function specificsNamesAddP(Request $request)
    {
        $rules = [
            'adi' => 'required'
        ];

        $messages = [
            'adi.required' => 'Özellik Adı giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::table('specifics_names')->insert([
            'specifics_groups_id' => $request->specGroupID,
            'specifics_name' => $request->adi,
            'specifics_name_order' => $request->sira,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime
        ]);

        return back();
    }

    public function specNameEdit(Request $request)
    {
        $html = '';
        $specName = DB::table('specifics_names')->where('id', $request->ID)->first();
        if(count($specName)) {
            $html = view('xmgrx.ajax-views.specNameEditXHR')->with('specName', $specName);
        }
        return $html;
    }

    public function specNameEditP(Request $request)
    {
        $rules = [
            'adi' => 'required'
        ];

        $messages = [
            'adi.required' => 'Özellik Adı giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::table('specifics_names')->where('id', $request->specNameID)->update([
            'specifics_name' => $request->adi,
            'specifics_name_order' => $request->sira,
            'updated_at' => new \Datetime
        ]);

        return back()->with('success', 'İşlem başarıyla gerçekleştirilmiştir');
    }

    public function specNameDel(Request $request)
    {
        DB::table('specifics_names')->where('id', $request->specNameID)->delete();
        return back();
    }

    public function specificsValues(Request $request)
    {

        $specName = DB::table('specifics_names')->select('specifics_name', 'specifics_groups_id', 'id')->where('id', $request->specNameID)->first();
        if(!$specName) {
            return redirect()->route('admin-ozellik-gruplari');
        }
        $specValues = DB::table('specifics_values')->where('specifics_names_id', $request->specNameID)->orderBy('specifics_value_order')->get();
        return view('xmgrx.product.specValues')->with(['li_active' => 'specs', 'specValues' => $specValues, 'specName' => $specName]);
    }

    public function specificsValuesAddP(Request $request)
    {
        $rules = [
            'adi' => 'required'
        ];

        $messages = [
            'adi.required' => 'Değer Adı giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::table('specifics_values')->insert([
            'specifics_names_id' => $request->specNameID,
            'specifics_value_name' => $request->adi,
            'specifics_value_order' => $request->sira,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime
        ]);

        return back();
    }

    public function specValueEdit(Request $request)
    {
        $html = '';
        $specValue = DB::table('specifics_values')->where('id', $request->ID)->first();
        if(count($specValue)) {
            $html = view('xmgrx.ajax-views.specValueEditXHR')->with('specValue', $specValue);
        }
        return $html;
    }

    public function specValueEditP(Request $request)
    {
        $rules = [
            'adi' => 'required'
        ];

        $messages = [
            'adi.required' => 'Değer Adı giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::table('specifics_values')->where('id', $request->specValueID)->update([
            'specifics_value_name' => $request->adi,
            'specifics_value_order' => $request->sira,
            'updated_at' => new \Datetime
        ]);

        return back()->with('success', 'İşlem başarıyla gerçekleştirilmiştir');
    }

    public function specValueDel(Request $request)
    {
        DB::table('specifics_values')->where('id', $request->specValueID)->delete();
        return back();
    }
}
