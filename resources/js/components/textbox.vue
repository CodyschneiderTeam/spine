<template>
    <div class="ui-textbox w-full min-w-[250px]">

        <!-- Container -->
        <div @mouseover="hover = true"
             @mouseout="hover = false"
             class="ui-container bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded relative transition duration-300">

            <!-- Input -->
            <input :id="name"
                   :name="name"
                   :type="type"
                   :dusk="name"
                   v-if="lines === 1"
                   :value="modelValue"
                   @focus="focus = true"
                   :maxLength="maxLength"
                   @focusout="focus = false"
                   :placeholder="placeholder"
                   @input="change($event.target.value)"
                   @keydown="interceptKeystroke($event)"
                   :readonly="readOnly ? 'readonly' : false"
                   :class="hover || focus ? 'pr-[50px]' : 'pr-3'"
                   :list="System.Util.blank(items) ? null : `${name}_datalist`"
                   :autocomplete="System.Util.blank(items) ? autocomplete : 'off'"
                   class="ui-control ui-input w-full bg-inherit text-[17px] text-gray-900 dark:text-gray-400 text-ellipsis overflow-hidden rounded appearance-none pl-3 pt-[25px] pb-[6px]" />

            <!-- Textarea -->
            <textarea :id="name"
                      :name="name"
                      :dusk="name"
                      :rows="lines"
                      v-if="lines !== 1"
                      :value="modelValue"
                      @focus="focus = true"
                      :maxLength="maxLength"
                      @focusout="focus = false"
                      :placeholder="placeholder"
                      :autocomplete="autocomplete"
                      @input="change($event.target.value)"
                      @keydown="interceptKeystroke($event)"
                      class="ui-control ui-textarea w-full bg-inherit text-gray-900 dark:text-gray-400 leading-[24px] rounded appearance-none resize-none pl-3 pr-11 pt-[25px]">
            </textarea>

            <!-- Label -->
            <v-label :icon="icon"
                     :value="label"
                     :optional="optional"
                     :optionalText="optionalText"
                     :filled="! System.Util.blank(modelValue)"
                     :focus="readOnly ? false : focus">
            </v-label>

            <!-- Clear -->
            <v-clear :focus="focus"
                     :hover="hover"
                     @click="change('')"
                     :filled="! System.Util.blank(modelValue)">
            </v-clear>

            <!-- Options -->
            <datalist v-if="! System.Util.blank(items)"
                      :id="`${name}_datalist`">

                <!-- Option -->
                <option v-for="item in items">
                    {{ item[itemValueKey] }}
                </option>

            </datalist>

        </div>

        <!-- Error -->
        <v-error :value="fault"></v-error>

    </div>
</template>

<script>
    import ClearComponent from './clear.vue';
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
            'v-clear' : ClearComponent,
            'v-error' : ErrorComponent,
            'v-label' : LabelComponent,
        },

        /**
         * Define the events.
         *
         */
        emits : ['return'],

        /**
         * Define the public properties.
         *
         */
        props : {
			'items'        : { type : [Array, Object], default : [] },
			'itemValueKey' : { type : String,          default : '' },
            'lines'        : { type : Number,          default : 1 },
            'maxLength'    : { type : Number,          default : null },
            'readOnly'     : { type : Boolean,         default : false },
            'type'         : { type : String,          default : 'text' },
        },

        /**
         * Define the supporting methods.
         *
         */
        methods :
        {
            /**
             * Intercept certain keyboard events and handle them accordingly.
             *
             */
            interceptKeystroke(event)
            {
                if (event.key === 'Enter' && event.shiftKey) {
                    return 13;
                }

                if (event.key === 'Enter' && ! event.shiftKey) {
                    event.preventDefault();

                    return this.$emit('return');
                }
            },
        }
    }
</script>