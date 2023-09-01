<template>
    <main>
        <slot></slot>
    </main>
</template>

<script>
    import '../../../css/app.css';

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
            Util.when(Page.property('message'), () => Dialog.message(
                Page.property('message.type'),
                Page.property('message.content')
            ));
		},
    }
</script>