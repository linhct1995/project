@extends('admin.layouts.main')
@section('content')
<style>
    .flex-container {
        display: flex;
    }

    .flex-container>.detail {
        width: max-content;
    }

    form>button {
        border-radius: 5px;
    }

    form>select {
        margin: 0px 10px 0px 10px;
        height: 30px;
    }
    
</style>
<form action="" method="get">
    <label for="">Tìm kiếm</label>
    <input type="text" name="keyword" placeholder="tìm tên danh mục">
    <button type="submit">Tìm</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên thương hiệu</th>
            <th scope="col">Ảnh thương hiệu</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($brand as $brand)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$brand->name}}</td>
            <td><img src="{{asset( 'storage/public/' . $brand->image)}}" width="100" /></div></td>
            <td>
                <a  class="btn btn-info">Sửa</a>
                <a  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá sản phẩm không');">Xóa</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection