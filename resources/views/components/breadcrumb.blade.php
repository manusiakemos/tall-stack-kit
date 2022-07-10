@props(['items'])
<nav class="p-3 mb-3 rounded-xl shadow bg-white dark:bg-gray-700">
    <ul class="flex flex-wrap items-center py-1 text-gray-700 dark:text-white text-sm gap-1">
        @foreach ($items as $item)
            @if (!$item['active'])
                <li class="flex items-center">
                    <a href="{{ $item['link'] }}" class="hover:text-primary-300 text-primary-500 rounded-xl">
                        {{ $item['title'] }}
                    </a>
                </li>
            @else
                <li class="flex items-center">
                    <a href="{{ $item['link'] }}"
                       class="hover:text-primary-300 text-gray-500 rounded-xl">
                        {{ $item['title'] }}
                    </a>
                </li>
            @endif
            @if (!$loop->last)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path class="fill-gray-300 dark:fill-gray-500" d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z"/>
                </svg>
            @endif
        @endforeach
    </ul>
</nav>
