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
<form action=""  id="form">
    @csrf
    <label for="">Bình luận</label>
    @if(Auth::user() != null)
    <input class="form-comment" type="hidden" name="customer_name" value="{{Auth::user()->name}}">
    @endif
    <input class="form-comment" type="hidden" name="id_prd" value="{{$detail->id}}">
    <textarea class="form-comment" name="comment" id="comment" cols="90" rows="10"></textarea>
    <button type="submit">Gửi</button>
</form>

<div>Hiển thị bình luận</div>
<div class="list_comment">
    @foreach($comment as $key => $item)
    <div class="name_comment"> Tên khách hàng :{{$item -> customer_name}}</div>
    <div class="content_comment">Nội dung :{{$item -> content}} </div>
    @endforeach
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    const formElement = document.getElementById('form');
    formElement.addEventListener('submit', (e) => {
        e.preventDefault();
        let a = document.getElementsByClassName("form-comment");
        const data = {};
        [...a].forEach(element => {
            let key = element.getAttribute('name');
            let value =element.value;            
            data[key] = value;           
        });
        data['_token'] ='{{ csrf_token() }}';
        $.ajax({
                url : "/Comment",
                type : "POST",
                data: data
            }).done(function(ok){
                Swal.fire('Đăng bài thành công');
                $('#comment').val('');
            });
    })

    //    document.addEventListener("DOMContentLoaded", function(event) {
    //     // Your code to r
    //    console.log(a);
    //    function Abc(    ){

    //     let a = document.getElementsByTagName("customer_name" , "id_prd" , "comment").val();
    //    console.log(a);
    //    };

    // });
</script>