@extends('admin.layouts.main')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="add-product-preview-img">
            </div>
            <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" name="up_image" class="form-control">
            </div>
            @error('up_image')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="">Danh mục sản phẩm</label>
            <select name="cate_id" id="" class="form-control">
            <option value="">Chọn danh mục sản phẩm</option>
                @foreach($cate as $cate){
                <option value="{{$cate->id}}">{{$cate->name}}</option>
                }
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <label for="">Thương hiệu </label>
            <select name="brand_id" id="" class="form-control">
                <option value="">Chọn thương hiệu</option>
                @foreach($brands as $brand){
                <option value="{{$brand->id}}">{{$brand->name}}</option>
                }
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <label for="">Giá</label>
            <input type="number" name="price" class="form-control" value="{{old('price')}}" min=0>
            @error('price')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="">Sô lượng</label>
            <input type="number" name="amount" class="form-control" value="{{old('amount')}}" min=0>
            @error('amount')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        @foreach($attribute as $item)
        <div class="col-3">
            <label for="" >{{$item -> name}}</label> 
            <input type="hidden" name="attribute_id[]" value="{{$item->id}}">    
            <select name="attribute_values[]" id="">
                <option value="">Chọn</option>
                @foreach($item->attValue as $items)
                <option value="{{$items -> id}}"> {{$items -> values}} </option>
                @endforeach
            </select>        
        </div>
        @endforeach
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="" class="btn btn-danger">Hủy</a>
        </div>
</form>
@endsection