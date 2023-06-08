<template>
	<div class="ui-tabs flex items-end overflow-x-auto mb-18">

        <!-- Tabs -->
        <div @click="tab.action()"
             v-for="(tab, index) in visible"
             :dusk="`ui-tab-select-${tab.id}`"
             class="ui-tab group cursor-pointer whitespace-nowrap select-none animated relative z-1">

            <!-- Content -->
            <div :class="visible.length > 6 ? '' : 'md:mx-1'"
                 class="ui-content flex items-center px-4 py-3">

                <!-- Icon -->
                <i :title="tab.label"
                   class="ui-icon text-20px md:text-17px animated md:mr-14px"
                   :class="[tab.icon, tab.id === active ? 'text-sky-600' : 'text-gray-500/[.65]']">
                </i>

                <!-- Label -->
                <span v-html="tab.label"
                      class="ui-label font-medium text-16px animated hidden md:inline"
                      :class="tab.id === active ? 'text-sky-600' : 'text-gray-600 hidden lg:inline'">
                </span>

            </div>

            <!-- Borders -->
            <div class="ui-border-top group-hover:bg-sky-600/80 w-full h-1px animated relative z-1"></div>
            <div class="ui-border-bottom bg-gray-300 group-hover:bg-sky-600/80 w-full h-1px animated relative z-1"></div>

        </div>

        <!-- Track -->
        <div class="ui-track bg-gray-300 w-full h-1px rounded-lg relative z-2"></div>

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
		 * Execute actions when the component is mounted to the DOM.
		 *
		 */
		mounted()
		{
            this.$el.style.maxWidth = `${this.$el.closest('.container').getBoundingClientRect().width - 48}px`;
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
	}
</script>