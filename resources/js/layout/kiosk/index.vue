<template>
    <v-base class="bg-white flex flex-col lg:flex-row min-h-screen">

        <!-- Sidebar -->
        <aside class="bg-gray-50 lg:border-r border-b lg:border-b-0 border-gray-200 flex flex-col w-full lg:max-w-350px lg:h-screen lg:sticky top-0 p-12 mb-4 lg:mb-0">

            <!-- Branding -->
            <div class="flex items-center mb-10 lg:mb-16">

                <!-- Logo -->
                <img class="h-22px cursor-pointer"
                     @click="Browser.redirect(home)"
                     :src="Server.asset('images/logo.png')" />

                <!-- Product -->
                <v-svg title="Product"
                       @click="Browser.redirect(home)"
                       :source="Server.asset('images/product.svg')"
                       class="text-[#04263b] h-14px cursor-pointer ml-13px">
                </v-svg>

            </div>

            <!-- Slot -->
            <slot name="sidebar"></slot>

            <!-- Steps -->
            <div v-if="wizard.steps.length"
                 class="flex flex-col items-start mt-11 lg:mt-16">

                <!-- Step -->
                <div class="flex"
                     v-for="(step, index) in wizard.steps">

                    <!-- Indicator -->
                    <div class="flex flex-col items-center">

                        <!-- Past Circle -->
                        <div v-if="wizard.active > (index + 1)"
                             class="bg-emerald-500 flex justify-center items-center w-30px h-30px rounded-full">

                            <!-- Icon -->
                            <i class="fas fa-check text-white text-13px"></i>

                        </div>

                        <!-- Present Circle -->
                        <div v-if="wizard.active === (index + 1)"
                             class="bg-white border-2 border-sky-500 flex justify-center items-center w-30px h-30px rounded-full">

                            <!-- Number -->
                            <span class="font-semibold text-15px text-sky-600">
                                {{ index + 1 }}
                            </span>

                        </div>

                        <!-- Future Circle -->
                        <div v-if="wizard.active < (index + 1)"
                             class="bg-white border-2 border-gray-400 flex justify-center items-center w-30px h-30px rounded-full opacity-50">

                            <!-- Number -->
                            <span class="font-semibold text-15px text-gray-600">
                                {{ index + 1 }}
                            </span>

                        </div>

                        <!-- Past Line -->
                        <div class="bg-emerald-500 w-2px min-h-35px rounded-full my-6px"
                             v-if="(index !== wizard.steps.length - 1) && (wizard.active > (index + 1))">
                        </div>

                        <!-- Present Line -->
                        <div class="bg-gray-300 w-2px min-h-35px rounded-full my-6px"
                             v-if="(index !== wizard.steps.length - 1) && (wizard.active === (index + 1))">
                        </div>

                        <!-- Future Line -->
                        <div class="bg-gray-300 w-2px min-h-35px rounded-full my-6px"
                             v-if="(index !== wizard.steps.length - 1) && (wizard.active < (index + 1))">
                        </div>

                    </div>

                    <!-- Content -->
                    <div class="ml-4">

                        <!-- Label -->
                        <span class="font-semibold text-15px text-gray-600 block mb-6px">
                            {{ step.label }}
                        </span>

                        <!-- Summary -->
                        <span class="text-15px text-gray-500/80 block">
                            {{ step.summary }}
                        </span>

                    </div>

                </div>

            </div>

        </aside>

        <!-- Content -->
        <article class="flex flex-col max-w-800px p-6 lg:p-16">

            <!-- Slot -->
            <div class="flex-1">
                <slot name="article"></slot>
            </div>

            <!-- Footer -->
            <footer class="text-13px text-gray-400/70 text-center pt-10 md:pt-20">
                &copy; {{ Calendar.year() }} {{ Page.property('creator') }}. All Rights Reserved.
            </footer>

        </article>

    </v-base>
</template>

<script>
    import Base from '../base/index.vue';
    import SvgComponent from '../../components/svg.vue';

    export default
    {
        /**
         * Define the components.
         *
         */
        components : {
            'v-base' : Base,
            'v-svg'  : SvgComponent,
        },

        /**
         * Define the public properties.
         *
         */
        props : {
            'home'   : { type : String, default : 'dashboard' },
            'wizard' : { type : Object, default : {} },
        },
    }
</script>