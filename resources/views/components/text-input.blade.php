@props([
    'disabled' => false,
])

<input
    {{ $attributes->merge([
        'class' =>
            'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
    ]) }}
    @if($disabled) disabled @endif

    {{-- FIX AGAR DUSK BISA MENGAMBIL INPUT --}}
    dusk="{{ $attributes->get('dusk') }}"
>
