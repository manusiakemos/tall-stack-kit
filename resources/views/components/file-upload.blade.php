<div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">
    <!-- File Input -->
    <input
        class="block w-full text-sm text-gray-500 cursor-pointer 
               file:mr-4 file:py-2 file:px-4 
               file:rounded-full file:border-0 file:cursor-pointer 
               file:text-sm file:font-semibold
               file:bg-primary-300 file:text-primary-700 hover:file:bg-primary-400"
        type="file" {{ $attributes->whereStartsWith('wire:model') }}>

    <!-- Progress Bar -->
    <div x-show="isUploading">
        <progress class="w-full" max="100" x-bind:value="progress"></progress>
    </div>

    @php
        $wireModelName = $attributes->whereStartsWith('wire:model')->first();
    @endphp

    <div wire:loading wire:target="{{ $wireModelName }}">Uploading...</div>
</div>
