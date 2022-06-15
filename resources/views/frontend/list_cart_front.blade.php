<div class="cart-table">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th class="p-name">Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>TotalPrice</th>
                <th>Delete</th>
                <th>Save</th>
            </tr>
        </thead>
        <tbody>
            @if(Session::has("Cart") != null)
            @foreach(Session::get("Cart")->products as $item)
            <tr>
                <td class="cart-pic first-row"><img src="{{asset( 'storage/' . $item['productInfo']->image)}}" alt="" height="70%" width="90%"></td>
                <td class="cart-title first-row">
                    <h5>{{$item['productInfo']->name}}</h5>
                </td>
                <td class="p-price first-row">{{number_format($item['productInfo']->price)}}</td>
                <td class="qua-col first-row">
                    <div class="quantity">
                        <div class="pro-qty">
                        <input id="quanty-item-{{$item['productInfo']->id}}" type="text" value="{{$item['quanty']}}">
                        </div>
                    </div>
                </td>
                <td class="total-price first-row">{{number_format($item['price'])}}</td>
                <td class="close-td first-row" onclick="DeleteItemCart({{$item['productInfo']->id}})"><i class="fas fa-trash"></i></td>
                <td class="close-td first-row"><i class="fas fa-save" onclick="SaveItemCart({{$item['productInfo']->id}})"></i></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-4 offset-lg-8">
        <div class="proceed-checkout">
            @if(Session::has("Cart") != null)
            <ul>
                <li class="subtotal">TotalQuanty <span>{{Session::get("Cart")->totalQuanty}}</span></li>
                <li class="cart-total">TotalPrice <span>$ {{Session::get("Cart")->totaPrice}}</span></li>
            </ul>
            <a href="{{route('checkout')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
            @endif
        </div>
    </div>
</div>

<script src="{{ asset('template/js/main.js')}}"></script>