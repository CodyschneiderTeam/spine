<template>
    <div class="ui-button w-full md:w-auto items-start">

        <!-- Button -->
        <button :id="name"
                ref="button"
                :dusk="name"
                @click="execute($event)"
                :class="[theme.join(' '), mode === 'link' ? '' : 'min-w-100px', disabled ? '' : 'cursor-pointer']"
                class="ui-control border border-solid w-full md:w-auto min-h-35px flex items-center justify-center rounded transition-all duration-300 relative">

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
                    {{ labelTitle }}
                </span>

            </div>

            <!-- Animation -->
            <div :class="[processing ? '' : 'hidden', modes[mode][color].spinner]"
                 class="ui-spinner border-2 border-r-transparent border-t-transparent h-15px w-15px rounded-full animate-spin">
            </div>

        </button>

    </div>
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
                    blue  : { button : 'border-transparent text-sky-600 hover:text-sky-800',     spinner : 'border-l-sky-600 border-b-sky-600' },
                    gray  : { button : 'border-transparent text-gray-500 hover:text-gray-700',   spinner : 'border-l-gray-500 border-b-gray-500' },
                    green : { button : 'border-transparent text-green-700 hover:text-green-900', spinner : 'border-l-green-700 border-b-green-700' },
                    red   : { button : 'border-transparent text-red-700 hover:text-red-900',     spinner : 'border-l-red-700 border-b-red-700' },
                },
                opaque : {
                    blue  : { button : 'bg-sky-100/80 border-sky-200 hover:border-sky-500 text-sky-700',            spinner : 'border-l-sky-700 border-b-sky-700' },
                    gray  : { button : 'bg-gray-100/80 border-gray-200 hover:border-gray-500 text-gray-600',        spinner : 'border-l-gray-600 border-b-gray-600' },
                    green : { button : 'bg-green-600/10 border-green-600/10 hover:border-green-500 text-green-700', spinner : 'border-l-green-700 border-b-green-700' },
                    red   : { button : 'bg-red-100/80 border-red-200 hover:border-red-500 text-red-700',            spinner : 'border-l-red-700 border-b-red-700' },
                    white : { button : 'bg-white border-gray-300 hover:border-gray-500 text-gray-500',              spinner : 'border-l-gray-500 border-b-gray-500' },
                },
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
            'icon'       : { type : String,  default : '' },
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
                let regex = this.disabled || this.processing ? /hover:(bg|text|border)-(white|.+-.{3})/gm : '';

                return [
                    this.modes[this.mode][this.color].button.replace(regex, ''),
                    this.disabled ? 'opacity-20 cursor-not-allowed' : '',
                    this.processing ? 'cursor-wait' : '',
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
                this.$refs.button.style.width = current ? `${this.$refs.button.offsetWidth}px` : '';
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
            execute(event)
            {
                if (! this.simple) event.stopPropagation();

                if (this.disabled || this.processing) return;

                this.simple ? null : this.$emit('click');
            }
        }
    }
</script>