@extends('pengajar.main')

@section('content')
<style>
    .card {
       margin-top: 50px;
       border-radius: 10px;
       box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
   }

   .card-header {
       color: black;
       border-bottom: none;
       border-top-left-radius: 10px;
       border-top-right-radius: 10px;
       display: flex;
       justify-content: space-between;
       align-items: center;
       padding: 10px 20px;
   }

   .btn-success {
       border: none;
       border-radius: 5px;
       color: white;
       transition: background-color 0.3s;
   }

   .btn-success:hover {
       background-color: #628367;
   }

   .table {
       margin-bottom: 0;
   }

   th,
   td {
       text-align: center;
       vertical-align: middle !important;
   }

   .created-by-me {
       background-color: #f0f0f0; /* or any desired color */
   }

   .alert {
       border-radius: 0;
       margin-bottom: 0;
   }

   .table thead th {
       background-color: #6ab277;
       color: white;
   }

   thead tr th {
       justify-content: center;
       align-items: center;
       text-align: center;
   }

   tbody tr td {
       justify-content: center;
       align-items: center;
       text-align: center;
   }

</style>

<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Course Management</h3>
        <a href="{{ route('course.create') }}" class="btn btn-success">Add Course</a>
    </div>
    <div class="card-body">
        @if (session('message'))
        <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="align-middle">
                    <tr>
                        <th>No</th>
                        <th>Nama Course</th>
                        <th>Rentang course</th>
                        <th>pengajar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr class="{{ auth()->id() === $course->user_id ? 'created-by-me' : '' }}">
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $course->nama }}</td>
                            <td class="align-middle">{{ $course->mulai }} - {{ $course->selesai }}</td>
                            <td class="align-middle">{{ $course->pengajar }}</td>
                            <td class="align-middle">
                                {{-- <a class="btn btn-sm btn-primary" href="{{ route('recruter.detail', ['courseId' => $course->id]) }}">Detail</a> --}}
                                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form onclick="return confirm('Apakah anda yakin ingin menghapus data?');"
                                    class="d-inline" action="{{ route('course.destroy', $course->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
