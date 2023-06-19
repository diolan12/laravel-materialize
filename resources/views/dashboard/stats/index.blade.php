@extends('base.dashboard')
@section('extra-css')
    <style>
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col s12 m12 l12 xl6">
            <div class="card-panel">
                <div>
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col s6 m6 l6 xl3">
            <div class="card-panel">
                <div>
                    <canvas id="doughnut"></canvas>
                </div>
            </div>
        </div>
        <div class="col s6 m6 l6 xl3">
            <div class="card-panel">
                <div>
                    <canvas id="radar"></canvas>
                </div>
            </div>
        </div>
        <div class="col s6">
            <div class="card-panel teal">
                <span class="white-text">{{ \Diolan12\LoremIpsum::instance()->sentences(7) }}</span>
            </div>
        </div>
        <div class="col s6">
            <div class="card-panel">
                <span class="white-text">{{ \Diolan12\LoremIpsum::instance()->sentences(7) }}</span>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartEle = document.getElementById('chart');
        const doughnutEle = document.getElementById('doughnut');
        const radarEle = document.getElementById('radar');

        new Chart(chartEle, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        new Chart(doughnutEle, {
            type: 'doughnut',
            data: {
                labels: [
                    'Red',
                    'Blue',
                    'Yellow'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            }
        });
        new Chart(radarEle, {
            type: 'radar',
            data: {
                labels: [
                    'Eating',
                    'Drinking',
                    'Sleeping',
                    'Designing',
                    'Coding',
                    'Cycling',
                    'Running'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 90, 81, 56, 55, 40],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }, {
                    label: 'My Second Dataset',
                    data: [28, 48, 40, 19, 96, 27, 100],
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                }]
            },
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                }
            },
        });
    </script>
@endsection
