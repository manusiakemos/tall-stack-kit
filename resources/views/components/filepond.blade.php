<div
    wire:ignore
    x-data="{value:@entangle($attributes->wire('model')), pond:null}"
    x-init="
        $watch('value', value => {
        console.log(value)
        @if ($attributes->has('multiple'))
            const removeOldFiles = (newValue, oldValue) => {
                if (newValue.length < oldValue.length) {
                    const difference = oldValue.filter(i => ! newValue.includes(i));

                    difference.forEach(serverId => {
                        const file = pond.getFiles().find(f => f.serverId === serverId);

                        file && pond.removeFile(file.id);
                    });
                }
            };

            if (this.oldValue !== undefined) {
                try {
                    const files = Array.isArray(value) ? value : JSON.parse(String(value).split('livewire-files:')[1]);
                    const oldFiles = Array.isArray(this.oldValue) ? this.oldValue : JSON.parse(String(this.oldValue).split('livewire-files:')[1]);

                    if (Array.isArray(files) && Array.isArray(oldFiles)) {
                        removeOldFiles(files, oldFiles);
                    }
                } catch (e) {}
            }

            this.oldValue = value;
        @else
            !value && pond.removeFile();
        @endif
        });
        $nextTick(()=>{
            pond = FilePond.create($refs.{{ $attributes->get('ref') ?? 'input' }});
            pond.setOptions({
                allowMultiple: {{ $attributes->has('multiple') ? 'true' : 'false' }},
                server: {
                    process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        @this.upload('{{ $attributes->whereStartsWith('wire:model')->first() }}', file, load, error, progress)
                    },
                    revert: (filename, load) => {
                        @this.removeUpload('{{ $attributes->whereStartsWith('wire:model')->first() }}', filename, load)
                    },
                },
                allowImagePreview: {{ $attributes->has('allowFileTypeValidation') ? 'true' : 'false' }},
                imagePreviewMaxHeight: {{ $attributes->has('imagePreviewMaxHeight') ? $attributes->get('imagePreviewMaxHeight') : '256' }},
                allowFileTypeValidation: {{ $attributes->has('allowFileTypeValidation') ? 'true' : 'false' }},
                acceptedFileTypes: {!! $attributes->get('acceptedFileTypes') ?? 'null' !!},
                allowFileSizeValidation: {{ $attributes->has('allowFileSizeValidation') ? 'true' : 'false' }},
                maxFileSize: {!! $attributes->has('maxFileSize') ? "'".$attributes->get('maxFileSize')."'" : 'null' !!}
            });
        })
    "
>
    <input type="file" x-ref="{{ $attributes->get('ref') ?? 'input' }}" />
</div>

@push('styles')
    @once
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    @endonce
@endpush

@push('scripts')
    @once
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        <script>
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);
        </script>
    @endonce
@endpush