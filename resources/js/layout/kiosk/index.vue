<template>
    <v-base class="bg-white md:bg-gray-50 flex flex-col justify-center items-center min-h-screen">
        <section class="w-full md:w-625px flex flex-col justify-center items-center flex-1 md:flex-initial md:py-22">

            <!-- Content -->
            <article class="bg-white md:border border-gray-300/75 flex-1 rounded-lg text-center p-6 pt-10 md:p-100px">

                <!-- Logo -->
                <img class="w-40px mx-auto mb-7"
                     :src="Server.asset('images/logo.png')" />

                <!-- Slot -->
                <slot></slot>

            </article>

            <!-- Footer -->
            <footer class="bg-gray-50 border-t md:border-t-0 border-gray-200 w-full text-13px text-gray-400/80 text-center py-5 md:pb-0 md:mt-2">
                &copy; {{ Calendar.year() }} {{ Page.property('creator') }}. All Rights Reserved.
            </footer>

        </section>
    </v-base>
</template>

<script>
    import Base from '../base/index.vue';

    export default
    {
        /**
         * Define the components.
         *
         */
        components : {
            'v-base' : Base,
        },
    }
</script>