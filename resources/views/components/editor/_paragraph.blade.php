<button
        data-tippy-toggle="tippy"
        data-tippy-title="paragraph"
        type="button"
        class="text-gray-700 dark:text-gray-300"
        :class="{'border-2 border-gray-700 dark:border-gray-300' : active.paragraph}"
        x-on:click="toggleParagraph"
>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
        <path fill="none" d="M0 0h24v24H0z"/>
        <path class="dark:fill-white"
              d="M12 6v15h-2v-5a6 6 0 1 1 0-12h10v2h-3v15h-2V6h-3zm-2 0a4 4 0 1 0 0 8V6z"/>
    </svg>
</button>
