export default
{
    /**
     * Execute actions when the component is created.
     *
     */
    created()
    {
        Object.entries(window.System).forEach(i => this[i[0]] = i[1]);
    },
}