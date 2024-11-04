<x-navbar>
    <x-slot:popup></x-slot:popup>
    <x-slot:title><button onclick="location.href='{{ route('menu') }}'" class=" btn btn-primary d-md-inline-flex"><i
                class="ri-arrow-left-line"></i></button></x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>
    <div class="nk-block">
        <div class="card">
            <div class="card-inner">
                <div class="row pb-5">
                    <div class="col-lg-6">
                        <div class="product-gallery me-xl-1 me-xxl-5">
                            <div class="slider-init" id="sliderFor"
                                data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                <div class="slider-item rounded">
                                    <img src="{{ asset('/storage/menus/' . $menu->image) }}" class="rounded w-100"
                                        alt="">
                                </div>

                            </div><!-- .slider-init -->
                            <div class="slider-init slider-nav" id="sliderNav"
                                data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true, 
"responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
}'>
                                <div class="slider-item">
                                    <div class="thumb">
                                        <img src="{{ asset('/storage/menus/' . $menu->image) }}" class="rounded"
                                            alt="">
                                    </div>
                                </div>
                            </div><!-- .slider-nav -->
                        </div><!-- .product-gallery -->
                    </div><!-- .col -->
                    <div class="col-lg-6">
                        <div class="product-info mt-5 me-xxl-5">
                            <h4 class="product-price text-primary">
                                {{ 'Rp.' . number_format($menu->price, 2, ',', '.') }}</h4>
                            <h2 class="product-title">{{ $menu->name }}</h2>
                            <div class="product-excrept text-soft">
                                <p class="lead">{!! $menu->description !!}</p>
                            </div>
                            <div class="product-meta">
                                <ul class="d-flex g-3 gx-5">
                                    <li>
                                        <div class="fs-14px text-muted">Kategori</div>
                                        <div class="fs-16px fw-bold text-secondary">{{ $menu->category->name }}</div>
                                    </li>
                                    {{-- <li>
                                        <div class="fs-14px text-muted">Stok</div>
                                        <div class="fs-16px fw-bold text-secondary">{{ $menu->stock }}</div>
                                    </li> --}}
                                    <li>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <form action="{{ route('order.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                                <input type="number" name="quantity" min="1" value="1"
                                                    required>
                                                <button type="submit" class="btn btn-primary d-md-inline-flex"><em
                                                        class="icon ri-shopping-cart-line"></em></button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .product-info -->
                    </div><!-- .col -->
                </div><!-- .row -->
                <hr class="hr border-light">
            </div>
        </div>
    </div>
</x-navbar>
