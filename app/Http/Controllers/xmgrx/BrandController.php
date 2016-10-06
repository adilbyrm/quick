<?php

namespace App\Http\Controllers\xmgrx;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class BrandController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('admin.auth');
        $this->middleware('XSSProtection');
        $this->middleware('VerifyGETCsrfToken', ['only' => ['brandLogoDel', 'brandDel']]);

        view()->share([
            'brandLogoDestination' => $this->brandLogoDestination,
            'brandLogoUrl' => $this->brandLogoUrl
        ]);
    }
    public function brands()
    {
        $brands = DB::table('brands')->orderBy('brand_order')->get();
        return view('xmgrx.brands.brands')->with(['li_active' => 'brands', 'brands' => $brands ]);
    }

    /**
     * main.blade
     * @param Request $request / $brandID
     * @return string
     */
    public function brandLogoAdd(Request $request)
    {
        $rules = ['resim' => 'required|image|mimes:jpeg,bmp,png'];

        $messages = [
            'resim.required' => 'Herhangi bir resim seçmediniz!',
            'resim.image' => 'Yüklemeye çalıştığınız dosyanın resim olduğundan emin olunuz.',
            'resim.mimes' => 'Yüklemek istediğiniz resimin formatı; jpeg, bmp, png formatlarından biri olmalıdır.'
        ];

        if(!Validator::make($request->all(), $rules)->fails()) {
            $brand = DB::table('brands')->where('id', $request->brandID)->first();

            if($request->file('resim')->isValid()) {
                $extension = $request->file('resim')->getClientOriginalExtension();
                $fileName = slug($brand->brand_name).'_'.uniqid().'.'.$extension;
                $fileDestination = $this->brandLogoDestination;
                $request->file('resim')->move($fileDestination, $fileName);
                $fileOldName = $brand->brand_logo;
                if( !empty($fileOldName) && file_exists($fileDestination.$fileOldName)) {
                    unlink($fileDestination.$fileOldName);
                }
                DB::table('brands')->where('id', $request->brandID)->update(['brand_logo' => $fileName]);
                return back();
            }

            return back()->with('failure', 'Resim yüklenirken bir sorun oluştu.');
        }
        return back();
    }

    /**
     * brands.blade
     * @param Request $request / $brandID, $logoName
     * @return \Illuminate\Http\RedirectResponse
     */
    public function brandLogoDel(Request $request)
    {
        $file = $this->brandLogoDestination.$request->logoName;
        if(file_exists($file)){
            unlink($file);
            DB::table('brands')->where('id', $request->brandID)->update(['brand_logo' => '']);
        }
        return back();
    }

    public function brandAdd()
    {
        return view('xmgrx.brands.brandAdd')->with(['li_active' => 'brand']);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * $brandLogoDestination -> AdminController@__contruct
     */
    public function brandAddP(Request $request)
    {
        $rules = [
            'marka_adi' => 'required'
        ];

        $messages = [
            'marka_adi.required' => 'Marka Adını boş bırakmayınız.'
        ];

        if($request->hasFile('resim')) {
            $rules['resim'] = 'image|mimes:jpeg,bmp,png';
            $messages['resim.image'] = 'Yüklemeye çalıştığınız dosyanın resim olduğundan emin olunuz.';
            $messages['resim.mimes'] = 'Yüklemek istediğiniz resimin formatı; jpeg, bmp, png formatlarından biri olmalıdır.';
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $fileName = "";
        if($request->hasFile('resim')) {
            if($request->file('resim')->isValid()) {
                $extension = $request->file('resim')->getClientOriginalExtension();
                $fileName = slug($request->marka_adi).'_'.uniqid().'.'.$extension;
                $fileDestination = $this->brandLogoDestination;
                $request->file('resim')->move($fileDestination, $fileName);
            }else{
                return back()->with('failure', 'Resim yüklenirken bir sorun oluştu.');
            }
        }

        $status = $request->marka_durum == 'on' ? '1' : '0';

        $create = DB::table('brands')->insert([
            'brand_name' => $request->marka_adi,
            'brand_logo' => $fileName,
            'brand_status' => $status,
            'brand_order' => $request->sira,
            'brand_keywords' => $request->keywords,
            'brand_description' => $request->description,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime
        ]);

        if($create) {
            return back()->with('success', $request->marka_adi.' isimli marka başarıyla oluşturuldu.');
        }else{
            if(isset($fileDestination) && file_exists($fileDestination.$fileName)) { // resim yukleme islemi yapildiysa $fileDestination degeri vardir ve islem geri alinsin
                unlink($fileDestination.$fileName);
            }
            return back()->with('failure', 'Marka oluşturulamadı.');
        }

    }

    /**
     * @param Request $request, $brandID route parameter.
     * @return mixed
     */
    public function brandEdit($brandID)
    {
        $currentBrand = DB::table('brands')->where('id', $brandID)->first();
        if($currentBrand) {
            return view('xmgrx.brands.brandEdit')->with(['li_active' => 'brands', 'currentBrand' => $currentBrand]);
        }
        return back();
    }

    public function brandEditP(Request $request)
    {
        $currentBrand = DB::table('brands')->where('id', $request->brandID)->first();
        if(!$currentBrand) {
            return back();
        }
        $rules = [
            'marka_adi' => 'required'
        ];

        $messages = [
            'marka_adi.required' => 'Marka Adını boş bırakmayınız.'
        ];

        if($request->hasFile('resim')) {
            $rules['resim'] = 'image|mimes:jpeg,bmp,png';
            $messages['resim.image'] = 'Yüklemeye çalıştığınız dosyanın resim olduğundan emin olunuz.';
            $messages['resim.mimes'] = 'Yüklemek istediğiniz resimin formatı; jpeg, bmp, png formatlarından biri olmalıdır.';
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $fileName = $currentBrand->brand_logo;
        if($request->hasFile('resim')) {
            if($request->file('resim')->isValid()) {
                $fileDestination = $this->brandLogoDestination;
                if(!empty($fileName) && file_exists($fileDestination.$fileName)) {
                    unlink($fileDestination.$fileName);
                }
                $extension = $request->file('resim')->getClientOriginalExtension();
                $fileName = slug($request->marka_adi).'_'.uniqid().'.'.$extension;
                $request->file('resim')->move($fileDestination, $fileName);
            }else{
                return back()->with('failure', 'Resim yüklenirken bir sorun oluştu.');
            }
        }

        $status = $request->marka_durum == 'on' ? '1' : '0';

        $update = DB::table('brands')->where('id', $request->brandID)->update([
            'brand_name' => $request->marka_adi,
            'brand_logo' => $fileName,
            'brand_status' => $status,
            'brand_order' => $request->sira,
            'brand_keywords' => $request->keywords,
            'brand_description' => $request->description,
            'updated_at' => new \Datetime
        ]);

        if($update) {
            return redirect()->route('admin-markalar')->with('success', $request->marka_adi.' isimli marka başarıyla guncellendi.');
        }
        return back()->with('failure', 'Marka oluşturulamadı.');

    }

    public function brandDel(Request $request)
    {
        $brand = DB::table('brands')->where('id', $request->brandID);
        $file = $brand->first()->brand_logo;
        $fileDestination = $this->brandLogoDestination;
        if($brand->delete()) {
            if(!empty($file) && file_exists($fileDestination.$file)) {
                unlink($fileDestination.$file);
            }
        }

        return back();
    }
}
