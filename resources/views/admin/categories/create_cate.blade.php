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

        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="" class="btn btn-danger">Hủy</a>

    </div>

</form>
@endsection