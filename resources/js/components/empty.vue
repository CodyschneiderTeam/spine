<template>
    <div v-if="visible"
         class="ui-empty border border-dashed border-gray-300 w-full flex flex-col justify-center items-center rounded p-8 md:p-12">

        <!-- Icon -->
        <i :class="icon"
           v-if="! System.Util.blank(icon)"
           class="ui-icon text-40px text-sky-600/[.60] pt-1 mb-7">
        </i>

        <!-- Title -->
        <span class="ui-title font-native font-semibold text-18px text-gray-800 -tracking-[.3px] mb-5px">
            {{ title }}
        </span>

        <!-- Message -->
        <span class="ui-message text-16px text-gray-700 text-center leading-normal max-w-450px">
            {{ message }}
        </span>

        <!-- Action -->
        <span @click="actionCommand()"
              v-if="! System.Util.blank(actionLabel) && ! System.Util.blank(actionCommand)"
              class="ui-action font-semibold text-13px text-sky-600 hover:text-rose-700 uppercase cursor-pointer animated mt-5">

            <!-- Text -->
            {{ actionLabel }}

        </span>

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
            'actionCommand' : { type : Function, default : null },
            'actionLabel'   : { type : String,   default : '' },
			'icon'          : { type : String,   default : 'fas fa-cubes' },
			'message'       : { type : String,   default : 'There are no items to display' },
			'title'         : { type : String,   default : 'Nothing to show' },
			'visible'       : { type : Boolean,  default : false },
		},
    }
</script>