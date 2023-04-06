@extends('layout/main')

@section('title', 'Student Form')

@section('container')
    <div class="container">
        <div class="col-8">
            <h1 class="mt-3">Student Form</h1>
            <form method="post" action="/students/{{ $student->id }}">
                @method('put')
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control @error('nrp') is-invalid @enderror" name="nrp" placeholder="NRP" value="{{ $student->nrp }}">
                    @error('nrp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ $student->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $student->email }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" value="{{ $student->jurusan }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
