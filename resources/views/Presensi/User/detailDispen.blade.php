@extends('Presensi.User.layouts.userCore')
@section('title')
    Detail Izin
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Detail Izin</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="{{ route('dashboardUser') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">detail</li>
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

        <div class="shop-detail">
            <div class="card shadow-none border">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="" class="">
                                <div class="item rounded overflow-hidden">
                                    <img src="{{ asset('storage/proofs/' . $dispen->proof) }}" alt="Proof"
                                        class="img-fluid"
                                        style="width: 600px; height: 400px; object-fit: cover; margin-left: 20px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shop-content">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span
                                        class="badge bg-light-{{ $dispen->status == 'approved' ? 'success' : ($dispen->status == 'rejected' ? 'danger' : 'warning') }} text-{{ $dispen->status == 'approved' ? 'success' : ($dispen->status == 'rejected' ? 'danger' : 'warning') }} fw-semibold fs-2">
                                        {{ $dispen->status == 'approved' ? 'Terima' : ($dispen->status == 'rejected' ? 'Tolak' : 'Menunggu') }}
                                    </span>
                                </div>
                                <h4 class="fw-semibold">Nama : {{ $dispen->user->name }}</h4>
                                <h4 class="fw-semibold mb-3">Tanggal : {{ $dispen->date }}</h4>
                                <h4 class="fw-semibold mb-3"> Keterangan : {{ $dispen->permissionStatus }}</h4>
                                <p class="mb-3"> Alasan : {{ $dispen->reason }}</p>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary"
                                    style="position: absolute; bottom: 20px; right: 20px;">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
