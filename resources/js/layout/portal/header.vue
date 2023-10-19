<template>
    <header class="bg-gray-100 border-b border-gray-200 h-50px xl:h-60px flex justify-between items-center sticky top-50px xl:top-0 z-997 px-6">

        <!-- Breadcrumbs -->
        <h3 class="font-medium text-17px xl:text-18px flex-1 -mb-3px xl:-mb-1px">
            <template v-for="(element, index) in title.split(' -- ')">

                <!-- Element -->
                {{ element }}

                <!-- Arrow -->
                <i v-if="index !== title.split(' -- ').length - 1"
                   class="fas fa-arrow-right text-13px text-gray-400 relative -top-1px mx-1 md:mx-2">
                </i>

            </template>
        </h3>

        <!-- User Impersonation -->
        <div v-if="Page.property('impersonation')"
             @click="Form.submit(Form.create(), 'administration.impersonation.delete', 'delete')"
             class="bg-red-100/80 hover:bg-red-200/80 border border-red-700 font-medium text-13px text-red-700 hover:text-red-800 uppercase rounded cursor-pointer animated px-3 pt-2 pb-7px mr-6">

            <!-- Text -->
            Stop Impersonating

        </div>

        <!-- Action Menu Toggle -->
        <i v-if="actions || tabs"
           id="action-menu-toggle"
           :class="actions ? '' : 'lg:hidden'"
           class="fas fa-bars text-20px text-gray-500 hover:text-gray-800 cursor-pointer relative top-1px xl:top-0 animated"
           @click="() => ['opacity-none', 'scale-90', 'pointer-events-none'].map(v => $el.parentNode.querySelector('nav').classList.toggle(v))">
        </i>

    </header>
</template>

<script>
    export default
    {
        /**
         * Define the public properties.
         *
         */
        props : {
            'actions' : { type : Boolean, default : false },
            'tabs'    : { type : Boolean, default : false },
            'title'   : { type : String,  default : '' },
        },
    }
</script>