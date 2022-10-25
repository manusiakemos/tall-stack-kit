<template x-if="editor">
    <button
            data-tippy-toggle="tippy"
            data-tippy-title="italic"
            type="button"
            class="text-gray-700 dark:text-gray-300"
            :class="{'border-2 border-gray-700 dark:border-gray-300' : active.italic}"
            x-on:click="toggleItalic"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path class="dark:fill-white" d="M15 20H7v-2h2.927l2.116-12H9V4h8v2h-2.927l-2.116 12H15z"/>
        </svg>
    </button>
</template>
