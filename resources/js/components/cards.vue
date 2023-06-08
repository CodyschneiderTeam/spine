<template>
    <div class="ui-cards">

        <!-- Input -->
        <input :name="id"
               type="hidden"
               :value="selected">

        <!-- Label -->
        <v-label :title="labelTitle"
                 :optional="optional"
                 :summary="labelSummary"
                 :optionalText="optionalText">
        </v-label>

        <!-- Grid -->
        <div :class="layout"
             class="ui-items grid gap-4">

            <!-- Item -->
            <div :key="item.id"
                 v-for="item in items"
                 @click="$emit('change', item.id)"
                 :dusk="`ui-card-${id}-${item.id}`"
                 :class="selected === item.id ? 'border-sky-500' : 'border-gray-300 hover:border-sky-500'"
                 class="ui-item border flex flex-col items-start rounded cursor-pointer relative animated p-5 pb-4">

                <!-- Title -->
                <h6 class="ui-header font-native text-16px flex items-center mb-4">

                    <!-- Icon -->
                    <span class="ui-icon text-gray-400 mr-3">
                        <i class="fas"
                           :class="item.icon">
                        </i>
                    </span>

                    <!-- Text -->
                    <span class="ui-label">
                        {{ item.label }}
                    </span>

                </h6>

                <!-- Summary -->
                <span class="ui-summary text-[15.5px] text-gray-500/90 text-left leading-normal">
                    {{ item.summary }}
                </span>

                <!-- Check -->
                <i :class="selected === item.id ? 'opacity-100' : 'opacity-0'"
                   class="ui-check fas fa-check-circle text-sky-600 animated absolute top-4 right-14px">
                </i>

            </div>

        </div>

        <!-- Error -->
        <v-error :value="error"></v-error>

    </div>
</template>

<script>
    import ErrorComponent from './error.vue';
    import LabelComponent from './label.vue';

    export default
    {
        /**
         * Define the components.
         *
         */
        components : {
            'v-error' : ErrorComponent,
            'v-label' : LabelComponent,
        },

        /**
         * Define the events.
         *
         */
        emits : ['change'],

        /**
         * Define the public properties.
         *
         */
        props : {
            'error'        : { type : String,           default : '' },
            'id'           : { type : String,           default : '' },
            'items'        : { type : Array,            default : [] },
            'labelSummary' : { type : String,           default : '' },
            'labelTitle'   : { type : String,           default : '' },
            'layout'       : { type : String,           default : 'grid-cols-1' },
            'optional'     : { type : Boolean,          default : false },
            'optionalText' : { type : String,           default : '' },
            'selected'     : { type : [Number, String], default : 0 },
        },
    }
</script>