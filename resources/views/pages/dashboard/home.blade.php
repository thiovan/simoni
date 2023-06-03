@extends('pages.dashboard')
@section('dashboard.content')
    <div class="grid grid-cols-2 gap-x-14 gap-y-8">

        <div class="flex items-center justify-between h-24 bg-no-repeat bg-cover rounded-md bg-panel">
            <img class="max-h-full p-4" src="{{ asset('icons/chat.svg') }}">
            <h1 class="text-4xl font-bold text-white font-franklin-gothic">41</h1>
            <h1 class="pr-4 text-4xl font-bold text-white font-franklin-gothic">TOTAL ADUAN</h1>
        </div>

        <div class="flex items-center justify-between h-24 bg-no-repeat bg-cover rounded-md bg-panel">
            <img class="max-h-full p-4" src="{{ asset('icons/chat.svg') }}">
            <h1 class="text-4xl font-bold text-white font-franklin-gothic">41</h1>
            <h1 class="pr-4 text-4xl font-bold text-white font-franklin-gothic">TOTAL ADUAN</h1>
        </div>

        <div class="flex items-center justify-between h-24 bg-no-repeat bg-cover rounded-md bg-panel">
            <img class="max-h-full p-4" src="{{ asset('icons/chat.svg') }}">
            <h1 class="text-4xl font-bold text-white font-franklin-gothic">41</h1>
            <h1 class="pr-4 text-4xl font-bold text-white font-franklin-gothic">TOTAL ADUAN</h1>
        </div>

        <div class="flex items-center justify-between h-24 bg-no-repeat bg-cover rounded-md bg-panel">
            <img class="max-h-full p-4" src="{{ asset('icons/chat.svg') }}">
            <h1 class="text-4xl font-bold text-white font-franklin-gothic">41</h1>
            <h1 class="pr-4 text-4xl font-bold text-white font-franklin-gothic">TOTAL ADUAN</h1>
        </div>

        <div class="flex h-96 bg-panel-chart rounded-3xl">
            <div class="flex flex-col items-center my-8 basis-1/3">
                <div class="text-2xl text-white font-franklin-gothic">
                    GRAFIK ADUAN
                </div>
                <div class="flex items-center justify-center flex-1">
                    <img class="w-36" src="{{ asset('icons/megaphone.svg') }}">
                </div>
            </div>
            <div class="py-4 pr-8 basis-2/3">
                <canvas id="chart-bar"></canvas>
            </div>
        </div>

    </div>

    <script>
        const data = [{
                year: 2010,
                count: 10
            },
            {
                year: 2011,
                count: 20
            },
            {
                year: 2012,
                count: 15
            },
            {
                year: 2013,
                count: 25
            },
            {
                year: 2014,
                count: 22
            },
            {
                year: 2015,
                count: 30
            },
            {
                year: 2016,
                count: 28
            },
        ];

        new Chart(
            document.getElementById('chart-bar'), {
                type: 'bar',
                data: {
                    labels: data.map(row => row.year),
                    datasets: [{
                        data: data.map(row => row.count),
                        backgroundColor: function(context) {
                            const chart = context.chart;
                            const {
                                ctx,
                                chartArea
                            } = chart;

                            if (!chartArea) {
                                return;
                            }

                            let gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
                            gradient.addColorStop(0, '#FF40FE');
                            gradient.addColorStop(1, '#00DBF7');
                            return gradient;
                        }
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'white'
                            }
                        },
                        y: {
                            grid: {
                                color: 'white'
                            },
                            ticks: {
                                color: 'white'
                            }
                        }
                    }
                }
            }
        );
    </script>
@stop
