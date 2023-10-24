<template>
    <div class="ui-table">

        <!-- Search -->
        <v-search v-if="search"
                  :source="source"
                  :visible="search"
                  @closed="search = false">
        </v-search>

        <!-- Paginator -->
        <v-paginator class="mb-5"
                     v-if="toolbar"
                     :filter="filter"
                     :source="source"
                     :filterKey="filterKey"
                     :filterTitle="filterTitle"
                     :reset="!! Browser.queryString('search')"
                     :search="hideSearch ? null : () => search = true"
                     :class="(source.data.rows ?? []).length ? 'lg:hidden' : ''">
        </v-paginator>

        <!-- Content -->
        <div class="ui-content mb-4"
             v-if="(source.data.rows ?? []).length">

            <!-- Table -->
            <table>

                <!-- Head -->
                <thead>
                    <tr>

                        <!-- Columns -->
                        <th v-for="column in source.data.columns"
                            :class="[
                                column.label === 'Actions' ? 'pr-0' : '',
                                column.align ? column.align : (column.label === 'Actions' ? 'text-right' : 'text-center first-of-type:text-left first-of-type:pl-0'),
                            ]">

                            <!-- Column -->
                            {{ column.label === 'Actions' ? '' : column.label }}

                            <!-- Paginator -->
                            <v-paginator :metrics="false"
                                         :filter="filter"
                                         :source="source"
                                         class="-top-3px"
                                         :filterKey="filterKey"
                                         :filterTitle="filterTitle"
                                         :reset="!! Browser.queryString('search')"
                                         :search="hideSearch ? null : () => search = true"
                                         v-if="toolbar && controls && column.label === 'Actions'">
                            </v-paginator>

                            <!-- Controls -->
                            <i @click="controls = true"
                               v-if="toolbar && ! controls && column.label === 'Actions'"
                               class="far fa-cog text-gray-800/50 hover:text-sky-600/70 cursor-pointer animated">
                            </i>

                        </th>

                    </tr>
                </thead>

                <!-- Body -->
                <tbody>

                    <!-- Row -->
                    <tr :key="row[rowKey]"
                        v-for="row in source.data.rows ?? []"
                        :dusk="`ui-table-row-${row[rowKey]}`"
                        :class="Util.blank(action) ? '' : 'cursor-pointer'"
                        @click="! Util.blank(action) && ! $event.target.parentNode.classList.contains('ui-trigger') ? action(row) : null">

                        <!-- Cell -->
                        <td :data-title="column.label"
                            v-for="column in source.data.columns"
                            :dusk="`ui-table-row-${row[rowKey]}-cell-${column.label.toLowerCase().replaceAll(' ', '_')}`"
                            :class="[
                                column.styles,
                                column.label === 'Actions' ? 'lg:w-50px lg:min-w-50px lg:max-w-50px lg:pr-0' : 'lg:max-w-300px',
                                column.align ? column.align : 'text-right lg:text-center first-of-type:lg:text-left first-of-type:lg:pl-0',
                            ]">

                            <!-- Slot -->
                            <slot :item="row"
                                  :name="column.label.toLowerCase().replaceAll(' ', '').replaceAll('.', '_')">
                            </slot>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        <!-- Empty -->
        <v-empty class="mt-6 mb-5"
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
                     :reset="!! Browser.queryString('search')"
                     :search="hideSearch ? null : () => search = true">
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
            controls : false,
            search   : null,
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
            'hideSearch'   : { type : Boolean,  default : false },
            'rowKey'       : { type : String,   default : 'id' },
            'source'       : { type : Object,   default : {} },
            'toolbar'      : { type : Boolean,  default : true },
        },
    }
</script>