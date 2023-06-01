import Is from './Is';
import Form from './Form';
import Page from './Page';
import User from './User';
import Util from './Util';
import Dialog from './Dialog';
import Number from './Number';
import Server from './Server';
import String from './String';
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
            Browser, Calendar, Dialog, Form, Is, Number,
            Page, Request, Server, String, User, Util,
        });

        Object.entries(window.System).forEach(i => window[i[0]] = i[1]);
    }
}