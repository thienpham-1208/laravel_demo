<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\BrandProduct;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        $cates = Category::paginate(8);
        return view('pages.admin.category.showCategory',compact('cates'));
    }
    public function create(){        
        return view('pages.admin.category.addCategory' );
    }
    public function store(CreateCategoryRequest $request){
        $cate = new Category;
        $cate->name = $request->name;
        $cate->description = $request->description;
        $cate->status = $request->status;
        $cate->save();
        return back()->with('message','Thêm danh mục thành công');
    }
    public function edit($id){
        $cate = Category::find($id);
        return view('pages.admin.category.editCategory', compact('cate'));
    }
    public function update($id, EditCategoryRequest $request){
        $cate = Category::find($id);
        $cate->name = $request->name;
        $cate->description = $request->description;
        $cate->status = $request->status;
        $cate->save();
        return redirect('/admin/category');
    }
    public function delete($id){
        $cate = Category::find($id);
        $cate->delete();
        return back();
    }
    //show product theo category
    public function category($category){
        $cates = Category::all();
        $cate = Category::where('name',$category)->first();
        $brands = BrandProduct::all();
        $products = $cate->product;
        return view('pages.showProductCategory', compact('products', 'brands', 'cates','cate'));
        
    }
}
