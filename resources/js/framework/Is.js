export default class Is
{
    /**
     * Determine if the given value is an array.
     *
     */
    static array(value)
    {
        return Array.isArray(value);
    }

    /**
     * Determine if the given value is a date.
     *
     */
    static date(value)
    {
        return value instanceof Date;
    }

    /**
     * Determine if the given value is a float.
     *
     */
    static float(value)
    {
        return Number(value) === value && value % 1 !== 0;
    }

    /**
     * Determine if the given value is an integer.
     *
     */
    static integer(value)
    {
        return Number.isInteger(value);
    }

    /**
     * Determine if the given value is a number.
     *
     */
    static number(value)
    {
        return Number.isFinite(value);
    }

    /**
     * Determine if the given value is an object.
     *
     */
    static object(value)
    {
        return typeof value === 'object' && value !== null;
    }

    /**
     * Determine if the given value is a string.
     *
     */
    static string(value)
    {
        return typeof value === 'string';
    }
}