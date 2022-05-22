@extends('admin.layouts.main')
@section('content')
<style>
    .flex-container {
        display: flex;
    }

    .flex-container>.detail {
        width: max-content;
    }

    form>button {
        border-radius: 5px;
    }

    form>select {
        margin: 0px 10px 0px 10px;
        height: 30px;
    }
</style>
<form action="" method="get">
    <label for="">Tìm kiếm</label>
    <input type="text" name="keyword" placeholder="tìm tên danh mục">
    <button type="submit">Tìm</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Stt</th>
            <th scope="col">Người bình luận</th>
            <th scope="col">Sản phẩm </th>
            <th scope="col">Nội dung</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comment as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->customer_name}}</td>
            <td>{{$item->commentPrd->name}}</td>
            <td>{{$item->content}}</td>
            <td>
                <select name="status" class="status" data-id="{{$item->id}}">
                    <option value="1" <?= $item->status == '1' ? 'selected' : '' ?>>Ẩn</option>
                    <option value="2" <?= $item->status == '2' ? 'selected' : '' ?>>Hiển thị</option>
                </select>
            </td>
            <td>
                <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá sản phẩm không');">Xóa</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    var statusElement = document.getElementsByClassName('status');
    [...statusElement].forEach(element => {
        element.addEventListener('change', function() {
            var data_id = element.getAttribute('data-id');
            $.ajax({
                url: 'savecheckcomment/' + data_id,
                type: 'POST',
                data: {
                    id: data_id,
                    status: element.value,
                    _token: "{{ csrf_token() }}"
                }
            }).done(function(ketqua) {
            });
        })
    });

    // var select = document.getElementById('status');
    // // var value = select.options[select.selectedIndex].value;
    // console.log(select.value);
    // $(document).ready(function() {
    //     $('#status').change(function() {     
    //         var name = $(this).val();
    //         alert(name);
    //     });
    // });
    // function Edit(id) {

    //     var status = { "select" : $('#status').val()};
    //     alert(status);
    //     // $.ajax({
    //     //     url: 'savecheckcomment/' + id,
    //     //     type: "POST",
    //     //     data:{status:status}
    //     // });
    // }
</script>
@endsection