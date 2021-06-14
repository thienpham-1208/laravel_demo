@extends('pages.admin.master')
@section('title','Thêm sản phẩm')
@section('content')
<form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @if(session()->has('message'))
    <p class="text-success">{{session()->get('message')}}</p>
  @endif
    <div class="form-group">
      @error('name')
      <p class="text-danger">{{$message}}</p>
      @enderror
      <label >Tên sản phẩm </label>
      <input  type="text" class="form-control" id="name" name="name" value="{{$product->name}}" >
    </div>
    <div class="form-group">
        <label >Ảnh sản phẩm</label><br>
        <input  id="imgFile" type="file" name="image" class="form-control hidden" onchange="changeImg(this)">
        <img src="{{asset('images/product/'.$product->image)}}" width="200px"  id="choseImage" >
      </div>
      <div class="form-group">
        <label >Giá sản phẩm</label>
        <input type="number" name="price"  class="form-control" value="{{$product->price}}">
      </div>
    <div class="form-group">
      <label >Mô tả sản phẩm</label>
      <textarea type="text" class="form-control ckeditor" name="description" >{{$product->description}}</textarea>
    </div>
    <script type="text/javascript">
      var editor = CKEDITOR.replace('description',{
        language:'vi',
        filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
        filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
      });
    </script>
    
    <div class="form-group">
        <label >Nội dung sản phẩm</label>
        <textarea type="text" class="form-control ckeditor" name="content" >{{$product->content}}</textarea>
    </div>
    <script type="text/javascript">
      var editor = CKEDITOR.replace('content',{
        language:'vi',
        filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
        filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
      });
    </script>
    <div class="form-group">
        <label >Danh mục sản phẩm</label><br>
        <select name="cate_id">
            <option value="0" disabled>Chọn danh mục</option>
            @foreach($cates as $cate)
                <option value="{{$cate->id}}" @if($product->cate_id == $cate->id) selected @endif>{{$cate->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label >Nhãn hiệu</label><br>
        <select name="brand_id">
            <option value="0" disabled>Chọn nhãn hiệu</option>
            @foreach($brands as $brand)
                <option value="{{$brand->id}}" @if($product->brand_id == $brand->id) selected @endif>{{$brand->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
      <label >Kích thước</label>
      <input type="text" class="form-control" name="size" value="{{$product->size}}" >
    </div>
    <div class="form-group">
      <label >Màu sắc</label>
      <input type="text" class="form-control" name="color" value="{{$product->color}}">
    </div>
    <div class="form-group">
        <label >Trạng thái hiển thị</label><br>
        <select name="status" class="form-control">
            <option value="0" @if($product->status == 0) selected @endif>Ẩn</option>
            <option value="1" @if($product->status == 1) selected @endif>Hiển thị</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
@endsection