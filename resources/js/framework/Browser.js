export default class Browser
{
    /**
     * Determine if an automated testing framework is running.
     *
     */
    static automated()
    {
        return document.body.classList.contains('dusk');
    }

    /**
     * Load an external JavaScript file or library.
     *
     */
    static loadScript(url)
    {
        let scripts = document.getElementsByTagName('script');

        if (! System.Util.blank(Array.from(scripts).filter(item => item.src === url))) return;

        let script = document.createElement('script');

        script.src = url;

        document.getElementsByTagName('head')[0].appendChild(script);
    }

    /**
     * Retrieve the query string, or a specific key / value pair within it.
     *
     */
    static queryString(key = null, fallback = null)
    {
        let query = new window.URLSearchParams(document.location.search);

        return key !== null ? (query.get(key) ?? fallback) : query;
    }

    /**
     * Send the user to a different URL using the given configuration.
     *
     */
    static redirect(config, options = { preserveScroll : false }, external = false, tab = false)
    {
        config = System.Is.array(config) ? config : [config];

        if (external) {
            return tab ? window.open(config[0], '_blank') : window.location.href = config[0];
        }

        return window.app.config.globalProperties.$inertia.get(
            config[0].startsWith('http') ? config[0] : System.Server.route(...config), {}, options
        );
    }

    /**
     * Adjust the position of the viewport.
     *
     */
    static scrollTo(x, y)
    {
        window.scrollTo(x, y);
    }

    /**
     * Retrieve the current user's session.
     *
     */
    static session()
    {
        return window.session;
    }
}