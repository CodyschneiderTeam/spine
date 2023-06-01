export default class User
{
    /**
     * Determine if the user is signed in.
     *
     */
    static authenticated()
    {
        return ! Page.property('guest');
    }

    /**
     * Determine if the user is not signed in.
     *
     */
    static guest()
    {
        return Page.property('guest');
    }
}