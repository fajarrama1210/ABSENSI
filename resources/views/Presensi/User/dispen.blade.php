@extends('Presensi.User.layouts.userCore')
@section('content')
    <div class="container-fluid note-has-grid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Izin</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="{{ route('dashboardUser') }}">Dashboard</a></li>
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
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
            <li class="nav-item ms-auto">
                <a href="izin/create/create" class="btn btn-primary d-flex align-items-center px-3" id="add-notes">
                    <i class="ti ti-file me-0 me-md-1 fs-4"></i>
                    <span class="d-none d-md-block font-weight-medium fs-3">Izin</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="note-full-container" class="note-has-grid row">
                @forelse ($dispens as $dispen)
                    <div class="col-md-4 single-note-item all-category">
                        <div class="card card-body w-auto">
                            <span class="side-stick"></span>
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="note-title text-truncate w-75 mb-0" data-noteHeading="Book a Ticket for Movie">
                                    {{ $dispen->permissionStatus }}
                                </h6>
                                <span
                                    class="badge bg-light-{{ $dispen->status == 'approved' ? 'success' : ($dispen->status == 'rejected' ? 'danger' : 'warning') }} text-{{ $dispen->status == 'approved' ? 'success' : ($dispen->status == 'rejected' ? 'danger' : 'warning') }} fw-semibold fs-2">
                                    {{ $dispen->status == 'approved' ? 'Terima' : ($dispen->status == 'rejected' ? 'Tolak' : 'Menunggu') }}
                                </span>
                            </div>
                            <p class="note-date fs-2">{{ $dispen->date }}</p>
                            <div class="note-content">
                                <p class="note-inner-content"
                                    data-noteContent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                    {{ $dispen->reason }}
                                </p>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="ms-auto">
                                    <div class="category-selector btn-group">
                                        <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown"
                                            href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                            <div class="category">
                                                <div class="category-business"></div>
                                                <div class="category-social"></div>
                                                <div class="category-important"></div>
                                                <span class="more-options text-dark">
                                                    <i class="ti ti-dots-vertical fs-5"></i>
                                                </span>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right category-menu">
                                            <button
                                                class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center"
                                                type="button"
                                                onclick="window.location.href='{{ route('detailUser', ['id' => $dispen->id]) }}'">
                                                Detail
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center"
                        style="min-height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <img src="{{ asset('assets/dist/images/noData.png') }}" alt="No Data" style="max-height: 100px;">
                        <h3 class="mt-2">Data Kosong</h3>
                    </div>
                @endforelse
            </div>
        </div>


    </div>
@endsection
