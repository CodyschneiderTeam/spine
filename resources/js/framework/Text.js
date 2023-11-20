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
     * Replace URL-encoded entities with their rendered equivalent.
     *
     */
    static decode(value)
    {
        let entities = {
            'quot' : '"',
            'amp'  : '&',
            'apos' : "'",
            'lt'   : '<',
            'gt'   : '>',
            '#39'  : "'",
        }

        return value.replace(/&([^;]+);/g, (m, e) => entities[e] || m);
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