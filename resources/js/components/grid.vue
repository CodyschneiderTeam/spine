<template>
    <div class="ui-grid lg:pt-13px">

        <!-- Search -->
        <v-search v-if="search"
                  :source="source"
                  :visible="search"
                  @closed="search = false">
        </v-search>

        <!-- Paginator -->
        <v-paginator class="mb-7"
                     v-if="toolbar"
                     :filter="filter"
                     :source="source"
                     :filterKey="filterKey"
                     :filterTitle="filterTitle"
                     :search="() => search = true"
                     :reset="!! Browser.queryString('search')">
        </v-paginator>

        <!-- Content -->
        <div :class="layout"
             v-if="(source.data.rows ?? []).length"
             class="grid grid-cols-1 gap-4 mb-22px">

            <!-- Item -->
            <div :key="row[rowKey]"
                 class="ui-grid-item"
                 :dusk="`ui-grid-item-${row[rowKey]}`"
                 v-for="(row, index) in source.data.rows ?? []"
                 :class="Util.blank(action) ? '' : 'cursor-pointer'"
                 @click="! Util.blank(action) && ! $event.target.parentNode.classList.contains('ui-trigger') ? action(row) : null">

                <!-- Slot -->
                <slot :item="row"
                      :index="index"
                      :total="source.data.rows?.length ?? 0">
                </slot>

            </div>

        </div>

        <!-- Empty -->
        <v-empty class="mb-22px"
                 :message="emptyMessage"
                 :actionLabel="emptyLabel"
                 :actionCommand="emptyAction"
                 :visible="! (source.data.rows ?? []).length">
        </v-empty>

        <!-- Paginator -->
        <v-paginator v-if="toolbar"
                     :filter="filter"
                     :source="source"
                     :filterKey="filterKey"
                     :filterTitle="filterTitle"
                     :search="() => search = true"
                     :reset="!! Browser.queryString('search')">
        </v-paginator>

    </div>
</template>

<script>
    import EmptyComponent from './empty.vue';
    import SearchComponent from './search.vue';
    import PaginatorComponent from './paginator.vue';

    export default
    {
        /**
         * Define the components.
         *
         */
        components : {
            'v-empty'     : EmptyComponent,
            'v-paginator' : PaginatorComponent,
            'v-search'    : SearchComponent,
        },

        /**
         * Define the data model.
         *
         */
        data() { return {
            search : null,
        }},

        /**
         * Define the public properties.
         *
         */
        props : {
            'action'       : { type : Function, default : null },
            'emptyAction'  : { type : Function, default : null },
            'emptyLabel'   : { type : String,   default : 'Create one now' },
            'emptyMessage' : { type : String,   default : '' },
            'filter'       : { type : Function, default : null },
            'filterKey'    : { type : String,   default : 'filter' },
            'filterTitle'  : { type : String,   default : '' },
            'layout'       : { type : String,   default : 'md:grid-cols-2' },
            'rowKey'       : { type : String,   default : 'id' },
            'source'       : { type : Object,   default : {} },
            'toolbar'      : { type : Boolean,  default : true },
        },
    }
</script>