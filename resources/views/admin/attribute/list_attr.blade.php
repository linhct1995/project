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
            <th scope="col">Thuộc tính</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attribute as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->name}}</td>
            <td>
                <a href="{{route('edit.attribute', ['id' => $item->id])}}" class="btn btn-info">Sửa</a>
                <a href="{{route('delete.attribute', ['id' => $item->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá sản phẩm không');">Xóa</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection