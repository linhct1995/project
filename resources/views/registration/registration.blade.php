@extends('frontend.index')
@section('style')
<link rel="stylesheet" href=" {{ asset('theme-frontwatch/css/Register.css')}}">
@endsection
@section('content')
<hr>
    <div class="main">
        <div class="form-title">
            <div class="title-login">Đăng ký</div>
            <div class="form-login">
                <form action="" method="POST">
                @csrf
                    <div class="import">
                        <label for="">Name</label><br>
                        <input type="text" placeholder="name" name="name" value="{{old('name')}}">
                    </div>
                    <div class="import">
                        <label for="">Address</label><br>
                        <input type="text" placeholder="address" name="address" value="{{old('address')}}">
                    </div>
                    <div class="import">
                        <label for="">Phone</label><br>
                        <input type="text" placeholder="phone" name="phone" value="{{old('phone')}}">
                    </div>
                    <div class="import">
                        <label for="">Email</label><br>
                        <input type="text" placeholder="email" name="email" value="{{old('email')}}">
                    </div>
                    <div class="import">
                        <label for="">Password</label><br>
                        <input type="password" placeholder="password" name="password">
                    </div>
                    <div class="button">
                        <button type="submit">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
