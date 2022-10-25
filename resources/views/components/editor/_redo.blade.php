<template x-if="editor">
    <button
            data-tippy-toggle="tippy"
            data-tippy-title="redo"
            type="button"
            class="text-gray-700 dark:text-gray-300"
            :class="{'border-2 border-gray-700 dark:border-gray-300' : active.redo}"
            x-on:click="redo"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path class="dark:fill-white"
                  d="M18.172 7H11a6 6 0 1 0 0 12h9v2h-9a8 8 0 1 1 0-16h7.172l-2.536-2.536L17.05 1.05 22 6l-4.95 4.95-1.414-1.414L18.172 7z"/>
        </svg>
    </button>
</template>
