@extends('layout/main')

@section('title', 'Mahasiswa')

@section('container')
    <div class="container">
        <h1 class="mt-3">Daftar Mahasiswa</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $row)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->nrp }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->jurusan }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-success">edit</a>
                            <a href="" class="btn btn-sm btn-danger">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
