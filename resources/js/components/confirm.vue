<template>
    <v-modal :dismiss="false"
             :visible="visible"
             class="ui-confirm">

        <!-- Container -->
        <div class="flex flex-col md:flex-row md:-m-6 md:-ml-7 md:-mb-7">

            <!-- Circle -->
            <div class="ui-circle bg-yellow-500/30 h-60px w-60px min-w-60px flex justify-center items-center rounded-full mx-auto">
                <i class="ui-icon fas fa-exclamation text-30px text-yellow-600"></i>
            </div>

            <!-- Content -->
            <div class="w-full mt-6 md:ml-7 md:mt-0">

                <!-- Title -->
                <div class="font-native ui-title font-semibold text-21px text-gray-900 text-center md:text-left leading-snug mb-3">
                    {{ title }}
                </div>

                <!-- Information -->
                <div class="ui-summary text-17px text-gray-600/90 text-center md:text-left leading-[1.6rem] mb-8">
                    {{ summary }}
                </div>

                <!-- Actions -->
                <div class="ui-actions flex flex-col-reverse md:flex-row justify-end gap-x-4">

                    <!-- Cancel -->
                    <v-button mode="link"
                              color="gray"
                              label="Cancel"
                              class="mt-1 md:mt-0"
                              @click="$emit('cancel')"
                              id="dialog_confirm_cancel">
                    </v-button>

                    <!-- Continue -->
                    <v-button color="blue"
                              mode="outline"
                              label="Continue"
                              @click="$emit('continue')"
                              id="dialog_confirm_continue">
                    </v-button>

                </div>

            </div>

        </div>

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
        emits : [
            'cancel',
            'continue',
        ],

        /**
         * Define the public properties.
         *
         */
        props : {
            'summary' : { type : String,  default : 'Note that in most cases, this action is not reversible. If you need some help, then please contact support.' },
            'title'   : { type : String,  default : 'Are you sure you wish to proceed?' },
			'visible' : { type : Boolean, default : false },
        },
    }
</script>