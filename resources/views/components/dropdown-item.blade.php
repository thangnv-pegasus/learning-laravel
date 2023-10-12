@props(['active' => false])


@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-red-400';

    if ($active === true) {
        $classes .= ' text-white bg-red-400';
    }
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
