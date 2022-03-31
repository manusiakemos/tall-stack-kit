<div
    wire:ignore
    {!! $attributes->merge(['class'=>'relative']) !!}
    x-data="{
        select2 : null,
        selected: @entangle($attributes->wire('model')),
    }"
    x-init="
        $nextTick(() => {

            this.select2 = $($refs.select).select2({
                dropdownParent: $('#{{$attributes->get('dropdown-parent')}}')
            });
            this.select2.on('select2:select', (event) => {
                selected = event.target.value;
            });
            $watch('selected', (value) => {
                this.select2.val(value).trigger('change');
            });

            setTimeout(()=>{
               this.select2.val(null).trigger('change');
            },1000)
        });
    ">
    <select
        data-placeholder="{{$attributes->get('placeholder')}}"
        x-model="selected"
        x-ref="select">
        {{$slot}}
    </select>
</div>

@once
    @push("stylesBefore")
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @endpush

    @push("scripts")
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @endpush
@endonce
