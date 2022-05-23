<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front-theme/css/index.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <title>Document</title>
</head>

<body>
    <div>
        @if(Auth::user() != null)
        {{Auth::user()->name }}
        @endif
    </div>
    <div id="main">
        <header>
            <div id="logo">
                <img src="{{ asset('front-theme/image/logo.png')}}" alt="" width="74px" height="83px">
            </div>
            <div id="nav_bar">
                <ul>
                    <li class="nav_bar_li">Về chúng tôi</li>
                    <li class="nav_bar_li">Câu hỏi thường gặp</li>
                    <li class="nav_bar_li">Hotline: <span style="color: red;"> 1900 86 8667</span></li>
                </ul>
            </div>
            <div class="col-lg-3 text-right col-md-3">
                <ul class="nav-right">
                    <li class="cart-icon">
                        <a href="#"><i class="fas fa-cart-plus "></i></a>
                        <div class="cart-hover">
                            <div id="chang-item-cart">
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
                            </div>
                            <div class="select-button">
                                <div class="view-card"><a href="#" class="primary-btn ">VIEW CARD</a></div>
                                <div class="checkout-btn"><a href="#" class="primary-btn ">CHECK OUT</a></div>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="login">
                <a href="{{route('login')}}">Đăng nhập/Đăng ký</a>
            </div>
        </header>
        <hr />
        <div class="image">
            <div class="item_image">
                <img src="{{ asset('front-theme/image/2_RESIZE_Homepage_Website_Eatwell.jpg')}}" alt="">
            </div>

        </div>
        <div class="search">
            <div class="form_search">
                <form action="" method="POST">
                    <ul>
                        <li>Tất cả</li>
                        <li>Ăn liền</li>
                        <li>Sơ chế</li>
                        <li>Đặt tiệc</li>
                    </ul>
                    <div class="search_name">
                        <div class="name">
                            <label for="">Tên món ăn</label> <br>
                            <input id="search_all" type="text" name="name" class="input-text " title="Tên món ăn" role="combobox" aria-haspopup="false" aria-autocomplete="both" autocomplete="off" aria-expanded="false" placeholder="Tên món ăn, nhà hàng" value="" data-input-search-box="">
                        </div>
                        <div class="province">
                            <label for="">Khu vực</label> <br>
                            <select name="" id="">
                                <option value=""></option>
                                <option value="1">Hà Nội</option>
                                <option value="2">Hồ Chí Minh</option>
                            </select>
                        </div>
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="restaurant">
            <div class="restau_title">Nhà hàng nổi bật</div>
            <div class="list_restaurant">
                <div class="restaurant_image">
                    <img src="{{ asset('front-theme/image/0401_Restaurant_Banner.png')}}" alt="" height="80%">
                </div>
                <div class="restaurant_image">
                    <img src="{{ asset('front-theme/image/restaurant2.jpg')}}" alt="" height="80%">
                </div>
                <div class="restaurant_image">
                    <img src="{{ asset('front-theme/image/0401_Restaurant_Banner.png')}}" alt="" height="80%">
                </div>
            </div>
        </div>
        <div class="products">
            <div class="title_products">Sản phẩm</div>
            <div class="list_products">
                @foreach($product as $prd)
                @if(($prd -> amount ) > 0)
                <div class="product_image">
                    <img src="{{asset( 'storage/' . $prd->image)}}" alt="" height="70%" width="90%">
                    <div class="add-cart"><a onclick="AddCart({{$prd->id}})">Add Cart</a></div>
                    <div class="name_product"><a href="{{route('detail.prd',['id'=>$prd->id])}}">{{$prd->name}}</a></div>
                    <div class="price_product" style="color: red;">{{number_format($prd->price)}}</div>
                    <div class="price_product" style="color: blue;">Số lượng : {{$prd->amount}}</div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
        <div class="categories">
            <div class="title_cate">Loại ẩm thực</div>
            <div class="list_cate">
                <div class="cate_image">
                    <img src="{{ asset('front-theme/image/mon_au.jpg')}}" alt="">
                    <div class="mask">
                        <h3>Món Âu</h3>
                    </div>
                </div>
                <div class="cate_image">
                    <img src="{{ asset('front-theme/image/mon_chay.png')}}" alt="">
                </div>
                <div class="cate_image">
                    <img src="{{ asset('front-theme/image/mon_au.jpg')}}" alt="">
                </div>
                <div class="cate_image">
                    <img src="{{ asset('front-theme/image/mon_chay.png')}}" alt="">
                </div>
                <div class="cate_image">
                    <img src="{{ asset('front-theme/image/mon_au.jpg')}}" alt="">
                </div>
                <div class="cate_image">
                    <img src="{{ asset('front-theme/image/mon_chay.png')}}" alt="">
                </div>
            </div>
        </div>
        <footer>
            <div class="footer">
                <div class="img_footer">
                    <img src="{{ asset('front-theme/image/logo.png')}}" alt="">
                </div>
                <div class="footer-middle">
                    <div class="footer-middle-title">
                        <h4 class="middle-title">Thông tin chung</h4>
                    </div>
                    <div class="footer-middle-link">
                        <ul>
                            <li>Về chúng tôi</li>
                            <li>Câu hỏi thường gặp</li>
                            <li>Chăm sóc khách hàng</li>
                        </ul>
                    </div>
                </div>
                <div class="footer-support">
                    <div class="footer-middle-title">
                        <h4 class="middle-title">Hỗ trợ khách hàng</h4>
                    </div>
                    <div class="footer-middle-link">
                        <ul>
                            <li>Quy chế hoạt động</li>
                            <li>Chính sách bảo mật thông tin cá nhân</li>
                            <li>Chính sách giải quyết khiếu nại</li>
                            <li>Chính sách hủy đơn - hoàn tiền</li>
                            <li>Chính sách thanh toán</li>
                            <li>Chính sách vận chuyển</li>
                        </ul>
                    </div>
                </div>
                <div class="footer-contact">
                    <div class="footer-middle-title">
                        <h4 class="middle-title">Thông tin liên hệ</h4>
                    </div>
                    <div class="footer-middle-link">
                        <ul>
                            <li>Mail:customersupport@patyko.vn</li>
                            <li>Phone:1900868667</li>

                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        function AddCart(id) {
            let AuthUser = "{{{ (Auth::user()) ? Auth::user()->id : null }}}";
            if (AuthUser) {
                $.ajax({
                    url: 'AddCart/' + id,
                    type: 'GET'
                }).done(function(response) {
                    $("#chang-item-cart").empty();
                    $("#chang-item-cart").html(response);
                    alertify.success('Thêm thành công');
                });
            } else {
                alertify.success('Bạn chưa đăng nhập nên không thể mua hàng');
            }

        }
        $('#chang-item-cart').on("click", ".si-close i", function() {
            $.ajax({
                url: 'DeleteItemCart/' + $(this).data("id"),
                type: 'GET'
            }).done(function(response) {
                $("#chang-item-cart").empty();
                $("#chang-item-cart").html(response);
                alertify.success('Xoá sản phẩm thành công');
            });
            // console.log($(this).data("id"));
        });
    </script>
</body>

</html>