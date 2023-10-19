<template>
    <svg :viewBox="viewbox"
         xmlns="http://www.w3.org/2000/svg">
    </svg>
</template>

<script>
    export default
    {
        /**
         * Define the data model.
         *
         */
        data() { return {
            viewbox : '0 0 0 0',
        }},

        /**
         * Define the public properties.
         *
         */
        props : {
            'source' : { type : String, default : '' },
        },

        /**
         * Define the watch methods.
         *
         */
        watch :
        {
            /**
             * Watch the 'source' property.
             *
             */
            source : function(current, previous)
            {
                return this.change();
            }
        },

        /**
         * Execute actions when the component is mounted to the DOM.
         *
         */
        mounted()
        {
            this.change();
        },

		/**
		 * Define the supporting methods.
		 *
		 */
		methods:
        {
			/**
			 * Fetch the SVG and assign it to the component.
			 *
			 */
			async change()
			{
                if (Util.blank(this.source)) return;

                const response = await fetch(this.source);

                const text = await response.text();

                const file = new DOMParser().parseFromString(text, 'image/svg+xml');

                this.viewbox = file.documentElement.getAttribute('viewBox');

                this.$el.innerHTML = file.documentElement.innerHTML;
			},
		}
    }
</script>