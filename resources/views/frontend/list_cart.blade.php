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
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
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
                                        <img src="{{asset( 'storage/' . $item['productInfo']->image)}}" alt="" height="70%" width="90%">

                                    </td>
                                    <td class="cart-title first-row">
                                        <h5>{{$item['productInfo']->name}}</h5>
                                    </td>
                                    <td class="p-price first-row">{{$item['productInfo']->price}}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input id="quanty-item-{{$item['productInfo']->id}}" type="text" value="{{$item['quanty']}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{$item['price']}}</td>
                                    <td class="close-td first-row" onclick="DeleteItemCart({{$item['productInfo']->id}})"><i class="ti-close"></i></td>
                                    <td class="close-td first-row"><i class=" ti-save" onclick="SaveItemCart({{$item['productInfo']->id}})"></i></td>
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