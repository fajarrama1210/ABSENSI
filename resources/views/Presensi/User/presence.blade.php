@extends('Presensi.User.layouts.userCore')
@section('title')
    Absensi
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-center mb-7">
                                    <div class="rounded-circle overflow-hidden me-6">
                                        <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}"
                                            width="40" height="40">
                                    </div>
                                    <h5 class="fw-semibold mb-0 fs-5">Selamat Datang {{ auth()->user()->name }}</h5>

                                </div>
                            </div>
                            <div class="col-sm-5 d-none d-sm-block">
                                <div class="welcome-bg-img mb-n7 text-end">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg"
                                        alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-1">
                            <div id="clock" class="fw-semibold fs-12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $currentTime = \Carbon\Carbon::now()->format('H:i:s');
    @endphp

@if ($currentTime >= '05:00:00' && $currentTime <= '11:00:00')
    <div class="d-flex justify-content-center">
        <form id="absenceComesForm" action="{{ route('absenceComes') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg px-5 py-3 fs-4">
                Absen datang
            </button>
        </form>
    </div>
@endif

@if ($currentTime >= '14:45:00' && $currentTime <= '15:30:00')
    <div class="d-flex justify-content-center mt-3">
        <form id="absenceGoesForm" action="{{ route('absenceGoes') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary btn-lg px-5 py-3 fs-4">
                Absen pulang
            </button>
        </form>
    </div>
@endif

    <div class="container-fluid">
        <div class="card w-100 position-relative overflow-hidden">
            <div class="px-3 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0 lh-sm">Absen</h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive rounded-2 mb-4">
                    <table class="table border text-nowrap customize-table mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Nama</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Jurusan</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Tanggal</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Keterangan</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Waktu Datang</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Waktu Pulang</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($presences as $presence)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <h6 class="fs-4 fw-semibold mb-0">{{ $presence->User->name }}</h6>
                                                <span class="fw-normal">{{ $presence->Level->kelas }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $presence->Major->major }}</h6>
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-light-success text-success fw-semibold fs-6">{{ $presence->date }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-light-{{ $presence->status == 'izin' ? 'warning' : ($presence->status == 'alpa' ? 'danger' : 'success') }} text-{{ $presence->status == 'izin' ? 'warning' : ($presence->status == 'alpa' ? 'danger' : 'success') }} fw-semibold fs-6">
                                            {{ ucfirst($presence->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($presence->status != 'alpa')
                                            <span
                                                class="badge bg-light-success text-success fw-semibold fs-6">{{ \Carbon\Carbon::parse($presence->time_comes)->format('H:i') }}</span>
                                        @else
                                            <span class="text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($presence->time_leaves)
                                            <span
                                                class="badge bg-light-primary text-primary fw-semibold fs-6">{{ \Carbon\Carbon::parse($presence->time_leaves)->format('H:i') }}</span>
                                        @else
                                            <span class="text-muted"></span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center" style="min-height: 100px; vertical-align: middle;">
                                    <img src="{{ asset('assets/dist/images/noData.png') }}" alt="No Data" style="max-height: 100px;" class="d-block mx-auto mb-2">
                                    <h3>Data Kosong</h3>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('clock').textContent = hours + ':' + minutes + ':' + seconds;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
