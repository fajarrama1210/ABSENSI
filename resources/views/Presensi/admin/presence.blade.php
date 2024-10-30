@extends('Presensi.admin.layouts.adminCore')
@section('title')
    Admin-Presensi X Absensi
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Data Abesen</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="index-2.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Data Absen</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                                class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card w-100 position-relative overflow-hidden">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0 lh-sm">Data Absen</h5>
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
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Jurusan</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($presences as $presence)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $presence->user->photo) }}"
                                                alt="{{ $presence->user->name }}" class="rounded-circle" width="40"
                                                height="40" />
                                            <div class="ms-3">
                                                <h6 class="fs-4 fw-semibold mb-0">{{ $presence->User->name }}</h6>
                                                <span class="fw-normal">{{ $presence->Level->kelas }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-light-warning text-warning fw-semibold fs-6">{{ $presence->date }}</span>
                                    </td>
                                    <td>
                                        <span class="badge fw-semibold py-1 w-85 bg-light-{{
                                            $presence->status == 'izin' ? 'warning' :
                                            ($presence->status == 'alpa' ? 'danger' :
                                            ($presence->status == 'terlambat' ? 'info' : 'success'))
                                        }} text-{{
                                            $presence->status == 'izin' ? 'warning' :
                                            ($presence->status == 'alpa' ? 'danger' :
                                            ($presence->status == 'terlambat' ? 'info' : 'success'))
                                        }} fs-6">
                                            {{ ucfirst($presence->status) }}
                                        </span>
                                    </td>


                                    <td>
                                        <span
                                            class="badge bg-light-success text-success fw-semibold fs-6">{{ \Carbon\Carbon::parse($presence->time_comes)->format('H:i') }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-light-primary text-primary fw-semibold fs-6">{{ \Carbon\Carbon::parse($presence->time_leaves)->format('H:i') }}</span>
                                    </td>
                                    <td>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $presence->Major->major }}</h6>
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
    @endsection
