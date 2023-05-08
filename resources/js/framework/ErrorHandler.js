import Bugsnag from '@bugsnag/js';
import BugsnagPluginVue from '@bugsnag/plugin-vue';

export default class ErrorHandler
{
    /**
     * Configure the error handler.
     *
     */
    static configure(key = '')
    {
        window.production = document.body.classList.contains('production');

        if (! window.production) return;

        Bugsnag.start({
            apiKey  : key,
            plugins : [new BugsnagPluginVue()],
            onError : (event) => event.setUser(
                window?.app?.config?.globalProperties?.$page?.props?.user?.id ?? null,
                window?.app?.config?.globalProperties?.$page?.props?.user?.email ?? null,
                window?.app?.config?.globalProperties?.$page?.props?.user?.name ?? null,
            )
        });
    }
}