<div x-data="{
    tabHeaders: @js($attributes->get('tab-headers')),
    tabActive: @entangle($attributes->wire('model')),
}" class="z-0 text-gray-700 dark:text-gray-300">
    <div class="flex flex-col gap-4">

        <!-- The tabs navigation -->
        <div
            class="flex flex-col md:flex-row justify-center items-center overflow-scroll gap-4 whitespace-nowrap border-b-2">
            {{-- head --}}
            <template x-for="(header,index) in tabHeaders" :key="`tab-${index}`">
                <button :id="`tabBtn-${index}`" :disabled="header.disabled" ,
                    class="uppercase font-semibold flex flex-1 justify-center items-center p-3"
                    :class="{
                        'cursor-not-allowed': header.disabled,
                        'border-b-4 border-primary-500 text-primary-500': header.key === tabActive,
                        'text-gray-700 dark:text-gray-300 hover:text-primary-500 dark:hover:text-primary-300': header
                            .key !== tabActive,
                    }"
                    x-on:click.prevent="tabActive = header.key">
                    <div class="flex gap-2">
                        <div x-text="header.title"></div>
                        <div x-html="header.icon"></div>
                    </div>
                </button>
            </template>
        </div>

        <!-- The tabs content -->
        <div class="p-3 relative">
            @foreach ($tabHeaders as $tab)
                <div x-transition x-show="tabActive === '{{ $tab['key'] }}'">
                    <div>
                        {{ ${$tab['key']} }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
