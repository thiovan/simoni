@extends('pages.dashboard')
@section('dashboard.content')
    <div class="grid grid-cols-2 gap-x-4 md:gap-x-10 gap-y-4">

        <div class="hvr-shrink">
            <div
                class="flex items-center justify-between h-16 text-sm text-white bg-center bg-no-repeat bg-cover rounded-md drop-shadow-lg lg:h-20 lg:px-8 sm:text-xl md:text-2xl lg:text-3xl bg-panel font-franklin-gothic">
                <img class="w-8 ml-3" src="{{ asset('icons/chat.svg') }}">
                <h1 class="font-bold">{{ $aduanTotal }}</h1>
                <h1 class="pr-4 truncate">TOTAL ADUAN</h1>
            </div>
        </div>

        <div class="hvr-shrink">
            <div
                class="flex items-center justify-between h-16 text-sm text-white bg-center bg-no-repeat bg-cover rounded-md drop-shadow-lg lg:h-20 lg:px-8 sm:text-xl md:text-2xl lg:text-3xl bg-panel font-franklin-gothic">
                <img class="w-8 ml-3" src="{{ asset('icons/chat.svg') }}">
                <h1 class="font-bold">{{ $kritikTotal }}</h1>
                <h1 class="pr-4 truncate">TOTAL KRITIK</h1>
            </div>
        </div>

        <div class="hvr-shrink">
            <div
                class="flex items-center justify-between h-16 text-sm text-white bg-center bg-no-repeat bg-cover rounded-md drop-shadow-lg lg:h-20 lg:px-8 sm:text-xl md:text-2xl lg:text-3xl bg-panel font-franklin-gothic">
                <img class="w-8 ml-3" src="{{ asset('icons/chat.svg') }}">
                <h1 class="font-bold">{{ $saranTotal }}</h1>
                <h1 class="pr-4 truncate">TOTAL SARAN</h1>
            </div>
        </div>

        <div class="hvr-shrink">
            <div
                class="flex items-center justify-between h-16 text-sm text-white bg-center bg-no-repeat bg-cover rounded-md drop-shadow-lg lg:h-20 lg:px-8 sm:text-xl md:text-2xl lg:text-3xl bg-panel font-franklin-gothic">
                <img class="w-8 ml-3" src="{{ asset('icons/chat.svg') }}">
                <h1 class="font-bold">{{ $pujianTotal }}</h1>
                <h1 class="pr-4 truncate">TOTAL PUJIAN</h1>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 my-8 lg:grid-cols-2 gap-x-4 md:gap-x-10 gap-y-4">
        <div class="flex max-h-96 lg:h-96 bg-panel-chart rounded-3xl drop-shadow-lg">
            <div class="flex flex-col items-center py-4 pl-8 mr-4 basis-1/3">
                <div class="text-lg text-center text-white lg:text-2xl font-franklin-gothic">
                    GRAFIK BULANAN
                </div>
                <div class="flex items-center justify-center flex-1 py-4">
                    <img class="w-full" src="{{ asset('icons/megaphone.svg') }}">
                </div>
            </div>
            <div class="w-full py-4 pr-8 overflow-hidden basis-2/3">
                <canvas id="chart-bar"></canvas>
            </div>
        </div>

        <div class="flex flex-col py-4 max-h-96 lg:h-96 bg-panel-chart rounded-3xl">
            <div class="mb-4 text-lg text-center text-white lg:text-2xl font-franklin-gothic drop-shadow-lg">
                GRAFIK KATEGORI
            </div>
            <div class="w-full py-4 overflow-hidden">
                <canvas id="chart-doughnut"></canvas>
            </div>
        </div>
    </div>

    <script>
        const dataBar = @json($graphTotal);
        const dataDoughnut = @json($categoryTotal);
        console.log(dataDoughnut);

        new Chart(
            document.getElementById('chart-bar'), {
                type: 'bar',
                data: {
                    labels: dataBar.map(row => row.month),
                    datasets: [{
                        data: dataBar.map(row => row.total),
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

        new Chart(
            document.getElementById('chart-doughnut'), {
                type: 'doughnut',
                data: {
                    labels: dataDoughnut.map(row => row.category),
                    datasets: [{
                        data: dataDoughnut.map(row => row.total),
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
                            display: true,
                            position: 'right'
                        },
                        labels: {
                            render: 'percentage',
                            fontColor: ['green', 'white', 'red'],
                            precision: 2
                        }
                    },

                }
            }
        );
    </script>
@stop
