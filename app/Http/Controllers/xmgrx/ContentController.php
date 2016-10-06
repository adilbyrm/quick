<?php

namespace App\Http\Controllers\xmgrx;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class ContentController extends AdminController
{
    public function __construct() {
        parent::__construct();
        $this->middleware('admin.auth');
        $this->middleware('XSSProtection');
        $this->middleware('VerifyGETCsrfToken', [ 'only' => ['contentDel'] ]);
    }

    public function contents() {
        $contents = DB::table('contents')
                        ->select('*', 'contents.id AS contentID', 'contents.created_at AS contentCreatedDate', 'contents.updated_at AS contentUpdatedDate')
                        ->join('content_categories', 'contents.content_category_id', '=', 'content_categories.id')
                        ->get();
        return view('xmgrx.content.contents')->with(['li_active' => 'content', 'contents' => $contents]);
    }

    public function contentAdd() {
        $contentCats = DB::table('content_categories')->get();
        return view('xmgrx.content.contentAdd')->with(['li_active' => 'content', 'contentCats' => $contentCats]);
    }

    /**
     * sayfa baglanti degeri daha once olusturulmussa sonuna - ekle
     * from contentAddP, contentEditP
     */
    public $contentPageUrl;
    public function contentUrlMake($contentPageUrl, $editID=false) {

        $urlControl = DB::table('contents')->where('content_page_url', $contentPageUrl)->where(function($query) use ($editID) {
            if($editID) {
                $query->where('id', '!=', $editID);
            }
        })->first();

        if(count($urlControl)) {
            $contentPageUrl = $urlControl->content_page_url.'-1';
            $this->contentPageUrl = $contentPageUrl;
            $this->contentUrlMake($contentPageUrl, $editID);
        }else{
            $this->contentPageUrl = $contentPageUrl;
        }
    }

    public function contentAddP(Request $request)
    {
        $rules = [
            'sayfa_adi' => 'required',
            'sayfa_turu' => 'required|exists:content_categories,id'
        ];

        $messages = [
            'sayfa_adi.required' => 'Sayfa Adını boş bırakmayınız',
            'sayfa_turu.required' => 'Sayfa Türü seçiniz',
            'sayfa_turu.exists' => 'Sayfa Türü seçiminiz geçersizdir'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $status = $request->sayfa_durum == 'on' ? '1' : '0';
        $contentPageUrl = !empty($request->sayfa_url) ? slug($request->sayfa_url) : slug($request->sayfa_adi);
        $this->contentUrlMake($contentPageUrl);
        $create = DB::table('contents')->insert([
            'content_category_id' => $request->sayfa_turu,
            'content_name' => $request->sayfa_adi,
            'content_page_url' => $this->contentPageUrl,
            'content_status' => $status,
            'content_short_detail' => $request->kisa_aciklama,
            'content_detail' => $request->sayfa_detay,
            'content_keywords' => $request->keywords,
            'content_description' => $request->description,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime
        ]);

        if($create) {
            return redirect()->route('admin-icerikler')->with('success', 'Yeni içerik oluşturulmuştur');
        }
        return back()->with('failure', 'İçerik oluşturulurken sorun oluştu.');
    }

    public function contentEdit(Request $request)
    {
        $contentCats = DB::table('content_categories')->get();
        $content = DB::table('contents')->where('id', $request->contentID)->first();
        if(!$content) {
            return redirect()->route('admin-icerikler');
        }
        return view('xmgrx.content.contentEdit')->with(['li_active' => 'content', 'content' => $content, 'contentCats' => $contentCats]);
    }

    public function contentEditP(Request $request)
    {
        $rules = [
            'sayfa_adi' => 'required',
            'sayfa_turu' => 'required|exists:content_categories,id'
        ];

        $messages = [
            'sayfa_adi.required' => 'Sayfa Adını boş bırakmayınız',
            'sayfa_turu.required' => 'Sayfa Türü seçiniz',
            'sayfa_turu.exists' => 'Sayfa Türü seçiminiz geçersizdir'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $status = $request->sayfa_durum == 'on' ? '1' : '0';
        $contentPageUrl = !empty($request->sayfa_url) ? slug($request->sayfa_url) : slug($request->sayfa_adi);
        $this->contentUrlMake($contentPageUrl, $request->contentID);
        $update = DB::table('contents')->where('id', $request->contentID)->update([
            'content_category_id' => $request->sayfa_turu,
            'content_name' => $request->sayfa_adi,
            'content_page_url' => $this->contentPageUrl,
            'content_status' => $status,
            'content_short_detail' => $request->kisa_aciklama,
            'content_detail' => $request->sayfa_detay,
            'content_keywords' => $request->keywords,
            'content_description' => $request->description,
            'updated_at' => new \Datetime
        ]);

        if($update) {
            return redirect()->route('admin-icerikler')->with('success', 'İçerik düzenlenmiştir');
        }
        return back()->with('failure', 'İçerik düzenlenirken sorun oluştu.');
    }

    public function contentDel(Request $request)
    {
        if(DB::table('contents')->where('id', $request->contentID)->delete()) {
            return back();
        }
        return back()->with('failure', 'Silme işlemi sırasında bir hata oluştu');
    }
}
