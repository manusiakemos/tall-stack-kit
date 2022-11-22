<div x-data="{ 
    active: @entangle($attributes->wire('model')),
    fill : {{ $attributes->has('fill') ? 'true' : 'false' }}
}">
<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul :class="{'w-full justify-center' : fill}"
    {{$attributes->merge(['class' => 'flex flex-wrap gap-1 -mb-px text-sm font-medium text-center'])}}">
        @stack('tab-head')
    </ul>
</div>

{{$slot}}
</div>

