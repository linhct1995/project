<!-- @if(Session::has("Cart") != null)
<div class="select-items">
    <table>
        <tbody>
            @foreach(Session::get("Cart")->products as $item)
            <tr>
                <td class="si-pic"><img src="{{asset( 'storage/' . $item['productInfo']->image)}}" alt="" height="70%" width="90%"></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>{{$item['productInfo']->price}} x {{$item['quanty']}}</p>
                        <h6>{{$item['productInfo']->name}}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="ti-close" data-id="{{$item['productInfo']->id}}">X</i>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
    <h5>{{Session::get("Cart")->totaPrice}}</h5>
</div>
@endif -->
@if(Session::has("Cart") != null)
@foreach(Session::get("Cart")->products as $item)
<div class="header-cart-item" id="chang-item-cart">
    <div class="header-cart-image">
        <img src="/image/products/{{ $item['productInfo']->image }}" alt="">
    </div>
    <div class="header-cart-info">
        <div class="header-cart-item-name" style="font-size: 15px;">{{$item['productInfo']->name}}</div>
        <div class="header-cart-item-price">{{number_format($item['productInfo']->price)}} x {{$item['quanty']}}</div>
    </div>
    <div class="delete-item">
        <i class="fas fa-trash" data-id="{{$item['productInfo']->id}}"></i>
    </div>
</div>
@endforeach
<div class="select-total">
    <span>total:</span>
    <h5>{{number_format(Session::get("Cart")->totaPrice)}}</h5>
</div>
@endif
<div class="list_cart">
    <a href="{{route('list.cart')}}">List Cart</a>
</div>