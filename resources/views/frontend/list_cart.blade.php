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
    <div id="preloder">
        <div class="loader"></div>
    </div>


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
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cart-pic first-row"><img src="{{ asset('template/img/cart-page/product-1.jpg')}}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>Pure Pineapple</h5>
                                    </td>
                                    <td class="p-price first-row">$60.00</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">$60.00</td>
                                    <td class="close-td first-row"><i class="ti-close"></i></td>
                                    <td class="close-td first-row""><i class=" ti-save"></i></td>
                                </tr>
                                <tr>
                                    <td class="cart-pic"><img src="{{ asset('template/img/cart-page/product-2.jpg')}}" alt=""></td>
                                    <td class="cart-title">
                                        <h5>American lobster</h5>
                                    </td>
                                    <td class="p-price">$60.00</td>
                                    <td class="qua-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price">$60.00</td>
                                    <td class="close-td"><i class="ti-close"></i></td>
                                    <td class="close-td"><i class="ti-save"></i></td>
                                </tr>
                                <tr>
                                    <td class="cart-pic"><img src="{{ asset('template/img/cart-page/product-3.jpg')}}" alt=""></td>
                                    <td class="cart-title">
                                        <h5>Guangzhou sweater</h5>
                                    </td>
                                    <td class="p-price">$60.00</td>
                                    <td class="qua-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price">$60.00</td>
                                    <td class="close-td"><i class="ti-close"></i></td>
                                    <td class="close-td"><i class="ti-save"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>$240.00</span></li>
                                    <li class="cart-total">Total <span>$240.00</span></li>
                                </ul>
                                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
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
</body>

</html>