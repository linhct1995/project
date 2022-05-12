<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="">Email </label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}">
                <!-- @error('password_old')
                <div style="color: red;">{{ $message }}</div>
                @enderror -->
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="">Password </label>
                <input type="password" name="password" class="form-control">
                <!-- @error('password_old')
                <div style="color: red;">{{ $message }}</div>
                @enderror -->
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <button class="btn btn-primary"><a href="{{route('registration')}}">Đăng ký</a></button>
        </div>
    </div>

</form>
<br>