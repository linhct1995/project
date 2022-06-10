@extends('admin.layouts.main')
@section('content')
<?php

use Illuminate\Support\Facades\DB;


?>
<form action="" method="get">
    <label for="">Tìm kiếm</label>
    <input type="text" name="keyword" placeholder="tìm tên sản phẩm">
    <label for="">giá</label>
    <select name="keyprice" id="">
        <option value=""></option>
        <option value="10">1-10</option>
        <option value="20">11-20</option>
        <option value="30">21-30</option>
    </select>
    <button type="submit">Tìm</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Sản phẩm</th>
            <th scope="col" class="cate">Thể loại</th>
            <th scope="col">Thương hiệu</th>
            <th scope="col">Thông số kỹ thuật</th>
            <th scope="col"></th>
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
                            <?php if ($product->amount > 0) { ?>
                                <span class="text-primary">Còn hàng</span>
                            <?php } else { ?>
                                <span class="text-danger">Hết hàng</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </td>
            <td class="flex-container">{{$product->cate->name}}</td>
            <td class="flex-container">{{$product->brand->name}}</td>
            <td>
                <table class="table">
                    <tbody>
                        @foreach($product->Attribute as $items)
                        <tr>
                            <td style="font-weight: bold;">{{$items->name}}</td>                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
            <td>
                <table class="table">
                    <tbody>
                        @foreach($product->AttribueValue as $items)
                        <tr>
                            <td>{{$items->values}}</td>   
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </td>
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