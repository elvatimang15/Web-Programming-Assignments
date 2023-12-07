@extends('pengajar.main')

@section('content')
<style>
    .welcome-msg {
        margin-bottom: 40px
    }

    .btn-success {
        background-color: #6ab277;
        border: none;
        border-radius: 5px;
        color: white;
        transition: background-color 0.3s;
    }

    .btn-success:hover {
        background-color: #628367;
    }
</style>
    <div class="container">
        <h2 class="welcome-msg">Welcome to Teacher Dashboard</h2>
        @if (session('message'))
            <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($courses->take(9) as $course)
                <div class="col">
                    <div class="card custom-card-color">
                        <img src="{{ Storage::url($course->gambar) }}" class="card-img-top" alt="{{ $course->nama }}"
                            width="100%" height="300">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $course->nama }}</h5>
                            <p class="card-text">{{ $course->deskripsi }}</p>
                            <a href="#" class="btn btn-success">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
