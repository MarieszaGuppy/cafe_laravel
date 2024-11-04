<x-dashbar>
    <x-slot:title>Sampah</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc>Total {{ $trashedGalleryCount }} Gambar yang Dihapus</x-slot:desc>
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
                                <th>Author</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Dihapus</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trashedGalleries as $gallery)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="width: 10%"><img src="{{ asset('/storage/galleries/' . $gallery->image) }}"
                                            alt="" class="thumb"></td>
                                    <td>{{ $gallery->author->name }}</td>
                                    <td>{{ $gallery->category->name }}</td>
                                    <td>{{ $gallery->description }}</td>
                                    <td>{{ $gallery->deleted_at->format('d M Y') }}</td>
                                    <td>
                                        <form action="{{ route('admin.galleries.restore', $gallery->id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Pulihkan</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="no-data">
                                    <div class="alert alert-danger">
                                        Belum Ada Gambar Yang Dihapus.
                                    </div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('galleries.index') }}" class="btn btn-primary mt-3">Kembali ke List Galeri</a>
                </div>
            </div>
        </div>
    </div>
</x-dashbar>
