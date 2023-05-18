<template>
    <div class="ui-table">

        <!-- Paginator -->
        <v-paginator class="mb-4"
                     v-if="toolbar"
                     :filter="filter"
                     :source="source"
                     :download="download"
                     :filterTitle="filterTitle"
                     :reset="!! System.Browser.queryString('search')"
                     :search="() => search = (search !== null) ? ! search : (System.Browser.queryString('search') ? false : true)">
        </v-paginator>

        <!-- Content -->
        <div class="lg:border border-gray-300/[.70] rounded">

            <!-- Table -->
            <table>

                <!-- Head -->
                <thead>
                    <tr>

                        <!-- Columns -->
                        <th v-for="column in source.data.columns"
                            :class="column.align ? column.align : 'text-center first-of-type:text-left'">

                            <!-- Column -->
                            {{ (column?.desktop ?? true) ? column.label : '' }}

                        </th>

                    </tr>
                </thead>

                <!-- Body -->
                <tbody>

                    <!-- Search Row -->
                    <tr class="search"
                        v-if="search ? true : (search === null ? System.Browser.queryString('search') : false)">

                        <!-- Cell -->
                        <td :colspan="source.data.columns.length">
                            <v-search :source="source"
                                      @closed="search = false">
                            </v-search>
                        </td>

                    </tr>

                    <!-- Content Row -->
                    <tr :key="row[rowKey]"
                        v-for="row in source.data.rows ?? []"
                        :dusk="`ui-table-row-${row[rowKey]}`"
                        :class="System.Util.blank(action) ? '' : 'cursor-pointer'"
                        @click="! System.Util.blank(action) && ! $event.target.parentNode.classList.contains('ui-trigger') ? action(row) : null">

                        <!-- Cell -->
                        <td :data-title="column.label"
                            v-for="column in source.data.columns"
                            :class="[
                                column.styles,
                                column.align ? column.align : 'text-right lg:text-center first-of-type:lg:text-left',
                                column.label === 'Actions' ? 'lg:w-90px lg:min-w-90px lg:max-w-90px lg:pr-0' : 'lg:max-w-250px',
                            ]">

                            <!-- Slot -->
                            <slot :item="row"
                                  :name="column.label.toLowerCase().replaceAll(' ', '')">
                            </slot>

                        </td>

                    </tr>

                </tbody>

            </table>

            <!-- Empty -->
            <v-empty class="lg:border-0"
                     :message="emptyMessage"
                     :actionLabel="emptyLabel"
                     :actionCommand="emptyAction"
                     :visible="! (source.data.rows ?? []).length">
            </v-empty>

        </div>

        <!-- Paginator -->
        <v-paginator v-if="toolbar"
                     :source="source">
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
            'download'     : { type : Function, default : null },
            'emptyAction'  : { type : Function, default : null },
            'emptyLabel'   : { type : String,   default : 'Create one now' },
            'emptyMessage' : { type : String,   default : '' },
            'filter'       : { type : Function, default : null },
            'filterKey'    : { type : String,   default : 'filter' },
            'filterTitle'  : { type : String,   default : '' },
            'rowKey'       : { type : String,   default : 'id' },
            'source'       : { type : Object,   default : {} },
            'toolbar'      : { type : Boolean,  default : true },
        },
    }
</script>

<style lang="postcss">
    .ui-table .ui-badge .ui-content-opaque { @apply inline }
</style>