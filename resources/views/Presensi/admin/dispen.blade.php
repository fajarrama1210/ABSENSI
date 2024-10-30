@extends('Presensi.admin.layouts.adminCore')
@section('title')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Izin</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="{{ route('dashboardAdmin') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Izin</li>
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
                <h5 class="card-title fw-semibold mb-0 lh-sm">Tabel Izin</h5>
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
                                    <h6 class="fs-4 fw-semibold mb-0">Tanggal</h6>
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
                            @forelse ($dispens as $dispen)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <p class="mb-0 fw-normal">
                                            {{ $dispen->user ? $dispen->user->name : 'User tidak ditemukan' }}
                                        </p>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 fw-normal">{{ $dispen->date }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-light-{{ $dispen->status == 'pending' ? 'primary' : ($dispen->status == 'approved' ? 'success' : 'danger') }} rounded-3 py-2 text-{{ $dispen->status == 'pending' ? 'primary' : ($dispen->status == 'approved' ? 'success' : 'danger') }} fw-semibold fs-6">
                                            @if ($dispen->status == 'pending')
                                                Menunggu
                                            @elseif($dispen->status == 'approved')
                                                Disetujui
                                            @else
                                                Ditolak
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-primary fs-2 fw-semibold lh-sm"
                                                data-bs-toggle="modal" data-bs-target="#detailData-{{ $dispen->id }}">
                                                Detail
                                            </button>
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
                                                        href="{{ route('dispeApprove', $dispen->id) }}">
                                                        <i class="fs-4 ti ti-edit"></i>Terima
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                                        href="{{ route('dispenReject', $dispen->id) }}">
                                                        <i class="fs-4 ti ti-trash"></i>Tolak
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('dispenDestroy', $dispen->id) }}" method="POST"
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
                                    </td>
                                </tr>
                                <div class="modal fade" id="detailData-{{ $dispen->id }}"  tabindex="-1" role="dialog" aria-labelledby="d  etailModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel">Detail Izin</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center mb-3">
                                                    <img id="detail-image" src="{{ asset('storage/proofs/' . $dispen->proof) }}" alt="Detail Gambar"
                                                        class="img-fluid" style="max-height: 200px;" />
                                                </div>
                                                <div class="container-fluid">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item" style="font-weight: bold;">Nama :
                                                            {{ $dispen->user ? $dispen->user->name : 'User tidak ditemukan' }} <span id="detail-name"
                                                                style="font-weight: normal;"></span></li>
                                                        <li class="list-group-item" style="font-weight: bold;">Tanggal: {{ $dispen->date }} <span
                                                                id="detail-date" style="font-weight: normal;"></span></li>
                                                        <li class="list-group-item" style="font-weight: bold;">Keterangan :
                                                            {{ $dispen->permissionStatus }} <span id="detail-description"
                                                                style="font-weight: normal;"></span></li>
                                                        <li class="list-group-item" style="font-weight: bold;">Status :
                                                            <span
                                                                class="badge bg-light-{{ $dispen->status == 'pending' ? 'primary' : ($dispen->status == 'approved' ? 'success' : 'danger') }} rounded-3 py-2 text-{{ $dispen->status == 'pending' ? 'primary' : ($dispen->status == 'approved' ? 'success' : 'danger') }} fw-semibold fs-1">
                                                                @if ($dispen->status == 'pending')
                                                                    Menunggu
                                                                @elseif($dispen->status == 'approved')
                                                                    Disetujui
                                                                @else
                                                                    Ditolak
                                                                @endif
                                                            </span>
                                                        </li>

                                                        <li class="list-group-item" style="font-weight: bold;">Keterangan Izin : {{ $dispen->reason }}
                                                            <span id="detail-permission_description" style="font-weight: normal;"></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
