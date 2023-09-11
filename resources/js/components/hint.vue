<template>
    <v-modal class="ui-hint"
             :visible="visible">

        <!-- Content -->
        <template #content>

            <!-- Title -->
            <div class="ui-title font-system font-medium text-19px text-gray-900 leading-snug -tracking-[.2px] mb-4">

                <!-- Icon -->
                <i class="ui-icon far fa-info-circle text-19px text-emerald-700/80 mr-2"></i>

                <!-- Text -->
                {{ title }}

            </div>

            <!-- Information -->
            <div class="ui-summary text-17px text-gray-600 leading-[1.6rem]">
                {{ summary }}
            </div>

        </template>

        <!-- Footer -->
        <template #footer>

            <!-- Continue -->
            <v-button color="blue"
                      labelTitle="Close"
                      id="dialog_hint_close"
                      @click="$emit('close')"
                      class="flex justify-end">
            </v-button>

        </template>

    </v-modal>
</template>

<script>
    import ModalComponent from './modal.vue';
    import ButtonComponent from './button.vue';

    export default
    {
        /**
         * Define the components.
         *
         */
        components : {
            'v-button' : ButtonComponent,
            'v-modal'  : ModalComponent,
        },

        /**
         * Define the events.
         *
         */
        emits : ['close'],

        /**
         * Define the public properties.
         *
         */
        props : {
            'summary' : { type : String,  default : '' },
            'title'   : { type : String,  default : '' },
			'visible' : { type : Boolean, default : false },
        },
    }
</script>