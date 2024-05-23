@extends('Admin.layout')
@section('content')
<div class="mb-4 link-no-under">
    <a href="{{URL::to('/admin/dashboard')}}" class="link-no-under">< Quay lại</a>
</div>
    <div>
        <h4>Doanh thu {{$getMonth}}/{{$getYear}}</h4>   
    </div>
    <div style="width: 75%;">
        <canvas id="myChart"></canvas>
    </div>
    <div>
        <p><b>Chú thích:</b></p>
        <p><i>- Trục hoành:</i> Ngày</p>
        <p><i>- Trục tung:</i> Tổng Doanh thu (VND)</p>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // loại biểu đồ, có thể là 'bar', 'line', 'pie', etc.
            data: @json($dataBieuDo), // chuyển đổi dữ liệu từ PHP sang JavaScript
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Biểu đồ doanh thu tháng {{$getMonth}}/{{$getYear}}' // Tiêu đề của biểu đồ
                    }
                }
            }
        });
    </script>

@endsection