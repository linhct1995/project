<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="">Tên </label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                <!-- @error('password_old')
                <div style="color: red;">{{ $message }}</div>
                @enderror -->
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="">Số điện thoại </label>
                <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                <!-- @error('password_old')
                <div style="color: red;">{{ $message }}</div>
                @enderror -->
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="">Địa chỉ </label>
                <input type="text" name="address" class="form-control" value="{{old('address')}}">
                <!-- @error('password_old')
                <div style="color: red;">{{ $message }}</div>
                @enderror -->
            </div>
        </div>
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
        </div>
    </div>

</form>
<br>