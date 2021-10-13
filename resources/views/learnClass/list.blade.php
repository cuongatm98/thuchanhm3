@extends('layout.master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Bảng danh sách lớp học </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    STT
                                </th>
                                <th>
                                    Lớp
                                </th>
                                <th class="text-right">
                                    Sửa
                                </th>
                                <th class="text-right">
                                    Xóa
                                </th>
                                </thead>
                                <tbody>

                                @foreach($learnClasses as $key => $learnClass)
                                    <tr>
                                        <td>
                                            {{$key++}}
                                        </td>
                                        <td>
                                            {{$learnClass->name}}
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-success btn-sm rounded-0" type="button"
                                               data-toggle="tooltip" data-placement="top" title="Edit"
                                               href="{{ route('learn_classes.edit', $learnClass->id) }}"><i
                                                    class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-danger btn-sm rounded-0" type="button"
                                               data-toggle="tooltip" data-placement="top" title="Delete"
                                               href="{{ route('learn_classes.destroy', $learnClass->id) }}"
                                               onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form method="post" action="{{ route('learn_classes.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Lớp</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" placeholder="Enter name"
                                               required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                                <button class="btn btn-light" onclick="window.history.go(-1); return false;">Cancel
                                </button>
                            </form>
                            <div class="d-flex justify-content-center">
                                {!! $learnClasses->links() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

