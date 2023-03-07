export default
{
    /**
     * Define the computed properties.
     *
     */
    computed :
    {
        /**
         * Retrieve the current session.
         *
         */
        session()
        {
            return window.session;
        }
    },

    /**
     * Define the supporting methods.
     *
     */
    methods :
    {
        /**
         * Retrieve a reference to the application instance or sub-property.
         *
         */
        app(property = null)
        {
            return property
                ? window.app.config.globalProperties[`$${property}`]
                : window.app.config.globalProperties;
        },

        /**
         * Generate a url to the given application asset.
         *
         */
        asset(path)
        {
            return `${this.prop('asset')}${path}`;
        },

        /**
         * Retrieve or set the Inertia property with the given key.
         *
         */
        prop(key, fallback = '')
        {
            return Array.isArray(key)
                ? this.set(this.app('page').props, key[0], key[1])
                : this.get(this.app('page').props, key, fallback);
        },

        /**
         * Send the user to a different URL using the given configuration.
         *
         */
        redirect(config, options = { preserveScroll : false }, external = false, tab = false)
        {
            config = Array.isArray(config) ? config : [config];

            return external
                ? (tab ? window.open(config[0], '_blank') : window.location.href = config[0])
                : this.app('inertia').get(this.route(...config), {}, options);
        },

        /**
         * Generate a route using the given parameters.
         *
         */
        route(...parameters)
        {
            return parameters.length ? window.route(...parameters) : window.route();
        },

        /**
         * Generate a url to the given stored file.
         *
         */
        storage(path)
        {
            return `${this.prop('storage')}${path}`;
        },
    }
}