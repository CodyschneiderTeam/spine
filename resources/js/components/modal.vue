<template>
	<div class="ui-modal w-full h-full hidden fixed top-0 left-0 z-1001 overflow-x-hidden overflow-y-auto animated">

		<!-- Background -->
		<div ref="background"
             @click="close()"
             class="ui-background bg-black/50 opacity-0 fixed inset-0 z-1000 animated">
		</div>

		<!-- Container -->
        <div ref="container"
             class="ui-container flex justify-center items-center min-h-screen scale-110 relative animated z-1001">

            <!-- Trigger -->
            <div ref="trigger">

                <!-- Content -->
                <div class="ui-content bg-white w-full max-w-500px md:rounded-lg p-8">
                    <slot name="content"></slot>
                </div>

                <!-- Footer -->
                <div v-if="$slots.footer"
                     class="bg-gray-50 border-t border-gray-200 flex flex-col-reverse md:flex-row justify-end gap-x-3 md:rounded-b-lg p-5">

                    <!-- Slot -->
                    <slot name="footer"></slot>

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
        emits : ['closed'],

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

				this.$refs.container.style.opacity   = 0;
                this.$refs.container.style.transform = 'scale(1.1)';

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
                this.close();
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

				this.$refs.container.style.opacity   = 0;
				this.$refs.container.style.transform = '';

				setTimeout(() => this.ready = true, 50);
				setTimeout(() => this.$el.scrollTop = 0, 50);
                setTimeout(() => this.$refs.background.style.opacity = 1, 50);
				setTimeout(() => this.$refs.container.style.opacity = 1, 50);
				setTimeout(() => this.$refs.container.style.transform = 'scale(1)', 50);
			},
		}
	}
</script>