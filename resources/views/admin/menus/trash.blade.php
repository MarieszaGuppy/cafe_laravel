<x-dashbar>
    <x-slot:title>Sampah</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc>Total {{ $trashedMenuCount }} Menu yang Dihapus</x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Tanggal Dihapus</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trashedMenus as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="width: 10%"><img src="{{ asset('/storage/menus/' . $menu->image) }}"
                                            alt="" class="thumb"></td>
                                    <td>{{ $menu->name }}</td>
                                    <td>{{ $menu->category->name }}</td>
                                    <td>{{ $menu->deleted_at->format('d M Y') }}</td>
                                    <td>
                                        <form action="{{ route('admin.menus.restore', $menu->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Pulihkan</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="no-data">
                                    <div class="alert alert-danger">
                                        Belum Ada Menu Yang Dihapus.
                                    </div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('menus.index') }}" class="btn btn-primary mt-3">Kembali ke List Menu</a>
                </div>
            </div>
        </div>
    </div>
</x-dashbar>
