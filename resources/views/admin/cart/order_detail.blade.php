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
<!-- <form action="" method="get">
    <label for="">Tìm kiếm</label>
    <input type="text" name="keyword" placeholder="tìm tên sản phẩm">
    <label for="">giá</label>
    <select name="keyprice" id="">
        <option value=""></option>
        <option value="10" >1-10</option>
        <option value="20" >11-20</option>
        <option value="30" >21-30</option>
    </select>
    <button type="submit">Tìm</button>
</form> -->
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
            <td><img src="{{asset( 'storage/' . $item->image)}}" width="100" /></td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->totalPrice}}</td>
        </tr>
        @endforeach
    </tbody>

</table>

@endsection