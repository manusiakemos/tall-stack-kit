@props(['name'])

@error('name')
    <p class="mt-2 text-sm text-negative-600">{{ $message }}</p>
@enderror
