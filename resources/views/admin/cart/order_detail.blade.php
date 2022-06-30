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

    .cate {
        width: 150px;
    }
    .name_customer{   
        text-align: center;  
        font-size: 20px;   
        padding-bottom: 30px;
    }
    .name_customer>span{
        color: red;
    }
</style>
<div class="name_customer">Khách hàng : <span>{{$cart->name}}</span></div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Ảnh sản phẩm</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng tiền </th>
        </tr>
    </thead>
    <tbody>
        @foreach($order_detail as $item)
        <tr>
            <td>{{$item->name_prd}}</td>
            <td><img src="/image/products/{{ $item->image }}" width="100" /></td>
            <td>{{number_format($item->price)}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{number_format($item->totalPrice)}}</td>
        </tr>
        @endforeach
    </tbody>

</table>

@endsection