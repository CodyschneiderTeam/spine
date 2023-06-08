<template>
    <div class="ui-switch w-full min-w-250px">

        <!-- Label -->
        <v-label class="pr-20"
                 :title="labelTitle"
                 :optional="optional"
                 :summary="labelSummary"
                 :optionalText="optionalText"
                 :class="labelSummary ? '-mb-5' : ''">

            <!-- Button -->
            <button :dusk="name"
                    :id="`toggle-${name}`"
                    @click.stop="change(active ? 0 : 1)"
                    :class="[active ? 'after:left-25px bg-green-600/60' : 'after:left-3px bg-gray-400/40', labelSummary ? '-mb-9px' : '']"
                    class="ui-toggle w-48px h-26px rounded-full after:rounded-full cursor-pointer relative
                           transition-all duration-200 after:transition-all after:duration-200 -mr-20
                           after:h-20px after:w-20px after:bg-white after:absolute after:top-3px">
            </button>

        </v-label>

        <!-- Hidden -->
        <input :id="name"
               :name="name"
               type="hidden"
               :value="active ? 1 : 0">

        <!-- Error -->
        <v-error :value="fault"></v-error>

    </div>
</template>

<script>
    import ErrorComponent from './error.vue';
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
            'v-error' : ErrorComponent,
            'v-label' : LabelComponent,
        },

        /**
         * Define the computed properties.
         *
         */
        computed :
        {
            /**
             * Determine if the CheckBox is in an active state.
             *
             */
            active()
            {
                return ['1', 'true', 'yes', 'on', 1, true].includes(this.modelValue);
            },
        },
    }
</script>