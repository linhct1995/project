@if(Session::has("Cart") != null)
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
@endif