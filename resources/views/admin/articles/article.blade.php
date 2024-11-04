<x-dashbar>
    <x-slot:title>Artikel</x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc>Total {{ $articleCount }} Artikel</x-slot:desc>
    <x-slot:heading>
        <div class="toggle-wrap nk-block-tools-toggle">
            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="more-options"><em
                    class="icon ni ni-more-v"></em></a>
            <div class="toggle-expand-content" data-content="more-options">
                <ul class="nk-block-tools g-3">
                    <form method="GET" action="{{ route('articles.index') }}">
                        <li>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input type="hidden" name="page" value="1">
                                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">

                                    <input type="search" name="search" class="form-control" id="default-04 search"
                                        placeholder="Cari dari judul" autocomplete="off"
                                        value="{{ request('search') }}">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-primary btn-dim">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </form>
                    <li>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-outline-light btn-white"
                                data-bs-toggle="dropdown">Kategori <i class="ri-arrow-down-s-line"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <ul class="link-list-opt no-bdr">
                                    <li><a
                                            href="{{ request()->fullUrlWithQuery(['category_id' => '1', 'page' => request('1')]) }}"><span>Minuman
                                                Hangat</span></a>
                                    </li>
                                    <li><a
                                            href="{{ request()->fullUrlWithQuery(['category_id' => '2', 'page' => request('1')]) }}"><span>Minuman
                                                Dingin</span></a>
                                    </li>
                                    <li><a
                                            href="{{ request()->fullUrlWithQuery(['category_id' => '3', 'page' => request('1')]) }}"><span>Makanan
                                                Ringan</span></a>
                                    </li>
                                    <li><a href="{{ route('articles.index') }}"><span>Semua</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nk-block-tools-opt">
                        <a href="{{ route('articles.create') }}" class="btn btn-primary d-md-inline-flex"><em
                                class="icon ri-add-large-line"></em><span>Tambah</span></a>
                    </li>
                    <li>
                        <button onclick="location.href='{{ route('admin.articles.trash') }}'"
                            class="btn btn-outline-primary d-md-inline-flex" id="toggleTableButton"><em
                                class="icon ri-delete-bin-line"></em></button>
                    </li>
                </ul>
            </div>
        </div>
    </x-slot:heading>

    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ $articles->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $articles->lastPage(); $i++)
                <li class="page-item {{ $articles->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="{{ $articles->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <br>
    <br>
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Konten</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                                <tr>
                                    <th scope="row">{{ $article->id }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td style="width: 10%"><img
                                            src="{{ asset('/storage/articles/' . $article->image) }}" alt=""
                                            class="thumb"></td>
                                    <td>{{ $article->author->name }}</td>
                                    <td>{{ $article->category->name }}</td>
                                    <td>{{ Str::limit($article->body, 40, '...') }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="button" class="btn btn-success"
                                                onclick="location.href='{{ route('articles.show', $article->slug) }}'">Lihat</button>
                                            <button class="btn btn-warning"
                                                onclick="location.href='{{ route('articles.edit', $article->id) }}'">Edit</button>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="no-data">
                                    <div class="alert alert-danger">
                                        Artikel Belum Tersedia.
                                    </div>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-dashbar>
