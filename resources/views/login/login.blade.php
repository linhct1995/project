<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    @include('frontend.layouts.style_login')
    <title>Login</title>
</head>

<body>
    @include("frontend.layouts.navbar")
    <hr>
    <div class="main">
        <div class="form-title">
            <div class="title-login">Login</div>
            <div class="form-login">
                <form action="" method="POST">
                @csrf
                    <div class="email">
                        <label for="">Email</label><br>
                        <input type="text" name="email" placeholder="email" value="{{old('email')}}">
                    </div>
                    <div class="password">
                        <label for="">Password</label><br>
                        <input type="password" name="password" placeholder="password">
                    </div>
                    <div class="button">
                        <button type="submit">Đăng nhập</button>
                    </div>
                </form>
            </div>
            <div class="Social-Network">
                <a href=""><i class="fab fa-facebook" style="color: blue;"></i></a>
                <a href=""><i class="fab fa-google" style="color: red;"></i></a>
                <a href=""><i class="fab fa-twitter" style="color: rgb(12, 172, 231);"></i></a>
            </div>
            <div class="register"><a href="{{route('registration')}}">Đăng ký</a></div>
        </div>
    </div>
    </div>
    @include("frontend.layouts.footer")
</body>

</html>