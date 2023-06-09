<template>
    <v-modal :visible="visible"
             class="ui-information">

        <!-- Header -->
        <template #header>

            <!-- Icon -->
            <div class="bg-amber-500/20 flex justify-center items-center w-50px h-50px rounded-full mx-auto mb-6">
                <i class="far fa-circle-info text-20px text-amber-700/80"></i>
            </div>

            <!-- Title -->
            <h4 class="text-center"
                :class="summary ? 'mb-4' : 'mb-0'">

                <!-- Text -->
                {{ title }}

            </h4>

            <!-- Summary -->
            <p v-if="summary"
               class="text-center mb-0">

                <!-- Text -->
                {{ summary }}

            </p>

        </template>

        <!-- Content -->
        <template #content>

            <!-- Information -->
            <div v-html="content"
                 class="ui-content text-17px text-gray-600 leading-relaxed mb-10">
            </div>

            <!-- Close -->
            <v-button color="gray"
                      labelTitle="Close"
                      id="dialog_tip_close"
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
            'content' : { type : String,  default : '' },
            'summary' : { type : String,  default : '' },
            'title'   : { type : String,  default : '' },
			'visible' : { type : Boolean, default : false },
        },
    }
</script>