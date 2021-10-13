<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@extends('layout.master')
@section('content')
<style>
    .pass_show{position: relative}

    .pass_show .ptxt {

        position: absolute;

        top: 50%;

        right: 10px;

        z-index: 1;

        color: #f36c01;

        margin-top: -10px;

        cursor: pointer;

        transition: .3s ease all;

    }

    .pass_show .ptxt:hover{color: #333333;}
</style>
<form method="post" action="{{route('edit.password')}}">
    @csrf
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <label>Mật khẩu hiện tại</label>
            <div class="form-group pass_show">
                <input type="password" value="" name="currentPassword" class="form-control" placeholder="Current Password">
            </div>
            <label>Mật khẩu mới</label>
            <div class="form-group pass_show">
                <input type="password" value="" name="newPassword" class="form-control" placeholder="New Password">
            </div>
            <label>Nhập lại mật khẩu mới</label>
            <div class="form-group pass_show">
                <input type="password" value="" name="newPassword" class="form-control" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
        </div>
    </div>
</div>
</form>
@endsection
<script>

    $(document).ready(function(){
        $('.pass_show').append('<span class="ptxt">Show</span>');
    });


    $(document).on('click','.pass_show .ptxt', function(){

        $(this).text($(this).text() == "Show" ? "Hide" : "Show");

        $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });

    });
</script>
