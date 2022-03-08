@props(['id'])
<x-kit::modal id="{{ $id }}" max-width="sm" {!! $attributes !!}>
    <div class="mx-6 my-3 flex flex-col justify-center items-center overflow-auto">
        <div class="flex flex-col items-center justify-center">
            <h4 class="font-semibold tracking-wider text-3xl text-primary-500 text-center mb-3">
                {{ $title ?? 'Are you sure?' }}
            </h4>
            {{ $text??'' }}
        </div>
        <div class="flex flex-grow w-full px-6 pt-12 mx-6">
           {{ $yes??'' }}
           {{ $no??'' }}
        </div>
    </div>
</x-kit::modal>
