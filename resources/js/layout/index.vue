<template>
    <main>
        <slot></slot>
    </main>
</template>

<script>
    import '../../css/app.css';

    export default
    {
        /**
         * Execute actions when the component is created.
         *
         */
        created()
        {
            document.querySelector('title').innerHTML = System.Page.property('title');
        },

		/**
		 * Execute actions when the component is mounted to the DOM.
		 *
		 */
		mounted()
		{
            let closure = () => System.Dialog.notification(
                System.Page.property('notification.type'),
                System.Page.property('notification.message')
            );

            System.Util.when(System.Page.property('notification'), closure);
		},
    }
</script>