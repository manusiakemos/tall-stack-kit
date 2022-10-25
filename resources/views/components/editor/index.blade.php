<div class="shadow"
     x-data="{content: @entangle($attributes->wire('model')), ...setupEditor()}"
     x-init="() => init($refs.editor)"
     wire:ignore
        {{ $attributes->whereDoesntStartWith('wire:model') }}
>
    <template x-if="editor">
        <div class="flex flex-wrap items-center gap-4 border-2 p-3">
            <x-kit::editor._undo/>
            <x-kit::editor._redo/>
            <x-kit::editor._h1/>
            <x-kit::editor._h2/>
            <x-kit::editor._h3/>
            <x-kit::editor._h4/>
            <x-kit::editor._paragraph/>
            <x-kit::editor._bold/>
            <x-kit::editor._italic/>
            <x-kit::editor._underline/>
            <x-kit::editor._strike/>
            <x-kit::editor._align-left/>
            <x-kit::editor._align-center/>
            <x-kit::editor._align-right/>
            <x-kit::editor._align-justify/>
            <x-kit::editor._highlight/>
            <x-kit::editor._blockquote/>
            <x-kit::editor._ordered-list/>
            <x-kit::editor._unordered-list/>
            <x-kit::editor._link/>
            <x-kit::editor._image/>
            <x-kit::editor._embed/>
            <x-kit::editor._iframe/>
            <x-kit::editor._table/>
        </div>
    </template>


    <div x-ref="editor"></div>
</div>
