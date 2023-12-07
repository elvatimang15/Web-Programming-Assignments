@extends('pengajar.main')

@section('content')
<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .card-header {
        background-color: #6ab277;
        color: white;
        font-weight: bold;
        text-align: center;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    .form-control {
        border-radius: 5px;
    }

    .btn-success {
        border-radius: 5px;
    }
</style>
<div class="card">
    <div class="card-header">
        Form Tambah Course
    </div>

    <div class="card-body">
        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Course</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
            </div>
            <div class="form-group">
                <label for="mulai">Tanggal Mulai</label>
                <input type="date" name="mulai" class="form-control" value="{{ old('mulai') }}">
            </div>
            <div class="form-group">
                <label for="selesai">Tanggal Selesai</label>
                <input type="date" name="selesai" class="form-control" value="{{ old('selesai') }}">
            </div>
            <div class="form-group">
                <label for="pengajar">Pengajar</label>
                <input type="text" name="pengajar" class="form-control" value="{{ old('pengajar') }}">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" name="gambar">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
