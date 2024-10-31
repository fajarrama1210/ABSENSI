@extends('Presensi.admin.layouts.adminCore')
@section('title')
    Admin-PresensiX/Dashboard
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card shadow border-bottom border-primary">
                    <div class="card-body">
                        <div class="text-center">
                            <h2>Kelas</h2>
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                    <path fill="#5D87FF"
                                        d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20zM10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28S5.71 12 5.71 11.29m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28s-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16s2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71" />
                                </svg>
                            </div>
                            <h3 class="mt-4">{{ $levels }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card shadow border-bottom border-primary">
                    <div class="card-body">
                        <div class="text-center">
                            <h2>Siswa</h2>
                            <div class="">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                        viewBox="0 0 24 24">
                                        <path fill="#5D87FF"
                                            d="M9.775 12q-.9 0-1.5-.675T7.8 9.75l.325-2.45q.2-1.425 1.3-2.363T12 4t2.575.938t1.3 2.362l.325 2.45q.125.9-.475 1.575t-1.5.675zm0-2h4.45L13.9 7.6q-.1-.7-.637-1.15T12 6t-1.263.45T10.1 7.6zM4 20v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20zm2-2h12v-.8q0-.275-.137-.5t-.363-.35q-1.35-.675-2.725-1.012T12 15t-2.775.338T6.5 16.35q-.225.125-.363.35T6 17.2zm6 0" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-4">{{ $users }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card shadow border-bottom border-primary">
                    <div class="card-body">
                        <div class="text-center">
                            <h2>Izin</h2>
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                    <path fill="#5D87FF"
                                        d="M6 15h7l2-2H6zm0-4h6V9H6zM4 7v10h7l-2 2H2V5h20v3h-2V7zm18.9 5.3q.125.125.125.275t-.125.275l-.9.9L20.25 12l.9-.9q.125-.125.275-.125t.275.125zM13 21v-1.75l6.65-6.65l1.75 1.75L14.75 21zM4 7v10z" />
                                </svg>
                            </div>
                            <h3 class="mt-4">{{ $dispens }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card shadow border-bottom border-primary">
                    <div class="card-body">
                        <div class="text-center">
                            <h2>Hadir</h2>
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 16 16">
                                    <path fill="none" stroke="#5D87FF" stroke-linejoin="round"
                                        d="m5.5 6.219l2 2l3.5-3.5M9 13.5h2m-2 0v-3m0 3H7m2-3h5.5v-8h-13v8H7m2 0H7m-2 3h2m0 0v-3" />
                                </svg>
                            </div>
                            <h3 class="mt-4">{{ $presences }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title fw-semibold mb-0 lh-sm">Perbandingan Kehadiran</h5>
                        </div>
                        <div class="card-body">
                            <div id="chart-attendence"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title fw-semibold mb-0 lh-sm">Siswa paling rajin</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Jumlah Kehadiran</th>
                                </thead>
                                <tbody>
                                    @forelse ($presencesUsers as $pu)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pu->User->name }}</td>
                                            <td>{{ $pu->Level->kelas }}</td>
                                            <td>{{ $pu->Major->major }}</td>
                                            <td>{{ $pu->total }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Data tidak ditemukan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@4.0.0/dist/apexcharts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $.ajax({
            url: '/data', // sesuaikan dengan route Anda
            method: 'GET',
            dataType: 'JSON',
            success: function(response) {
                // response akan berbentuk array seperti [41, 17, 15]
                var options = {
                    series: response, // Gunakan data dari response
                    chart: {
                        type: 'donut',
                    },
                    labels: [
                        'Hadir',
                        'Izin',
                        'Alpha',
                        'terlambat',
                    ],
                    colors: ['#0000ff', '#ecec53', '#ff0000', '#00e64d'],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 100
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                // Render chart dengan data terbaru dari AJAX
                var chart = new ApexCharts(document.querySelector("#chart-attendence"), options);
                chart.render();
            },
            error: function(xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
    </script>
@endsection
