@extends('pages.dashboard')
@section('dashboard.content')
<div class="row row-cols-1 row-cols-md-2 g-4">

    <div class="col">
        <div class="d-flex align-items-center justify-content-between h-100 text-sm text-white bg-center bg-no-repeat bg-cover rounded-3 shadow-lg lg:h-auto lg:px-4 sm:text-xl md:text-2xl lg:text-3xl bg-panel">
            <img class="w-2 ms-3" src="{{ asset('icons/chat.svg') }}">
            <h1 class="fw-bold">{{ $aduanTotal }}</h1>
            <h1 class="text-truncate pe-4">TOTAL ADUAN</h1>
        </div>
    </div>

    <div class="col">
        <div class="d-flex align-items-center justify-content-between h-100 text-sm text-white bg-center bg-no-repeat bg-cover rounded-3 shadow-lg lg:h-auto lg:px-4 sm:text-xl md:text-2xl lg:text-3xl bg-panel">
            <img class="w-2 ms-3" src="{{ asset('icons/chat.svg') }}">
            <h1 class="fw-bold">{{ $kritikTotal }}</h1>
            <h1 class="text-truncate pe-4">TOTAL KRITIK</h1>
        </div>
    </div>

    <div class="col">
        <div class="d-flex align-items-center justify-content-between h-100 text-sm text-white bg-center bg-no-repeat bg-cover rounded-3 shadow-lg lg:h-auto lg:px-4 sm:text-xl md:text-2xl lg:text-3xl bg-panel">
            <img class="w-2 ms-3" src="{{ asset('icons/chat.svg') }}">
            <h1 class="fw-bold">{{ $saranTotal }}</h1>
            <h1 class="text-truncate pe-4">TOTAL SARAN</h1>
        </div>
    </div>

    <div class="col">
        <div class="d-flex align-items-center justify-content-between h-100 text-sm text-white bg-center bg-no-repeat bg-cover rounded-3 shadow-lg lg:h-auto lg:px-4 sm:text-xl md:text-2xl lg:text-3xl bg-panel">
            <img class="w-2 ms-3" src="{{ asset('icons/chat.svg') }}">
            <h1 class="fw-bold">{{ $pujianTotal }}</h1>
            <h1 class="text-truncate pe-4">TOTAL PUJIAN</h1>
        </div>
    </div>

</div>

<div class="row g-4 my-4">

    <div class="d-flex max-vh-100 bg-panel-chart rounded-3xl shadow-lg">
        <div class="d-flex flex-column align-items-center py-4 px-3 me-4 flex-grow-1">
            <div class="text-lg text-center text-white lg:text-2xl font-franklin-gothic">
                GRAFIK BULANAN
            </div>
            <div class="d-flex align-items-center justify-content-center py-4">
                <div class="hvr-shrink">
                    <img class="w-100" src="{{ asset('icons/megaphone.svg') }}">
                </div>
            </div>
        </div>
        <div class="w-100 py-4 pe-4 overflow-hidden flex-grow-2">
            <canvas id="chart-bar"></canvas>
        </div>
    </div>

    <div class="d-flex flex-column py-4 max-vh-100 bg-panel-chart rounded-3xl">
        <div class="mb-4 text-lg text-center text-white lg:text-2xl font-franklin-gothic shadow-lg">
            GRAFIK KATEGORI
        </div>
        <div class="w-100 py-4 overflow-hidden">
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
