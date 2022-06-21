@extends('frontend.index')
@section('style')
<link rel="stylesheet" href=" {{ asset('theme-frontwatch/css/detail.css')}}">
@endsection
@section('content')
<hr>
    <a href="" class="home_page">Trang chủ</a>/
    <span>{{$detail->name}}</span>
    <div class="content row">
        <div class="image_product col-6">
            <img src="{{asset( 'storage/public/' . $detail->image)}}" alt="" width="80%">
        </div>
        <div class="information_product col-6">
            <div class="title">Thông số kỹ tduật</div>
            <table class="table">

                <tbody>
                    <tr>
                        <td style="font-weight: bold;">Thương hiệu</td>
                        <td>{{$detail->name}}</td>
                    </tr>
                    @foreach($getAttriValue as $key => $items)
                    <tr>
                        <td style="font-weight: bold;">{{$key}}</td>
                        <td>{{$items}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="add_cart" onclick="AddCart({{$detail->id}})"><button>Đặt mua ngay</button></div>
        </div>
    </div>
    <div class="comment">Viết bình luận</div>
    <form action="" class="form" id="form">
        @csrf
        @if(Auth::user() != null)
        <input class="form-comment" type="hidden" name="customer_name" value="{{Auth::user()->name}}">
        @endif
        <input class="form-comment" type="hidden" name="id_prd" value="{{$detail->id}}">
       <textarea class="form-comment" name="comment" id="comment" cols="190" rows="5"></textarea>
        <button type="submit">Gửi</button>
    </form>
    <div class="show_comment">
        <div class="title_comment">Bình luận của khách hàng</div>
        @foreach($comment as $key => $item)  
        <div class="customer_name">Khách hàng : {{$item -> customer_name}}</div>
        <div class="content_comment"> Nội dung :{{$item -> content}} </div>
        @endforeach
    </div>
    <hr>
    <div class="related_products">
        <div class="related_products_title" style="font-weight: bold; font-size: 20px;">Sản phẩm liên quan</div>
        <div class="related_products_grid row">
            @foreach($ccc as $items)
            <div class="product col-3">
                <img src="{{asset( 'storage/public/' . $items->image)}}" alt="">
                <div class="name-product"><a href="">{{$items->name}}</a></div>
                <div class="product-price">{{number_format($items->price)}} ₫</div>
                <span class="product-status">
                    Tình trạng :
                    <?php if ($items->amount > 0) { ?>
                        <span class="text-primary">Còn hàng</span>
                    <?php } else { ?>
                        <span class="text-danger">Hết hàng</span>
                    <?php }
                    ?>
                </span>
                <span class="cart"><button>Mua hàng</button></span>
            </div>
            @endforeach
        </div>
    </div>
@endsection


