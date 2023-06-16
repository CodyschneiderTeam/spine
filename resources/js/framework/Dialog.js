import { createApp } from 'vue';
import HintComponent from '../components/hint.vue';
import NoticeComponent from '../components/notice.vue';
import ConfirmComponent from '../components/confirm.vue';
import MessageComponent from '../components/message.vue';

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
     * Remove the open dialog from the view-port.
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
                summary : summary ?? 'In most cases, this action is not reversible. If you need some help, then please contact support.',
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
     * Provide further context to the user.
     *
     */
    static hint(title, summary)
    {
        let element = Dialog.#createDialogElement();

        element.container = createApp(HintComponent, {
            summary : summary,
            title   : title,
            visible : true,
            onClose : () => Dialog.#closeDialog(element),
        });

        element.container.mount(`#${element.id}`);
    }

    /**
     * Notify the user about something.
     *
     */
    static message(type, content)
    {
        let element = Dialog.#createDialogElement();

        element.container = createApp(MessageComponent, {
            content : content,
            type    : type,
        });

        element.container.mount(`#${element.id}`);

        setTimeout(() => Dialog.#closeDialog(element), 3500);
    }

    /**
     * Display some information to the user.
     *
     */
    static notice(title, summary, content)
    {
        let element = Dialog.#createDialogElement();

        element.container = createApp(NoticeComponent, {
            content : content,
            summary : summary,
            title   : title,
            visible : true,
            onClose : () => Dialog.#closeDialog(element),
        });

        element.container.mount(`#${element.id}`);
    }
}