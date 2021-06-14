@extends('pages.admin.master')
@section('title','Thêm sản phẩm')
@section('content')
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  @if(session()->has('message'))
    <p class="text-success">{{session()->get('message')}}</p>
  @endif
    <div class="form-group">
      @error('name')
      <p class="text-danger">{{$message}}</p>
      @enderror
      <label >Tên sản phẩm </label>
      <input  type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm" required>
    </div>
    <div class="form-group">
        <label >Ảnh sản phẩm</label><br>
        <input required id="imgFile" type="file" name="image" class="form-control hidden" onchange="changeImg(this)">
        <img src="https://cdn4.iconfinder.com/data/icons/hand-conversation-colours/91/Hand_31-512.png" width="200px"  id="choseImage" >
      </div>
      <div class="form-group">
        <label >Giá sản phẩm</label>
        <input type="number" name="price" required class="form-control">
      </div>
    <div class="form-group">
      <label >Mô tả sản phẩm</label>
      <textarea type="text" class="form-control ckeditor" name="description" required placeholder="Nhập mô tả"></textarea>
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
        <textarea type="text" class="form-control ckeditor" name="content" required placeholder="Nhập nội dung"></textarea>
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
                <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label >Nhãn hiệu</label><br>
        <select name="brand_id">
            <option value="0" disabled>Chọn nhãn hiệu</option>
            @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
      <label >Kích thước</label>
      <input type="text" class="form-control" name="size" required placeholder="Nhập kích thước">
    </div>
    <div class="form-group">
      <label >Màu sắc</label>
      <input type="text" class="form-control" name="color" required placeholder="Nhập màu sắc">
    </div>
    <div class="form-group">
        <label >Trạng thái hiển thị</label><br>
        <select name="status" class="form-control">
            <option value="0">Ẩn</option>
            <option value="1" selected>Hiển thị</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
@endsection