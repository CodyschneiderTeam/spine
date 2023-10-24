<template>
    <div class="ui-calendar"
         :class="selectors.date || selectors.time ? 'ui-open' : ''">

        <!-- Hidden -->
        <input :id="name"
               :name="name"
               type="hidden"
               :value="modelValue">

        <!-- TextBox -->
        <v-textbox :readOnly="true"
                   @change="clear()"
                   :optional="optional"
                   :modelValue="format"
                   :labelTitle="labelTitle"
                   :id="`${name}_text_box`"
                   @click="showSelectors()"
                   :dusk="`${name}_text_box`"
                   :optionalText="optionalText"
                   :labelSummary="labelSummary"
                   placeholder="Select a date...">
        </v-textbox>

        <!-- Container -->
        <div v-if="selectors.date || selectors.time"
             class="ui-container bg-white border-l border-r border-b border-sky-500 rounded-b relative -top-3px pt-3px">

            <!-- Divider -->
            <div class="ui-divider border-t border-sky-500 w-full h-1px"></div>

            <!-- Date Selector -->
            <div v-if="selectors.date"
                 class="ui-selector-date bg-gray-100/25 p-6 pt-5">

                <!-- Head -->
                <div class="ui-header flex items-center mb-4">

                    <!-- Back -->
                    <i title="Go to previous month"
                       @click="goToPreviousMonth()"
                       class="ui-caret-left fas fa-caret-left text-gray-400 hover:text-gray-600 animated cursor-pointer">
                    </i>

                    <!-- Month & Year -->
                    <div class="ui-selector-month-year flex justify-center flex-1">

                        <!-- Month -->
                        <select :id="`${name}_select_month`"
                                :name="`${name}_select_month`"
                                :dusk="`${name}_select_month`"
                                @change="luxon = luxon.set({ month : $event.target.value })"
                                class="ui-selector-month bg-inherit font-semibold text-15px text-gray-800 leading-normal appearance-none pr-2px">

                            <!-- Options -->
                            <option :key="index"
                                    :value="index"
                                    v-for="(month, index) in months"
                                    :selected="index === luxon.month">

                                <!-- Text -->
                                {{ months[index - 1] }}

                            </option>

                        </select>

                        <!-- Year -->
                        <select :id="`${name}_select_year`"
                                :name="`${name}_select_year`"
                                :dusk="`${name}_select_year`"
                                @change="luxon = luxon.set({ year : $event.target.value })"
                                class="ui-selector-year bg-inherit font-semibold text-15px text-gray-800 leading-normal appearance-none">

                            <!-- Options -->
                            <option :key="year"
                                    :value="year"
                                    v-for="year in years"
                                    :selected="year === luxon.year">

                                <!-- Text -->
                                {{ year }}

                            </option>

                        </select>

                    </div>

                    <!-- Forward -->
                    <i title="Go to next month"
                       @click="goToNextMonth()"
                       class="ui-caret-right fas fa-caret-right text-gray-400 hover:text-gray-600 animated cursor-pointer">
                    </i>

                </div>

                <!-- Week -->
                <div class="ui-week grid grid-cols-7 -mx-10px">

                    <!-- Day -->
                    <span :key="day"
                          v-for="day in week"
                          class="ui-week-day text-12px text-gray-500/80 text-center">

                        <!-- Text -->
                        {{ day }}

                    </span>

                </div>

                <!-- Days -->
                <div class="ui-days grid grid-cols-7 gap-y-4 pt-4 -mx-10px">

                    <!-- Day -->
                    <div v-for="day in daysInMonth"
                         @click="selectDate(day.date)"
                         class="ui-day flex justify-center"
                         :dusk="`${name}_select_day_${day.ordinal}`"
                         :class="day.enabled ? 'text-gray-700 cursor-pointer group' : 'text-gray-300 pointer-events-none'">

                        <!-- Ordinal -->
                        <div class="ui-ordinal text-15px text-center h-28px w-28px rounded-full pt-6px pb-4px"
                             :class="[
                                day.today ? 'font-semibold text-sky-600' : '',
                                day.selected ? 'bg-emerald-600/30' : 'group-hover:bg-emerald-600/30'
                            ]">

                            <!-- Text -->
                            {{ day.ordinal }}

                        </div>

                    </div>

                </div>

            </div>

            <!-- Divider -->
            <div v-if="selectors.date && selectors.time"
                 class="ui-divider border-t border-gray-300 w-full h-1px"></div>

            <!-- Time Selector -->
            <div v-if="selectors.time"
                 class="ui-selector-time bg-gray-100/25 flex flex-col justify-between items-center p-6 pb-18px">

                <!-- Time Zone -->
                <div :title="`UTC ${luxon.toFormat('Z')}`"
                     class="ui-zone font-medium text-13px text-gray-500 truncate basis-full mb-1">

                    <!-- Text -->
                    {{ luxon.toFormat('ZZZZZ') }}

                </div>

                <!-- Hour, Minute, Seconds -->
                <div class="ui-selector-minute-hour-second flex items-center">

                    <!-- Hour -->
                    <select ref="selector_hour"
                            @change="selectTime()"
                            :id="`${name}_select_hour`"
                            :name="`${name}_select_hour`"
                            :dusk="`${name}_select_hour`"
                            class="ui-selector-hour bg-inherit font-medium text-15px text-gray-800 leading-normal appearance-none">

                        <!-- Meridiem (AM) -->
                        <option :disabled="true">AM</option>

                        <!-- Options -->
                        <option :key="hour"
                                :value="hour"
                                v-for="hour in hours.am"
                                :selected="hour === luxon.hour">

                            <!-- Text -->
                            {{ parseInt(hour) === 0 ? 12 : parseInt(hour) }}

                        </option>

                        <!-- Meridiem (PM) -->
                        <option :disabled="true"></option>
                        <option :disabled="true">PM</option>

                        <!-- Options -->
                        <option :key="hour"
                                :value="hour"
                                v-for="hour in hours.pm"
                                :selected="hour === luxon.hour">

                            <!-- Text -->
                            {{ parseInt(hour) === 12 ? 12 : parseInt(hour) - 12 }}

                        </option>

                    </select>

                    <!-- Separator -->
                    <span class="ui-separator relative -top-1px -ml-3px mr-3px">
                        :
                    </span>

                    <!-- Minute -->
                    <select ref="selector_minute"
                            @change="selectTime()"
                            :id="`${name}_select_minute`"
                            :name="`${name}_select_minute`"
                            :dusk="`${name}_select_minute`"
                            class="ui-selector-minute bg-inherit font-medium text-15px text-gray-800 leading-normal appearance-none">

                        <!-- Options -->
                        <option :key="minute"
                                :value="minute"
                                v-for="minute in minutes"
                                :selected="minute === luxon.minute.toString().padStart(2, '0')">

                            <!-- Text -->
                            {{ minute }}

                        </option>

                    </select>

                    <!-- Separator -->
                    <span v-if="showSeconds"
                          class="ui-separator relative -top-1px ml-2px mr-3px">

                        <!-- Text -->
                        :

                    </span>

                    <!-- Second -->
                    <select v-if="showSeconds"
                            ref="selector_second"
                            @change="selectTime()"
                            :id="`${name}_select_second`"
                            :name="`${name}_select_second`"
                            :dusk="`${name}_select_second`"
                            class="ui-selector-second bg-inherit font-medium text-15px text-gray-800 leading-normal appearance-none">

                        <!-- Options -->
                        <option :key="second"
                                :value="second"
                                v-for="second in seconds"
                                :selected="second === luxon.second.toString().padStart(2, '0')">

                            <!-- Text -->
                            {{ second }}

                        </option>

                    </select>

                    <!-- Meridiem -->
                    <span class="ui-meridiem text-14px text-gray-400 ml-2">
                        {{ value.toFormat('a').toLowerCase() }}
                    </span>

                </div>

            </div>

        </div>

        <!-- Error -->
        <v-error :value="fault"></v-error>

    </div>
