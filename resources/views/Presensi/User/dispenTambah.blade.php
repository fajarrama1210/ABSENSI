@extends('Presensi.User.layouts.userCore')

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
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboardUser') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Izin</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3 text-center mb-n5">
                        <img src="{{ asset('assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="border-bottom title-part-padding">
                        <h4 class="card-title mb-0">Buat Izin</h4>
                    </div>
                    <div class="card-body">
                        <form class="mt-4" method="POST" enctype="multipart/form-data"
                            action="{{ route('dispenStore') }}">
                            @csrf
                            <label for="date" class="form-label">Pilih Tanggal</label>
                            <div class="mb-3">
                                <input type="date" id="date" name="date" class="form-control"
                                    placeholder="Pilih tanggal" />
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="form-label">Status Izin</label>
                            <div class="mb-3 d-flex">
                                <div class="me-3">
                                    <input type="radio" id="izin" name="permissionStatus" value="Izin" />
                                    <label for="izin" class="ms-2">Izin</label>
                                </div>
                                <div class="me-3">
                                    <input type="radio" id="sakit" name="permissionStatus" value="Sakit" />
                                    <label for="sakit" class="ms-2">Sakit</label>
                                </div>
                                <div class="me-3">
                                    <input type="radio" id="izin_kegiatan" name="permissionStatus"
                                        value="Izin Kegiatan" />
                                    <label for="izin_kegiatan" class="ms-2">Izin Kegiatan</label>
                                </div>
                            </div>

                            @error('permissionStatus')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="email-repeater mb-3">
                                <label for="proof" class="form-label">Bukti</label>
                                <div data-repeater-list="repeater-group">
                                    <div data-repeater-item class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="customFile" name="proof"
                                                    placeholder="Kirim Bukti" />
                                                @error('proof')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="reason" class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="3" name="reason" placeholder="Masukkan deskripsi"></textarea>
                                @error('reason')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button
                                    class="btn rounded-pill px-4 btn-light-success text-success font-weight-medium waves-effect waves-light"
                                    type="submit">
                                    <i class="ti ti-send fs-5"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
