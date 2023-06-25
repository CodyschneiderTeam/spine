<template>
    <div class="ui-tags w-full min-w-250px">

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
            <input type="text"
                   ref="input"
                   :placeholder="placeholder"
                   @change="process($event.target.value)"
                   :class="hover || focus ? 'pr-50px' : 'pr-3'"
                   class="ui-input bg-white border border-gray-300 group-hover:border-sky-500 focus:border-sky-500 text-17px text-gray-900 text-ellipsis w-full !animated rounded appearance-none px-14px pt-9px pb-10px" />

            <!-- Clear -->
            <v-clear :focus="focus"
                     :hover="hover"
                     @click="tagify.removeAllTags()"
                     :filled="! Util.blank(modelValue)">
            </v-clear>

        </div>

        <!-- Error -->
        <v-error :value="fault"></v-error>

    </div>
</template>

<script>
    import Tagify from '@yaireo/tagify';
    import '@yaireo/tagify/dist/tagify.css';
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
         * Define the data model.
         *
         */
        data() { return {
            tagify : null,
        }},

        /**
         * Define the public properties.
         *
         */
        props : {
            'characters' : { type : Number, default : 100 },
            'limit'      : { type : Number, default : 100 },
        },

		/**
		 * Execute actions when the component is mounted to the DOM.
		 *
		 */
		mounted()
		{
            this.tagify = new Tagify(this.$refs.input, {
                pattern : `/^.{0,${this.characters}}$/`,
                maxTags : this.limit,
            });

            this.format(this.modelValue);
		},

		/**
		 * Define the supporting methods.
		 *
		 */
		methods:
        {
            /**
             * Convert the given input source into tags.
             *
             */
            format(source)
            {
                this.tagify.removeAllTags();

                this.tagify.addTags(source.split('|').filter(item => item));
            },

            /**
             * Prepare the tags for two-way data binding.
             *
             */
            process(tags)
            {
                tags = Util.blank(tags) ? [] : JSON.parse(tags);

                this.change(tags.map(item => item.value).join('|'));
            },
        },
    }
</script>