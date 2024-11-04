<x-dashbar>
    <x-slot:title>Sampah</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc>Total {{ $trashedArticleCount }} Artikel yang Dihapus</x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Konten</th>
                                <th>Tanggal Dihapus</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trashedArticles as $article)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->category }}</td>
                                    <td>{{ $article->body }}</td>
                                    <td>{{ $article->deleted_at->format('d M Y') }}</td>
                                    <td>
                                        <form action="{{ route('admin.articles.restore', $article->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Pulihkan</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="no-data">
                                    <div class="alert alert-danger">
                                        Belum Ada Artikel Yang Dihapus.
                                    </div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('articles.index') }}" class="btn btn-primary mt-3">Kembali ke List Artikel</a>
                </div>
            </div>
        </div>
    </div>
</x-dashbar>
