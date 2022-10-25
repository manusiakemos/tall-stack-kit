<template x-if="editor">
    <button
            data-tippy-toggle="tippy"
            data-tippy-title="align center"
            type="button"
            class="text-gray-700 dark:text-gray-300"
            x-bind:class="{'border-2 border-gray-700 dark:border-gray-300' : active.alignCenter}"
            x-on:click="toggleTextAlign('center')"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path class="dark:fill-white" d="M3 4h18v2H3V4zm2 15h14v2H5v-2zm-2-5h18v2H3v-2zm2-5h14v2H5V9z"/>
        </svg>
    </button>
</template>
