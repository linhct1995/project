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
                @foreach($cate as $cate){
                <option value="{{$cate->id}}">{{$cate->name}}</option>
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
        <div class="col-12">
            <div class="form-group">
                <label for="">Chi tiết sản phẩm:</label>
                <textarea name="description" class=form-control rows="10" ></textarea>
                @error('description')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="" class="btn btn-danger">Hủy</a>
        </div>
</form>
@endsection