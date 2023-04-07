@extends('layout/main')

@section('container')
    <div class="container">
        <div class="col-8">
            <h1 class="mt-3">Student Form</h1>
            <form method="post" action="/students">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control  @error('nrp') is-invalid @enderror" name="nrp" placeholder="NRP" value="{{ old('nrp') }}">
                    @error('nrp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" value="{{ old('jurusan') }}">
                </div>
                <div class="form-group">
                    <input id="x1" type="hidden" name="bio">
                    <trix-editor input="x1"></trix-editor>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slugs = document.querySelector('#slug');

        title.addEventListener('keyup', function(e) {
            fetch('/students/checkSlug/' + title.value)
            .then(response => response.json())
            .then(data => slugs.value = data.slug)
        })
    </script>
@endsection
