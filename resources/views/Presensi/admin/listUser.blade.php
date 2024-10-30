@extends('Presensi.admin.layouts.adminCore')
@section('title')
Daftar Penggguna
@endsection

@section('content')
<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Daftar Pengguna</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted " href="{{ route('dashboardAdmin') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Daftar Pengguna
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets/dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                @forelse ($users as $user)
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" class="rounded-1 img-fluid" width="90" height="90" style="width: 90px; height: 90px; object-fit: cover;">

                                <div class="mt-n2">
                                    <h3 class="card-title mt-3">{{ $user->name }}</h3>
                                    <h6 class="card-subtitle">{{ $user->Major->major }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No users available.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
