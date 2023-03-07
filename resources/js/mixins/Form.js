export default
{
    /**
     * Define the supporting methods.
     *
     */
    methods :
    {
        /**
         * Create an Inertia form.
         *
         */
        createForm(data = {})
        {
            let fields = Object.assign(
                { _token : this.prop('csrf') }, data
            );

            let options = {
                key      : parseInt(window.performance.now()),
                remember : true,
            };

            return window.useForm(fields, options);
        },

        /**
         * Submit the given Inertia form to the server.
         *
         */
        submitForm(form, url, method = 'post', options = {}, exact = false)
        {
            form.clearErrors();

            if (method !== 'get') {
                form = form.transform((data) => ({ ...data, '_method' : structuredClone(method) }));
            } else {
                delete form._token;
            }

            let defaults = {
                headers : {
                    'Accept'           : 'application/json',
                    'Content-Type'     : 'application/json',
                    'X-Requested-With' : 'XMLHttpRequest',
                    'X-CSRF-TOKEN'     : this.prop('csrf'),
                },
                preserveState  : 'errors',
                preserveScroll : 'errors',
            };

            return form.submit(
                method !== 'get' ? 'post' : 'get',
                exact ? url : this.route(...(Array.isArray(url) ? url : [url])),
                Object.assign(defaults, options)
            );
        }
    }
}