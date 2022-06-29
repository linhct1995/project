@extends('frontend.index')
@section('content')
@include("frontend.layouts.banner")
<div class="shopify-section">
    <span class="shopify-section-title">
        <h5>Thương hiệu nổi bật</h5>
    </span>
    <div class="image-wrap row">
        @foreach($brand as $brands)
        <div class="collection-item col-4">
            <div class="collection-item-image"><img src="{{asset( 'storage/' . $brands->image)}}" alt=""></div>
            <div class="collection-item-name">{{$brands->name}}</div>
        </div>
        @endforeach
    </div>
</div>
<div class="shopify-section">
    <span class="shopify-section-title">
        <h5>Sản phẩm nổi bật</h5>
    </span>
    <div class="grid-product row">
        @foreach($product as $item)
        <div class="product col-3">
            <img src="{{asset( 'storage/' . $item->image)}}" alt="">
            <div class="name-product"><a href="{{route('detail.prd',['id'=>$item->id])}}">{{$item->name}}</a></div>
            <div class="product-price">{{number_format($item->price)}}</div>
            <span class="product-status">Tình trạng :
                <?php if ($item->amount > 0) { ?>
                    <span class="text-primary">Còn hàng</span>
                <?php } else { ?>
                    <span class="text-danger">Hết hàng</span>
                <?php }
                ?>
            </span>
            <span class="cart" onclick="AddCart({{$item->id}})"><button>Mua hàng</button></span>
        </div>
        @endforeach
    </div>
    <!-- <div class="d-flex justify-content-end">
        {{$product->links()}}
    </div> -->
</div>

<hr>
@endsection
