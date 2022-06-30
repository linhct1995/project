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
</style>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Khách hàng</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ </th>
            <th scope="col">Số sản phẩm mua</th>
            <th scope="col">Tổng tiền mua</th>
            <th scope="col">Chi tiết</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cart as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->totalProduct}}</td>
            <td>{{number_format($item->totalPrice)}}</td>
            <td><a href="{{route('admin.order_detail',['id' => $item->id])}}">Hoá đơn chi tiết</a></td>
        </tr>
        @endforeach

    </tbody>

</table>
<div class="d-flex justify-content-end">
    {{$cart->links()}}
</div>
@endsection