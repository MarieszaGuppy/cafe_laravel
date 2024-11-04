<x-dashbar>

    <x-slot:title><button onclick="location.href='{{ route('articles.index') }}'"
            class=" btn btn-primary d-md-inline-flex"><i class="ri-arrow-left-line"></i></button>
        Article :</x-slot:title>
    <x-slot:indexx>#{{ $article->id }}</x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading><!-- Article Category -->
        <div class="text-center mb-4">
            <span class="badge badge-md bg-primary">{{ $article->category->name }}</span>
        </div>
    </x-slot:heading>
    <div class="nk-block">
        <div class="article-show my-5">
            <!-- Article Title -->
            <div class="text-center mb-4">
                <h1>{{ $article->title }}</h1>
            </div>

            <!-- Article Image -->
            <div class="text-center mb-4">
                <img src="{{ asset('storage/articles/' . $article->image) }}" alt="{{ $article->title }}"
                    class="img-fluid">
            </div>

            <!-- Article Body -->
            <div class="article-body">
                <p>{!! nl2br(e($article->body)) !!}</p>
            </div>
        </div>
    </div>
</x-dashbar>
