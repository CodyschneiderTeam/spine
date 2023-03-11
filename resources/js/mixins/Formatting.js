export default
{
    /**
     * Define the supporting methods.
     *
     */
    methods :
    {
        /**
         * Process the given date into its correct format.
         *
         */
        date(value)
        {
            let options = {
                day   : 'numeric',
                month : 'short',
                year  : 'numeric',
            };

            value = typeof value === 'string' ? new Date(value.split('.')[0]) : value;

            return this.blank(value) || value.toString() === 'Invalid Date'
                ? 'Unknown' : new Intl.DateTimeFormat('en-US', options).format(value);
        },

        /**
         * Process the given date and time into its correct format.
         *
         */
        dateTime(value)
        {
            return `${this.date(value)} - ${this.time(value)}`;
        },

        /**
         * Generate a formatted string using the given value and noun.
         *
         */
        metric(value, noun, suffix = 's')
        {
            return `${this.number(value)} ${parseInt(value) === 1 ? noun : `${noun}${suffix}`}`;
        },

        /**
         * Process the given financial value into its correct format.
         *
         */
        money(value, currency = 'USD')
        {
            let options = {
                style                 : 'currency',
                currency              : currency,
                minimumFractionDigits : 2,
                maximumFractionDigits : 2,
            };

            return new Intl.NumberFormat('en-US', options).format(value);
        },

        /**
         * Process the given numerical value into its correct format.
         *
         */
        number(value, type = 'standard')
        {
            let options = {
                standard : {
                    maximumFractionDigits : 2,
                },
                compact  : {
                    notation       : 'compact',
                    compactDisplay : 'short',
                },
                decimal  : {
                    minimumFractionDigits : 2,
                    maximumFractionDigits : 2,
                }
            };

            return new Intl.NumberFormat('en-US', options[type]).format(value);
        },

        /**
         * Process the given time into its correct format.
         *
         */
        time(value)
        {
            let options = {
                hour12    : false,
                hour      : '2-digit',
                minute    : '2-digit',
                dayPeriod : 'short',
            };

            value = typeof value === 'string' ? new Date(value) : value;

            let meridiem = value.toLocaleString(
                'en-US', { hour : 'numeric', hour12 : true }
            ).split(/\s+/)[1].toLowerCase();

            return this.blank(value) || value.toString() === 'Invalid Date'
                ? 'Unknown' : `${new Intl.DateTimeFormat('en-UK', options).format(value)} (${meridiem})`;
        },
    }
}