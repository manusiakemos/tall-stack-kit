@props(['title'])

@push('tab-head')
<x-kit::tab-title {{$attributes}} title="{{$title}}"/>
@endpush

<x-kit::tab-content wire:key="{{$title}}">
    {{$slot}}
</x-kit::tab-content>