</template>

<script>
    import ErrorComponent from './error.vue';
    import { DateTime, Interval } from 'luxon';
    import Component from '../mixins/Component';
    import Container from '../mixins/Container';
    import TextBoxComponent from './textbox.vue';

    export default
    {
        /**
         * Define the mixins.
         *
         */
        mixins : [
            Container,
            Component,
        ],

        /**
         * Define the components.
         *
         */
        components : {
            'v-error'   : ErrorComponent,
            'v-textbox' : TextBoxComponent,
        },

        /**
         * Define the events.
         *
         */
        emits : ['lostFocus'],

        /**
         * Define the data model.
         *
         */
        data() { return {
            attention : false,
            hours     : { am : Array(12).fill('').map((v, i) => i), pm : Array(12).fill('').map((v, i) => i + 12) },
            limits    : { minimum : DateTime.fromISO(this.minDate), maximum : DateTime.fromISO(this.maxDate) },
            luxon     : null,
            minutes   : Array(60).fill('').map((v, i) => `${i}`.padStart(2, '0')),
            months    : Array(12).fill('').map((v, i) => new Intl.DateTimeFormat(this.locale, { month: 'short' }).format(new Date(Date.UTC(2021, (i)%12, 20)))),
            seconds   : Array(60).fill('').map((v, i) => `${i}`.padStart(2, '0')),
            selectors : { date : false, time : false },
            value     : null,
            week      : Array(7).fill('').map((v, i) => new Intl.DateTimeFormat(this.locale, { weekday: 'short' }).format(new Date(Date.UTC(2021, 5, i)))),
        }},

        /**
         * Define the public properties.
         *
         */
        props : {
            'locale'        : { type : String,  default : 'en-US' },
            'maxDate'       : { type : String,  default : '2100-12-31' },
            'minDate'       : { type : String,  default : '1900-01-01' },
            'showComponent' : { type : Boolean, default : false },
            'showSeconds'   : { type : Boolean, default : false },
            'startDate'     : { type : String,  default : '' },
            'type'          : { type : String,  default : 'date' },
        },

        /**
         * Define the computed properties.
         *
         */
        computed :
        {
            /**
             * Retrieve each of the days in the calendar month.
             *
             */
            daysInMonth()
            {
                let days = [];

                for (let ordinal = this.luxon.startOf('month').weekday; ordinal > 1; ordinal--) {
                    days.push({
                        date     : null,
                        enabled  : false,
                        ordinal  : this.luxon.startOf('month').minus({ days : ordinal - 1 }).day,
                        selected : false,
                        today    : false,
                    });
                }

                for (let ordinal = 1; ordinal <= this.luxon.daysInMonth; ordinal++) {
                    days.push({
                        date     : this.luxon.set({ day : ordinal }).toISODate(),
                        enabled  : this.withinLimits(this.luxon.set({ day : ordinal })),
                        ordinal  : ordinal,
                        selected : this.value.toISODate() === this.luxon.set({ day : ordinal }).toISODate(),
                        today    : DateTime.now().setLocale(this.locale).toISODate() === this.luxon.set({ day : ordinal }).toISODate(),
                    });
                }

                return days;
            },

            /**
             * Render the component's value in a human-readable format.
             *
             */
            format()
            {
                let preset = this.showSeconds ? DateTime.TIME_WITH_SECONDS : DateTime.TIME_SIMPLE;

                if (Util.blank(this.modelValue)) {
                    return '';
                }

                if (this.type === 'date') {
                    return this.value.toLocaleString(DateTime.DATE_MED);
                }

                if (this.type === 'time') {
                    return this.value.toLocaleString(preset);
                }

                if (this.type === 'datetime') {
                    return `${this.value.toLocaleString(DateTime.DATE_MED)} - ${this.value.toLocaleString(preset).toLowerCase()}`;
                }

                throw 'Unknown type format';
            },

            /**
             * Determine the range of years that are permitted.
             *
             */
            years()
            {
                let range = Array(this.limits.maximum.year - this.limits.minimum.year + 1);

                return range.fill('').map((v, i) => this.limits.maximum.year - i).reverse();
            },
        },

        /**
         * Define the watch methods.
         *
         */
        watch :
        {
            /**
             * Watch the 'maxDate' property.
             *
             */
            maxDate : function(current, previous)
            {
                this.limits.maximum = DateTime.fromISO(current, { locale : this.locale });
            },

            /**
             * Watch the 'minDate' property.
             *
             */
            minDate : function(current, previous)
            {
                this.limits.minimum = DateTime.fromISO(current, { locale : this.locale });
            },

            /**
             * Watch the 'modelValue' property.
             *
             */
            modelValue : function(current, previous)
            {
                this.value = Util.blank(current) ? null : DateTime.fromISO(current, { locale : this.locale });
            },

            /**
             * Watch the 'showComponent' property.
             *
             */
            showComponent : function(current, previous)
            {
                if (! current) return this.lostUserAttention();

                this.attention = true;

                this.showSelectors();
            },
        },

        /**
         * Execute actions when the component is instantiated.
         *
         */
        created()
        {
            if (Util.blank(this.modelValue)) return;

            this.value = DateTime.fromISO(this.modelValue, { locale : this.locale });
        },

		/**
		 * Define the supporting methods.
		 *
		 */
		methods :
        {
            /**
             * Reset the component to a blank state.
             *
             */
            clear()
            {
                this.lostUserAttention();

                this.change('');
            },

            /**
             * Adjust the calendar so that it shows the given month.
             *
             */
            goToMonth(month)
            {
                if (this.withinLimits(month)) {
                    this.luxon = month;
                }
            },

            /**
             * Adjust the calendar so that it shows the next month.
             *
             */
            goToNextMonth()
            {
                this.goToMonth(this.luxon.plus({ months : 1 }));
            },

            /**
             * Adjust the calendar so that it shows the previous month.
             *
             */
            goToPreviousMonth()
            {
                this.goToMonth(this.luxon.minus({ months : 1 }));
            },

	    	/**
	    	 * Determine if the component currently has the user's attention.
	    	 *
	    	 */
	    	hasUserAttention()
	    	{
                return this.selectors.date || this.selectors.time;
	    	},

	    	/**
	    	 * Respond to the component losing the user's attention.
	    	 *
	    	 */
	    	lostUserAttention()
	    	{
                if (this.attention) {
                    return this.attention = false;
                }

                this.selectors.date = false;
                this.selectors.time = false;

                this.$emit('lostFocus');
	    	},

            /**
             * Respond to the selection of a revised date.
             *
             */
            selectDate(date)
            {
                if (this.type === 'date') {
                    return this.change(date);
                }

                this.selectTime(DateTime.fromISO(date));
            },

            /**
             * Respond to the selection of a revised time.
             *
             */
            selectTime(date = null)
            {
                let changes = {
                    hours   : this.$refs.selector_hour.value,
                    minutes : this.$refs.selector_minute.value,
                };

                if (this.showSeconds) {
                    changes.seconds = this.$refs.selector_second.value;
                }

                date = (date ?? this.value).set(changes).startOf('second').setZone('UTC');

                this.change(this.type === 'time' ? date.toISOTime() : date.toISO());
            },

            /**
             * Display the date and / or time selector for the user.
             *
             */
            showSelectors()
            {
                if (Util.blank(this.value)) {
                    this.value = this.startDate
                        ? DateTime.fromISO(this.startDate).startOf('day').setLocale(this.locale)
                        : DateTime.now().setLocale(this.locale);
                }

                this.luxon = this.value;

                if (['date', 'datetime'].includes(this.type)) {
                    this.selectors.date = true;
                }

                if (['time', 'datetime'].includes(this.type)) {
                    this.selectors.time = true;
                }
            },

            /**
             * Determine if the given date falls between the minimum and maximum.
             *
             */
            withinLimits(date)
            {
                let range = Interval.fromDateTimes(this.limits.minimum, this.limits.maximum);

                return range.contains(date);
            },
        }
    }
</script>