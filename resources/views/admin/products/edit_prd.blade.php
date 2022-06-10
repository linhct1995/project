@extends('admin.layouts.main')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{$products->name}}">
                @error('name')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="add-product-preview-img">
                <img src="{{asset('storage/' . $products->image)}}" class="img-thumbnail" width="100">
            </div>
            <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" name="up_image" class="form-control">
            </div>
            @error('up_image')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-4">
            <label for="">Giá</label>
            <input type="number" name="price" class="form-control" value="{{$products->price}}">
            @error('price')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-4">
            <label for="">Sô lượng</label>
            <input type="number" name="amount" class="form-control" value="{{$products->amount}}">
            @error('amount')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="">Danh mục sản phẩm</label>
            <select name="cate_id" id="" class="form-control">
                @foreach($cate as $cate){
                <option value="{{$cate->id}}" {{ $products->cate_id == $cate->id ? "selected" : "" }}>{{$cate->name}}</option>
                }
                @endforeach
            </select>
        </div>
        <div class="col-4">
            <label for="">Thương hiệu sản phẩm</label>
            <select name="brand_id" id="" class="form-control">
                @foreach($brand as $brand){
                <option value="{{$brand->id}}" {{ $products->brand_id == $brand->id ? "selected" : "" }}>{{$brand->name}}</option>
                }
                @endforeach
            </select>
        </div>
    </div>
    <div style="font-weight: bold;">Thông số kỹ thuật sản phẩm</div>
    <div class="row">
        @foreach($attribute as $item)
        <div class="col-3">
            <label for="">{{$item -> name}}</label>
            <input type="hidden" name="attribute_id[]" value="{{$item->id}}">

            <select name="attribute_values[{{$item->id}}]" id="">
                <option value="">Chọn</option>
                @foreach($item->attValue as $items)
                <option value="{{$items -> id}}" {{ $prd_att  = $items->id ? "selected" : "" }} > {{$items -> values}} </option>
                @endforeach
            </select>
        </div>
        @endforeach
        
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="" class="btn btn-danger">Hủy</a>
    </div>
</form>
@endsection