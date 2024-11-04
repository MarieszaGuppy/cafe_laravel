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

    <form class="column g-3 needs-validation" novalidate method="POST"
        action="{{ route('reset_password_submit', [$token, $email]) }}">
        @csrf
        <div class="col-md-4 mb-4">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
            <div class="invalid-feedback">
                Please input your new password.
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="password_confirmation"
                autocomplete="off" required>
            <div class="invalid-feedback">
                Please input your password.
            </div>
        </div>

        <hr>

        <div class="col-12">
            <button class="btn btn-primary float-end mb-5" type="submit">Reset Password</button>
        </div>
    </form>
</x-authlayout>
