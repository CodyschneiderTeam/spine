export default
{
    /**
     * Define the data model.
     *
     */
    data() { return {
        poll_interval : null,
    }},

    /**
     * Execute actions when the component is unmounted from the DOM.
     *
     */
    unmounted()
    {
        this.stopPollingServer();
    },

    /**
     * Define the supporting methods.
     *
     */
    methods :
    {
        /**
         * Handler for polling updates.
         *
         */
        onPollUpdate()
        {
            //
        },

        /**
         * Start polling the server.
         *
         */
        startPollingServer()
        {
            if (! this.prop('poll')) return;

            this.poll_interval = setInterval(async () => {
                this.onPollUpdate(await this.http().get(this.route('poll', this.prop('poll')), 'json'));
            }, 2000);

            setTimeout(() => clearInterval(this.poll_interval), 400000);
        },

        /**
         * Stop polling the server.
         *
         */
        stopPollingServer(closure = null)
        {
            if (this.poll_interval) clearInterval(this.poll_interval);

            if (closure) closure();
        },
    }
}