<x-navbar>
    <x-slot:popup></x-slot:popup>
    <x-slot:title><button onclick="location.href='{{ route('article') }}'"
            class=" btn btn-primary d-md-inline-flex"><i class="ri-arrow-left-line"></i></button></x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>


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
</x-navbar>
