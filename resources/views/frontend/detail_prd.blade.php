<table class="table">
    <thead>
        <tr>
            <th scope="col">Tên</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$detail->name}}</td>
            <td><img src="{{asset('storage/'.$detail->image)}}" alt=""></td>
            <td>{{$detail->description}}</td>
            <td>Mua</td>
        </tr>
    </tbody>
</table>
<form action="/Comment" method="post">
    @csrf
    <label for="">Bình luận</label>
    <input type="hidden" name="customer_name" value="{{Auth::user()->name}}">
    <input type="hidden" name="id_prd" value="{{$detail->id}}">
    <textarea name="comment" id="" cols="90" rows="10"></textarea>
    <button type="submit">Gửi</button>
</form>