@props(['title'])

<li x-data="{ disabled: {{ $attributes->has('disabled') ? 'true ' : 'false' }} }" :class="{ 'grow': fill, }" x-on:click="active = '{{ $title }}'">
    <button :disabled="disabled"
        :class="{
            'cursor-not-allowed opacity-50': disabled,
            'inline-block p-4 text-primary-600 rounded-t-lg border-b-2 border-primary-600 active dark:text-primary-500 dark:border-primary-500': active ==
                '{{ $title }}',
            'inline-block p-4 rounded-t-lg border-b-2': active != '{{ $title }}',
        }"
        type="button">
        {{ $title }}
    </button>
</li>
