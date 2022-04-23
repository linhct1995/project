<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front-theme/css/index.css')}}">
    <title>Document</title>
</head>

<body>
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
            <div id="login">
                <a href="">Đăng nhập/Đăng ký</a>
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
                            <input id="search_all" type="text" name="name" class="input-text " title="Tên món ăn"
                                role="combobox" aria-haspopup="false" aria-autocomplete="both" autocomplete="off"
                                aria-expanded="false" placeholder="Tên món ăn, nhà hàng" value=""
                                data-input-search-box="">
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
                <div class="product_image">
                    <img src="{{ asset('front-theme/image/bo_sot_tieu.jpg')}}" alt="" height="70%" width="90%">
                    <div class="name_product">Bò cuốn lá lốt</div>
                    <div class="price_product" style="color: red;">150.000 đ</div>
                </div>
                <div class="product_image">
                    <img src="{{ asset('front-theme/image/bo_sot_tieu.jpg')}}" alt="" height="70%" width="90%">
                    <div class="name_product">Bò cuốn lá lốt</div>
                    <div class="price_product" style="color: red;">150.000 đ</div>
                </div>
                <div class="product_image">
                    <img src="{{ asset('front-theme/image/bo_sot_tieu.jpg')}}" alt="" height="70%" width="90%">
                    <div class="name_product">Bò cuốn lá lốt</div>
                    <div class="price_product" style="color: red;">150.000 đ</div>
                </div>
                <div class="product_image">
                    <img src="{{ asset('front-theme/image/bo_sot_tieu.jpg')}}" alt="" height="70%" width="90%">
                    <div class="name_product">Bò cuốn lá lốt</div>
                    <div class="price_product" style="color: red;">150.000 đ</div>
                </div>
                <div class="product_image">
                    <img src="{{ asset('front-theme/image/bac-xiu-200ml_1.jpg')}}" alt="" height="70%" width="90%">
                    <div class="name_product">Bò cuốn lá lốt</div>
                    <div class="price_product" style="color: red;">150.000 đ</div>
                </div>
                <div class="product_image">
                    <img src="{{ asset('front-theme/image/bac-xiu-200ml_1.jpg')}}" alt="" height="70%" width="90%">
                    <div class="name_product">Bò cuốn lá lốt</div>
                    <div class="price_product" style="color: red;">150.000 đ</div>
                </div>
                <div class="product_image">
                    <img src="{{ asset('front-theme/image/bac-xiu-200ml_1.jpg')}}" alt="" height="70%" width="90%">
                    <div class="name_product">Bò cuốn lá lốt</div>
                    <div class="price_product" style="color: red;">150.000 đ</div>
                </div>
                <div class="product_image">
                    <img src="{{ asset('front-theme/image/bo_sot_tieu.jpg')}}" alt="" height="70%" width="90%">
                    <div class="name_product">Bò cuốn lá lốt</div>
                    <div class="price_product" style="color: red;">150.000 đ</div>
                </div>
            </div>
        </div>
        <div class="categories">
            <div class="title_cate">Loại ẩm thực</div>
            <div class="list_cate">
                <div class="cate_image">
                    <img src="{{ asset('front-theme/image/mon_au.jpg')}}" alt="" >
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
                    <h4 class="middle-title" >Thông tin chung</h4>
                </div>
                <div class="footer-middle-link">
                    <ul>
                        <li>Về chúng tôi</li>
                        <li>Câu hỏi  thường gặp</li>
                        <li>Chăm sóc khách hàng</li>
                    </ul>
                </div>
            </div>
            <div class="footer-support">
                <div class="footer-middle-title">
                    <h4 class="middle-title" >Hỗ trợ khách hàng</h4>
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
                    <h4 class="middle-title" >Thông tin liên hệ</h4>
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
   
</body>

</html>