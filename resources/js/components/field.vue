<template>
    <div class="border-t last-of-type:border-b border-gray-200/80 grid grid-cols-6 items-center gap-3 md:gap-0 py-5">

        <!-- Label -->
        <div class="font-medium text-13px text-gray-500/80 uppercase leading-normal col-span-6 md:col-span-2 pr-6">
            {{ label }}
        </div>

        <!-- Value -->
        <div class="text-gray-700 text-right md:text-left col-span-6 md:col-span-4">
            <slot></slot>
        </div>

    </div>
</template>

<script>
    export default
    {
        /**
         * Define the public properties.
         *
         */
        props : {
            'label' : { type : String, default : '' },
        },
    }
</script>