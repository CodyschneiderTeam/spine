<template>
    <button ref="btn"
            :id="name"
            :dusk="name"
            @click.prevent="simple ? $refs.simple.click() : execute()"
            :class="[theme.join(' '), mode === 'link' ? '' : 'min-w-100px', $attrs?.class ?? '']"
            class="ui-button border border-solid w-full md:w-auto min-h-35px flex items-center justify-center rounded cursor-pointer transition-all duration-300 relative">

        <!-- Label -->
        <div :class="processing ? 'text-transparent hidden' : ''"
             class="ui-label text-13px whitespace-nowrap select-none flex items-center px-5">

            <!-- Icon -->
            <i v-if="icon"
               :class="icon"
               class="ui-icon opacity-50 mr-3">
            </i>

            <!-- Text -->
            <span class="ui-text font-semibold uppercase tracking-[.1px]">
                {{ label }}
            </span>

        </div>

        <!-- Animation -->
        <div style="animation: ui-button-spin 750ms infinite linear"
             :class="[processing ? '' : 'hidden', modes[mode][color].spinner]"
             class="ui-spinner border-2 border-r-transparent border-t-transparent h-15px w-15px rounded-full">
        </div>

    </button>
    <button ref="simple"
            class="hidden">
    </button>
</template>

<script>
    import Component from '../mixins/Component';

    export default
    {
        /**
         * Define the mixins.
         *
         */
        mixins : [
            Component,
        ],

        /**
         * Define the data model.
         *
         */
        data() { return {
            modes : {
                link : {
                    blue   : { button : 'border-transparent text-sky-600 hover:text-sky-800',       spinner : 'border-l-sky-600 border-b-sky-600' },
                    gray   : { button : 'border-transparent text-gray-500 hover:text-gray-700',     spinner : 'border-l-gray-500 border-b-gray-500' },
                    green  : { button : 'border-transparent text-green-700 hover:text-green-900',   spinner : 'border-l-green-700 border-b-green-700' },
                    orange : { button : 'border-transparent text-orange-600 hover:text-orange-800', spinner : 'border-l-orange-600 border-b-orange-600' },
                    purple : { button : 'border-transparent text-purple-600 hover:text-purple-800', spinner : 'border-l-purple-600 border-b-purple-600' },
                    red    : { button : 'border-transparent text-red-700 hover:text-red-900',       spinner : 'border-l-red-700 border-b-red-700' },
                    teal   : { button : 'border-transparent text-teal-600 hover:text-teal-800',     spinner : 'border-l-teal-600 border-b-teal-600' },
                },
                opaque : {
                    blue   : { button : 'bg-sky-600 hover:bg-sky-700 border-transparent text-white',       spinner : 'border-l-white border-b-white' },
                    gray   : { button : 'bg-gray-500 hover:bg-gray-600 border-transparent text-white',     spinner : 'border-l-white border-b-white' },
                    green  : { button : 'bg-green-700 hover:bg-green-800 border-transparent text-white',   spinner : 'border-l-white border-b-white' },
                    orange : { button : 'bg-orange-600 hover:bg-orange-700 border-transparent text-white', spinner : 'border-l-white border-b-white' },
                    purple : { button : 'bg-purple-600 hover:bg-purple-700 border-transparent text-white', spinner : 'border-l-white border-b-white' },
                    red    : { button : 'bg-red-700 hover:bg-red-800 border-transparent text-white',       spinner : 'border-l-white border-b-white' },
                    teal   : { button : 'bg-teal-600 hover:bg-teal-700 border-transparent text-white',     spinner : 'border-l-white border-b-white' },
                },
                outline : {
                    blue   : { button : 'hover:bg-sky-600 border-sky-600 text-sky-600 hover:text-white',          spinner : 'border-l-sky-600 border-b-sky-600' },
                    gray   : { button : 'hover:bg-gray-400 border-gray-400 text-gray-500 hover:text-white',       spinner : 'border-l-gray-500 border-b-gray-500' },
                    green  : { button : 'hover:bg-green-700 border-green-700 text-green-700 hover:text-white',    spinner : 'border-l-green-700 border-b-green-700' },
                    orange : { button : 'hover:bg-orange-600 border-orange-600 text-orange-600 hover:text-white', spinner : 'border-l-orange-600 border-b-orange-600' },
                    purple : { button : 'hover:bg-purple-600 border-purple-600 text-purple-600 hover:text-white', spinner : 'border-l-purple-600 border-b-purple-600' },
                    red    : { button : 'hover:bg-red-700 border-red-700 text-red-700 hover:text-white',          spinner : 'border-l-red-700 border-b-red-700' },
                    teal   : { button : 'hover:bg-teal-600 border-teal-600 text-teal-600 hover:text-white',       spinner : 'border-l-teal-600 border-b-teal-600' },
                }
            }
        }},

        /**
         * Define the events.
         *
         */
        emits : ['click'],

        /**
         * Define the public properties.
         *
         */
        props : {
            'color'      : { type : String,  default : 'blue' },
            'disabled'   : { type : Boolean, default : false },
            'mode'       : { type : String,  default : 'opaque' },
            'processing' : { type : Boolean, default : false },
            'simple'     : { type : Boolean, default : false },
        },

        /**
         * Define the computed properties.
         *
         */
        computed :
        {
            /**
             * Determine the appropriate styles for the component.
             *
             */
            theme()
            {
                let regex = this.disabled || this.processing ? /hover:(bg|text)-(white|.+-.{3})/gm : '';

                return [
                    this.modes[this.mode][this.color].button.replace(regex, ''),
                    this.disabled ? 'opacity-20 cursor-not-allowed' : '',
                    this.processing ? 'opacity-60 cursor-wait transition-none' : '',
                ];
            }
        },

        /**
         * Define the watch methods.
         *
         */
        watch :
        {
            /**
             * Watch the 'processing' data attribute.
             *
             */
            processing : function(current, previous)
            {
                this.$refs.btn.style.width = current ? `${this.$refs.btn.offsetWidth}px` : '';
            }
        },

        /**
         * Define the supporting methods.
         *
         */
        methods :
        {
            /**
             * Respond to the button being clicked.
             *
             */
            execute()
            {
                if (! this.disabled && ! this.processing) {
                    this.$emit('click');
                }
            }
        }
    }
</script>