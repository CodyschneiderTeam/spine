<template>
	<div :class="dismiss ? 'cursor-pointer' : ''"
         class="ui-aside w-full h-full hidden fixed top-0 left-0 z-1001 overflow-x-hidden overflow-y-auto animated">

		<!-- Background -->
		<div ref="background"
			 @click="dismiss ? close() : null"
             class="ui-background bg-black/50 opacity-0 fixed inset-0 z-1000 animated">
		</div>

		<!-- Container -->
        <div class="ui-container flex justify-end min-h-screen relative z-1001">

            <!-- Panel -->
            <div ref="trigger"
                 class="ui-panel bg-white w-full md:max-w-600px translate-x-full cursor-auto relative z-1001 animated">

                <!-- Header -->
                <div v-if="$slots.header"
                     class="ui-slot-header bg-gray-50 border-b border-gray-200 px-10 md:px-20 pt-12 pb-10">

                    <!-- Slot -->
                    <slot name="header"></slot>

                </div>

                <!-- Content -->
                <div class="ui-slot-content bg-white p-10 md:p-20 md:pt-19">
                    <slot name="content"></slot>
                </div>

            </div>

        </div>

	</div>
</template>

<script>
    import Container from '../mixins/Container';

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
         * Define the events.
         *
         */
        emits : ['close', 'closed'],

        /**
         * Define the data model.
         *
         */
        data() { return {
            ready : false,
        }},

		/**
		 * Define the public properties.
		 *
		 */
		props: {
            'dismiss' : { type : Boolean, default : true },
			'visible' : { type : Boolean, default : false },
		},

        /**
         * Define the watch methods.
         *
         */
        watch :
        {
            /**
             * Watch the 'visible' property.
             *
             */
            visible : function(current, previous)
            {
                return current ? this.open() : this.close();
            }
        },

		/**
		 * Execute actions when the component is mounted to the DOM.
		 *
		 */
		mounted()
		{
			if (this.visible) {
                this.open();
            }
		},

		/**
		 * Execute actions when the component is unmounted from the DOM.
		 *
		 */
		unmounted()
		{
            document.body.style.overflow = 'visible';
		},

		/**
		 * Define the supporting methods.
		 *
		 */
		methods:
        {
			/**
			 * Close the modal window.
			 *
			 */
			close()
			{
				document.body.style.overflow = 'visible';

                this.$refs.trigger.style.transform = 'translateX(100%)';

				setTimeout(() => this.$refs.background.style.opacity = 0, 100);
				setTimeout(() => this.$el.classList.add('hidden'), 300);
				setTimeout(() => this.$emit('closed'), 350);
			},

	    	/**
	    	 * Hide the component.
	    	 *
	    	 */
	    	lostUserAttention()
	    	{
                this.dismiss ? this.close() : null;
	    	},

	    	/**
	    	 * Determine if the component is open or visible.
	    	 *
	    	 */
	    	hasUserAttention()
	    	{
                return this.ready;
	    	},

			/**
			 * Open the modal window.
			 *
			 */
			open()
			{
				document.body.style.overflow = 'hidden';

				this.$el.classList.remove('hidden');

				this.$refs.trigger.style.transform = '';

				setTimeout(() => this.ready = true, 50);
				setTimeout(() => this.$el.scrollTop = 0, 50);
                setTimeout(() => this.$refs.background.style.opacity = 1, 50);
				setTimeout(() => this.$refs.trigger.style.transform = 'translateX(0)', 50);
			},
		}
	}
</script>