export default
{
    /**
     * Define the supporting methods.
     *
     */
    methods :
    {
        /**
         * Retrieve a deeply-nested property from the given target.
         *
         */
        get(target, key, fallback = '')
        {
            return key.split('.').reduce((p, c) => p && p[c], target) ?? fallback;
        },

        /**
         * Retrieve the query string, or a specific key / value pair within it.
         *
         */
        queryString(key = null, fallback = null)
        {
            let query = new window.URLSearchParams(document.location.search);

            return key !== null ? (query.get(key) ?? fallback) : query;
        },

        /**
         * Load an external JavaScript file or library.
         *
         */
        script(url)
        {
            let scripts = document.getElementsByTagName('script');

            if (! this.blank(Array.from(scripts).filter(item => item.src === url))) return;

            let script = document.createElement('script');

            script.src = url;

            document.getElementsByTagName('head')[0].appendChild(script);
        },

        /**
         * Assign a deeply-nested property on the given target.
         *
         */
        set(target, key, value)
        {
            key.split('.').reduce(function(p, c, i) {
                return (i + 1 == key.split('.').length) ? p[c] = value : p[c] = p[c] || {};
            }, target);
        },

        /**
         * Execute the given closure when the given condition is falsy.
         *
         */
        unless(condition, closure)
        {
            return ! condition ? closure() : null;
        },

        /**
         * Execute the given closure when the given condition is truthy.
         *
         */
        when(condition, closure)
        {
            return condition ? closure() : null;
        },
    }
}