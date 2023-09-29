<template>
    <div class="bg-[#003352] w-full h-50px xl:hidden sticky top-0 z-999">
        <div class="container h-full flex justify-between items-center">

            <!-- Branding -->
            <div class="w-full flex items-center">

                <!-- Logo -->
                <img class="h-22px"
                     :src="Server.asset('images/logo.png')" />

                <!-- Product -->
                <div title="Product"
                     class="bg-white h-14px w-full ml-13px"
                     :style="`mask: url('${Server.asset('images/product.svg')}') no-repeat left center;
                              -webkit-mask: url('${Server.asset('images/product.svg')}') no-repeat left center`">
                </div>

            </div>

            <!-- Navigation -->
            <div class="flex items-center">

                <!-- Sidebar Toggle -->
                <i id="sidebar-toggle"
                   @click="() => $el.parentNode.querySelector('aside').classList.toggle('-translate-x-250px')"
                   class="fas fa-bars text-20px text-gray-500 hover:text-white cursor-pointer xl:hidden animated">
                </i>

            </div>

        </div>
    </div>
</template>