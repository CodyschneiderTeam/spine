export default class Text
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
    static pluralize(count, noun, suffix = 's', trim = 0)
    {
        let options = {
            maximumFractionDigits : 2,
        };

        let formatted = new Intl.NumberFormat('en-US', options).format(count);

        noun = parseInt(count) === 1 ? noun : (trim ? noun.slice(0, trim * -1) : noun);

        return `${formatted} ${parseInt(count) === 1 ? noun : `${noun}${suffix}`}`;
    }
}