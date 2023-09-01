<template>
    <div class="lg:border-r border-gray-200"
         v-if="menu.filter(link => (link?.show ?? true)).length">

        <!-- Items -->
        <template v-for="link in menu.filter(link => (link?.show ?? true))">

            <!-- Separator -->
            <div v-if="link?.separator ?? false"
                 class="border-t border-gray-300/50 pt-10 mt-10">
            </div>

            <!-- Link -->
            <div @click="link['action']()"
                 v-if="! (link?.separator ?? false)"
                 :class="isActive(link) ? 'lg:bg-sky-100/70' : ''"
                 :dusk="`tab-${link?.id ?? link.label.toLowerCase().replaceAll(' ', '-')}`"
                 class="hover:bg-gray-200/75 lg:hover:bg-sky-100/70 flex items-center min-w-175px lg:rounded-lg cursor-pointer animated group px-6 lg:px-3 py-10px lg:mb-6px">

                <!-- Icon -->
                <i class="fa-fw animated -ml-2 mr-6px lg:mr-1"
                   :class="[link.icon, isActive(link) ? 'text-gray-400 lg:text-sky-700' : 'text-gray-400 lg:text-gray-500']">
                </i>

                <!-- Label -->
                <span :class="isActive(link) ? 'lg:text-sky-800' : ''"
                      class="lg:font-medium text-gray-700 lg:text-black">

                    <!-- Text -->
                    {{ link.label }}

                </span>

            </div>

        </template>

    </div>
</template>

<script>
    export default
    {
        /**
         * Define the public properties.
         *
         */
        props : {
            'menu' : { type : Array,  default : [] },
        },

        /**
         * Define the supporting methods.
         *
         */
        methods :
        {
            /**
             * Determine if the given item is active.
             *
             */
            isActive(item)
            {
                let active = item?.active ?? null;

                if (active === null) return false;

                if (typeof active === 'boolean') return active;

                return active();
            },
        },
    }
</script>