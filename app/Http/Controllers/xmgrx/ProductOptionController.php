<?php

namespace App\Http\Controllers\xmgrx;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductOptionController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('admin.auth');
        $this->middleware('XSSProtection');
        $this->middleware('VerifyGETCsrfToken', ['only' => ['optionGroupDel', 'optionValueDel', 'optValImageDel']]);

        view()->share([
            'optValImageDestination' => $this->optValImageDestination,
            'optValImageUrl' => $this->optValImageUrl
        ]);
    }

    public function optionGroups()
    {
        $optionGroups = DB::table('option_groups')->orderBy('option_group_order')->get();
        return view('xmgrx.product.optionGroups')->with(['li_active' => 'options', 'optionGroups' => $optionGroups]);
    }

    public function optionGroupAddP(Request $request)
    {
        $rules = [
            'adi' => 'required'
        ];

        $messages = [
            'adi.required' => 'Varyant Grubu Adı giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::table('option_groups')->insert([
            'option_group_name' => $request->adi,
            'option_group_order' => $request->sira,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime
        ]);

        return back();
    }

    public function optionGroupEdit(Request $request)
    {
        $html = '';
        $optionGroup = DB::table('option_groups')->where('id', $request->ID)->first();
        if(count($optionGroup)) {
            $html = view('xmgrx.ajax-views.optionGroupEditXHR')->with('optionGroup', $optionGroup);
        }
        return $html;
    }

    public function optionGroupEditP(Request $request)
    {
        $rules = [
            'adi' => 'required'
        ];

        $messages = [
            'adi.required' => 'Varyant Grubu Adı giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::table('option_groups')->where('id', $request->optionGroupID)->update([
            'option_group_name' => $request->adi,
            'option_group_order' => $request->sira,
            'updated_at' => new \Datetime
        ]);

        return back()->with('success', 'İşlem başarıyla gerçekleştirilmiştir');
    }

    public function optionGroupDel(Request $request)
    {
        DB::table('option_groups')->where('id', $request->optionGroupID)->delete();
        return back();
    }

    public function optionValues(Request $request)
    {
        $currentOptionGroup = DB::table('option_groups')->where('id', $request->optionGroupID)->first();
        $optionValues = DB::table('option_values')->where('option_groups_id', $request->optionGroupID)->orderBy('option_value_order')->get();
        return view('xmgrx.product.optionValues')->with(['li_active' => 'options', 'optionValues' => $optionValues, 'currentOptionGroup' => $currentOptionGroup]);
    }

    public function optionValueAddP(Request $request)
    {
        $rules = [
            'adi' => 'required'
        ];

        $messages = [
            'adi.required' => 'Varyant Değeri giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::table('option_values')->insert([
            'option_groups_id' => $request->optionGroupID,
            'option_value_name' => $request->adi,
            'option_value_order' => $request->sira,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime
        ]);

        return back();
    }

    public function optionValueEdit(Request $request)
    {
        $html = '';
        $optionValue = DB::table('option_values')->where('id', $request->ID)->first();
        if(count($optionValue)) {
            $html = view('xmgrx.ajax-views.optionValueEditXHR')->with('optionValue', $optionValue);
        }
        return $html;
    }

    public function optionValueEditP(Request $request)
    {
        $rules = [
            'adi' => 'required'
        ];

        $messages = [
            'adi.required' => 'Varyant Grubu Adı giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        DB::table('option_values')->where('id', $request->optionValueID)->update([
            'option_value_name' => $request->adi,
            'option_value_order' => $request->sira,
            'updated_at' => new \Datetime
        ]);

        return back()->with('success', 'İşlem başarıyla gerçekleştirilmiştir');
    }

    public function optValImageAdd(Request $request)
    {
        $rules = ['resim' => 'required|image|mimes:jpeg,bmp,png'];

        $messages = [
            'resim.required' => 'Herhangi bir resim seçmediniz!',
            'resim.image' => 'Yüklemeye çalıştığınız dosyanın resim olduğundan emin olunuz.',
            'resim.mimes' => 'Yüklemek istediğiniz resimin formatı; jpeg, bmp, png formatlarından biri olmalıdır.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if(!$validator->fails()) {
            $val = DB::table('option_values')->where('id', $request->optionValueID)->first();

            if($request->file('resim')->isValid()) {
                $extension = $request->file('resim')->getClientOriginalExtension();
                $fileName = slug($val->option_value_name).'_'.uniqid().'.'.$extension;
                $fileDestination = $this->optValImageDestination;
                $request->file('resim')->move($fileDestination, $fileName);
                $fileOldName = $val->option_value_image;
                if( !empty($fileOldName) && file_exists($fileDestination.$fileOldName)) {
                    unlink($fileDestination.$fileOldName);
                }
                DB::table('option_values')->where('id', $request->optionValueID)->update(['option_value_image' => $fileName]);
                return back();
            }

            return back()->with('failure', 'Resim yüklenirken bir sorun oluştu.');
        }
        return back()->withErrors($validator);
    }

    public function optValImageDel(Request $request)
    {
        $file = $this->optValImageDestination.$request->imageName;
        if(file_exists($file)){
            unlink($file);
            DB::table('option_values')->where('id', $request->optionValueID)->update(['option_value_image' => '']);
        }
        return back();
    }
}
