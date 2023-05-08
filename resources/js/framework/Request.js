export default class Request
{
    /**
     * Send an XHR 'delete' request to the given URL.
     *
     */
    static async delete(url, data = {}, format = 'json', options = {})
    {
        data._method = 'delete';

        return Request.post(url, data, format, options);
    }

    /**
     * Send an XHR 'get' request to the given URL.
     *
     */
    static async get(url, format, options = { cache : 'no-cache' })
    {
        let defaults = {
            headers : Request.headers(),
        };

        return Request.send(url, format, Object.assign(defaults, options));
    }

    /**
     * Retrieve the default headers to send with each request.
     *
     */
    static headers()
    {
        return {
            'Content-Type'     : 'application/json',
            'X-Requested-With' : 'XMLHttpRequest',
            'X-CSRF-TOKEN'     : System.Server.csrf(),
        };
    }

    /**
     * Send an XHR 'patch' request to the given URL.
     *
     */
    async patch(url, data = {}, format = 'json', options = {})
    {
        data._method = 'patch';

        return Request.post(url, data, format, options);
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
            headers     : Request.headers(),
        }

        return Request.send(url, format, Object.assign(defaults, options));
    }

    /**
     * Send an XHR 'put' request to the given URL.
     *
     */
    async put(url, data = {}, format = 'json', options = {})
    {
        data._method = 'put';

        return Request.post(url, data, format, options);
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
}