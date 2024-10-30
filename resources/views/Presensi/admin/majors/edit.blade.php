@extends('Presensi.admin.layouts.adminCore')

@section('title')
    Edit Jurusan
@endsection

@section('content')
<div class="container-fluid">
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Edit Jurusan</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('Jurusan.update', $major->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="major" class="control-label">Jurusan :</label>
                    <input type="text" class="form-control" id="major" name="major" value="{{ $major->major }}" required/>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('Jurusan.index') }}" class="btn btn-light-danger text-danger font-medium">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
