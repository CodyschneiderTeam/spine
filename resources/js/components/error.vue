<template>
    <label v-html="content"
           v-if="! System.Util.blank(value)"
           class="ui-error block font-sans font-semibold text-13px text-red-700 text-right uppercase tracking-[.2px] my-2">
    </label>
</template>

<script>
    export default
    {
        /**
         * Define the public properties.
         *
         */
        props : {
            'beforeScroll' : { type : Function, default : null },
            'scrollDelay'  : { type : Number,   default : 0 },
            'value'        : { type : String,   default : '' },
        },

        /**
         * Define the computed properties.
         *
         */
        computed :
        {
            /**
             * Eliminate any script injection and respect line breaks.
             *
             */
            content()
            {
                return this.value
                           .replaceAll(/</g, '&lt;')
                           .replaceAll(/>/g, '&gt;')
                           .replaceAll("\n", '<br />');
            },
        },

        /**
         * Define the watch methods.
         *
         */
        watch :
        {
            /**
             * Watch the 'value' property.
             *
             */
            value : function(current, previous)
            {
                if (System.Util.blank(current)) return;

                this.$nextTick(() => this.handleRevisedContent());
            }
        },

		/**
		 * Define the supporting methods.
		 *
		 */
		methods :
        {
            /**
             * Respond to the component's text being changed.
             *
             */
            handleRevisedContent()
            {
                if (! this.isFirstErrorOnPage()) return;

                if (this.beforeScroll !== null) this.beforeScroll();

                setTimeout(() => this.scrollToInstance(), this.scrollDelay);
            },

            /**
             * Determine whether the component is the first of its type on the page.
             *
             */
            isFirstErrorOnPage()
            {
                return document.querySelector('.ui-error').isSameNode(this.$el);
            },

            /**
             * Adjust the browser's viewport so the component is visible.
             *
             */
            scrollToInstance()
            {
                this.$el.scrollIntoView({
                    behavior : 'smooth',
                    block    : 'center',
                });
            },
        }
    }
</script>