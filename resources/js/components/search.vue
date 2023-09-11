<template>
    <v-aside :visible="visible"
             @closed="$emit('closed')">

        <!-- Header -->
        <template #header>

            <!-- Icon -->
            <div class="bg-purple-500/20 flex justify-center items-center w-50px h-50px rounded-full mx-auto mb-6">
                <i class="far fa-search text-20px text-purple-600/80"></i>
            </div>

            <!-- Title -->
            <h4 class="text-center mb-4">
                Filter and sort records
            </h4>

            <!-- Information -->
            <p class="text-center mb-0">
                Use the fields below to filter by one or more criteria.
                You can sort the results in ascending or descending order.
            </p>

        </template>

        <!-- Content -->
        <template #content>

            <!-- Controls -->
            <div :key="field.id"
                 v-for="field in source.search.filtering.filter(i => i?.show ?? true)">

                <!-- TextBox -->
                <v-textbox class="mb-10"
                           v-model="form[field.id]"
                           :error="form.errors[field.id]"
                           :placeholder="`Filter by ${field.label.toLowerCase()}`"
                           :labelTitle="Text.capitalize(field.label.toLowerCase())"
                           v-if="! Is.array(field.control) && field.control === 'TextBox'"
                           :id="`search_${field.label.toLowerCase().replaceAll(' ', '_')}`">
                </v-textbox>

                <!-- DropDown -->
                <v-dropdown class="mb-10"
                            itemValueKey="id"
                            itemTextKey="label"
                            v-model="form[field.id]"
                            :error="form.errors[field.id]"
                            :items="Page.property(field.control[1])"
                            :placeholder="`Filter by ${field.label.toLowerCase()}`"
                            :labelTitle="Text.capitalize(field.label.toLowerCase())"
                            :id="`search_${field.label.toLowerCase().replaceAll(' ', '_')}`"
                            v-if="Is.array(field.control) && field.control[0] === 'DropDown'">
                </v-dropdown>

                <!-- Calendar -->
                <v-calendar type="date"
                            class="mb-10"
                            v-model="form[field.id]"
                            :error="form.errors[field.id]"
                            :labelTitle="Text.capitalize(field.label.toLowerCase())"
                            :id="`search_${field.label.toLowerCase().replaceAll(' ', '_')}`"
                            v-if="! Is.array(field.control) && field.control === 'Calendar'">
                </v-calendar>

            </div>

            <!-- Ordering -->
            <v-dropdown class="mb-10"
                        itemValueKey="id"
                        itemTextKey="label"
                        labelTitle="Order by"
                        :items="source.search.ordering"
                        placeholder="Select a field..."
                        v-if="source.search.ordering.length"
                        v-model="form[source.search.order_key]"
                        :id="`search_${source.search.order_key}`"
                        :error="form.errors[source.search.order_key]">
            </v-dropdown>

            <!-- Footer -->
            <div class="flex flex-col md:flex-row"
                 :class="isBeingUsed() ? 'justify-between' : 'justify-end'">

                <!-- Reset -->
                <v-button color="gray"
                          id="reset-search"
                          labelTitle="Reset"
                          v-if="isBeingUsed()"
                          class="mb-4 md:mb-0"
                          @click="Form.submit(Form.create(), url(), 'get', { preserveScroll : true }, true)">
                </v-button>

                <!-- Actions -->
                <div class="flex flex-col-reverse md:flex-row md:justify-end">

                    <!-- Cancel -->
                    <v-button mode="link"
                              color="gray"
                              id="cancel-search"
                              labelTitle="Cancel"
                              @click="visible = false"
                              class="mt-2 -mb-2 md:mt-0 md:mb-0 md:mr-4">
                    </v-button>

                    <!-- Search -->
                    <v-button id="run-search"
                              labelTitle="Search"
                              :processing="form.processing"
                              @click="Form.submit(form, url(), 'get', { preserveScroll : true }, true)">
                    </v-button>

                </div>

            </div>

        </template>

    </v-aside>
</template>

<script>
    import AsideComponent from './aside.vue';
    import ButtonComponent from './button.vue';
    import TextBoxComponent from './textbox.vue';
    import CalendarComponent from './calendar.vue';
    import DropDownComponent from './dropdown.vue';

    export default
    {
        /**
         * Define the components.
         *
         */
        components : {
            'v-aside'    : AsideComponent,
            'v-button'   : ButtonComponent,
            'v-calendar' : CalendarComponent,
            'v-dropdown' : DropDownComponent,
            'v-textbox'  : TextBoxComponent,
        },

        /**
         * Define the events.
         *
         */
        emits : ['closed'],

        /**
         * Define the data model.
         *
         */
        data() { return {
            form : { },
        }},

        /**
         * Define the public properties.
         *
         */
        props : {
            'source'  : { type : Object,  default : {} },
            'visible' : { type : Boolean, default : false },
        },

        /**
         * Execute actions when the component is created.
         *
         */
        created()
        {
            let attributes = { search : true };

            attributes[this.source.search.order_key] = Browser.queryString(this.source.search.order_key)
                ? parseInt(Browser.queryString(this.source.search.order_key))
                : '';

            this.source.search.filtering.forEach(field => {
                attributes[field.id] = Is.array(field.control) && field.control[0] === 'DropDown'
                    ? parseInt(Browser.queryString(field.id))
                    : Browser.queryString(field.id);
            });

            this.form = Form.create(attributes);
        },

        /**
         * Define the supporting methods.
         *
         */
        methods :
        {
            /**
             * Determine if the page is using the search form.
             *
             */
            isBeingUsed()
            {
                if (Browser.queryString(this.source.search.order_key)) {
                    return true;
                }

                return !! this.source.search.filtering
                    .map(field => Browser.queryString(field.id))
                    .filter(field => field)
                    .length;
            },

            /**
             * Generate the URL to send the request to.
             *
             */
            url()
            {
                return `${window.location.origin}${window.location.pathname}`
            },
        },
    }
</script>