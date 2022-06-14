<?php

use App\Models\Cate;

$cate = Cate::all();
?>
<header>
    <div class="header-item">
        <div class="navbar">
            <div class="navbar-item"><a href="">Menu</a></div>
            <?php
            foreach ($cate as $cate_parent) : ?>
                <div class="navbar-item">
                    <?php if ($cate_parent->parent == 0) : ?>
                        <a href="" class="watch_man">{{$cate_parent->name}}</a>
                    <?php endif; ?>
                    <ul class="subnav">
                        <?php foreach ($cate as $cate_childrent) : ?>
                            <?php if ($cate_childrent->parent == $cate_parent->id) : ?>
                                <li><a href="">{{$cate_childrent->name}}</a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
            <div class="navbar-item"><a href="">Trẻ em</a></div>
        </div>
    </div>
    <div class="header-item">
        <div class="logo">
            <div class="logo-item"><a href="{{route('front.index')}}"><img src="{{asset('theme-frontwatch/image/logo_watchstorev3.jpg')}}" alt=""></a></div>
        </div>
    </div>
    <div class="header-item-form">
        <div class="form">
            <form action="" class="search">
                <input type="text">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="warp">
            <div class="header-cart">
                <a href=""><i class="fas fa-cart-arrow-down"></i></a>
            </div>
            <div class="header-cart-dropdown">
                <div class="header-cart-wrap">
                    <div class="header-cart-item">
                        <div class="header-cart-image">
                            <img src="{{asset('theme-frontwatch/image/A159WAD-1D-1-1633578953344.jpg')}}" alt="">
                        </div>
                        <div class="header-cart-info">
                            <div class="header-cart-item-name">Kabino Bedside Table</div>
                            <div class="header-cart-item-price">66.000 x 1</div>
                        </div>
                        <div class="delete-item">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="header-cart-item">
                        <div class="header-cart-image">
                            <img src="{{asset('theme-frontwatch/image/A159WAD-1D-1-1633578953344.jpg')}}" alt="">
                        </div>
                        <div class="header-cart-info">
                            <div class="header-cart-item-name">Kabino Bedside Table</div>
                            <div class="header-cart-item-price">66.000 x 1</div>
                        </div>
                        <div class="delete-item">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="header-cart-item">
                        <div class="header-cart-image">
                            <img src="{{asset('theme-frontwatch/image/A159WAD-1D-1-1633578953344.jpg')}}" alt="">
                        </div>
                        <div class="header-cart-info">
                            <div class="header-cart-item-name">Kabino Bedside Table</div>
                            <div class="header-cart-item-price">66.000 x 1</div>
                        </div>
                        <div class="delete-item">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="header-cart-item">
                        <div class="header-cart-image">
                            <img src="{{asset('theme-frontwatch/image/A159WAD-1D-1-1633578953344.jpg')}}" alt="">
                        </div>
                        <div class="header-cart-info">
                            <div class="header-cart-item-name">Kabino Bedside Table</div>
                            <div class="header-cart-item-price">66.000 x 1</div>
                        </div>
                        <div class="delete-item">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                    <div class="header-cart-item">
                        <div class="header-cart-image">
                            <img src="{{asset('theme-frontwatch/image/A159WAD-1D-1-1633578953344.jpg')}}" alt="">
                        </div>
                        <div class="header-cart-info">
                            <div class="header-cart-item-name">Kabino Bedside Table</div>
                            <div class="header-cart-item-price">66.000 x 1</div>
                        </div>
                        <div class="delete-item">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login">
            @if(Auth::user() != null)
            Xin chào : {{Auth::user()->name }}
            <div class="logout">
                <a href="{{route('logout')}}" style="text-decoration: none;">Đăng xuất</a>
            </div>
            @endif

        </div>
        @if (Auth::user() == null)
        <div class="login">
            <a href="{{route('login')}}">Đăng nhập/Đăng ký</a>
        </div>
        @endif
    </div>
</header>