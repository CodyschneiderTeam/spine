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
            if (! System.Page.property('poll')) return;

            let url = System.Server.route('poll', System.Page.property('poll'));

            this.poll_interval = setInterval(async () => {
                this.onPollUpdate(await System.Request.get(url, 'json'));
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