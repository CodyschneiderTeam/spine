<template>
    <div class="ui-sticker w-full">

        <!-- Container -->
        <div class="ui-container bg-white border border-dashed border-gray-400/[.80] rounded relative">

            <!-- Input -->
            <input :id="name"
                   type="text"
                   :name="name"
                   :value="value"
                   :readonly="true"
                   class="ui-content w-full bg-inherit text-17px text-gray-900 text-ellipsis overflow-hidden rounded appearance-none px-3 pt-[25px] pb-[6px]" />

            <!-- Label -->
            <v-label :value="label"
                     :focus="false"
                     :filled="! System.Util.blank(value)">
            </v-label>

        </div>

    </div>
</template>

<script>
    import LabelComponent from './label.vue';
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
         * Define the components.
         *
         */
        components : {
            'v-label' : LabelComponent,
        },

        /**
         * Define the public properties.
         *
         */
        props : {
            'value' : { type : String, default : '' },
        },
    }
</script>