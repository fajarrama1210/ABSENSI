@extends('Presensi.admin.layouts.adminCore')
@section('title')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Konfirmasi</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="{{ route('dashboardAdmin') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Konfirmasi</li>
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
                <h5 class="card-title fw-semibold mb-0 lh-sm">Tabel Konfirmasi</h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive rounded-2 mb-4">
                    <table class="table border text-nowrap customize-table mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">No</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Nama</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Kelas</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Jurusan</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Detail</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <p class="mb-0 fw-normal">
                                            {{ $user->name }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 fw-normal">{{ $user->level->kelas}}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 fw-normal">{{ $user->major->major }}</p>
                                    </td>
                                    <td>
                                        <span class="badge bg-light-{{ $user->status == 'active' ? 'success' : 'danger' }} text-{{ $user->status == 'active' ? 'success' : 'danger' }} fw-semibold fs-6">
                                            {{ ucfirst($user->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 fw-normal">Detail</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown dropstart">
                                            <a href="#" class="text-muted" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical fs-6"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                                        href="{{ route('userApprove', $user->id) }}">
                                                        <i class="fs-4 ti ti-edit"></i>Terima
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                                        href="{{ route('userReject', $user->id) }}">
                                                        <i class="fs-4 ti ti-trash"></i>Tolak
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('userDestroy', $user->id) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="dropdown-item d-flex align-items-center gap-3"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                            <i class="fs-4 ti ti-trash"></i>Hapus
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
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
@endsection
