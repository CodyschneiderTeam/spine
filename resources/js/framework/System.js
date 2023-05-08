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
import DateTime from './DateTime';

export default class System
{
    /**
     * Configure the system framework.
     *
     */
    static configure(features = {})
    {
        window.System = Object.assign({}, features, {
            Browser,
            DateTime,
            Dialog,
            Form,
            Is,
            Number,
            Page,
            Request,
            Server,
            String,
            User,
            Util,
        });
    }
}