<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandProduct;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\EditBrandRequest;

class BrandProductController extends Controller
{
    public function index(){
        $brs = BrandProduct::paginate(8);
        return view('pages.admin.brand_product.showBrand',compact('brs'));
    }
    public function create(){        
        return view('pages.admin.brand_product.addBrand' );
    }
    public function store(CreateBrandRequest $request){
        $br = new BrandProduct;
        $br->name = $request->name;
        $br->description = $request->description;
        $br->status = $request->status;
        $br->save();
        return back()->with('message','Thêm thương hiệu thành công');
    }
    public function edit($id){
        $br = BrandProduct::find($id);
        return view('pages.admin.brand_product.editBrand', compact('br'));
    }
    public function update($id, EditBrandRequest $request){
        $br = BrandProduct::find($id);
        $br->name = $request->name;
        $br->description = $request->description;
        $br->status = $request->status;
        $br->save();
        return redirect('/admin/brandproduct');
    }
    public function delete($id){
        $br = BrandProduct::find($id);
        $br->delete();
        return back();
    }
    //hiển thị sản phẩm theo brand
    public function brand($brand){
        $cates = Category::all();
        $brand = BrandProduct::where('name',$brand)->first();
        $brands = BrandProduct::all();
        $products = $brand->product;
        return view('pages.showProductBrand', compact('products', 'brands', 'cates','brand'));
        
        
    }
}
