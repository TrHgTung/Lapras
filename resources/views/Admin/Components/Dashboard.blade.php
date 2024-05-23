@extends('Admin.layout')
@section('content')

<div>
    <h4>Doanh thu {{$getMonth}}/{{$getYear}}</h4>   
</div>
<div style="width: 75%;">
        <canvas id="myChart"></canvas>
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