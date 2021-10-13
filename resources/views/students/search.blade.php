@extends('layout.master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('students.store')}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Bảng danh sách học sinh</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <h3 class="card-title">
                                    <a class="btn btn-primary" href="{{ route('students.create') }}">Thêm mới</a>
                                </h3>
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        STT
                                    </th>
                                    <th>
                                        Tên
                                    </th>
                                    <th>
                                        Lớp
                                    </th>
                                    <th>
                                        Ảnh
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th  class="text-right">
                                        Sửa
                                    </th>
                                    <th class="text-right">
                                        Xóa
                                    </th>
                                    </thead>
                                    <tbody>

                                    @foreach($students as $key => $student)
                                        <tr>
                                            <td>
                                                {{$key++}}
                                            </td>
                                            <td>
                                                {{$student->name}}
                                            </td>
                                            <td>
                                                {{$student->learn_classes->name}}
                                            </td>
                                            <td>
                                                <img alt="image" style="width:100px;height:100px" src="{{asset('/storage/'.$student->image)}}" class="img-responsive">
                                            </td>
                                            <td>
                                                {{$student->email}}
                                            </td>
                                            <td >
                                                {{$student->phone}}
                                            </td>
                                            <td class="text-right">
                                                <a class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('students.edit', $student->id) }}"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td class="text-right">
                                                <a class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('students.destroy', $student->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
