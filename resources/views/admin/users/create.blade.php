<x-dashbar>
    <x-slot:title>Tambah Pengguna</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <form class="column g-3 needs-validation" action="{{ route('users.store') }}" method="POST">
            @csrf
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

            <div class="col-md-4 mb-4 position-relative">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                    id="validationTooltip02" value="{{ old('username') }}" required>
                @error('username')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="validationTooltip02" value="{{ old('email') }}" required>
                @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" value="{{ old('password') }}" required>
                @error('password')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="col-md-4 mb-4 position-relative">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                    autocomplete="off" required>
                @error('password_confirmation')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="type1" value="1">
                <label class="form-check-label" for="type1">Admin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="type" id="type2" value="0">
                <label class="form-check-label" for="type2">User</label>
            </div>
            <hr>

            <div class="col-12">
                <button class="btn btn-primary float-end mb-5" type="submit">Simpan</button>
                <button class="btn btn-light float-end me-2" type="reset">Reset</button>
            </div>
        </form>
    </div>
</x-dashbar>
