export default class Number
{
    /**
     * Process the given numerical value into its correct format.
     *
     */
    static format(value, type = 'standard', currency = 'USD')
    {
        let options = {
            compact : {
                notation       : 'compact',
                compactDisplay : 'short',
            },
            decimal : {
                minimumFractionDigits : 2,
                maximumFractionDigits : 2,
            },
            financial : {
                style                 : 'currency',
                currency              : currency,
                minimumFractionDigits : 2,
                maximumFractionDigits : 2,
            },
            rounded : {
                maximumFractionDigits : 0,
            },
            standard : {
                maximumFractionDigits : 2,
            },
        };

        return type === 'bytes'
            ? Number.formatBytes(value)
            : new Intl.NumberFormat('en-US', options[type]).format(value);
    }

    /**
     * Format the given value into human-readable bytes.
     *
     */
    static formatBytes(value)
    {
        if (value < 1024) return `${Number.format(value / 1024)} KB`;

        let index = -1;

        for (index; value >= 1024; index++) value /= 1024;

        return `${Number.format(value)} ${['KB', 'MB', 'GB', 'TB', 'PB'][index]}`;
    }
}