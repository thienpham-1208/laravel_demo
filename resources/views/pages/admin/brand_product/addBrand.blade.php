@extends('pages.admin.master')
@section('title','Thêm danh mục sản phẩm')
@section('content')
<form action="{{route('brand.store')}}" method="POST">
  @csrf
  @if(session()->has('message'))
    <p class="text-success">{{session()->get('message')}}</p>
  @endif
    <div class="form-group">
      @error('name')
      <p class="text-danger">{{$message}}</p>
      @enderror
      <label >Tên nhãn hiệu</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên nhãn hiệu" required>
    </div>
    <div class="form-group">
      <label >Mô tả</label>
      <textarea type="text" class="form-control" name="description" required></textarea>
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