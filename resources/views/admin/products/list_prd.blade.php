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
    .cate{
        width: 150px;
    }
</style>
<form action="" method="get">
    <label for="">Tìm kiếm</label>
    <input type="text" name="keyword" placeholder="tìm tên sản phẩm">
    <label for="">giá</label>
    <select name="keyprice" id="">
        <option value=""></option>
        <option value="1" min="1" max="10">1-10</option>
        <option value="2" min="11" max="20">10-20</option>
        <option value="3" min="21" max="30">20-30</option>
    </select>
    <button type="submit">Tìm</button>
</form>
<table class="table">
    <thead>
        <tr>        
            <th scope="col">Sản phẩm</th>
            <th scope="col" class="cate">Danh mục </th>
            <th scope="col">Mô tả</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>          
            <td>
                <div class="flex-container">
                    <div><img src="{{asset( 'storage/' . $product->image)}}" width="100" /></div>
                    <div class="detail">
                        <div>Tên sản phẩm:{{$product->name}}</div>
                        <div>Giá sản phẩm:{{$product->price}}</div>
                        <div>Số lượng:{{$product->amount}}</div>
                        <div>Trạng thái:
                            <?php if ($product->status == '1') { ?>
                                <span class="text-primary">Còn hàng</span>
                            <?php } else { ?>
                                <span class="text-danger">Hết hàng</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </td>
            <td class="flex-container">{{$product->cate->name}}</td>
            <td>{{$product->description}}</td>
            <td>
                <a href="{{route('edit.prd', ['id' => $product->id])}}" class="btn btn-info">Sửa</a>
                <a href="{{route('delete.prd', ['id' => $product->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá sản phẩm không');">Xóa</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<div class="d-flex justify-content-end">
    {{$products->links()}}
</div>
@endsection