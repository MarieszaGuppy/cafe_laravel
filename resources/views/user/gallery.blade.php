<x-navbar>
    <style>
        .gallery-img {
            height: 200px;
            object-fit: cover;
        }
    </style>
    <x-slot:popup></x-slot:popup>
    <x-slot:title></x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>

    <div class="nk-block">
        <div class="row g-gs">
            @forelse ($galleries as $gallery)
                <div class="col-sm-6 col-lg-4 col-xxl-3">
                    <div class="gallery card">
                        <a class="gallery-image popup-image" href="">
                            <img class="gallery-img w-100 rounded-top"
                                src="{{ asset('/storage/galleries/' . $gallery->image) }}" alt="">
                        </a>
                        <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                            <div class="user-card">
                                <div class="user-info">
                                    <span class="lead-text">{{ $gallery->category->name }}</span>
                                    <span class="sub-text">{{ Str::limit($gallery->description, 40, '...') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="no-data">
                    <div class="alert alert-danger">
                        Galeri Belum Tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-navbar>
