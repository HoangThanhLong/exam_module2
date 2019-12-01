@extends('home')
@section('content')
    <div style="margin-left: 70%">
        <form action="{{route('staffs.search')}}" method="get">
            @csrf
            <input type="text" placeholder="Search" name="keyword">
            <button type="submit" class="btn btn-outline-success">Tìm kiếm</button>
        </form>
    </div>
    <div class="container">
        <div class="col-12">
            <div>
                <h1>Danh sách nhân viên</h1>
            </div>
                <a href="{{route('staffs.create')}}" class="btn btn-link">Thêm mới</a>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Mã nhân viên</th>
                    <th scope="col">Nhóm nhân viên</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Chức năng</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($staffs) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                        @foreach($staffs as $key => $staff)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$staff->group->name}}</td>
                            <td>{{$staff->name}}</td>
                            <td>{{$staff->gender}}</td>
                            <td>{{$staff->phone}}</td>
                            <td>
                                <a href="{{route('staffs.edit', $staff->id)}}" class="btn btn-outline-primary">Sửa</a>
                            </td>
                            <td>
                                <a href="{{route('staffs.destroy', $staff->id)}}" class="btn btn-outline-danger" onclick="return confirm('Bạn thực sự muốn xóa?')">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
