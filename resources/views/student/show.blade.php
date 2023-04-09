@extends('layout/main')

@section('container')
    <div class="container">
        <div class="col-6">
            <h1 class="mt-3">Students List</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $student->nama }}</h5>
                    <img src="{{ asset('storage/'. $student->image) }}" alt="..." class="img-fluid">
                    <p class="card-text">{{ $student->jurusan }}</p>
                    <p class="card-text">{!! $student->bio !!}</p>
                    <a href="/students/{{ $student->slug }}/edit" class="btn btn-primary">Edit</a>
                    <form action="/students/{{ $student->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="/students" class="card-link">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
