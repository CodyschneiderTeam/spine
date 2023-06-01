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
            document.querySelector('title').innerHTML = Page.property('title');
        },

		/**
		 * Execute actions when the component is mounted to the DOM.
		 *
		 */
		mounted()
		{
            let closure = () => Dialog.notification(
                Page.property('notification.type'),
                Page.property('notification.message')
            );

            Util.when(Page.property('notification'), closure);
		},
    }
</script>