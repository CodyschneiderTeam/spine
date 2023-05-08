export default class User
{
    /**
     * Determine if the user is signed in.
     *
     */
    static authenticated()
    {
        return ! System.Page.property('guest');
    }

    /**
     * Determine if the user is not signed in.
     *
     */
    static guest()
    {
        return System.Page.property('guest');
    }
}