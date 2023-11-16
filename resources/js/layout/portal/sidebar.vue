<template>
    <aside class="bg-[#04263b] flex flex-col w-250px min-w-250px max-w-250px h-screen -translate-x-250px xl:translate-x-0 fixed top-0 xl:sticky overflow-auto z-998 animated">

        <!-- Branding -->
        <div class="hidden xl:flex items-center px-8 pt-8 mb-10">

            <!-- Logo -->
            <img title="Logo"
                 class="w-26px h-26px"
                 :src="Server.asset('images/logo.png')" />

            <!-- Product -->
            <v-svg title="Product"
                   class="text-white h-15px ml-3"
                   @click="Browser.redirect(home)"
                   :source="Server.asset('images/product.svg')">
            </v-svg>

        </div>

        <!-- Navigation -->
        <div class="flex-1 px-6 pt-80px xl:px-8 xl:pt-0">

            <!-- Groups -->
            <div class="mb-8"
                 v-for="group in Sitemap.get().filter(group => group?.show ?? true)">

                <!-- Label -->
                <div class="text-13px text-gray-500/80 mb-3">
                    {{ group.label }}
                </div>

                <!-- Links -->
                <div @click="link['action']()"
                     v-for="link in group.items.filter(link => link?.show ?? true)"
                     class="hover:bg-sky-800/20 flex items-center cursor-pointer rounded-lg animated pl-3 py-10px">

                    <!-- Icon -->
                    <i :class="link.icon"
                       class="fa-fw text-19px text-center">
                    </i>

                    <!-- Label -->
                    <span class="font-medium text-16px text-gray-400 ml-3">
                        {{ link.label }}
                    </span>

                </div>

            </div>

        </div>

    </aside>
</template>

<script>
    import Container from 'ui/mixins/Container';
    import SvgComponent from '../../components/svg.vue';

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
         * Define the components.
         *
         */
        components : {
            'v-svg' : SvgComponent,
        },

        /**
         * Define the public properties.
         *
         */
        props : {
            'home' : { type : String, default : 'dashboard' },
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
                return document.getElementById('sidebar-toggle');
            },

	    	/**
	    	 * Hide the component.
	    	 *
	    	 */
	    	lostUserAttention()
	    	{
                this.$el.classList.toggle('-translate-x-250px');
	    	},

	    	/**
	    	 * Determine if the component is open or visible.
	    	 *
	    	 */
	    	hasUserAttention()
	    	{
                return ! this.$el.classList.contains('-translate-x-250px');
	    	},
        },
    }
</script>