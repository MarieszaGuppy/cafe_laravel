<x-dashbar>
    <x-slot:title><button onclick="location.href='{{ route('users.index') }}'"
            class=" btn btn-primary d-md-inline-flex"><i class="ri-arrow-left-line"></i></button> Edit Akun</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <form class="column g-3 needs-validation" action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-4 mb-4 position-relative">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    id="validationTooltip02" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                    id="validationTooltip02" value="{{ old('username', $user->username) }}" required>
                @error('username')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="validationTooltip02" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-4 mb-4 position-relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" value="{{ old('password', $user->password) }}" required>
                @error('password')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-4 mb-4 position-relative">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="type1" value="1"
                        {{ old('type', $user->type) == 'admin' ? 'checked' : '' }}>
                    <label class="form-check-label" for="type1">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="type2" value="0"
                        {{ old('type', $user->type) == 'user' ? 'checked' : '' }}>
                    <label class="form-check-label" for="type2">User</label>
                </div>
            </div>

            <hr>

            <div class="col-12">
                <button class="btn btn-primary float-end mb-5" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</x-dashbar>
