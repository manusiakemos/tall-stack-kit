<div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-50"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform scale-50" x-transition:leave-end="opacity-0 transform scale-100"
    x-show="active == '{{ $attributes->whereStartsWith('wire:key')->first() }}'" class="p-4 rounded-lg">
    {{ $slot }}
</div>
