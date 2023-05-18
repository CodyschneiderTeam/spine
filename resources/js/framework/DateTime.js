export default class DateTime
{
    /**
     * Process the given value into its correct format.
     *
     */
    static format(value, type = 'date', style = '12-hour')
    {
        let options = {
            date : {
                day   : 'numeric',
                month : 'short',
                year  : 'numeric',
            },
            time : {
                '12-hour' : {
                    hour   : 'numeric',
                    hour12 : true,
                    minute : 'numeric',
                },
                '24-hour' : {
                    dayPeriod : 'short',
                    hour      : '2-digit',
                    hour12    : false,
                    minute    : '2-digit',
                },
            }
        };

        value = System.Is.string(value) ? new Date(value) : value;

        if (System.Util.blank(value) || value.toString() === 'Invalid Date') {
            return 'Unknown';
        }

        if (type === 'date') {
            return new Intl.DateTimeFormat('en-US', options.date).format(value);
        } else if (type === 'time') {
            return new Intl.DateTimeFormat('en-US', options.time[style]).format(value).toLowerCase();
        } else {
            return `${DateTime.format(value, 'date')} - ${DateTime.format(value, 'time')}`;
        }
    }

    /**
     * Retrieve the current date and time (observing the local time zone if required).
     *
     */
    static ordinal(value)
    {
        value = System.Is.date(value) ? value.getDay : value;

        return value > 0 ? ['th', 'st', 'nd', 'rd'][(value > 3 && value < 21) || value % 10 > 3 ? 0 : value % 10] : '';
    }

    /**
     * Retrieve the current date and time (observing the local time zone if required).
     *
     */
    static now(utc = true, seconds = true)
    {
        let date = utc ? new Date().toISOString().slice(0, 10) : new Date().toLocaleDateString();
        let time = utc ? new Date().toISOString().slice(11, 19) : new Date().toLocaleTimeString();

        return `${date} ${seconds ? `${time.slice(0, 5)}:00` : time}`
    }

    /**
     * Retrieve the current year.
     *
     */
    static year()
    {
        return new Date().getFullYear();
    }
}