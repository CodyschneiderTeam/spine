<template>
    <div class="ui-password w-full min-w-250px">

        <!-- Label -->
        <v-label :title="labelTitle"
                 :optional="optional"
                 :summary="labelSummary"
                 :optionalText="optionalText">

            <!-- Link -->
            <v-link v-if="forgotLink"
                    class="font-medium text-[12.5px] uppercase"
                    :href="Server.route('authentication.password.forgot')">

                <!-- Text -->
                Forgot it?

            </v-link>

        </v-label>

        <!-- Container -->
        <div @mouseover="hover = true"
             @mouseout="hover = false"
             class="ui-container relative group">

            <!-- Input -->
            <input :id="name"
                   :name="name"
                   :dusk="name"
                   type="password"
                   :value="modelValue"
                   @focus="focus = true"
                   @focusout="focus = false"
                   :placeholder="placeholder"
                   :autocomplete="autocomplete"
                   @input="change($event.target.value)"
                   :class="hover || focus ? 'pr-50px' : 'pr-3'"
                   class="ui-input bg-white border border-gray-300 group-hover:border-sky-500 focus:border-sky-500 text-17px text-gray-900 text-ellipsis w-full rounded appearance-none animated px-14px py-3" />

            <!-- Clear -->
            <v-clear :focus="focus"
                     :hover="hover"
                     @click="clear()"
                     :filled="! Util.blank(modelValue)">
            </v-clear>

			<!-- Generate -->
            <div v-if="generate && ! Browser.automated()"
                 class="ui-generate w-50px h-46px flex justify-center items-center absolute top-0 right-0 rounded-r animated"
                 :class="(focus && Util.blank(modelValue)) || (hover && Util.blank(modelValue)) ? 'opacity-100 z-2' : 'opacity-0 pointer-events-none'">

                <!-- Icon -->
                <i title="Generate a random password"
                   @click.stop="createRandomPassword()"
                   class="ui-icon fas fa-plus text-gray-400 hover:text-gray-600 relative top-[.5px] left-[1.5px] cursor-pointer animated">
                </i>

            </div>

        </div>

        <!-- Generated -->
        <div v-if="! Util.blank(password)"
             class="ui-generated font-semibold text-14px text-purple-700 text-left mt-2">

            <!-- Password -->
            {{ password }}

        </div>

        <!-- Error -->
        <v-error :value="fault"></v-error>

    </div>
</template>

<script>
    import LinkComponent from './link.vue';
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
            'v-link'  : LinkComponent,
        },

        /**
         * Define the data model.
         *
         */
        data() { return {
            characters : ['abcdefghijklm', '0123456789', '!@%^&*_-+=', 'NOPQRSTUVWXYZ'],
            password   : '',
        }},

        /**
         * Define the public properties.
         *
         */
        props : {
            'forgotLink' : { type : Boolean, default : false },
            'generate'   : { type : Boolean, default : true },
        },

        /**
         * Define the supporting methods.
         *
         */
        methods :
        {
            /**
             * Reset the component's value.
             *
             */
            clear()
            {
                this.password = '';

                this.change('');
            },

            /**
             * Generate a pseudo-random password.
             *
             */
            createRandomPassword()
            {
                this.clear();

                this.characters.forEach(type => {
                    for (var i = 0; i < 5; i++) {
                        this.password += type.charAt(Math.floor(Math.random() * type.length));
                    }
                });

                this.password = [...this.password].sort(() => Math.random() - 0.5).join('');

                this.change(this.password);
            },
        },
    }
</script>