<template>
	<div class="ui-dropdown w-full">

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
			<select :id="name"
                    ref="input"
					:name="name"
					:value="modelValue"
                    @focus="focus = true"
                    @focusout="focus = false"
					@change="change($event.target.value)"
                    :class="Util.blank(modelValue) ? 'text-gray-400' : 'text-gray-900'"
					style="line-height: 1.3; padding-right: 50px; -webkit-padding-end: 50px !important; transition: all 0.3s ease, color 0s"
					class="ui-input bg-white border border-gray-300 group-hover:border-sky-500 focus:border-sky-500 text-17px text-ellipsis w-full align-middle rounded appearance-none cursor-pointer px-14px py-11px">

                <!-- Placeholder -->
                <option disabled
                        value=""
                        :selected="Util.blank(modelValue) ? 'selected' : ''">

                    <!-- Text -->
                    {{ Util.blank(placeholder) ? 'Select...' : placeholder }}

                </option>

				<!-- Items -->
				<option v-for="item in items"
                        :value="item[itemValueKey]"
                        :selected="modelValue === item[itemValueKey] ? 'selected' : ''">

                    <!-- Text -->
                    {{ item[itemTextKey].replace('|', "\xA0") }}

				</option>

			</select>

			<!-- Caret -->
			<i class="ui-caret fas fa-caret-down text-gray-400 cursor-pointer pointer-events-none absolute top-15px right-4"
               :class="! clear ? 'opacity-100' : (Util.blank(modelValue) || (! Util.blank(modelValue) && ! hover) ? 'opacity-100' : 'opacity-0')">
            </i>

            <!-- Clear -->
            <v-clear v-if="clear"
                     :focus="focus"
                     :hover="hover"
                     @click="change('')"
                     :filled="! Util.blank(modelValue)">
            </v-clear>

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
			'clear'        : { type : Boolean,         default : true },
			'items'        : { type : [Array, Object], default : [] },
			'itemTextKey'  : { type : String,          default : '' },
			'itemValueKey' : { type : String,          default : '' },
		},

        /**
         * Execute actions when the component is mounted to the DOM.
         *
         */
        mounted()
        {
            if (typeof this.modelValue === 'boolean') {
                this.$emit('update:modelValue', this.modelValue ? 1 : 0);
            }

            let selected = this.items.find(item => item[this.itemValueKey] === this.modelValue);

            if (selected === undefined || [null, undefined].includes(this.modelValue)) {
                this.change('');
            }
        },

		/**
		 * Define the supporting methods.
		 *
		 */
		methods :
        {
			/**
			 * Set the component's value.
			 *
			 */
			change(payload = undefined)
			{
                this.$refs.input.blur();

				this.fault = '';

                if (payload === undefined) return;

                if (! ['', null].includes(payload) && ! isNaN(payload)) {
                    payload = Number(payload);
                }

                this.$emit('update:modelValue', payload);

                this.$emit('change', {
                    text  : this.$refs.input[this.$refs.input.selectedIndex]?.text ?? '',
                    value : payload,
                });
			},
		}
	}
</script>