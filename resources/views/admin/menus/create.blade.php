<x-dashbar>
    <x-slot:title>Tambah Menu</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>

    <div class="nk-block">
        <form class="column g-3 needs-validation" action="{{ route('menus.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
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

            <div class="col-md-4 mb-4 position-relative">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="validationTooltip02" value="{{ old('name') }}" required>
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('category_id') is-invalid @enderror" type="radio"
                        name="category_id" id="category_id1" value="1">
                    <label class="form-check-label" for="category_id1">Minuman Hangat</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('category_id') is-invalid @enderror" type="radio"
                        name="category_id" id="category_id2" value="2">
                    <label class="form-check-label" for="category_id2">Minuman Dingin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('category_id') is-invalid @enderror" type="radio"
                        name="category_id" id="category_id3" value="3">
                    <label class="form-check-label" for="category_id3">Makanan Ringan</label>
                </div>
                @error('category_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror"
                    placeholder="Masukkan Deskripsi Menu">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="price" class="form-label">Harga</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">Rp.</span>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                        id="validationTooltip04" value="{{ old('price') }}" placeholder="Masukkan Harga Menu"
                        aria-describedby="validationTooltipEmailPrepend" autocomplete="off" required>
                    @error('price')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-4 position-relative">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                    id="validationTooltip05" value="{{ old('stock') }}" placeholder="Masukkan Stok Menu"
                    autocomplete="off" required>
                @error('stock')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                    id="validationTooltip02" value="{{ old('slug') }}" required>
                @error('slug')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <hr>

            <div class="col-12">
                <button class="btn btn-primary float-end mb-5" type="submit">Simpan</button>
                <button class="btn btn-light float-end me-2" type="reset">Reset</button>
            </div>
        </form>
    </div>

    {{-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script> --}}
</x-dashbar>
