<x-navbar>
    <x-slot:popup></x-slot:popup>
    <x-slot:title></x-slot:title>
    <x-slot:indexx></x-slot:indexx>
    <x-slot:desc></x-slot:desc>
    <x-slot:heading></x-slot:heading>

    <div class="nk-block">
        <div class="row g-gs">
            @forelse ($menus as $menu)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="card card-bordered product-card">
                        <div class="product-thumb">
                            <a href="{{ route('user.menu.show', $menu->slug) }}">
                                <img class="card-img-top" src="{{ asset('/storage/menus/' . $menu->image) }}"
                                    alt="">
                            </a>
                            {{-- <ul class="product-badges">
                            <li><span class="badge bg-success">New</span></li>
                        </ul> --}}
                            <ul class="product-actions">
                                <li><a href="#"><em class="icon ri-shopping-cart-line"></em></a></li>
                                <li><a href="#"><em class="icon ri-heart-line"></em></a></li>
                            </ul>
                        </div>
                        <div class="card-inner text-center">
                            <ul class="product-tags">
                                <li><a href="#">{{ $menu->category->name }}</a></li>
                            </ul>
                            <h5 class="product-title"><a href="html/product-details.html">{{ $menu->name }}</a>
                            </h5>
                            <div class="product-price text-primary h5">
                                {{ 'Rp.' . number_format($menu->price, 2, ',', '.') }}</div>
                        </div>
                        <div class="btn-group card-inner text-center" role="group"
                            aria-label="Basic mixed styles example">
                            <form action="{{ route('order.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                <input type="number" name="quantity" min="1" value="1" required>
                                <button type="submit" class="btn btn-primary d-md-inline-flex"><em
                                        class="icon ri-shopping-cart-line"></em></button>
                            </form>
                        </div>
                    </div>
                </div><!-- .col -->
            @empty
                <div class="no-data">
                    <div class="alert alert-danger">
                        Menu Belum Tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-navbar>
