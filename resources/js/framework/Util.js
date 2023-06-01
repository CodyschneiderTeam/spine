import { isProxy, toRaw } from 'vue';

export default class Util
{
    /**
     * Determine if the given value is empty.
     *
     */
    static blank(value)
    {
        if (Is.array(value)) {
            return value.length === 0;
        }

        if (Is.date(value)) {
            return false;
        }

        if (isProxy(value) && toRaw(value).constructor.name === 'Calendar') {
            return false;
        }

        if (Is.object(value)) {
            return Object.keys(value).length && Object.getOwnPropertyNames(value).length;
        }

        return ['', null, undefined].includes(value);
    }

    /**
     * Assign the given value to the clipboard, then execute the given closure.
     *
     */
    static copy(value, closure = null)
    {
        let promise = window.navigator.clipboard.writeText(value);

        return closure ? promise.then(() => closure()) : null;
    }

    /**
     * Retrieve a deeply-nested property from the given target.
     *
     */
    static get(target, key, fallback = '')
    {
        return key.split('.').reduce((p, c) => p && p[c], target) ?? fallback;
    }

    /**
     * Assign a deeply-nested property on the given target.
     *
     */
    static set(target, key, value)
    {
        key.split('.').reduce(function(p, c, i) {
            return (i + 1 == key.split('.').length) ? p[c] = value : p[c] = p[c] || {};
        }, target);
    }

    /**
     * Execute the given closure when the given condition is falsy.
     *
     */
    static unless(condition, closure)
    {
        return ! condition ? closure() : null;
    }

    /**
     * Execute the given closure when the given condition is truthy.
     *
     */
    static when(condition, closure)
    {
        return condition ? closure() : null;
    }
}