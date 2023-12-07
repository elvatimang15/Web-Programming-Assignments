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
        Edit Content
    </div>
    <div class="card-body">
        <form action="{{ route('admin.content.update', ['content' => $content->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $content->judul }}">
            </div>
            <div class="form-group">
                <label for="materi">Materi</label>
                <textarea name="materi" id="materi" class="form-control" rows="5">{{ $content->materi }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
