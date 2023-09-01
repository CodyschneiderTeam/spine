<template>
    <nav class="bg-white border border-gray-300 fixed top-120px xl:top-80px right-20px rounded-lg
                opacity-none opacity-100 scale-90 scale-100 z-20 pointer-events-none origin-top-right animated">

        <!-- Slot -->
        <slot></slot>

        <!-- Menu -->
        <div class="p-6 pb-5"
             v-if="menu.filter(link => (link?.show ?? true)).length">

            <!-- Items -->
            <template v-for="link in menu.filter(link => (link?.show ?? true))">

                <!-- Separator -->
                <div v-if="link?.separator ?? false"
                     class="border-t border-gray-300/50 pt-10 mt-10">
                </div>

                <!-- Link -->
                <div @click="link['action']()"
                     v-if="! (link?.separator ?? false)"
                     :class="(link?.active ?? false) ? 'bg-sky-100/70' : 'hover:bg-sky-100/70'"
                     :dusk="`action-${link?.id ?? link.label.toLowerCase().replaceAll(' ', '-')}`"
                     class="flex items-center min-w-150px rounded-lg cursor-pointer animated group px-3 py-10px mb-6px">

                    <!-- Icon -->
                    <i class="fa-fw animated -ml-2 mr-1"
                       :class="[link.icon, (link?.active ?? false) ? 'text-sky-700' : 'group-hover:text-sky-700']">
                    </i>

                    <!-- Label -->
                    <span class="font-medium text-black"
                          :class="(link?.active ?? false) ? 'text-sky-800' : 'text-black-500 group-hover:text-sky-800'">

                        <!-- Text -->
                        {{ link.label }}

                    </span>

                </div>

            </template>

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