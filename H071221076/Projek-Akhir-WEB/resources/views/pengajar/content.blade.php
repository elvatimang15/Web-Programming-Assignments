@extends('pengajar.main')

@section('content')
<style>
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

    .table {
    width: 100%;
    border-collapse: collapse;
    }

    .table th, .table td {
        padding: 12px;
        text-align: center;
        vertical-align: middle;
    }

    .table thead th {
        background-color: #6ab277;
        color: white;
    }

    .table tbody tr:nth-of-type(even) {
        background-color: #f8f9fa;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>

    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Content Management</h3>
            <a href="{{ route('content.create') }}" class="btn btn-success">Add Content</a>
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
                            <th>Nama Content</th>
                            <th>Materi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contents as $content)
                            <tr class="{{ auth()->id() === $content->user_id ? 'created-by-me' : '' }}">
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $content->course->nama }}</td>
                                <td class="align-middle">{{ $content->judul }}</td>
                                <td class="align-middle">{{ $content->materi }}</td>
                                <td class="align-middle">
                                    {{-- <a class="btn btn-sm btn-primary" href="{{ route('recruter.detail', ['courseId' => $course->id]) }}">Detail</a> --}}
                                    <a href="{{ route('content.edit', ['content' => $content->id]) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form onclick="return confirm('Apakah anda yakin ingin menghapus data?');"
                                        class="d-inline"
                                        action="{{ route('content.destroy', ['content' => $content->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="margin-top: 8px;">Delete</button>
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
