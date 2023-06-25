<template>
	<div class="ui-tabs flex mb-18">

        <!-- Tabs -->
        <div ref="tabs"
             class="flex overflow-x-auto hide-scrollbar">

            <!-- Tab -->
            <div @click="tab.action()"
                 v-for="(tab, index) in visible"
                 :dusk="`ui-tab-select-${tab.id}`"
                 :class="tab.id === active ? 'active' : 'inactive'"
                 class="ui-tab group cursor-pointer whitespace-nowrap select-none animated relative z-1">

                <!-- Content -->
                <div class="ui-content flex items-center px-4 py-3">

                    <!-- Icon -->
                    <i :title="tab.label"
                       class="ui-icon text-20px md:text-17px animated md:mr-14px"
                       :class="[tab.icon, tab.id === active ? 'text-sky-600' : 'text-gray-500/[.65]']">
                    </i>

                    <!-- Label -->
                    <span v-html="tab.label"
                          class="ui-label font-medium text-16px animated hidden md:inline"
                          :class="tab.id === active ? 'text-sky-700' : 'text-gray-600 hidden lg:inline'">
                    </span>

                </div>

                <!-- Borders -->
                <div class="ui-border-top group-hover:bg-sky-600/80 w-full h-1px animated relative z-1"></div>
                <div class="ui-border-bottom bg-gray-300 group-hover:bg-sky-600/80 w-full h-1px animated relative z-1"></div>

            </div>

            <!-- Track -->
            <div class="ui-track bg-gray-300 w-full h-1px rounded-lg relative z-2"></div>

        </div>

        <!-- Scrolling -->
        <div v-if="visible.length > 6"
             class="border-b border-gray-300 flex items-center pl-6">

            <!-- Scroll Left -->
            <i class="far hover:font-bold fa-caret-left text-17px text-gray-400 cursor-pointer mr-6px"
               @click="$refs.tabs.scroll({ left : $refs.tabs.scrollLeft - 200, behavior : 'smooth' })">
            </i>

            <!-- Scroll Right -->
            <i class="far hover:font-bold fa-caret-right text-17px text-gray-400 cursor-pointer"
               @click="$refs.tabs.scroll({ left : $refs.tabs.scrollLeft + 200, behavior : 'smooth' })">
            </i>

        </div>

	</div>
</template>

<script>
	export default
    {
		/**
		 * Define the public properties.
		 *
		 */
		props : {
			'active' : { type : String, default : '' },
			'items'  : { type : Array,  default : [] },
		},

        /**
         * Define the computed properties.
         *
         */
        computed :
        {
            /**
             * Filter the item list to only show visible tabs.
             *
             */
            visible()
            {
                return this.items.filter(tab => tab?.visible ?? true);
            }
        },

		/**
		 * Execute actions when the component is mounted to the DOM.
		 *
		 */
		mounted()
		{
            let width = this.$refs.tabs.getBoundingClientRect().width;

            let left = this.$el.querySelector('.active').getBoundingClientRect().left;

            if (left > width) this.$refs.tabs.scrollLeft = left;
		},
	}
</script>