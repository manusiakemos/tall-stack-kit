<template x-if="editor">
    <button
            class="text-black dark:text-white"
            :class="{'border-2 border-gray-700 dark:border-gray-300' : active.heading1}"
            type="button"
            x-on:click="toggleHeading(1)"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0H24V24H0z"/>
            <path class="dark:fill-white"
                    d="M13 20h-2v-7H4v7H2V4h2v7h7V4h2v16zm8-12v12h-2v-9.796l-2 .536V8.67L19.5 8H21z"/>
        </svg>
    </button>
</template>
