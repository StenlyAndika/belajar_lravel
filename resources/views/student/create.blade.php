@extends('layout/main')

@section('container')
    <div class="container">
        <div class="col-8">
            <h1 class="mt-3">Student Form</h1>
            <form method="post" action="/students" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}" readonly>
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" placeholder="Jurusan" value="{{ old('jurusan') }}">
                    @error('jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <img class="img-preview img-fluid col-lg-8 mt-2">
                </div>
                <div class="form-group">
                    <input id="bio" type="hidden" name="bio" value="{{ old('bio') }}">
                    <trix-editor input="bio"></trix-editor>
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

        function previewImage() {
            const image = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }

    </script>
@endsection
