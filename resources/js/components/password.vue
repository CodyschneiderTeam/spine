<template>
    <div class="ui-password w-full min-w-[250px]">

        <!-- Container -->
        <div @mouseover="hover = true"
             @mouseout="hover = false"
             class="ui-container bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded relative transition duration-300">

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
                   :class="hover || focus ? 'pr-[50px]' : 'pr-3'"
                   class="ui-input w-full bg-inherit font-medium text-[17px] text-gray-900 dark:text-gray-400 text-ellipsis overflow-hidden rounded appearance-none pl-3 pt-[25px] pb-[6px]" />

            <!-- Label -->
            <v-label :icon="icon"
                     :value="label"
                     :focus="focus"
                     :optional="false"
                     :filled="! System.Util.blank(modelValue)">
            </v-label>

            <!-- Clear -->
            <v-clear :focus="focus"
                     :hover="hover"
                     @click="clear()"
                     :filled="! System.Util.blank(modelValue)">
            </v-clear>

			<!-- Generate -->
            <div v-if="generate && ! System.Browser.automated()"
                 style="transition: all 0.4s ease, background-color 0s"
                 class="ui-generate w-[50px] h-[51px] flex justify-center items-center absolute top-0 right-0 rounded-r"
                 :class="(focus && System.Util.blank(modelValue)) || (hover && System.Util.blank(modelValue)) ? 'opacity-100 z-[2]' : 'opacity-0 pointer-events-none'">

                <!-- Icon -->
                <i title="Generate a random password"
                   @click.stop="createRandomPassword()"
                   class="ui-icon fas fa-plus text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-400 relative top-[.5px] left-[1.5px] cursor-pointer transition duration-300">
                </i>

            </div>

        </div>

        <!-- Generated -->
        <div v-if="! System.Util.blank(password)"
             class="ui-generated font-semibold text-[14px] text-purple-700 dark:text-purple-300 mt-2">

            <!-- Text -->
            <span class="text-gray-700 dark:text-gray-300 mr-[2px]">
                Password:
            </span>

            <!-- Password -->
            {{ password }}

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
            'generate' : { type : Boolean, default : true },
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