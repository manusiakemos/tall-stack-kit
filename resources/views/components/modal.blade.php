@props(['id', 'maxWidth', 'position' => 'top'])
@php
    $id = $id ?? $attributes->wire('model')->value();
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        '4xl' => 'sm:max-w-4xl',
        '6xl' => 'sm:max-w-6xl',
    ][$maxWidth ?? '4xl'];
@endphp

<div
     x-data="{
        show: @entangle($attributes->wire('model')),
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
     x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
         } else {
             document.body.classList.remove('overflow-y-hidden');
         }
     })"
     x-on:close.stop="show = false"
     x-on:keydown.escape.window="show = false"
     x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
     x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
     x-show="show"
     id="{{ $id }}"
     class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50 {{$position == 'center' ? ' flex justify-center items-center flex-grow' : ''}}"
     style="display: none;"
>
    <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false"
         x-transition:enter="ease-out duration-100"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 backdrop-filter backdrop-blur-sm backdrop-sepia-0 bg-black/30 dark:bg-white/30"></div>
    </div>

    <div x-show="show" class="mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-auto shadow-xl
                              {{$position == 'center' ? 'grow' : ''}}
                              transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

        {{$title ?? ''}}

        {{ $slot }}
    </div>
</div>
