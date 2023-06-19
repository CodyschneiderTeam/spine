<template>
    <div class="ui-textbox w-full min-w-250px">

        <!-- Label -->
        <v-label :title="labelTitle"
                 :optional="optional"
                 :summary="labelSummary"
                 :optionalText="optionalText">
        </v-label>

        <!-- Container -->
        <div @mouseover="hover = true"
             @mouseout="hover = false"
             class="ui-container relative group">

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
                   class="ui-input bg-white border border-gray-300 group-hover:border-sky-500 focus:border-sky-500 text-17px text-gray-900 text-ellipsis w-full animated rounded appearance-none px-14px pt-9px pb-10px" />

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
                      class="ui-textarea bg-white border border-gray-300 group-hover:border-sky-500 focus:border-sky-500 text-17px text-gray-900 leading-[24px] w-full rounded appearance-none resize-none animated pl-14px pr-11 py-3">
            </textarea>

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