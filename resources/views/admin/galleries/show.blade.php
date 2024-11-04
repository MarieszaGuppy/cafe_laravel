<x-dashbar>
    <x-slot:title><button onclick="location.href='{{ route('galleries.index') }}'"
            class=" btn btn-primary d-md-inline-flex"><i class="ri-arrow-left-line"></i></button></x-slot:title>
    <x-slot:indexx>#{{ $gallery->id }}</x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="gallery-show my-5 text-center">
            <!-- Gallery Image with Description Overlay -->
            <div class="position-relative d-inline-block">
                <img src="{{ asset('storage/galleries/' . $gallery->image) }}" alt="Gallery Image" class="img-fluid">

                <!-- Description Overlay -->
                <div class="description-overlay position-absolute bottom-0 start-0 end-0 p-3 text-white"
                    style="background: rgba(0, 0, 0, 0.6);">
                    <p class="mb-0">{{ $gallery->description }}</p>
                </div>
            </div>

        </div>
    </div>
</x-dashbar>
