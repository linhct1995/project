<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/style.css')}}" type="text/css">

</head>

<body>
    <form action="" method="POST">
        @csrf
        @if(Auth::user() != null)
        <label for="">Tên</label>
        <input type="text" name="name" placeholder=" Nhập Tên" value="{{Auth::user()->name }}">
        <label for="">SĐT</label>
        <input type="text" name="phone" placeholder=" Nhập SĐT" value="{{Auth::user()->phone }}">
        <label for="">Địa chỉ</label>
        <input type="text" name="address" placeholder=" Nhập Địa chỉ" value="{{Auth::user()->address }}" style="width: 400px;">
        @endif
        <br>
        <div class="cart-table">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th class="p-name">Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>TotalPrice</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Session::has("Cart") != null && !session()->get('cartNew'))
                    @foreach(Session::get("Cart")->products as $item)
                    <tr>
                        <td class="cart-pic first-row"><img src="{{asset( 'storage/' . $item['productInfo']->image)}}" alt="" height="70%" width="90%"></td>
                        <td class="cart-title first-row">
                            <h5>{{$item['productInfo']->name}}</h5>
                        </td>
                        <td class="p-price first-row">{{$item['productInfo']->price}}</td>
                        <td class="qua-col first-row">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="{{$item['quanty']}}" onkeydown="return false;">
                                </div>
                            </div>
                        </td>
                        <td class="total-price first-row">{{$item['price']}}</td>
                    </tr>
                    @endforeach
                    @endif
                    @if(session()->get('cartNew') && count(session()->get('cartNew')) > 0)
                    @foreach(session()->get('cartNew') as $item)
                    <tr>
                        <td class="cart-pic first-row"><img src="{{asset( 'storage/' . $item['productInfo']->image)}}" alt="" height="70%" width="90%">
                            <div>
                                @if(isset($item['message']))
                                {{$item['message']}}
                                @endif
                            </div>
                        </td>
                        <td class="cart-title first-row">
                            <h5>{{$item['productInfo']->name}}</h5>
                        </td>
                        <td class="p-price first-row">{{$item['productInfo']->price}}</td>
                        <td class="qua-col first-row">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="{{$item['quanty']}}" onkeydown="return false;">
                                </div>
                            </div>
                        </td>
                        <td class="total-price first-row">{{$item['price']}}</td>
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
                    <button>Thanh toán</button>
                    @endif
                </div>
            </div>
        </div>
    </form>
</body>

</html>