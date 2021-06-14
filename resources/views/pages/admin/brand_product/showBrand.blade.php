@extends('pages.admin.master')\
@section('title','Danh sách nhãn hàng')
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
            <th>Tên nhãn hiệu</th>
            <th>Hiển thị</th>
            <th>Ngày thêm</th>
            <th style="width:100px;">Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach($brs as $br)
          <tr>
            <td>{{$br->name}}</td>
            <td><span class="text-ellipsis">@if($br->status==1)Hiển thị @else Ẩn @endif</span></td>
            <td><span class="text-ellipsis">{{$br->created_at}}</span></td>
            <td>
              <a href="{{route('brand.delete',$br->id)}}" class="btn btn-danger" ui-toggle-class=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
              <a href="{{route('brand.edit',$br->id)}}" class="btn btn-primary" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$brs->links()}}
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          @if($brs->count()<8)
          <small class="text-muted inline m-t-sm m-b-sm">
            Showing {{$brs->count()}} of {{$brs->count()}} items
          </small>
        @else
          <small class="text-muted inline m-t-sm m-b-sm">
            Showing 8 of {{$brs->count()}} items
          </small>
        @endif
        </div>
        
      </div>
    </footer>
  </div>
</div>

 

@endsection