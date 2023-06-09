@extends('layout/main')

@section('container')
    <div class="container">
        <div class="col-6">
            <h1 class="mt-3">Students List</h1>
            <a href="/students/create" class="btn btn-primary my-3">Add New Student</a>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul class="list-group">
                @foreach ($students as $row)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $row->nama }}
                    <a href="/students/{{$row->slug}}" class="btn btn-info">Detail</a>
                @endforeach
            </li>
            </ul>
        </div>
    </div>
@endsection
