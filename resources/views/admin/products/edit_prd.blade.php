@extends('admin.layouts.main')
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{$products->name}}">
                <!-- @error('room_no')
                <div style="color: red;">{{ $message }}</div>
                @enderror -->
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
        </div>
        <div class="col-4">
            <label for="">Giá</label>
            <input type="number" name="price" class="form-control" value="{{$products->price}}">
        </div>
        <div class="col-4">
            <label for="">Sô lượng</label>
            <input type="number" name="amount" class="form-control" value="{{$products->amount}}">
        </div>
        <div class="col-4">
            <label for="">Trạng thái</label>
            <select name="status" id="status" class="form-control">
                <option value="1" <?= $products->status == '1' ? 'selected' : '' ?> >Còn hàng</option>
                <option value="2" <?= $products->status == '2' ? 'selected' : '' ?>>Hết hàng</option>              
            </select>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="">Chi tiết sản phẩm:</label>
                <textarea name="description" class=form-control rows="10">{{$products->description}}</textarea>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="" class="btn btn-danger">Hủy</a>
        </div>
</form>
@endsection