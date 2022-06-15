<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('frontend.layouts.style')
    @yield('style')
    <title>Document</title>
</head>

<body>
    @include("frontend.layouts.navbar")
    @yield('content')   
    @include("frontend.layouts.footer")
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
    });
</script>
</body>

</html>
