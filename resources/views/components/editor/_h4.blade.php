<template x-if="editor">
    <button
            class="text-black dark:text-white"
            :class="{'border-2 border-gray-700 dark:border-gray-300' : active.heading4}"
            type="button"
            x-on:click="toggleHeading(4)"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0H24V24H0z"/>
            <path class="dark:fill-white" d="M13 20h-2v-7H4v7H2V4h2v7h7V4h2v16zm9-12v8h1.5v2H22v2h-2v-2h-5.5v-1.34l5-8.66H22zm-2 3.133L17.19 16H20v-4.867z"/>
        </svg>
    </button>
</template>
