<template>
    <v-modal :visible="visible"
             class="ui-confirm">

        <!-- Content -->
        <template #content>
            <div class="flex flex-col md:flex-row">

                <!-- Icon -->
                <div class="ui-circle bg-yellow-500/30 h-50px w-50px min-w-50px md:h-40px md:w-40px md:min-w-40px flex justify-center items-center rounded-full mx-auto mb-6 md:mb-0">
                    <i class="ui-icon far fa-exclamation-circle text-25px md:text-20px text-yellow-600"></i>
                </div>

                <!-- Title & Information -->
                <div class="w-full md:ml-6">

                    <!-- Title -->
                    <div class="ui-title font-system font-medium text-19px text-gray-900 text-center md:text-left leading-snug -tracking-[.2px] mb-10px">
                        {{ title }}
                    </div>

                    <!-- Information -->
                    <div class="ui-summary text-17px text-gray-600 text-center md:text-left leading-[1.6rem]">
                        {{ summary }}
                    </div>

                </div>

            </div>
        </template>

        <!-- Footer -->
        <template #footer>

            <!-- Cancel -->
            <v-button mode="link"
                      color="gray"
                      labelTitle="Cancel"
                      class="mt-1 md:mt-0"
                      @click="$emit('cancel')"
                      id="dialog_confirm_cancel">
            </v-button>

            <!-- Continue -->
            <v-button color="blue"
                      labelTitle="Continue"
                      @click="$emit('continue')"
                      id="dialog_confirm_continue">
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
        emits : [
            'cancel',
            'continue',
        ],

        /**
         * Define the public properties.
         *
         */
        props : {
            'summary' : { type : String,  default : 'In most cases, this action is not reversible. If you need some help, then please contact support.' },
            'title'   : { type : String,  default : 'Are you sure you wish to proceed?' },
			'visible' : { type : Boolean, default : false },
        },
    }
</script>