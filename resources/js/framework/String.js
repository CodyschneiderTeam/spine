export default class String
{
    /**
     * Capitalize the first letter of the given value.
     *
     */
    static capitalize(value)
    {
        return value && `${value.charAt(0).toUpperCase()}${value.slice(1)}`;
    }

    /**
     * Generate a formatted string using the given count and noun.
     *
     */
    static pluralize(count, noun, suffix = 's')
    {
        let options = {
            maximumFractionDigits : 2,
        };

        let formatted = new Intl.NumberFormat('en-US', options).format(count);

        return `${formatted} ${parseInt(count) === 1 ? noun : `${noun}${suffix}`}`;
    }
}