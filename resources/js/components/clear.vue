<template>
    <div v-if="! Browser.automated()"
         :class="(focus && filled) || (hover && filled) ? 'opacity-100 z-2' : 'opacity-0 pointer-events-none'"
         class="ui-clear w-46px h-46px flex justify-center items-center absolute top-0 right-0 animated rounded-r">

        <!-- Icon -->
        <i title="Clear this field"
           @click.stop="$emit('click')"
           class="ui-icon fas fa-times text-gray-400 hover:text-gray-600 relative top-[.5px] left-2px cursor-pointer animated">
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