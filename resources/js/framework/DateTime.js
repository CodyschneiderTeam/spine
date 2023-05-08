export default class DateTime
{
    /**
     * Process the given value into its correct format.
     *
     */
    static format(value, type = 'date')
    {
        let options = {
            date : {
                day   : 'numeric',
                month : 'short',
                year  : 'numeric',
            },
            time : {
                dayPeriod : 'short',
                hour      : '2-digit',
                hour12    : false,
                minute    : '2-digit',
            },
            meridiem : {
                hour   : 'numeric',
                hour12 : true,
            }
        };

        if (type === 'datetime') {
            return `${DateTime.format(value, 'date')} - ${DateTime.format(value, 'time')}`;
        }

        value = System.Is.string(value)
            ? new Date(type === 'date' ? value.split('.')[0] : value)
            : value;

        if (System.Util.blank(value) || value.toString() === 'Invalid Date') {
            return 'Unknown';
        }

        return type === 'date'
            ? new Intl.DateTimeFormat('en-US', options[type]).format(value)
            : new Intl.DateTimeFormat('en-UK', options[type]).format(value)
            + `(${value.toLocaleString('en-US', options.meridiem).split(/\s+/)[1].toLowerCase()})`;
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