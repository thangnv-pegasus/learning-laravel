@props(['trigger'])

<div x-data="{ show: false }" @click.away = 'false'>

    {{ $trigger }}

    <div x-show="show" class="absolute py-2 bg-gray-100 mt-2 rounded-xl w-full z-10">
        {{-- ucwords => chuyen ki tu dau tien thanh chu hoa --}}
        {{ $slot }}

    </div>
</div>
