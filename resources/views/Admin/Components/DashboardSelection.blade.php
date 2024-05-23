@extends('Admin.layout')
@section('content')

<div class="text-center">
    <small>
       
        <form action="{{URL::to('/admin/dashboard/sendform')}}" method="post">
            {{ csrf_field() }}
            
            <div class="mt-3">
                <p>Chọn 1 tháng</p>
                <select name="month" id="">
                    @foreach($months as $month)
                        <option value="{{$month}}">{{$month}}</option>
                    @endforeach
                </select>
                <p>Chọn 1 năm</p>
                <select name="year" id="">
                    @foreach($years as $year)
                        <option value="{{$year}}">{{$year}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Send form">
        </form>
    </small>
</div>

@endsection