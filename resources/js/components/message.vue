<template>
    <Transition enter-to-class="translate-x-0"
                leave-from-class="translate-x-0"
                enter-active-class="transition duration-500"
                leave-active-class="transition duration-700"
                leave-to-class="translate-x-[350px] md:translate-x-[450px]"
                enter-from-class="translate-x-[350px] md:translate-x-[450px]">

        <!-- Message -->
        <div v-if="show"
             class="ui-message min-w-250px max-w-350px fixed top-74px right-0 z-1002">

            <!-- Container -->
            <div ref="container"
                 class="ui-container bg-white border border-gray-300 flex items-center shadow-sm rounded-lg relative z-30 pl-15px pr-6 py-3 mr-18px">

                <!-- Icon -->
                <div class="ui-icon opacity-70 flex self-stretch relative top-[.5px] mr-3">

                    <!-- SVG -->
                    <svg width="24"
                         height="24"
                         class="ui-svg"
                         style="fill: none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         :class="(types[type].class || '')">

                        <!-- Graphic -->
                        <path stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              :d="types[type].svg || ''" />

                    </svg>

                </div>

                <!-- Content -->
                <span v-html="content"
                      class="ui-content text-16px text-gray-800 leading-normal break-words relative top-[.5px]">
                </span>

            </div>

        </div>

    </Transition>
</template>

<script>
    export default
    {
        /**
         * Define the data model.
         *
         */
        data() { return {
            show : this.visible,
            types : {
                info    : { class : 'text-blue-700',  svg : 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' },
                error   : { class : 'text-red-700',   svg : 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z' },
                success : { class : 'text-green-700', svg : 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' },
            },
        }},

        /**
         * Define the public properties.
         *
         */
        props : {
            'content' : { type : String,  default : '' },
            'type'    : { type : String,  default : 'success' },
            'visible' : { type : Boolean, default : false },
        },

        /**
         * Execute actions when the component is mounted to the DOM.
         *
         */
        mounted()
        {
            setTimeout(() => this.show = true, 50);
            setTimeout(() => this.show = false, 3000);
        },
    }
</script>