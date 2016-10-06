<?php
/**
 * Created by PhpStorm.
 * User: adil
 * Date: 19.02.2016
 * Time: 13:56
 */
namespace App\Http\Controllers\xmgrx;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Category;

class CategoryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('admin.auth');
        $this->middleware('XSSProtection');
        $this->middleware('VerifyGETCsrfToken', ['only' => ['categoryImageDel', 'categoryDel']]); // CSRF for GET method

        view()->share([
            'categoryImageDestination' => $this->categoryImageDestination, // for image upload and file_exists()
            'categoryImageUrl' => $this->categoryImageUrl // for image src in blades
        ]);
    }

    /**
     * @param int $parentID, opsiyoneldir. default 0 anakategoriler
     * @return view
     */
    public function categories($parentID = 0)
    {
        $currentCategory = $parentID > 0 ? DB::table('categories')->select('id', 'parent_id', 'category_name')->where('id', $parentID)->first() : false;
        $categories = DB::table('categories')->where('parent_id', $parentID)->orderBy('category_order')->get();
        return view('xmgrx.category.categories')->with(['li_active' => 'category', 'categories' => $categories, 'currentCategory' => $currentCategory]);
    }

    /**
     * @return $this
     * * butun kategorileri hiyerarsik bir sekilde
     * * kategori agacina dokmek icin recursive fonksiyon kullanilir
     */
    public function categoryTree()
    {
        $categories = Category::orderBy('category_order')->get();
        function getTree($categories, $parent) {
            $html = '';
            foreach($categories as $cat){
                if($cat->parent_id == $parent){
                    $html .= '<li class="dd-item" data-id="'. $cat->id .'">
                                <div class="dd-handle"> '. $cat->category_name .' </div>';
                    if(count($cat->childrens)){
                        $html .= '<ol class="dd-list">';
                            $html .= getTree($cat->childrens, $cat->id);
                        $html .= '</ol>';
                    }
                    $html .= '</li>';
                }
            }
            return $html;
        }
        $tree = getTree($categories, 0);
        return view('xmgrx.category.categoryTree')->with(['li_active' => 'category', 'categories' => $categories, 'tree' => $tree]);
    }

    /**
     * @param Request $request
     * AJAX - categoryTree.blade
     * * surukle birak yöntemiyle butun kategorilerin
     * * hiyerarsisini ve kendi iclerinde siralamasini duzenler.
     */
    public function categoryTreeEdit(Request $request)
    {
        $tree = $request->tree;
        function categoryTree($tree, $parentID=0) {
            $order = 0;
            foreach($tree as $req) {
                $order++;
                DB::table('categories')->where('id', $req['id'])->update(['parent_id' => $parentID, 'category_order' => $order]);
                if(isset($req['children'])){
                    categoryTree($req['children'], $req['id']);
                }
            }
        }
        categoryTree($tree);
    }

    public function categoryAdd()
    {
        $mainCategories = DB::table('categories')->where('parent_id', 0)->get();
        return view('xmgrx.category.categoryAdd')->with(['li_active' => 'category', 'mainCategories' => $mainCategories]);
    }

    /**
     * @param Request $request
     * AJAX - categoryAdd.blade
     */
    public function getCategory(Request $request)
    {
        $cats = DB::table('categories')->where('parent_id', $request->catID)->get();
        $html = '';
        if(count($cats)){
            $html = '<select class="form-control" name="kategorisi" onchange="mainCats(this)"><option value="alt">Seçiniz</option>';
            foreach($cats as $cat) {
                $html .= '<option value="'.$cat->id.'">'.$cat->category_name.'</option>';
            }
            $html .= '</select>';
        }
        return $html;

    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * $categoryIMageDestination -> AdminController@__contruct
     */
    public function categoryAddP(Request $request)
    {
        $rules = [
            'kategori_adi' => 'required',
            'kategori' => 'required'
        ];

        $messages = [
            'kategori_adi.required' => 'Kategori Adını boş bırakmayınız.',
            'kategori.required' => 'Kategori seçimi yapınız.'
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
                $fileName = slug($request->kategori_adi).'_'.uniqid().'.'.$extension;
                $fileDestination = $this->categoryImageDestination;
                $request->file('resim')->move($fileDestination, $fileName);
            }else{
                return back()->with('failure', 'Resim yüklenirken bir sorun oluştu.');
            }
        }

        $parentID = $request->kategori == "A" ? 0 : $request->kategori;
        $status = $request->kategori_durum == 'on' ? '1' : '0';

        $create = DB::table('categories')->insert([
            'parent_id' => $parentID,
            'category_name' => $request->kategori_adi,
            'category_image' => $fileName,
            'category_status' => $status,
            'meta_keywords' => $request->keywords,
            'meta_description' => $request->description,
            'created_at' => new \Datetime,
            'updated_at' => new \Datetime
        ]);

        if($create) {
            return back()->with('success', $request->kategori_adi.' isimli kategori başarıyla oluşturuldu.');
        }else{
            if(isset($fileDestination) && file_exists($fileDestination.$fileName)) { // resim yukleme islemi yapildiysa $fileDestination degeri vardir ve islem geri alinsin
                unlink($fileDestination.$fileName);
            }
            return back()->with('failure', 'Kategori oluşturulamadı.');
        }

    }

    /**
     * categories.blade
     * @param Request $request / $categoryID, $imageName
     * @return \Illuminate\Http\RedirectResponse
     */
    public function categoryImageDel(Request $request)
    {
        $file = $this->categoryImageDestination.$request->imageName;
        if(file_exists($file)){
            unlink($file);
            DB::table('categories')->where('id', $request->categoryID)->update(['category_image' => '']);
        }
        return back();
    }

    /**
     * main.blade
     * @param Request $request / $categoryID
     * @return string
     */
    public function categoryImageAdd(Request $request)
    {
        $rules = ['resim' => 'required|image|mimes:jpeg,bmp,png'];

        $messages = [
            'resim.required' => 'Herhangi bir resim seçmediniz!',
            'resim.image' => 'Yüklemeye çalıştığınız dosyanın resim olduğundan emin olunuz.',
            'resim.mimes' => 'Yüklemek istediğiniz resimin formatı; jpeg, bmp, png formatlarından biri olmalıdır.'
        ];

        if(!Validator::make($request->all(), $rules)->fails()) {
            $cat = DB::table('categories')->where('id', $request->categoryID)->first();

            if($request->file('resim')->isValid()) {
                $extension = $request->file('resim')->getClientOriginalExtension();
                $fileName = slug($cat->category_name).'_'.uniqid().'.'.$extension;
                $fileDestination = $this->categoryImageDestination;
                $request->file('resim')->move($fileDestination, $fileName);
                $fileOldName = $cat->category_image;
                if( !empty($fileOldName) && file_exists($fileDestination.$fileOldName)) {
                    unlink($fileDestination.$fileOldName);
                }
                DB::table('categories')->where('id', $request->categoryID)->update(['category_image' => $fileName]);
                return back();
            }

            return back()->with('failure', 'Resim yüklenirken bir sorun oluştu.');
        }
        return back();
    }



    public function categoryDel(Request $request)
    {
        $cat = Category::find($request->categoryID);
        $file = $cat->category_image;
        $fileDestination = $this->categoryImageDestination;
        if(!Category::child($request->categoryID)) { // silinmek istenen kategorinin altinda kategori varsa silinmesin
            if($cat->delete()) {
                if(!empty($file) && file_exists($fileDestination.$file)) {
                    unlink($fileDestination.$file);
                }
            }
        }
        return back();
    }

    /**
     * @param Request $request, $categoryID route parameter.
     * @return mixed
     */
    public function categoryEdit($catID)
    {
        $currentCategory = Category::find($catID);
        if($currentCategory) {
            return view('xmgrx.category.categoryEdit')->with(['li_active' => 'category', 'currentCategory' => $currentCategory]);
        }
        return back();
    }

    public function categoryEditP(Request $request)
    {
        $currentCategory = Category::find($request->categoryID);
        if(!$currentCategory) {
            return back();
        }
        $rules = [
            'kategori_adi' => 'required'
        ];

        $messages = [
            'kategori_adi.required' => 'Kategori Adını boş bırakmayınız.'
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

        $fileName = $currentCategory->category_image;
        if($request->hasFile('resim')) {
            if($request->file('resim')->isValid()) {
                $fileDestination = $this->categoryImageDestination;
                if(!empty($fileName) && file_exists($fileDestination.$fileName)) {
                    unlink($fileDestination.$fileName);
                }
                $extension = $request->file('resim')->getClientOriginalExtension();
                $fileName = slug($request->kategori_adi).'_'.uniqid().'.'.$extension;
                $request->file('resim')->move($fileDestination, $fileName);
            }else{
                return back()->with('failure', 'Resim yüklenirken bir sorun oluştu.');
            }
        }

        $status = $request->kategori_durum == 'on' ? '1' : '0';

        $update = DB::table('categories')->where('id', $request->categoryID)->update([
            'category_name' => $request->kategori_adi,
            'category_image' => $fileName,
            'category_status' => $status,
            'meta_keywords' => $request->keywords,
            'meta_description' => $request->description,
            'updated_at' => new \Datetime
        ]);

        if($update) {
            return redirect()->route('admin-kategoriler')->with('success', $request->kategori_adi.' isimli kategori başarıyla guncellendi.');
        }
        return back()->with('failure', 'Kategori oluşturulamadı.');

    }
}