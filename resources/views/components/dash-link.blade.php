@props(['active' => false])
<li class=" {{ $active ? 'nk-menu-item active' : 'nk-menu-item' }}" aria-current="{{ $active ? 'page' : false }}"
    {{ $attributes }}>{{ $slot }}</li>
