<template>
    <span class="ui-optional bg-gray-200/[.70] font-medium text-10px text-gray-500 leading-normal uppercase relative rounded-lg select-none px-6px">
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