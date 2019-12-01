@extends('home')
@section('content')
    <div class="container">
    <div class="col-12">
        <div>
            <h2>Tạo mới nhân viên</h2>
        </div>
        <form action="{{route('staffs.store')}}" method="post">
            @csrf
            <div>
                <label>Chọn nhóm nhân viên</label>
                <select class="form-control" name="group_id">
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" class="form-control" name="name">
                @error('name')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" name="birthday">
                @error('birthday')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Giới tính</label>
                <br>
                <input type="radio" name="gender" value="Nam"> Nam<br>
                <input type="radio" name="gender" value="Nữ"> Nữ<br>
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" name="phone">
                @error('phone')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Số CMND</label>
                <input type="text" class="form-control" name="idCard">
                @error('idCard')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
                @error('email')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <textarea class="form-control" name="address"></textarea>
                @error('address')
                <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
            <a href="{{route('staffs.list')}}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
    </div>
@endsection
