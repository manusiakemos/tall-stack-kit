@if($variant == "rounded")
    <button {{ $attributes->merge([
                'type' => 'button', 
                'class' => 'm-1 py-2 px-4 rounded hover:shadow rounded transform hover:scale-105 transition-all'
            ]) }}>
        {{ $slot }}
    </button>

@elseif($variant == "circle")
    <button {{ $attributes->merge(
        [
            'type' => 'button', 
            'class' => 'm-1 p-2 rounded-full flex items-center justify-center transform hover:scale-105 transition-all'
        ]
        ) }}>
        {{ $slot }}
    </button>

@elseif($variant == "outline")
    <button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'border-2 m-1 p-2 flex items-center justify-center transform hover:scale-105 transition-all'
            ]) }}>
        {{ $slot }}
    </button>

@elseif($variant == "link")
    <a {{ $attributes->merge(['class' => 'py-2']) }}>
        {{ $slot }}
    </a>
@endif
