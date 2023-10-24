<template>
    <div class="border-t last-of-type:border-b border-gray-200/80 grid grid-cols-6 items-start gap-3 md:gap-0 py-3">

        <!-- Label -->
        <div class="font-medium text-15px text-gray-500/80 leading-normal col-span-6 md:col-span-2 pr-6 pt-1px">
            {{ label }}
        </div>

        <!-- Value -->
        <div :dusk="`ui-field-${label.toLowerCase().replaceAll(' ', '_')}`"
             class="text-gray-700 text-right md:text-left leading-normal col-span-6 md:col-span-4">

            <!-- Slot -->
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