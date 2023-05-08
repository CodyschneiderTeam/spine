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

        return new Intl.NumberFormat('en-US', options[type]).format(value);
    }
}