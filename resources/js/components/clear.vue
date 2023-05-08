<template>
    <div v-if="! System.Browser.automated()"
         style="transition: all 0.4s ease, background-color 0s"
         :class="(focus && filled) || (hover && filled) ? 'opacity-100 z-[2]' : 'opacity-0 pointer-events-none'"
         class="ui-clear w-[50px] h-[51px] flex justify-center items-center absolute top-0 right-0 animated rounded-r">

        <!-- Icon -->
        <i title="Clear this field"
           @click.stop="$emit('click')"
           class="ui-icon fas fa-times text-gray-400 hover:text-gray-600 relative top-[.5px] left-[1.5px] cursor-pointer animated">
        </i>

    </div>
</template>

<script>
    export default
    {
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
            'hover'  : { type : Boolean, default : false },
            'filled' : { type : Boolean, default : false },
            'focus'  : { type : Boolean, default : false },
        }
    }
</script>