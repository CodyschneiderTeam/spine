export default class Server
{
    /**
     * Generate a url to the given application asset.
     *
     */
    static asset(path)
    {
        return `${window.app.config.globalProperties.$page.props.asset}${path}`;
    }

    /**
     * Retrieve the current CSRF token used by the server.
     *
     */
    static csrf()
    {
        return window.app.config.globalProperties.$page.props.csrf;
    }

    /**
     * Generate a url to the given stored file.
     *
     */
    static file(path)
    {
        return `${window.app.config.globalProperties.$page.props.file}${path}`;
    }

    /**
     * Generate a route using the given parameters.
     *
     */
    static route(...parameters)
    {
        return parameters.length ? window.route(...parameters) : window.route();
    }
}