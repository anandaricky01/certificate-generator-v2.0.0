@extends('layouts.layout')
@section('container')

<div class="row">
    <div class="col">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Baru Masuk</h1>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Print Count</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($certificates as $certificate)
                <tr>
                    <th scope="row">{{ $certificate->id }}</th>
                    <td>{{ $certificate->name }}</td>
                    <td>{{ $certificate->print_count }}</td>
                    <td><a href="/certificate/{{ $certificate->id }}" class="btn btn-primary btn-sm">Show</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Paling Banyak Diprint</h1>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Print Count</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row">{{ $most_printed->id }}</th>
                    <td>{{ $most_printed->name }}</td>
                    <td>{{ $most_printed->print_count }}</td>
                    <td><a href="/certificate/{{ $most_printed->id }}" class="btn btn-primary btn-sm">Show</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Grafik Jumlah Seritifikat Tanggal Dibuat</h1>
</div>

<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
</script>

{{-- <script>
    // Graphs
        const ctx = document.getElementById('myChart')

        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
            labels: [
                {!! '"' . $days_count[0]['date'] . '",' !!}
                {!! '"' . $days_count[1]['date'] . '",' !!}
                {!! '"' . $days_count[2]['date'] . '",' !!}
            ],
            datasets: [{
                data: [
                    {{ $days_count[0]['date_count'] . ',' }}
                    {{ $days_count[1]['date_count'] . ',' }}
                    {{ $days_count[2]['date_count'] }}
                ],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
            }]
            },
            options: {
            scales: {
                yAxes: [{
                ticks: {
                    beginAtZero: false
                }
                }]
            },
            legend: {
                display: false
            }
            }
        })
</script> --}}

@endsection
