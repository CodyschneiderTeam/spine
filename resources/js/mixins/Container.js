export default
{
    /**
     * Execute actions when the component is instantiated.
     *
     */
    created()
    {
        document.addEventListener('click', this.pageClicked);
    },

    /**
     * Execute actions when the component is unmounted.
     *
     */
    unmounted()
    {
        document.removeEventListener('click', this.pageClicked);
    },

    /**
     * Define the supporting methods.
     *
     */
    methods :
    {
        /**
         * Retrieve the element that serves as the container's trigger.
         *
         */
        getTriggerForContainer()
        {
            return this.$refs.trigger ? this.$refs.trigger : this.$el;
        },

        /**
         * Handle a click or tap on the page.
         *
         */
        pageClicked(event)
        {
            let trigger = this.getTriggerForContainer();

            if (! this.hasUserAttention() || trigger === event.target) return;

            trigger.contains(event.target) ? null : this.lostUserAttention();
        },
    }
}