<template x-if="editor">
    <button
            data-tippy-toggle="tippy"
            data-tippy-title="undo"
            type="button"
            class="text-gray-700 dark:text-gray-300"
            :class="{'border-2 border-gray-700 dark:border-gray-300' : active.undo}"
            x-on:click="undo"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path class="dark:fill-white"
                  d="M5.828 7l2.536 2.536L6.95 10.95 2 6l4.95-4.95 1.414 1.414L5.828 5H13a8 8 0 1 1 0 16H4v-2h9a6 6 0 1 0 0-12H5.828z"/>
        </svg>
    </button>
</template>
