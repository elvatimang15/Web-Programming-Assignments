@extends('pengajar.main')

@section('content')
<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        padding: 20px;
        background-color: #A6CF98;
    }

    .card-title {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control:focus {
        border-color: #61a36d;
        box-shadow: none;
    }

    .btn-success {
        background-color: #61a36d;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        color: white;
        font-weight: bold;
        transition: background-color 0.3s;
        margin-top: 40px;
    }

    .btn-success:hover {
        background-color: #628367;
    }

    .text-muted {
        font-size: 12px;
    }

    ::placeholder {
        font-size: 12px; /* Adjust the font size as needed */
        opacity: 1.6; /* Adjust the opacity if necessary */
    }
</style>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Profile Penyedia Course</h2>
            <form action="{{ route('pengajar.profile.update') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
