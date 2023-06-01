import { createApp } from 'vue';
import ConfirmComponent from '../components/confirm.vue';
import NotificationComponent from '../components/notification.vue';

export default class Dialog
{
    /**
     * Insert a blank container into the DOM.
     *
     */
    static #createDialogElement()
    {
        let div = document.createElement('div');

        div.id = `dialog-${parseInt(window.performance.now())}`;

        document.body.appendChild(div);

        return { container : null, id : div.id };
    }

    /**
     * Remove the open dialog from the viewport.
     *
     */
    static #closeDialog(element)
    {
        element.container._container._vnode.component.props.visible = false;

        setTimeout(() => {
            element.container.unmount();

            element.container = undefined;

            document.body.removeChild(document.getElementById(element.id));
        }, 300);
    }

    /**
     * Request that the user confirm a particular action.
     *
     */
    static confirm(title = null, summary = null)
    {
        let element = Dialog.#createDialogElement();

        return new Promise((resolve, reject) =>
        {
            element.container = createApp(ConfirmComponent, {
                summary : summary ?? 'Note that in most cases, this action is not reversible. If you need some help, then please contact support.',
                title   : title ?? 'Are you sure you wish to proceed?',
                visible : true,
                onCancel : () => {
                    resolve(false);

                    Dialog.#closeDialog(element);
                },
                onContinue : () => {
                    resolve(true);

                    Dialog.#closeDialog(element);
                },
            });

            element.container.mount(`#${element.id}`);
        });
    }

    /**
     * Advise the user that something has happened.
     *
     */
    static notification(type, message)
    {
        let element = Dialog.#createDialogElement();

        element.container = createApp(NotificationComponent, {
            message : message,
            type    : type,
        });

        element.container.mount(`#${element.id}`);

        setTimeout(() => Dialog.#closeDialog(element), 3500);
    }
}