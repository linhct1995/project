<style>
    body {
        width: 100%;
        margin: 0;
        padding: 0;
    }

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

    .form-login {
        position: relative;
        top: 20px;
        display: flex;
    }

    .form-login>form {
        margin: auto;
    }

    .import>label {
        font-size: 18px;
        font-weight: bold;
    }

    .import>input {
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
</style>
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