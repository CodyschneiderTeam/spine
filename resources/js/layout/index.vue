<template>
    <main>
        <slot></slot>
    </main>
</template>

<script>
    export default
    {
        /**
         * Execute actions when the component is created.
         *
         */
        created()
        {
            document.querySelector('title').innerHTML = this.prop('title');
        },

		/**
		 * Execute actions when the component is mounted to the DOM.
		 *
		 */
		mounted()
		{
            this.when(
                this.prop('notification'),
                () => this.notify(this.prop('notification.type'), this.prop('notification.message'))
            );
		},
    }
</script>