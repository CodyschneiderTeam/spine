import Is from './Is';
import Form from './Form';
import Page from './Page';
import Text from './Text';
import User from './User';
import Util from './Util';
import Dialog from './Dialog';
import Figure from './Figure';
import Server from './Server';
import Browser from './Browser';
import Request from './Request';
import Calendar from './Calendar';

export default class System
{
    /**
     * Configure the system framework.
     *
     */
    static configure(classes = {})
    {
        window.System = Object.assign({}, classes, {
            Browser, Calendar, Dialog, Form, Is, Figure,
            Page, Request, Server, Text, User, Util,
        });

        Object.entries(window.System).forEach(i => {
            window[i[0]] ? System.#merge(i[0], i[1]) : window[i[0]] = i[1];
        });
    }

    /**
     * Merge the given framework class into the global namespace.
     *
     */
    static #merge(name, object)
    {
        Object.getOwnPropertyNames(object)
            .filter(i => i !== 'prototype')
            .filter(i => typeof Object.getOwnPropertyDescriptor(object, i).value === 'function')
            .forEach(i => window[name][i] = Object.getOwnPropertyDescriptor(object, i).value);
    }
}