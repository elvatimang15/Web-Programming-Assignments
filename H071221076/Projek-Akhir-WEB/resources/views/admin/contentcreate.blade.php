@extends('admin')

@section('content')
<style>
    .card {
        margin-top: 50px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #6ab277;
        color: white;
        font-weight: bold;
        text-align: center;
        border-radius: 10px 10px 0 0;
    }

    .btn-success {
        border-radius: 5px;
    }

    .btn-success:hover {
        background-color: #628367;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

</style>
    <div class="card">
        <div class="card-header">
            Form Tambah Course
        </div>
        <div class="card-body">
            <form action="{{ route('admin.content.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="course_id">Pilih Course</label>
                    <select name="course_id" class="form-control">
                        @foreach ($contents as $course)
                            <option value="{{ $course->id }}">{{ $course->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
                </div>
                <div class="form-group">
                    <label for="materi">Materi</label>
                    <textarea name="materi" id="materi" class="form-control" rows="5">{{ old('materi') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
