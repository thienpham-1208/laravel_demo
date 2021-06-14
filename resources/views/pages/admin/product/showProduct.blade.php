@extends('pages.admin.master')\
@section('title','Danh sách danh mục sản phẩm')
@section('content')

	
		
  <div class="panel panel-default">
    <div class="panel-heading">
      Responsive Table
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Giá</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Hiển thị</th>
            <th style="width:30px;">Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td>{{$product->name}}</td>
            <td>
                <img src="{{asset('images/product/'.$product->image)}}" alt="{{$product->name}}">
            </td>
            <td>{{number_format($product->price)}}vnđ</td>
            <td>{{ucfirst($product->category->name)}}</td>
            <td>{{ucfirst($product->brand->name)}}</td>
            <td><span class="text-ellipsis">@if($product->status==1)Hiển thị @else Ẩn @endif</span></td>
            <td>
              <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger" ui-toggle-class=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
              <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$products->links()}}
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          @if($products->count()<8)
          <small class="text-muted inline m-t-sm m-b-sm">
            Showing {{$products->count()}} of {{$products->count()}} items
          </small>
        @else
          <small class="text-muted inline m-t-sm m-b-sm">
            Showing 8 of {{$products->count()}} items
          </small>
        @endif
        </div>
        
      </div>
    </footer>
  </div>
</div>

 

@endsection