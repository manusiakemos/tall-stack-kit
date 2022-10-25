@props(['inputId', 'textLabel', 'errorName'])
<div class="w-full mb-3">
    <x-kit::label for="{{ $inputId }}">{{ $textLabel }}</x-kit::label>

    {{ $slot }}

    <x-kit::error :error-name="$errorName"></x-kit::error>
</div>
