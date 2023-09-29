<template>
    <v-layout class="flex flex-col justify-between min-h-screen">

        <!-- Mast -->
        <v-mast></v-mast>

        <!-- Section -->
        <section class="flex flex-1">

            <!-- Sidebar -->
            <v-sidebar></v-sidebar>

            <!-- Article -->
            <article class="w-full flex flex-col">

                <!-- Header -->
                <v-header :title="title"
                          :tabs="!! tabs.filter(link => link.hasOwnProperty('separator') ? link.separator : (link?.show ?? true)).length"
                          :actions="!! actions.filter(link => link.hasOwnProperty('separator') ? link.separator : (link?.show ?? true)).length">
                </v-header>

                <!-- Actions -->
                <v-actions :menu="actions">

                    <!-- Tabs -->
                    <v-tabs :menu="tabs"
                            class="lg:hidden py-10px"
                            v-if="! Browser.automated()"
                            :class="actions.filter(link => (link?.show ?? true)).length ? 'pb-7' : 'pb-18px'">
                    </v-tabs>

                    <!-- Separator -->
                    <div class="border-b border-gray-200 relative mb-14px"
                         v-if="tabs.filter(link => (link?.show ?? true)).length"
                         :class="actions.filter(link => (link?.show ?? true)).length ? 'lg:hidden' : 'hidden'">

                        <!-- Text -->
                        <span class="bg-white text-11px text-gray-400 uppercase absolute top-1/2 left-1/2 -translate-x-2/4 -translate-y-2/4 px-3">
                            Actions
                        </span>

                    </div>

                </v-actions>

                <!-- Content -->
                <div class="flex flex-col lg:flex-row flex-1 w-full max-w-[1030px]">

                    <!-- Tabs -->
                    <v-tabs :menu="tabs"
                            class="hidden lg:block px-9 py-10">
                    </v-tabs>

                    <!-- Slot -->
                    <div class="w-full p-6 md:py-7 lg:p-16">
                        <div :class="$attrs?.class ?? ''">
                            <slot></slot>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <footer class="bg-gray-50 border-t border-gray-200/80 text-13px text-gray-500/80 flex justify-center items-center py-5">
                    &copy; {{ Calendar.year() }} {{ Page.property('creator') }}. All rights reserved.
                </footer>

            </article>

        </section>

    </v-layout>
</template>

<script>
    import TabPartial from './tabs.vue';
    import MastPartial from './mast.vue';
    import Layout from '../base/index.vue';
    import HeaderPartial from './header.vue';
    import ActionPartial from './actions.vue';
    import SidebarPartial from './sidebar.vue';

    export default
    {
        /**
         * Disable attribute inheritance.
         *
         */
        inheritAttrs: false,

        /**
         * Define the components.
         *
         */
        components : {
            'v-actions' : ActionPartial,
            'v-header'  : HeaderPartial,
            'v-layout'  : Layout,
            'v-mast'    : MastPartial,
            'v-sidebar' : SidebarPartial,
            'v-tabs'    : TabPartial,
        },

        /**
         * Define the public properties.
         *
         */
        props : {
            'actions' : { type : Array,  default : [] },
            'tabs'    : { type : Array,  default : [] },
            'title'   : { type : String, default : '' },
        },
    }
</script>