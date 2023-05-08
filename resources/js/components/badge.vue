<template>
    <div :title="tooltip"
         class="ui-badge"
         v-if="! System.Util.blank(value)">

        <!-- Content -->
        <div :class="[modes[mode][color], uppercase ? 'uppercase' : '']"
             class="ui-content inline-block rounded-full font-semibold text-12px tracking-[.1px] select-none whitespace-nowrap px-[10px] pt-1 pb-1">

            <!-- Text -->
            {{ value }}

        </div>

    </div>
</template>

<script>
    export default
    {
        /**
         * Define the data model.
         *
         */
        data() { return {
            modes : {
                opaque : {
                    blue   : 'bg-sky-500/[.15] text-sky-700/[.80]',
                    green  : 'bg-emerald-500/[.15] text-emerald-700/[.80]',
                    gray   : 'bg-gray-500/[.10] text-gray-700/[.80]',
                    purple : 'bg-purple-500/[.15] text-purple-900/70',
                    red    : 'bg-red-500/[.15] text-red-800/[.80]',
                    yellow : 'bg-yellow-500/[.15] text-yellow-700/[.80]',
                },
                transparent : {
                    blue   : 'bg-transparent text-sky-600',
                    green  : 'bg-transparent text-emerald-600',
                    gray   : 'bg-transparent text-gray-500',
                    purple : 'bg-transparent text-purple-600',
                    red    : 'bg-transparent text-red-600',
                    yellow : 'bg-transparent text-yellow-600',
                }
            }
        }},

        /**
         * Define the public properties.
         *
         */
        props : {
            'color'     : { type : String,  default : 'blue' },
            'mode'      : { type : String,  default : 'opaque' },
            'tooltip'   : { type : String,  default : '' },
            'uppercase' : { type : Boolean, default : true },
            'value'     : { type : String,  default : '' },
        },
    }
</script>