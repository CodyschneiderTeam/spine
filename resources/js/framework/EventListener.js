import Bugsnag from '@bugsnag/js';
import { createApp, h } from 'vue';
import Application from '../mixins/Application';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

export default class EventListener
{
    /**
     * Configure the popstate event listener.
     *
     */
    static disableCaching()
    {
        window.addEventListener('popstate', (event) =>
        {
            event.stopImmediatePropagation();

            window.app.config.globalProperties.$inertia.reload({
                preserveState  : false,
                preserveScroll : false,
                replace        : true,
                onSuccess      : (page) => window.app.config.globalProperties.$inertia.setPage(page),
                onError        : () => window.location.href = event.state.url,
            });
        });
    }

    /**
     * Configure the page ready event listener.
     *
     */
    static launchWhenReady()
    {
        window.addEventListener('DOMContentLoaded', () =>
        {
            let path = (name) => resolvePageComponent(
                `../../../../../../spa/pages/${name}.vue`,
                import.meta.glob('../../../../../../spa/pages/**/*.vue', { eager : true })
            );

            let setup = ({ el, App, props, plugin }) =>
            {
                window.app = createApp({ render : () => h(App, props) });

                window.production
                    ? window.app.mixin(Application).use(plugin).use(Bugsnag.getPlugin('vue')).mount(el)
                    : window.app.mixin(Application).use(plugin).mount(el);
            };

            createInertiaApp({
                setup,
                resolve  : name => path(name),
                progress : { color : '#ECC94B', includeCSS : true, showSpinner : false },
            });
        });
    }
}