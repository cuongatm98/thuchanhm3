@extends('layout.master')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới học sinh</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên học sinh</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label  for="avatar" class="col-sm">Chọn ảnh</label>
                                <a style=" position: relative;left: 30px;"><i class="material-icons">attachment</i></a>
                                <input type="file"
                                       id="avatar" name="image"
                                       accept="image/png, image/jpeg">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lớp</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="learnclass_id" required>
                                        @foreach($learnClasses as $key => $learnClass)
                                            <option value="{{$learnClass->id}}">{{$learnClass->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                            <button class="btn btn-light" onclick="window.history.go(-1); return false;">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

