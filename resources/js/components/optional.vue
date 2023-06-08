<template>
    <span class="ui-optional bg-teal-500/10 font-medium text-10px text-teal-700/80 leading-normal uppercase relative rounded-lg select-none px-6px py-1px">
        {{ value }}
    </span>
</template>

<script>
    export default
    {
        /**
         * Define the public properties.
         *
         */
        props : {
            'value' : { type : String, default : 'Optional' },
        },
    }
</script>