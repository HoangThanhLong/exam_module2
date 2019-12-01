@extends('home')
@section('content')
    <div class="container">
        <div class="col-12">
            <div>
                <h2>Chỉnh sửa thông tin</h2>
            </div>
            <form action="{{route('staffs.update', $staff->id)}}" method="post">
                @csrf
                <div>
                    <label>Chọn nhóm nhân viên</label>
                    <select class="form-control" name="group_id">
                        @foreach($groups as $group)
                           <option @if($staff->group_id == $group->id)
                                selected value="{{$group->id}}">{{$group->name}}</option>
                        @else
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" name="name" value="{{ $staff->name }}">
                    @error('name')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control" name="birthday" value="{{ $staff->birthday }}">
                    @error('birthday')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Giới tính</label>
                    <br>
                    <input type="radio" name="gender"
                           @if($staff->gender == 'Nam')
                               checked
                               @endif
                           value="Nam"> Nam<br>
                    <input type="radio" name="gender"
                           @if($staff->gender == 'Nữ')
                               checked
                           @endif
                           value="Nữ"> Nữ<br>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="{{ $staff->phone }}">
                    @error('phone')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Số CMND</label>
                    <input type="text" class="form-control" name="idCard" value="{{ $staff->idCard }}">
                    @error('idCard')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $staff->email }}">
                    @error('email')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="address" value="{{ $staff->address }}">
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
