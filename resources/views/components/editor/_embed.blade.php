<template x-if="editor">
    <button
            id="embedFile-btn"
            data-title="embed file"
            type="button"
            class="text-gray-700 dark:text-gray-300"
            :class="{'border-2 border-gray-700 dark:border-gray-300' : active.iframe}"
            x-on:click="uploadFile('{{ route('unisharp.lfm.show')}}', 'file')"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M9 2.003V2h10.998C20.55 2 21 2.455 21 2.992v18.016a.993.993 0 0 1-.993.992H3.993A1 1 0 0 1 3 20.993V8l6-5.997zM5.83 8H9V4.83L5.83 8zM11 4v5a1 1 0 0 1-1 1H5v10h14V4h-8z"  class="dark:fill-white"/></svg>
    </button>
</template>
