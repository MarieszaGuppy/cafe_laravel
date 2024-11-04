<x-authlayout>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
            <hr>
        @endforeach
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form class="column g-3 needs-validation" novalidate method="POST" action="{{ route('forgot_password_submit') }}">
        @csrf
        <div class="col-md-8">
            <label for="email" class="form-label">Email</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                    autocomplete="off" required autofocus>
                <div class="invalid-feedback">
                    Email tidak sesuai.
                </div>
            </div>
        </div>

        <hr>

        <div class="col-12">
            <button class="btn btn-primary float-end mb-5" type="submit">Kirim Link Reset Password</button>
            <a href="{{ route('login') }}" class="btn btn-light float-end me-2" type="reset">Batalkan</a>
        </div>
    </form>
</x-authlayout>
