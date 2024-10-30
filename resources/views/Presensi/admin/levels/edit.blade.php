@extends('Presensi.admin.layouts.adminCore')

@section('title', 'Edit Kelas')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Edit Kelas</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('level.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kelas" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $kelas->kelas }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('level.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
