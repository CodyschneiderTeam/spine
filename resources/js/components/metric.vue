<template>
    <div :id="id"
         :dusk="id"
         class="ui-metric bg-white border border-gray-200 w-full flex flex-col rounded-lg relative p-6">

        <!-- Label -->
        <span class="ui-label font-medium text-13px text-gray-500/90 uppercase mb-4">
            {{ labelTitle }}
        </span>

        <!-- Summary -->
        <div class="ui-summary flex items-center">

            <!-- Current -->
            <span class="ui-current font-semibold text-30px text-gray-700 mr-6">
                {{ formatted }}
            </span>

            <!-- Performance -->
            <div class="ui-performance flex flex-col"
                 :class="Util.blank(previous) ? 'invisible' : ''">

                <!-- Direction -->
                <div class="ui-direction flex items-center font-semibold">
                    <div :class="trends[direction].color"
                         class="flex items-center gap-2 rounded-full px-2 py-3px">

                        <!-- Icon -->
                        <i :class="trends[direction].icon"
                           class="ui-icon fas text-13px">
                        </i>

                        <!-- Percentage -->
                        <span class="ui-percentage text-13px whitespace-nowrap">
                            {{ Math.abs(percentage) > 999 ? '999' : Math.abs(percentage) }}%
                        </span>

                    </div>
                </div>

                <!-- Period -->
                <span class="ui-period font-medium text-13px text-gray-500/80 whitespace-nowrap pl-2px pt-5px">
                    vs. {{ period }}
                </span>

            </div>

        </div>

        <!-- Hint -->
        <i v-if="hintTitle"
           @click="Dialog.hint(hintTitle, hintSummary)"
           class="ui-hint-icon far fa-circle-info text-14px text-emerald-600 cursor-pointer absolute top-3 right-11px"></i>

    </div>
</template>

<script>
    export default
    {
        /**
         * Define the data model.
         *
         */
        data() { return {
            trends : {
                down : {
                    color : 'bg-rose-50 text-rose-600/90',
                    icon  : 'fa-arrow-trend-down',
                },
                same : {
                    color : 'bg-sky-50 text-sky-600',
                    icon  : 'fa-arrows-rotate',
                },
                up : {
                    color : 'bg-emerald-50 text-emerald-600/90',
                    icon  : 'fa-arrow-trend-up',
                },
            }
        }},

        /**
         * Define the public properties.
         *
         */
        props : {
            'id'          : { type : String,           default : '' },
            'currency'    : { type : String,           default : 'USD' },
            'current'     : { type : [String, Number], default : 0 },
            'hintSummary' : { type : String,           default : '' },
            'hintTitle'   : { type : String,           default : '' },
            'labelTitle'  : { type : String,           default : 'Label' },
            'locale'      : { type : String,           default : 'en-US' },
            'period'      : { type : String,           default : '' },
            'previous'    : { type : Number,           default : null },
            'type'        : { type : String,           default : 'integer' },
        },

        /**
         * Define the computed properties.
         *
         */
        computed :
        {
            /**
             * Determine if the current figure is up, down or the same as the previous period.
             *
             */
            direction()
            {
                return this.percentage === 0 ? 'same' : (this.percentage > 0 ? 'up' : 'down');
            },

            /**
             * Format the current figure accordingly.
             *
             */
            formatted()
            {
                let digits = this.current < 1000 ? 0 :
                             this.current < 10000 ? 2 :
                             this.current < 100000 ? 1 :
                             this.current < 1000000 ? 0 : 2;

                let options = {
                    compactDisplay        : 'short',
                    notation              : 'compact',
                    roundingMode          : 'floor',
                    minimumFractionDigits : digits,
                    maximumFractionDigits : digits,
                };

                if (this.type === 'unformatted') {
                    return this.current;
                }

                if (this.type === 'financial') {
                    options.currency = this.currency;
                    options.style    = 'currency';
                }

                return new Intl.NumberFormat(this.locale, options).format(this.current);
            },

            /**
             * Calculate the difference between the current and previous values.
             *
             */
            percentage()
            {
                return this.current === 0 && this.previous === 0 ? 0 :
                    Math.floor(((this.current - this.previous) / this.previous) * 100);
            },
        },
    }
</script>