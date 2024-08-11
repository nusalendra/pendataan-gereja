<div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">Pernikahan</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0 text-dark font-weight-bolder">Jemaat Terdaftar Menikah : <span
                                class="text-danger text-sm font-weight-bolder">
                                {{ $jemaatTerdaftarMenikah }}</span></p>
                        <p class="mb-0 text-dark font-weight-bolder">Jemaat Belum Menikah : <span
                                class="text-dark text-sm font-weight-bolder">
                                {{ $jemaatBelumMenikah }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">Sidi</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0 text-dark font-weight-bolder">Jemaat Terdaftar Sidi : <span
                                class="text-primary text-sm font-weight-bolder">
                                {{ $jemaatTerdaftarSidi }}</span></p>
                        <p class="mb-0 text-dark font-weight-bolder">Jemaat Belum Sidi : <span
                                class="text-dark text-sm font-weight-bolder">
                                {{ $jemaatBelumSidi }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">Baptis</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0 text-dark font-weight-bolder">Jemaat Terdaftar Baptis : <span
                                class="text-success text-sm font-weight-bolder">
                                {{ $jemaatTerdaftarBaptis }}</span></p>
                        <p class="mb-0 text-dark font-weight-bolder">Jemaat Belum Baptis : <span
                                class="text-dark text-sm font-weight-bolder">
                                {{ $jemaatBelumBaptis }}</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <div class="row">
                            {!! $golonganDarahChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex flex-column">
                <div class="card flex-grow-1 mb-4">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">Jemaat Meninggal</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0 text-dark font-weight-bolder">Jumlah Jemaat Meninggal : <span
                                class="text-info text-sm font-weight-bolder">
                                {{ $jemaatMeninggal }}</span></p>
                    </div>
                </div>
                <div class="card flex-grow-1">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 mt-5">
                            <div class="chart">
                                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 text-lg">Jenis Kelamin</h6>
                        <p class="text-md mt-2 font-weight-semibold">Jumlah Jemaat Terdaftar :
                            {{ $jemaatTerdaftar }}</p>
                        <hr class="dark horizontal">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script src="{{ $golonganDarahChart->cdn() }}"></script>

    {{ $golonganDarahChart->script() }}
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "bar",
            data: {
                labels: ["Tidak Diisi", "Pria", "Wanita"],
                datasets: [{
                    label: "Jumlah",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [{{ $jemaatTidakDiisi }}, {{ $jemaatPria }}, {{ $jemaatWanita }}],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
