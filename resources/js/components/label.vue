<template>
    <label @click.prevent
           class="ui-label flex flex-col items-start">

        <!-- Title -->
        <span :class="summary ? ($slots.default ? 'mb-2' : (optional ? 'mb-[7.5px]' : 'mb-9px')) : 'mb-15px'"
              class="font-medium text-[16.5px] text-gray-700 text-left w-full flex justify-between items-center">

            <!-- Content -->
            <span class="pr-6">

                <!-- Text -->
                <span>
                    {{ title }}
                </span>

                <!-- Optional -->
                <v-optional v-if="optional"
                            :value="optionalText"
                            class="relative -top-1px ml-3">
                </v-optional>

            </span>

            <!-- Slot -->
            <slot></slot>

        </span>

        <!-- Summary -->
        <span v-if="summary"
              class="text-15px text-gray-500/90 text-left flex mb-13px">

            <!-- Icon -->
            <i class="far fa-circle-info text-14px text-emerald-600 relative top-[4.5px] mr-2"></i>

            <!-- Text -->
            <span class="leading-normal">
                {{ summary }}
            </span>

        </span>

    </label>
</template>

<script>
    import OptionalComponent from './optional.vue';

    export default
    {
        /**
         * Define the components.
         *
         */
        components : {
            'v-optional' : OptionalComponent,
        },

        /**
         * Define the public properties.
         *
         */
        props : {
            'optional'     : { type : Boolean, default : false },
            'optionalText' : { type : String,  default : 'Optional' },
            'summary'      : { type : String,  default : '' },
            'title'        : { type : String,  default : 'Label' },
        },
    }
</script>