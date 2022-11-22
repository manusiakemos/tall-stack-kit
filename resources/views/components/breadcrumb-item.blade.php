@props(['label'])
<li x-data="{
    active: {{ $attributes->has('active') ? 'true' : 'false' }},
    link: '{{ $attributes->has('href') ? $attributes->whereStartsWith('href')->first() : '#' }}',
}">
    <template x-if="!active">
        <div class="flex items-center gap-1">
            @if (!isset($icon))
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            @endif
            <a :href="link"
                class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                @isset($icon)
                    {!! $icon !!}
                @endisset
                {{ $label }}
            </a>
        </div>
    </template>
    <template x-if="active">
        <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="flex items-center text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">
                @isset($icon)
                    {!! $icon !!}
                @endisset
                {{ $label }}
            </span>
        </div>
    </template>
</li>
