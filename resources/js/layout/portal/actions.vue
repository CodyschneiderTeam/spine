<template>
    <nav class="bg-white border border-gray-300 fixed top-120px xl:top-80px right-20px rounded
                opacity-none opacity-100 scale-90 scale-100 z-20 pointer-events-none origin-top-right animated">

        <!-- Slot -->
        <slot></slot>

        <!-- Menu -->
        <div class="py-10px"
             v-if="menu.filter(link => (link?.show ?? true)).length">

            <!-- Items -->
            <template v-for="link in menu.filter(link => (link?.show ?? true))">

                <!-- Separator -->
                <div class="border-t border-gray-200 pt-10px mt-10px"
                     v-if="link.hasOwnProperty('separator') && link.separator">
                </div>

                <!-- Link -->
                <div @click="link['action']()"
                     v-if="! link.hasOwnProperty('separator')"
                     :dusk="`action-${link?.id ?? link.label.toLowerCase().replaceAll(' ', '-')}`"
                     class="hover:bg-gray-200/75 flex items-center min-w-175px cursor-pointer animated group px-6 py-10px">

                    <!-- Icon -->
                    <i :class="link.icon"
                       class="fa-fw text-gray-400 animated -ml-2 mr-6px">
                    </i>

                    <!-- Label -->
                    <span class="text-gray-700">
                        {{ link.label }}
                    </span>

                </div>

            </template>

            <!-- Empty -->
            <div v-if="! menu.filter(link => (link.hasOwnProperty('separator') && link.separator) || (link?.show ?? true)).length"
                 class="flex items-center min-w-175px cursor-pointer animated group px-6 py-10px">

                <!-- Label -->
                <span class="text-gray-700">
                    No options available
                </span>

            </div>

        </div>

    </nav>
</template>

<script>
    import Container from 'ui/mixins/Container';

    export default
    {
        /**
         * Define the mixins.
         *
         */
        mixins : [
            Container,
        ],

        /**
         * Define the public properties.
         *
         */
        props : {
            'menu' : { type : Array, default : [] },
        },

		/**
		 * Define the supporting methods.
		 *
		 */
		methods:
        {
            /**
             * Retrieve the element that serves as the trigger.
             *
             */
            getTriggerForContainer()
            {
                return document.getElementById('action-menu-toggle');
            },

	    	/**
	    	 * Hide the component.
	    	 *
	    	 */
	    	lostUserAttention()
	    	{
                ['opacity-none', 'scale-90', 'pointer-events-none'].map(v => this.$el.classList.toggle(v));
	    	},

	    	/**
	    	 * Determine if the component is open or visible.
	    	 *
	    	 */
	    	hasUserAttention()
	    	{
                return ! this.$el.classList.contains('opacity-none');
	    	},
        },
    }
</script>

<style lang="postcss">
    .opacity-none { @apply opacity-0 }
</style>