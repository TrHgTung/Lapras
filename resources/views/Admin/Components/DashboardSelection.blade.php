@extends('Admin.layout')
@section('content')

<div class="text-center">
    <small>
       
        <form action="{{URL::to('/admin/dashboard/sendform')}}" method="post">
            {{ csrf_field() }}
            
            <div class="mt-3 form-label-group">
                <label for="month">Chọn tháng:</label>
                <select name="month" class="form-control" id="month" require>
                    <!-- <option value="1">Tháng 1</option>
                    <option value="2">Tháng 2</option>
                    <option value="3">Tháng 3</option>
                    <option value="4">Tháng 4</option>
                    <option value="5">Tháng 5</option>
                    <option value="6">Tháng 6</option>
                    <option value="7">Tháng 7</option>
                    <option value="8">Tháng 8</option>
                    <option value="9">Tháng 9</option>
                    <option value="10">Tháng 10</option>
                    <option value="11">Tháng 11</option>
                    <option value="12">Tháng 12</option> -->
                    @foreach($months as $month)
                        <option value="{{$month}}">Tháng {{$month}}</option>
                    @endforeach
                </select>
                
            </div>
            <div class="mt-3 form-label-group">
                <label for="year">Chọn năm:</label>
                    <select name="year" class="form-control" id="year" require>
                        @foreach($years as $year)
                            <option value="{{$year}}">Năm {{$year}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="mt-4">
                <input type="submit" value="Xem thống kê" class="btn btn-secondary form-control">
            </div>
        </form>
    </small>
</div>

@endsection