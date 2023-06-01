export default class Page
{
    /**
     * Retrieve or set the Inertia page property with the given key.
     *
     */
    static property(key, fallback = '')
    {
        return Is.array(key)
            ? Util.set(window.app.config.globalProperties.$page.props, key[0], key[1])
            : Util.get(window.app.config.globalProperties.$page.props, key, fallback);
    }
}