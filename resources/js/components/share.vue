<template>
    <v-modal class="ui-share"
             :visible="visible"
             @closed="$emit('closed')">

        <!-- Circle -->
        <div class="ui-circle bg-emerald-500/[.20] h-60px w-60px flex justify-center items-center rounded-full mx-auto mb-6">
            <i class="ui-icon fas fa-share text-30px text-emerald-700/[.60]"></i>
        </div>

        <!-- Title -->
        <div class="font-native ui-header font-bold text-21px text-gray-900 text-center leading-snug mb-4">
            Share a link with others
        </div>

        <!-- Information -->
        <div class="ui-summary text-17px text-gray-600/90 text-center leading-[1.6rem] max-w-475px mb-8">
            Select one of the platforms to share the link on.
            You can also send the link via email, or
            copy it to the clipboard.
        </div>

        <!-- Platforms -->
        <div class="ui-platforms grid grid-cols-1 md:grid-cols-2 gap-3">

            <!-- Twitter -->
            <div @click="visit(`https://twitter.com/intent/tweet?url=${url}`)"
                 class="ui-twitter bg-white hover:bg-orange-100/[.25] border border-gray-300 flex items-center animated rounded-md cursor-pointer group px-6 py-3">

                <!-- Icon -->
                <i class="ui-icon w-31px min-w-31px max-w-31px fa-fw fab fa-twitter text-18px text-sky-500 -ml-4"></i>

                <!-- Text -->
                <span class="ui-text font-medium text-15px text-gray-700 ml-5px">
                    Share on Twitter
                </span>

            </div>

            <!-- Facebook -->
            <div @click="visit(`https://www.facebook.com/sharer/sharer.php?u=${url}`)"
                 class="ui-facebook bg-white hover:bg-orange-100/[.25] border border-gray-300 flex items-center animated rounded-md cursor-pointer group px-6 py-3">

                <!-- Icon -->
                <i class="ui-icon w-31px min-w-31px max-w-31px fa-fw fab fa-facebook text-18px text-blue-800/[.80] -ml-4"></i>

                <!-- Text -->
                <span class="ui-text font-medium text-15px text-gray-700 ml-5px">
                    Share on Facebook
                </span>

            </div>

            <!-- Reddit -->
            <div @click="visit(`https://reddit.com/submit?url=${url}`)"
                 class="ui-reddit bg-white hover:bg-orange-100/[.25] border border-gray-300 flex items-center animated rounded-md cursor-pointer group px-6 py-3">

                <!-- Icon -->
                <i class="ui-icon w-31px min-w-31px max-w-31px fa-fw fab fa-reddit-alien text-18px text-red-700/[.80] -ml-4"></i>

                <!-- Text -->
                <span class="ui-text font-medium text-15px text-gray-700 ml-5px">
                    Share on Reddit
                </span>

            </div>

            <!-- LinkedIn -->
            <div @click="visit(`https://www.linkedin.com/shareArticle?mini=true&url=${url}`)"
                 class="ui-linkedIn bg-white hover:bg-orange-100/[.25] border border-gray-300 flex items-center animated rounded-md cursor-pointer group px-6 py-3">

                <!-- Icon -->
                <i class="ui-icon w-31px min-w-31px max-w-31px fa-fw fab fa-linkedin text-18px text-blue-800/[.80] -ml-4"></i>

                <!-- Text -->
                <span class="ui-text font-medium text-15px text-gray-700 ml-5px">
                    Share on LinkedIn
                </span>

            </div>

            <!-- Email -->
            <div @click="email()"
                 class="ui-email bg-white hover:bg-orange-100/[.25] border border-gray-300 flex items-center animated rounded-md cursor-pointer group px-6 py-3">

                <!-- Icon -->
                <i class="ui-icon w-31px min-w-31px max-w-31px fa-fw fas fa-envelope text-16px text-emerald-600/[.80] relative top-1px -ml-4"></i>

                <!-- Text -->
                <span class="ui-text font-medium text-15px text-gray-700 ml-5px">
                    Send via email
                </span>

            </div>

            <!-- Copy -->
            <div @click.stop="() => System.Util.copy(url, () => $refs.copy_text.innerHTML = 'Copied!')"
                 class="ui-copy bg-white hover:bg-orange-100/[.25] border border-gray-300 flex items-center animated rounded-md cursor-pointer group px-6 py-3">

                <!-- Icon -->
                <i class="ui-icon w-31px min-w-31px max-w-31px fa-fw fas fa-link text-14px text-gray-500 relative top-1px -ml-4"></i>

                <!-- Text -->
                <span ref="copy_text"
                      class="ui-text font-medium text-15px text-gray-600 ml-5px">

                    <!-- Text -->
                    Copy to clipboard

                </span>

            </div>

        </div>

    </v-modal>
</template>

<script>
    import ModalComponent from './modal.vue';

    export default
    {
        /**
         * Define the components.
         *
         */
        components : {
            'v-modal' : ModalComponent,
        },

        /**
         * Define the events.
         *
         */
        emits : ['closed'],

        /**
         * Define the public properties.
         *
         */
        props : {
            'url'     : { type : String,  default : '' },
			'visible' : { type : Boolean, default : false },
        },

		/**
		 * Define the supporting methods.
		 *
		 */
		methods:
        {
			/**
			 * Send the url via email.
			 *
			 */
			email()
			{
                window.location.href = `mailto:?body=${this.url}`;
			},

			/**
			 * Share the url on the given platform.
			 *
			 */
			visit(platform)
			{
                let popup = window.open('', '_blank', 'width=550,height=420');

                popup.opener = null;

                popup.location = platform;
			},
        }
    }
</script>