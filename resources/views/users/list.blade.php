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
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        Tên
                                    </th>
                                    <th>
                                        Lớp
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{$user->name}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->address}}
                                            </td>
                                            <td >
                                                {{$user->phone}}
                                            </td>
                                        </tr>
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

