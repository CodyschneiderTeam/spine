<template>
    <v-dialog class="ui-hint"
              :visible="visible">

        <!-- Container -->
        <div class="bg-white w-full max-w-500px md:rounded-lg">

            <!-- Content -->
            <div class="px-9 py-8">

                <!-- Title -->
                <div class="ui-title font-os font-medium text-20px text-gray-900 leading-snug -tracking-[.2px] mb-4">

                    <!-- Icon -->
                    <i class="ui-icon far fa-info-circle text-19px text-emerald-700/80 mr-2"></i>

                    <!-- Text -->
                    {{ title }}

                </div>

                <!-- Information -->
                <div class="ui-summary text-17px text-gray-600 leading-[1.6rem]">
                    {{ summary }}
                </div>

            </div>

            <!-- Actions -->
            <div class="ui-actions bg-gray-50 border-t border-gray-200 md:rounded-b-lg p-5">

                <!-- Continue -->
                <v-button color="blue"
                          labelTitle="Close"
                          id="dialog_hint_close"
                          @click="$emit('close')"
                          class="flex justify-end">
                </v-button>

            </div>

        </div>

    </v-dialog>
</template>

<script>
    import ButtonComponent from './button.vue';
    import DialogComponent from './dialog.vue';

    export default
    {
        /**
         * Define the components.
         *
         */
        components : {
            'v-button' : ButtonComponent,
            'v-dialog' : DialogComponent,
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