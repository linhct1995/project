<style>
    .form-title {
        margin: auto;
        width: 400px;
        height: 700px;
        border: 1px solid;
        background-color: white;
        border-radius: 10px;
    }

    .title-login {
        text-align: center;
        margin-top: 30px;
        font-size: 30px;
        font-weight: bold;
    }

    .email>input,
    .password>input {
        border-radius: 5px;
        width: 250px;
        height: 40px;
    }

    .button {
        display: flex;
        justify-content: center;
    }

    .button>button {
        width: 150px;
        height: 40px;
        margin-top: 50px;
        border-radius: 10px;
    }

    .email>label,
    .password>label {
        font-size: 18px;
        font-weight: bold;
    }

    .form-login {
        position: relative;
        top: 100px;
        display: flex;
    }

    .form-login>form {
        margin: auto;
    }

    .password {
        padding-top: 40px;
    }
</style>
<hr>
<div class="main">
    <div class="form-title">
        <div class="title-login">Login</div>
        <div class="form-login">

            <form action="" method="POST">
                @csrf
                <div class="email">
                    <label for="">Email</label><br>
                    <input type="text" name="email" placeholder="email">
                </div>
                <div class="password">
                    <label for="">Password</label><br>
                    <input type="password" name="password" placeholder="password">
                </div>
                <div class="button">
                    <button type="submit">Đăng nhập</button>
                </div>
                <div>
                    @if(session('message')!= null)
                    <p style="color: red;"> {{session('message')}} </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
</div>