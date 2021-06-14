<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\BrandProduct;
use App\Http\Requests\CreateProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(8);
        return view('pages.admin.product.showProduct',compact('products'));
    }
    public function create(){  
        $cates = Category::all();
        $brands = BrandProduct::all();      
        return view('pages.admin.product.addProduct',compact('cates','brands') );
    }
    public function store(CreateProductRequest $request){
        $product = new Product;
        $imgFile = $request->image->getClientOriginalName();
        $product->name = $request->name;
        $product->image = $imgFile;
        $product->price = $request->price;
        $product->cate_id = $request->cate_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->status = $request->status;
        $pathUpload = public_path('/images/product');
        $request->image->move($pathUpload,$imgFile);
        $product->save();
        return back()->with('message','Thêm danh mục thành công');
        
       
    }
    public function edit($id){
        $product = Product::find($id);
        $cates = Category::all();
        $brands = BrandProduct::all();  
        return view('pages.admin.product.editProduct', compact('product', 'cates', 'brands'));
    }
    public function update($id, CreateProductRequest $request){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->cate_id = $request->cate_id;
        $product->brand_id = $request->brand_id;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->status = $request->status;
        if($request->hasFile('image')){
            $imgFile = $request->image->getClientOriginalName();
            $product->image = $imgFile;
            $pathUpload = public_path('/images/product');
            $request->image->move($pathUpload,$imgFile);
        }
        $product->save();
        return redirect(route('product.index'));
    }
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return back();
    }
    //hiển thị sản phẩm phía người dùng
    public function show($name){
        $cates = Category::all();
        $brands = BrandProduct::all();
        $product_detail = Product::where('name',$name)->first();
        $products = Product::where('cate_id',$product_detail->cate_id)->limit(3);
        return view('pages.productDetail',compact('cates','brands','product_detail','products'));
       
    }
}
