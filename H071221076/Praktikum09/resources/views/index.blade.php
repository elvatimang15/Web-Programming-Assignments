@extends('layouts.main')

<style>
    table {
        justify-content: center;
        align-content: center;
        text-align: center;
    }

    .title {
        padding-top: 50px;
    }

</style>
@section('container')
    <div class="title d-flex align-items-center justify-content-center">
        <h1>List Barang</h1>
    </div>
    <hr>
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Warna</th>
            <th>Action</th>
        </tr>
        @if ($tokos->count() > 0)
            @foreach ($tokos as $toko)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $toko->nama }}</td>
                    <td class="align-middle">{{ $toko->harga }}</td>
                    <td class="align-middle">{{ $toko->warna }}</td>
                    <td class="align-middle">
                        <a href="{{ route('toko.show', $toko->id) }}" class="btn btn-secondary">Detail</a>
                        <a href="{{ route('toko.edit', $toko->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('toko.destroy', $toko->id) }}" method="POST" class="btn btn-danger p-0 m-0" onsubmit="return confirm('Hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>                        
                    </td>
                </tr>
            @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5">Items Not Found</td>
        </tr>
        @endif
    </table>
@endsection
