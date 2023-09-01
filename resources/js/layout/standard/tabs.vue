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
                 :class="isActive(link) ? 'bg-sky-100/70' : 'hover:bg-sky-100/70'"
                 :dusk="`tab-${link?.id ?? link.label.toLowerCase().replaceAll(' ', '-')}`"
                 class="flex items-center min-w-175px rounded-lg cursor-pointer animated group px-3 py-10px mb-6px">

                <!-- Icon -->
                <i class="fa-fw animated -ml-2 mr-1"
                   :class="[link.icon, isActive(link) ? 'text-sky-700' : 'text-gray-500 group-hover:text-sky-700']">
                </i>

                <!-- Label -->
                <span class="font-medium text-black"
                      :class="isActive(link) ? 'text-sky-800' : 'text-black-500 group-hover:text-sky-800'">

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