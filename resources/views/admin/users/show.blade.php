<x-dashbar>
    <x-slot:title>Detail Pengguna : {{ $user->name }}</x-slot:title>
    <x-slot:indexx>#{{ $user->id }}</x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="container">
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Password:</strong> {{ $user->password }}</p>
            <p><strong>Role:</strong> {{ $user->type }}</p>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</x-dashbar>
