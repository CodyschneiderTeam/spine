import { useForm } from '@inertiajs/vue3';

export default class Form
{
    /**
     * Submit the given Inertia form to the server.
     *
     */
    static async confirmThenSubmit(form, url, method = 'post', options = {}, exact = false)
    {
        return await System.Dialog.confirm() ? System.Form.submit(form, url, method, options, exact) : null;
    }

    /**
     * Create an Inertia form.
     *
     */
    static create(data = {})
    {
        let fields = Object.assign({ _token : System.Server.csrf() }, data);

        let options = {
            key      : parseInt(window.performance.now()),
            remember : true,
        };

        return useForm(fields, options);
    }

    /**
     * Submit the given Inertia form to the server.
     *
     */
    static submit(form, url, method = 'post', options = {}, exact = false)
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
                'X-CSRF-TOKEN'     : System.Server.csrf(),
            },
            preserveState  : 'errors',
            preserveScroll : 'errors',
        };

        return form.submit(
            method !== 'get' ? 'post' : 'get',
            exact ? url : System.Server.route(...(System.Is.array(url) ? url : [url])),
            Object.assign(defaults, options)
        );
    }
}