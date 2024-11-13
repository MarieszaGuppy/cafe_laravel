<x-navbar>
    <style>
        .article-img {
            width: 500px;
            height: 300px;
        }
    </style>
    <x-slot:popup></x-slot:popup>
    <x-slot:title></x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>

    <div class="nk-block">
        <div class="row g-0">
            @forelse ($articles as $article)
                <div class="col-sm-6">
                    <div class="card text-white bg-primary m-2">
                        <div class="card-header">{{ $article->category->name }}</div>
                        <div class="card-inner">
                            <img src="{{ asset('/storage/articles/' . $article->image) }}" alt=""
                                class="article-img img-fluid">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ Str::limit($article->body, 100, '...') }}</p>
                            <button onclick="location.href='{{ route('user.article.show', $article->slug) }}'"
                                class=" btn btn-secondary d-md-inline-flex">Lihat</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="no-data">
                    <div class="alert alert-danger">
                        Artikel Belum Tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-navbar>
