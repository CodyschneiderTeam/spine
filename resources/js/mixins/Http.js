export default
{
    /**
     * Define the supporting methods.
     *
     */
    methods :
    {
        /**
         * Create an HTTP client.
         *
         */
        http() { return new class
        {
            /**
             * Send an XHR 'delete' request to the given URL.
             *
             */
            async delete(url, data = {}, format = 'json', options = {})
            {
                data._method = 'delete';

                return this.post(url, data, format, options);
            }

            /**
             * Send an XHR 'get' request to the given URL.
             *
             */
            async get(url, format, options = { cache : 'no-cache' })
            {
                let defaults = {
                    headers : this.headers(),
                };

                return this.send(url, format, Object.assign(defaults, options));
            }

            /**
             * Retrieve the default headers to send with each request.
             *
             */
            headers()
            {
                return {
                    'Content-Type'     : 'application/json',
                    'X-Requested-With' : 'XMLHttpRequest',
                    'X-CSRF-TOKEN'     : window.app.config.globalProperties.$page.props.csrf,
                };
            }

            /**
             * Send an XHR 'patch' request to the given URL.
             *
             */
            async patch(url, data = {}, format = 'json', options = {})
            {
                data._method = 'patch';

                return this.post(url, data, format, options);
            }

            /**
             * Send an XHR 'post' request to the given URL.
             *
             */
            async post(url, data = {}, format = 'json', options = {})
            {
                let defaults = {
                    method      : 'post',
                    credentials : 'same-origin',
                    body        : JSON.stringify(data),
                    headers     : this.headers(),
                }

                return this.send(url, format, Object.assign(defaults, options));
            }

            /**
             * Send an XHR 'put' request to the given URL.
             *
             */
            async put(url, data = {}, format = 'json', options = {})
            {
                data._method = 'put';

                return this.post(url, data, format, options);
            }

            /**
             * Send an XHR request to the given URL.
             *
             */
            async send(url, format = '', options = {})
            {
                let response = await fetch(url, options);

                if (! response.ok) return response;

                switch (format) {
                    case 'json' : return await response.json();
                    case 'text' : return await response.text();
                    case 'blob' : return await response.blob();
                    default     : return response;
                }
            }
        }},
    }
}