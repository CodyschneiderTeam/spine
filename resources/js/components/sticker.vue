<template>
    <div class="ui-sticker w-full">

        <!-- Label -->
        <v-label :title="labelTitle"
                 :optional="optional"
                 :summary="labelSummary"
                 :optionalText="optionalText">
        </v-label>

        <!-- Input -->
        <input :id="name"
               type="text"
               :name="name"
               :value="value"
               :readonly="true"
               class="ui-input bg-white border border-dashed border-gray-300 text-17px text-gray-900 text-ellipsis w-full rounded appearance-none px-14px py-3" />

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