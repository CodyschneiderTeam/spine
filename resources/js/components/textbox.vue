<template>
    <div class="ui-textbox w-full min-w-250px">

        <!-- Container -->
        <div @mouseover="hover = true"
             @mouseout="hover = false"
             class="ui-container bg-white border border-gray-300 rounded relative animated">

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
                   :readonly="readOnly ? 'readonly' : false"
                   :class="hover || focus ? 'pr-50px' : 'pr-3'"
                   :list="Util.blank(items) ? null : `${name}_datalist`"
                   :autocomplete="Util.blank(items) ? autocomplete : 'off'"
                   class="ui-input bg-inherit text-17px text-gray-900 text-ellipsis w-full overflow-hidden rounded appearance-none pl-3 pt-25px pb-6px" />

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
                      class="ui-textarea bg-inherit text-gray-900 leading-[24px] w-full rounded appearance-none resize-none pl-3 pr-11 pt-25px">
            </textarea>

            <!-- Label -->
            <v-label :icon="icon"
                     :value="label"
                     :optional="optional"
                     :optionalText="optionalText"
                     :filled="! Util.blank(modelValue)"
                     :focus="readOnly ? false : focus">
            </v-label>

            <!-- Clear -->
            <v-clear :focus="focus"
                     :hover="hover"
                     @click="change('')"
                     :filled="! Util.blank(modelValue)">
            </v-clear>

            <!-- Options -->
            <datalist :id="`${name}_datalist`"
                      v-if="! Util.blank(items)">

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
    }
</script>