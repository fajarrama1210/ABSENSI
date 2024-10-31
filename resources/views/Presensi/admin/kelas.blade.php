@extends('Presensi.admin.layouts.adminCore')

@section('title')
    Admin-Presensi X/Kelas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Data Kelas</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted " href="{{ route('dashboardAdmin') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Kelas Presensi X</li>
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
            <div class="px-4 py-3 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="card-title fw-semibold mb-0 lh-sm">Tabel Kelas</h5>
                <button type="button" class="btn btn-lg px-4 fs-4 font-medium btn-light-primary text-primary"
                    data-bs-toggle="modal" data-bs-target="#modal-tambah" data-bs-whatever="@mdo">
                    Tambah Kelas
                </button>
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
                                    <h6 class="fs-4 fw-semibold mb-0">Kelas</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Aksi</h6>
                                </th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($levels as  $level)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <h6 class="fs-4 fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 fw-normal">{{ $level->kelas }}</p>
                                    </td>
                                    <td>
                                        <div class="dropdown dropstart">
                                            <a href="#" class="text-muted" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical fs-6"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <!-- Link Edit ke Halaman Edit -->
                                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                                        href="{{ route('level.edit', $level->id) }}">
                                                        <i class="fs-4 ti ti-edit"></i>Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('level.destroy', $level->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="dropdown-item d-flex align-items-center gap-3">
                                                            <i class="fs-4 ti ti-trash"></i>Hapus
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <div class="d-flex flex-column justify-content-center">
                                            <img src="{{ asset('assets/img/No-data.png') }}" alt=""
                                                style="display: block; margin: 0 auto; max-width: 16%; height: auto;">
                                            <h4 class="table-light" style="text-align: center;">
                                                Data Tidak Tersedia
                                            </h4>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="mb-3">
                                    <h5 class="mb-0">
                                        Pagination
                                    </h5>
                                </div>
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#">{{$levels->links()}}</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>

    {{-- modal tambah --}}
    <div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="exampleModalLabel1">Tambah Kelas</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('level.store') }}" method="POST" id="form-tambah-kelas">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="control-label">Kelas :</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger text-danger font-medium"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success" form="form-tambah-kelas">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
