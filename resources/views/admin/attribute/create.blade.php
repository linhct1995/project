@extends('admin.layouts.main')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
            </div>
        </div>
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="" class="btn btn-danger">Hủy</a>
    </div>
</form>
@endsection