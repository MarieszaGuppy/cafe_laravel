<x-dashbar>
    <x-slot:title>Sampah</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc>Total {{ $trashedUserCount }} Pengguna yang Dihapus</x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Tanggal Dihapus</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trashedUsers as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->deleted_at->format('d M Y') }}</td>
                                    <td>
                                        <form action="{{ route('admin.users.restore', $user->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Pulihkan</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="no-data">
                                    <div class="alert alert-danger">
                                        Belum Ada Pengguna Yang Dihapus.
                                    </div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Kembali ke List Pengguna</a>
                </div>
            </div>
        </div>
    </div>
</x-dashbar>
