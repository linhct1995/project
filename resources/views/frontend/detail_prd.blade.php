<!-- <table class="table">
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
</script> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    @include('frontend.layouts.style_detail')
    <title>Detail</title>
</head>

<body>
    @include("frontend.layouts.navbar")
    <hr>
    <a href="" class="home_page">Trang chủ</a>/
    <span>{{$detail->name}}</span>
    <div class="content row">
        <div class="image_product col-6">
            <img src="{{asset( 'storage/' . $detail->image)}}" alt="" width="80%">
        </div>
        <div class="information_product col-6">
            <div class="title">Thông số kỹ tduật</div>
            <table class="table">
                
                <tbody>
                    <tr>
                        <td style="font-weight: bold;">Thương hiệu</td>
                        <td>{{$detail->name}}</td>
                    </tr>                
                    @foreach($getAttriValue as $key => $items)
                    <tr>
                        <td style="font-weight: bold;">{{$key}}</td>
                        <td >{{$items}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="add_cart"><button>Đặt mua ngay</button></div>
        </div>
    </div>
    <div class="comment">Viết bình luận</div>
    <form action="" class="form">
        <textarea name="" id="" cols="190" rows="5"></textarea> <br>
        <button type="submit">Gửi</button>
    </form>
    <div class="show_comment">
        <div class="title_comment">Bình luận của khách hàng</div>
        <div class="customer_name">Khách hàng : Cao Tuấn Linh</div>
        <div class="content_comment">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio nulla nisi, quaerat asperiores amet dolore! Impedit consectetur, dolore, harum id fugiat sint iure ipsa beatae earum similique, nulla autem inventore.
        </div>
        <div class="customer_name">Khách hàng : Cao Tuấn Linh</div>
        <div class="content_comment">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio nulla nisi, quaerat asperiores amet dolore! Impedit consectetur, dolore, harum id fugiat sint iure ipsa beatae earum similique, nulla autem inventore.
        </div>
    </div>
    <hr>
    <div class="related_products">
        <div class="related_products_title" style="font-weight: bold; font-size: 20px;">Sản phẩm liên quan</div>
        <div class="related_products_grid row">
            @foreach($ccc as $items)
            <div class="product col-3">
                <img src="{{asset( 'storage/' . $items->image)}}" alt="">
                <div class="name-product"><a href="">{{$items->name}}</a></div>
                <div class="product-price">{{number_format($items->price)}} ₫</div>
                <span class="product-status">
                Tình trạng : 
                <?php if ($items->amount > 0) { ?>
                                <span class="text-primary">Còn hàng</span>
                            <?php } else { ?>
                                <span class="text-danger">Hết hàng</span>
                            <?php } 
                ?>
                </span>
                <span class="cart"><button>Mua hàng</button></span>
            </div>
            @endforeach
        </div>
    </div>
    @include("frontend.layouts.footer")
</body>

</html>