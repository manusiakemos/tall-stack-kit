<template x-if="editor">
    <button
            data-tippy-toggle="tippy"
            data-tippy-title="underline"
            type="button"
            class="text-gray-700 dark:text-gray-300"
            :class="{'border-2 border-gray-700 dark:border-gray-300' : active.underline}"
            x-on:click="toggleUnderline"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path class="dark:fill-white"
                  d="M8 3v9a4 4 0 1 0 8 0V3h2v9a6 6 0 1 1-12 0V3h2zM4 20h16v2H4v-2z"/>
        </svg>
    </button>
</template>
