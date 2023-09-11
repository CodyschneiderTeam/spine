export default class Localization
{
    /**
     * Determine the country of the user via their browser.
     *
     */
    static guessCountry(repository = 'countries')
    {
        let code = window.navigator.language.split('-')[1] ?? window.navigator.language;

        return Page.property(repository).find(item => item.code === code.toUpperCase())?.id ?? 238;
    }

    /**
     * Determine the language of the user via their browser.
     *
     */
    static guessLanguage(repository = 'languages')
    {
        let code = window.navigator.language.split('-')[0];

        return Page.property(repository).find(item => item.code === code.toUpperCase())?.id ?? null;
    }

    /**
     * Determine the time zone of the user via their browser.
     *
     */
    static guessTimeZone(repository = 'time_zones')
    {
        let code = Intl.DateTimeFormat().resolvedOptions().timeZone;

        return Page.property(repository).find(item => item.code === code)?.id ?? null;
    }
}