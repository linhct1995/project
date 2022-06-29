@extends('admin.layouts.main')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="">Tên danh mục sản phẩm</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}">
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <label for="">Danh mục cha</label>
        <select name="parent" id="">
            <option value="">Chọn</option>
            @foreach($cate as $key => $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
        </select>
        <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" name="up_image" class="form-control">
            </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="" class="btn btn-danger">Hủy</a>

    </div>

</form>
@endsection