<x-authlayout>
    <h1>Masuk</h1>
    <form class="column g-3 needs-validation" novalidate method="POST" action="/login">
        @csrf
        <div class="col-md-8">
            <label for="email" class="form-label">Email</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="email" class="form-control" name="email" id="validationCustomUsername"
                    value="{{ old('email') }}" aria-describedby="inputGroupPrepend" autocomplete="off" required>
                <div class="invalid-feedback">
                    Email tidak sesuai.
                </div>
            </div>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="col-md-8">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="validationCustom04" autocomplete="off"
                required>
            <div class="invalid-feedback">
                Mohon masukkan kata sandi Anda.
            </div>
        </div>

        {{-- <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="form-check-label">
                    Ingat saya
                </label>
                <a href="{{ route('forgot_password') }}" class="p-3" style="text-decoration: none">Lupa Password</a>
            </div>
        </div> --}}

        <hr>

        <div class="col-12">
            <button class="btn btn-primary float-end mb-5" type="submit">Masuk</button>
            <a href="/" class="btn btn-light float-end me-2" type="reset">Batalkan</a>
        </div>
    </form>
</x-authlayout>
