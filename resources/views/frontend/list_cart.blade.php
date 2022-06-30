<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Cart</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    
    <link rel="stylesheet" href="{{ asset('template/css/style.css')}}" type="text/css">
    @include('frontend.layouts.style')
</head>

<body>
@include("frontend.layouts.navbar")
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="list-cart">
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
                                    <td class="cart-pic first-row">
                                        <img src="/image/products/{{ $item['productInfo']->image }}" alt="" height="70%" width="90%">

                                    </td>
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
                                    <li class="cart-total">TotalPrice <span>{{number_format(Session::get("Cart")->totaPrice)}}</span></li>
                                </ul>
                                <a href="{{route('checkout')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->

    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('template/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('template/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('template/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('template/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('template/js/jquery.zoom.min.js')}}"></script>
    <script src="{{ asset('template/js/jquery.dd.min.js')}}"></script>
    <script src="{{ asset('template/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('template/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('template/js/main.js')}}"></script>
    <script>
        function DeleteItemCart(id) {
            $.ajax({
                url: 'Delete-List-ItemCart/' + id,
                type: 'GET'
            }).done(function(response) {
                RenderListCart(response);
            });
        }

        function SaveItemCart(id) {
            $.ajax({
                url: 'Save-List-ItemCart/' + id + '/' + $("#quanty-item-" + id).val(),
                type: 'GET'
            }).done(function(response) {
                RenderListCart(response);
                alertify.success('Xoá sản phẩm thành công');
            });
        }

        function RenderListCart(response) {
            $("#list-cart").empty();
            $("#list-cart").html(response);
            // alertify.success('Xoá sản phẩm thành công');
        }
    </script>
</body>

</html>