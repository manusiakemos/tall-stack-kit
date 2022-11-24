@props(['items'])
<!-- Breadcrumb -->
<nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
     aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        @foreach ($items as $item)
            @if (!$item['active'])
                <li class="inline-flex items-center">
                    <a href="{{ $item['link'] }}"
                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        {{ $item['title'] }}
                    </a>
                </li>
            @else
                <li aria-current="page">
                    <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">  {{ $item['title'] }}</span>
                    </div>
                </li>
            @endif
            @if (!$loop->last)
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd"></path>
                </svg>
            @endif
        @endforeach
    </ol>
</nav>
