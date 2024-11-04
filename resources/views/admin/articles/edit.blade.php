<x-dashbar>
    <x-slot:title><button onclick="location.href='{{ route('articles.index') }}'"
            class=" btn btn-primary d-md-inline-flex"><i class="ri-arrow-left-line"></i></button> Edit Artikel</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <form class="column g-3 needs-validation" action="{{ route('articles.update', $article->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-4 mb-4 position-relative">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    id="validationTooltip02" value="{{ old('title', $article->title) }}" required>
                @error('title')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                {{-- error message untuk image --}}
                @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('category_id') is-invalid @enderror" type="radio"
                        name="category_id" id="category_id1" value="1"
                        {{ old('category_id', $article->category_id) == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="category_id1">Minuman Hangat</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('category_id') is-invalid @enderror" type="radio"
                        name="category_id" id="category_id2" value="2"
                        {{ old('category_id', $article->category_id) == '2' ? 'checked' : '' }}>
                    <label class="form-check-label" for="category_id2">Minuman Dingin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('category_id') is-invalid @enderror" type="radio"
                        name="category_id" id="category_id3" value="3"
                        {{ old('category_id', $article->category_id) == '3' ? 'checked' : '' }}>
                    <label class="form-check-label" for="category_id3">Makanan Ringan</label>
                </div>
                @error('category_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="body" class="form-label">Konten</label>
                <textarea name="body" rows="5" class="form-control @error('body') is-invalid @enderror"
                    placeholder="Masukkan konten artikel">{{ old('body', $article->body) }}</textarea>
                @error('body')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                    id="validationTooltip02" value="{{ old('slug', $article->slug) }}" required>
                @error('slug')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <hr>

            <div class="col-12">
                <button class="btn btn-primary float-end mb-5" type="submit">Simpan</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    {{-- <script>
        CKEDITOR.replace('body');
    </script> --}}
</x-dashbar>
