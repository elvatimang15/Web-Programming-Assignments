@extends('admin')

@section('content')
<style>
    .mt-5 {
        margin-bottom: 40px
    }
</style>

<div class="container mt-4">
        <div>
            <h2 class="mt-5">Welcome to Admin Dashboard</h2>

</div>
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    @foreach ($courses->take(9) as $course)
        <div class="col">
            <div class="card custom-card-color">
                <img src="{{ Storage::url($course->gambar) }}" class="card-img-top" alt="{{ $course->nama }}"
                    width="100%" height="300">
                <div class="card-body">
                    <h5 class="card-title text-dark">{{ $course->nama }}</h5>
                    <p class="card-text">{{ $course->deskripsi }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
