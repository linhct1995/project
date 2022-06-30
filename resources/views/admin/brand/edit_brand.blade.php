@extends('admin.layouts.main')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <div class="col-6">
            <label for="">Tên thương hiệu sản phẩm</label>
            <input type="text" name="name" class="form-control" value="{{$brand->name}}">
        </div>
        <div class="col-6">
            <div class="add-product-preview-img">
                <img src="/image/brands/{{ $brand->image }}" class="img-thumbnail" width="100">
            </div>
            <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" name="up_image" class="form-control">
            </div>
            @error('up_image')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{route('list.brand')}}" class="btn btn-danger">Hủy</a>

    </div>

</form>
@endsection