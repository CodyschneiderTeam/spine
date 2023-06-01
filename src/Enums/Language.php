<?php

namespace System\Enums;

use System\Types\Enum;

enum Language : int
{
    use Enum;

    /**
     * The available cases.
     *
     */
    case AFAN            = 1;
    case ABKHAZIAN       = 2;
    case AFAR            = 3;
    case AFRIKAANS       = 4;
    case ALBANIAN        = 5;
    case AMHARIC         = 6;
    case ARABIC          = 7;
    case ARMENIAN        = 8;
    case ASSAMESE        = 9;
    case AYMARA          = 10;
    case AZERBAIJANI     = 11;
    case BASHKIR         = 12;
    case BASQUE          = 13;
    case BELARUSIAN      = 14;
    case BENGALI_BANGLA  = 15;
    case BHUTANI         = 16;
    case BIHARI          = 17;
    case BISLAMA         = 18;
    case BRETON          = 19;
    case BULGARIAN       = 20;
    case BURMESE         = 21;
    case CAMBODIAN       = 22;
    case CATALAN         = 23;
    case CHINESE         = 24;
    case CORSICAN        = 25;
    case CROATIAN        = 26;
    case CZECH           = 27;
    case DANISH          = 28;
    case DUTCH           = 29;
    case ENGLISH         = 30;
    case ESPERANTO       = 31;
    case ESTONIAN        = 32;
    case FAEROESE        = 33;
    case FIJI            = 34;
    case FINNISH         = 35;
    case FRENCH          = 36;
    case FRISIAN         = 37;
    case GALICIAN        = 38;
    case GEORGIAN        = 39;
    case GERMAN          = 40;
    case GREEK           = 41;
    case GREENLANDIC     = 42;
    case GUARANI         = 43;
    case GUJARATI        = 44;
    case HAUSA           = 45;
    case HEBREW          = 46;
    case HINDI           = 47;
    case HUNGARIAN       = 48;
    case ICELANDIC       = 49;
    case INDONESIAN      = 50;
    case INTERLINGUA     = 51;
    case INTERLINGUE     = 52;
    case INUPIAK         = 53;
    case IRISH           = 54;
    case ITALIAN         = 55;
    case JAPANESE        = 56;
    case JAVANESE        = 57;
    case KANNADA         = 58;
    case KASHMIRI        = 59;
    case KAZAKH          = 60;
    case KINYARWANDA     = 61;
    case KIRGHIZ         = 62;
    case KIRUNDI         = 63;
    case KOREAN          = 64;
    case KURDISH         = 65;
    case LAOTHIAN        = 66;
    case LATIN           = 67;
    case LATVIAN_LETTISH = 68;
    case LINGALA         = 69;
    case LITHUANIAN      = 70;
    case MACEDONIAN      = 71;
    case MALAGASY        = 72;
    case MALAY           = 73;
    case MALAYALAM       = 74;
    case MALTESE         = 75;
    case MAORI           = 76;
    case MARATHI         = 77;
    case MOLDAVIAN       = 78;
    case MONGOLIAN       = 79;
    case NAURU           = 80;
    case NEPALI          = 81;
    case NORWEGIAN       = 82;
    case OCCITAN         = 83;
    case PASHTO_PUSHTO   = 84;
    case PERSIAN         = 85;
    case POLISH          = 86;
    case PORTUGUESE      = 87;
    case PUNJABI         = 88;
    case QUECHUA         = 89;
    case RHAETO_ROMANCE  = 90;
    case ROMANIAN        = 91;
    case RUSSIAN         = 92;
    case SAMOAN          = 93;
    case SANGRO          = 94;
    case SANSKRIT        = 95;
    case SCOTS_GAELIC    = 96;
    case SERBIAN         = 97;
    case SERBO_CROATIAN  = 98;
    case SESOTHO         = 99;
    case SETSWANA        = 100;
    case SHONA           = 101;
    case SINDHI          = 102;
    case SINGHALESE      = 103;
    case SISWATI         = 104;
    case SLOVAK          = 105;
    case SLOVENIAN       = 106;
    case SOMALI          = 107;
    case SPANISH         = 108;
    case SUNDANESE       = 109;
    case SWAHILI         = 110;
    case SWEDISH         = 111;
    case TAGALOG         = 112;
    case TAJIK           = 113;
    case TAMIL           = 114;
    case TATAR           = 115;
    case TELUGU          = 116;
    case THAI            = 117;
    case TIBETAN         = 118;
    case TIGRINYA        = 119;
    case TONGA           = 120;
    case TSONGA          = 121;
    case TURKISH         = 122;
    case TURKMEN         = 123;
    case TWI             = 124;
    case UKRAINIAN       = 125;
    case URDU            = 126;
    case UZBEK           = 127;
    case VIETNAMESE      = 128;
    case VOLAPUK         = 129;
    case WELSH           = 130;
    case WOLOF           = 131;
    case XHOSA           = 132;
    case YIDDISH         = 133;
    case YORUBA          = 134;
    case ZULU            = 135;

    /**
     * Retrieve the available cases as an array.
     *
     */
    public static function toArray() : array
    {
        return [[
            'id'    => static::AFAN,
            'code'  => 'OM',
            'flag'  => '🇺🇳',
            'label' => 'Afan',
        ], [
            'id'    => static::ABKHAZIAN,
            'code'  => 'AB',
            'flag'  => '🇺🇳',
            'label' => 'Abkhazian',
        ], [
            'id'    => static::AFAR,
            'code'  => 'AA',
            'flag'  => '🇩🇯',
            'label' => 'Afar',
        ], [
            'id'    => static::AFRIKAANS,
            'code'  => 'AF',
            'flag'  => '🇿🇦',
            'label' => 'Afrikaans',
        ], [
            'id'    => static::ALBANIAN,
            'code'  => 'SQ',
            'flag'  => '🇦🇱',
            'label' => 'Albanian',
        ], [
            'id'    => static::AMHARIC,
            'code'  => 'AM',
            'flag'  => '🇪🇹',
            'label' => 'Amharic',
        ], [
            'id'    => static::ARABIC,
            'code'  => 'AR',
            'flag'  => '🇺🇳',
            'label' => 'Arabic',
        ], [
            'id'     => static::ARMENIAN,
            'code'   => 'HY',
             'flag'  => '🇦🇲',
             'label' => 'Armenian',
        ], [
            'id'     => static::ASSAMESE,
            'code'   => 'AS',
             'flag'  => '🇺🇳',
             'label' => 'Assamese',
        ], [
            'id'    => static::AYMARA,
            'code'  => 'AY',
            'flag'  => '🇺🇳',
            'label' => 'Aymara',
        ], [
            'id'    => static::AZERBAIJANI,
            'code'  => 'AZ',
            'flag'  => '🇦🇿',
            'label' => 'Azerbaijani',
        ], [
            'id'    => static::BASHKIR,
            'code'  => 'BA',
            'flag'  => '🇺🇳',
            'label' => 'Bashkir',
        ], [
            'id'    => static::BASQUE,
            'code'  => 'EU',
            'flag'  => '🇪🇸',
            'label' => 'Basque',
        ], [
            'id'    => static::BELARUSIAN,
            'code'  => 'BE',
            'flag'  => '🇧🇾',
            'label' => 'Belarusian',
        ], [
            'id'    => static::BENGALI_BANGLA,
            'code'  => 'BN',
            'flag'  => '🇧🇩',
            'label' => 'Bengali / Bangla',
        ], [
            'id'    => static::BHUTANI,
            'code'  => 'DZ',
            'flag'  => '🇧🇹',
            'label' => 'Bhutani',
        ], [
            'id'    => static::BIHARI,
            'code'  => 'BH',
            'flag'  => '🇺🇳',
            'label' => 'Bihari',
        ], [
            'id'    => static::BISLAMA,
            'code'  => 'BI',
            'flag'  => '🇻🇺',
            'label' => 'Bislama',
        ], [
            'id'    => static::BRETON,
            'code'  => 'BR',
            'flag'  => '🇺🇳',
            'label' => 'Breton',
        ], [
            'id'    => static::BULGARIAN,
            'code'  => 'BG',
            'flag'  => '🇧🇬',
            'label' => 'Bulgarian',
        ], [
            'id'    => static::BURMESE,
            'code'  => 'MY',
            'flag'  => '🇲🇲',
            'label' => 'Burmese',
        ], [
            'id'    => static::CAMBODIAN,
            'code'  => 'KM',
            'flag'  => '🇰🇭',
            'label' => 'Cambodian',
        ], [
            'id'    => static::CATALAN,
            'code'  => 'CA',
            'flag'  => '🇦🇩',
            'label' => 'Catalan',
        ], [
            'id'    => static::CHINESE,
            'code'  => 'ZH',
            'flag'  => '🇨🇳',
            'label' => 'Chinese',
        ], [
            'id'    => static::CORSICAN,
            'code'  => 'CO',
            'flag'  => '🇺🇳',
            'label' => 'Corsican',
        ], [
            'id'    => static::CROATIAN,
            'code'  => 'HR',
            'flag'  => '🇭🇷',
            'label' => 'Croatian',
        ], [
            'id'    => static::CZECH,
            'code'  => 'CS',
            'flag'  => '🇨🇿',
            'label' => 'Czech',
        ], [
            'id'    => static::DANISH,
            'code'  => 'DA',
            'flag'  => '🇩🇰',
            'label' => 'Danish',
        ], [
            'id'    => static::DUTCH,
            'code'  => 'NL',
            'flag'  => '🇳🇱',
            'label' => 'Dutch',
        ], [
            'id'    => static::ENGLISH,
            'code'  => 'EN',
            'flag'  => '🇬🇧',
            'label' => 'English',
        ], [
            'id'    => static::ESPERANTO,
            'code'  => 'EO',
            'flag'  => '🇺🇳',
            'label' => 'Esperanto',
        ], [
            'id'    => static::ESTONIAN,
            'code'  => 'ET',
            'flag'  => '🇪🇪',
            'label' => 'Estonian',
        ], [
            'id'    => static::FAEROESE,
            'code'  => 'FO',
            'flag'  => '🇺🇳',
            'label' => 'Faeroese',
        ], [
            'id'    => static::FIJI,
            'code'  => 'FJ',
            'flag'  => '🇫🇯',
            'label' => 'Fiji',
        ], [
            'id'    => static::FINNISH,
            'code'  => 'FI',
            'flag'  => '🇫🇮',
            'label' => 'Finnish',
        ], [
            'id'    => static::FRENCH,
            'code'  => 'FR',
            'flag'  => '🇫🇷',
            'label' => 'French',
        ], [
            'id'    => static::FRISIAN,
            'code'  => 'FY',
            'flag'  => '🇺🇳',
            'label' => 'Frisian',
        ], [
            'id'    => static::GALICIAN,
            'code'  => 'GL',
            'flag'  => '🇺🇳',
            'label' => 'Galician',
        ], [
            'id'    => static::GEORGIAN,
            'code'  => 'KA',
            'flag'  => '🇬🇪',
            'label' => 'Georgian',
        ], [
            'id'    => static::GERMAN,
            'code'  => 'DE',
            'flag'  => '🇩🇪',
            'label' => 'German',
        ], [
            'id'    => static::GREEK,
            'code'  => 'EL',
            'flag'  => '🇬🇷',
            'label' => 'Greek',
        ], [
            'id'    => static::GREENLANDIC,
            'code'  => 'KL',
            'flag'  => '🇺🇳',
            'label' => 'Greenlandic',
        ], [
            'id'    => static::GUARANI,
            'code'  => 'GN',
            'flag'  => '🇺🇳',
            'label' => 'Guarani',
        ], [
            'id'    => static::GUJARATI,
            'code'  => 'GU',
            'flag'  => '🇮🇳',
            'label' => 'Gujarati',
        ], [
            'id'    => static::HAUSA,
            'code'  => 'HA',
            'flag'  => '🇺🇳',
            'label' => 'Hausa',
        ], [
            'id'    => static::HEBREW,
            'code'  => 'IW',
            'flag'  => '🇮🇱',
            'label' => 'Hebrew',
        ], [
            'id'    => static::HINDI,
            'code'  => 'HI',
            'flag'  => '🇮🇳',
            'label' => 'Hindi',
        ], [
            'id'    => static::HUNGARIAN,
            'code'  => 'HU',
            'flag'  => '🇭🇺',
            'label' => 'Hungarian',
        ], [
            'id'    => static::ICELANDIC,
            'code'  => 'IS',
            'flag'  => '🇮🇸',
            'label' => 'Icelandic',
        ], [
            'id'    => static::INDONESIAN,
            'code'  => 'IN',
            'flag'  => '🇮🇩',
            'label' => 'Indonesian',
        ], [
            'id'    => static::INTERLINGUA,
            'code'  => 'IA',
            'flag'  => '🇺🇳',
            'label' => 'Interlingua',
        ], [
            'id'    => static::INTERLINGUE,
            'code'  => 'IE',
            'flag'  => '🇺🇳',
            'label' => 'Interlingue',
        ], [
            'id'    => static::INUPIAK,
            'code'  => 'IK',
            'flag'  => '🇺🇳',
            'label' => 'Inupiak',
        ], [
            'id'    => static::IRISH,
            'code'  => 'GA',
            'flag'  => '🇮🇪',
            'label' => 'Irish',
        ], [
            'id'    => static::ITALIAN,
            'code'  => 'IT',
            'flag'  => '🇮🇹',
            'label' => 'Italian',
        ], [
            'id'    => static::JAPANESE,
            'code'  => 'JA',
            'flag'  => '🇯🇵',
            'label' => 'Japanese',
        ], [
            'id'    => static::JAVANESE,
            'code'  => 'JW',
            'flag'  => '🇺🇳',
            'label' => 'Javanese',
        ], [
            'id'    => static::KANNADA,
            'code'  => 'KN',
            'flag'  => '🇺🇳',
            'label' => 'Kannada',
        ], [
            'id'    => static::KASHMIRI,
            'code'  => 'KS',
            'flag'  => '🇮🇳',
            'label' => 'Kashmiri',
        ], [
            'id'    => static::KAZAKH,
            'code'  => 'KK',
            'flag'  => '🇰🇿',
            'label' => 'Kazakh',
        ], [
            'id'    => static::KINYARWANDA,
            'code'  => 'RW',
            'flag'  => '🇷🇼',
            'label' => 'Kinyarwanda',
        ], [
            'id'    => static::KIRGHIZ,
            'code'  => 'KY',
            'flag'  => '🇰🇬',
            'label' => 'Kirghiz',
        ], [
            'id'    => static::KIRUNDI,
            'code'  => 'RN',
            'flag'  => '🇧🇮',
            'label' => 'Kirundi',
        ], [
            'id'    => static::KOREAN,
            'code'  => 'KO',
            'flag'  => '🇰🇷',
            'label' => 'Korean',
        ], [
            'id'    => static::KURDISH,
            'code'  => 'KU',
            'flag'  => '🇮🇶',
            'label' => 'Kurdish',
        ], [
            'id'    => static::LAOTHIAN,
            'code'  => 'LO',
            'flag'  => '🇱🇦',
            'label' => 'Laothian',
        ], [
            'id'    => static::LATIN,
            'code'  => 'LA',
            'flag'  => '🇻🇦',
            'label' => 'Latin',
        ], [
            'id'    => static::LATVIAN_LETTISH,
            'code'  => 'LV',
            'flag'  => '🇱🇻',
            'label' => 'Latvian / Lettish',
        ], [
            'id'    => static::LINGALA,
            'code'  => 'LN',
            'flag'  => '🇨🇬',
            'label' => 'Lingala',
        ], [
            'id'    => static::LITHUANIAN,
            'code'  => 'LT',
            'flag'  => '🇱🇹',
            'label' => 'Lithuanian',
        ], [
            'id'    => static::MACEDONIAN,
            'code'  => 'MK',
            'flag'  => '🇲🇰',
            'label' => 'Macedonian',
        ], [
            'id'    => static::MALAGASY,
            'code'  => 'MG',
            'flag'  => '🇲🇬',
            'label' => 'Malagasy',
        ], [
            'id'    => static::MALAY,
            'code'  => 'MS',
            'flag'  => '🇲🇾',
            'label' => 'Malay',
        ], [
            'id'    => static::MALAYALAM,
            'code'  => 'ML',
            'flag'  => '🇺🇳',
            'label' => 'Malayalam',
        ], [
            'id'    => static::MALTESE,
            'code'  => 'MT',
            'flag'  => '🇲🇹',
            'label' => 'Maltese',
        ], [
            'id'    => static::MAORI,
            'code'  => 'MI',
            'flag'  => '🇳🇿',
            'label' => 'Maori',
        ], [
            'id'    => static::MARATHI,
            'code'  => 'MR',
            'flag'  => '🇺🇳',
            'label' => 'Marathi',
        ], [
            'id'    => static::MOLDAVIAN,
            'code'  => 'MO',
            'flag'  => '🇲🇩',
            'label' => 'Moldavian',
        ], [
            'id'    => static::MONGOLIAN,
            'code'  => 'MN',
            'flag'  => '🇲🇳',
            'label' => 'Mongolian',
        ], [
            'id'    => static::NAURU,
            'code'  => 'NA',
            'flag'  => '🇺🇳',
            'label' => 'Nauru',
        ], [
            'id'    => static::NEPALI,
            'code'  => 'NE',
            'flag'  => '🇳🇵',
            'label' => 'Nepali',
        ], [
            'id'    => static::NORWEGIAN,
            'code'  => 'NO',
            'flag'  => '🇳🇴',
            'label' => 'Norwegian',
        ], [
            'id'    => static::OCCITAN,
            'code'  => 'OC',
            'flag'  => '🇺🇳',
            'label' => 'Occitan',
        ], [
            'id'    => static::PASHTO_PUSHTO,
            'code'  => 'PS',
            'flag'  => '🇦🇫',
            'label' => 'Pashto / Pushto',
        ], [
            'id'    => static::PERSIAN,
            'code'  => 'FA',
            'flag'  => '🇮🇷',
            'label' => 'Persian',
        ], [
            'id'    => static::POLISH,
            'code'  => 'PL',
            'flag'  => '🇵🇱',
            'label' => 'Polish',
        ], [
            'id'    => static::PORTUGUESE,
            'code'  => 'PT',
            'flag'  => '🇵🇹',
            'label' => 'Portuguese',
        ], [
            'id'    => static::PUNJABI,
            'code'  => 'PA',
            'flag'  => '🇮🇳',
            'label' => 'Punjabi',
        ], [
            'id'    => static::QUECHUA,
            'code'  => 'QU',
            'flag'  => '🇺🇳',
            'label' => 'Quechua',
        ], [
            'id'    => static::RHAETO_ROMANCE,
            'code'  => 'RM',
            'flag'  => '🇨🇭',
            'label' => 'Rhaeto-Romance',
        ], [
            'id'    => static::ROMANIAN,
            'code'  => 'RO',
            'flag'  => '🇷🇴',
            'label' => 'Romanian',
        ], [
            'id'    => static::RUSSIAN,
            'code'  => 'RU',
            'flag'  => '🇷🇺',
            'label' => 'Russian',
        ], [
            'id'    => static::SAMOAN,
            'code'  => 'SM',
            'flag'  => '🇺🇳',
            'label' => 'Samoan',
        ], [
            'id'    => static::SANGRO,
            'code'  => 'SG',
            'flag'  => '🇨🇫',
            'label' => 'Sangro',
        ], [
            'id'    => static::SANSKRIT,
            'code'  => 'SA',
            'flag'  => '🇺🇳',
            'label' => 'Sanskrit',
        ], [
            'id'    => static::SCOTS_GAELIC,
            'code'  => 'GD',
            'flag'  => '🏴󠁧󠁢󠁳󠁣󠁴󠁿',
            'label' => 'Scots / Gaelic',
        ], [
            'id'    => static::SERBIAN,
            'code'  => 'SR',
            'flag'  => '🇷🇸',
            'label' => 'Serbian',
        ], [
            'id'    => static::SERBO_CROATIAN,
            'code'  => 'SH',
            'flag'  => '🇺🇳',
            'label' => 'Serbo-Croatian',
        ], [
            'id'    => static::SESOTHO,
            'code'  => 'ST',
            'flag'  => '🇱🇸',
            'label' => 'Sesotho',
        ], [
            'id'    => static::SETSWANA,
            'code'  => 'TN',
            'flag'  => '🇧🇼',
            'label' => 'Setswana',
        ], [
            'id'    => static::SHONA,
            'code'  => 'SN',
            'flag'  => '🇿🇼',
            'label' => 'Shona',
        ], [
            'id'    => static::SINDHI,
            'code'  => 'SD',
            'flag'  => '🇺🇳',
            'label' => 'Sindhi',
        ], [
            'id'    => static::SINGHALESE,
            'code'  => 'SI',
            'flag'  => '🇱🇰',
            'label' => 'Singhalese',
        ], [
            'id'    => static::SISWATI,
            'code'  => 'SS',
            'flag'  => '🇸🇿',
            'label' => 'Siswati',
        ], [
            'id'    => static::SLOVAK,
            'code'  => 'SK',
            'flag'  => '🇸🇰',
            'label' => 'Slovak',
        ], [
            'id'    => static::SLOVENIAN,
            'code'  => 'SL',
            'flag'  => '🇸🇮',
            'label' => 'Slovenian',
        ], [
            'id'    => static::SOMALI,
            'code'  => 'SO',
            'flag'  => '🇸🇴',
            'label' => 'Somali',
        ], [
            'id'    => static::SPANISH,
            'code'  => 'ES',
            'flag'  => '🇪🇸',
            'label' => 'Spanish',
        ], [
            'id'    => static::SUNDANESE,
            'code'  => 'SU',
            'flag'  => '🇺🇳',
            'label' => 'Sundanese',
        ], [
            'id'    => static::SWAHILI,
            'code'  => 'SW',
            'flag'  => '🇺🇳',
            'label' => 'Swahili',
        ], [
            'id'    => static::SWEDISH,
            'code'  => 'SV',
            'flag'  => '🇸🇪',
            'label' => 'Swedish',
        ], [
            'id'    => static::TAGALOG,
            'code'  => 'TL',
            'flag'  => '🇵🇭',
            'label' => 'Tagalog',
        ], [
            'id'    => static::TAJIK,
            'code'  => 'TG',
            'flag'  => '🇹🇯',
            'label' => 'Tajik',
        ], [
            'id'    => static::TAMIL,
            'code'  => 'TA',
            'flag'  => '🇱🇰',
            'label' => 'Tamil',
        ], [
            'id'    => static::TATAR,
            'code'  => 'TT',
            'flag'  => '🇺🇳',
            'label' => 'Tatar',
        ], [
            'id'    => static::TELUGU,
            'code'  => 'TE',
            'flag'  => '🇮🇳',
            'label' => 'Telugu',
        ], [
            'id'    => static::THAI,
            'code'  => 'TH',
            'flag'  => '🇹🇭',
            'label' => 'Thai',
        ], [
            'id'    => static::TIBETAN,
            'code'  => 'BO',
            'flag'  => '🇺🇳',
            'label' => 'Tibetan',
        ], [
            'id'    => static::TIGRINYA,
            'code'  => 'TI',
            'flag'  => '🇪🇷',
            'label' => 'Tigrinya',
        ], [
            'id'    => static::TONGA,
            'code'  => 'TO',
            'flag'  => '🇺🇳',
            'label' => 'Tonga',
        ], [
            'id'    => static::TSONGA,
            'code'  => 'TS',
            'flag'  => '🇿🇦',
            'label' => 'Tsonga',
        ], [
            'id'    => static::TURKISH,
            'code'  => 'TR',
            'flag'  => '🇹🇷',
            'label' => 'Turkish',
        ], [
            'id'    => static::TURKMEN,
            'code'  => 'TK',
            'flag'  => '🇹🇲',
            'label' => 'Turkmen',
        ], [
            'id'    => static::TWI,
            'code'  => 'TW',
            'flag'  => '🇺🇳',
            'label' => 'Twi',
        ], [
            'id'    => static::UKRAINIAN,
            'code'  => 'UK',
            'flag'  => '🇺🇦',
            'label' => 'Ukrainian',
        ], [
            'id'    => static::URDU,
            'code'  => 'UR',
            'flag'  => '🇵🇰',
            'label' => 'Urdu',
        ], [
            'id'    => static::UZBEK,
            'code'  => 'UZ',
            'flag'  => '🇺🇿',
            'label' => 'Uzbek',
        ], [
            'id'    => static::VIETNAMESE,
            'code'  => 'VI',
            'flag'  => '🇻🇳',
            'label' => 'Vietnamese',
        ], [
            'id'    => static::VOLAPUK,
            'code'  => 'VO',
            'flag'  => '🇺🇳',
            'label' => 'Volapuk',
        ], [
            'id'    => static::WELSH,
            'code'  => 'CY',
            'flag'  => '🏴󠁧󠁢󠁷󠁬󠁳󠁿',
            'label' => 'Welsh',
        ], [
            'id'    => static::WOLOF,
            'code'  => 'WO',
            'flag'  => '🇸🇳',
            'label' => 'Wolof',
        ], [
            'id'    => static::XHOSA,
            'code'  => 'XH',
            'flag'  => '🇿🇦',
            'label' => 'Xhosa',
        ], [
            'id'    => static::YIDDISH,
            'code'  => 'JI',
            'flag'  => '🇮🇱',
            'label' => 'Yiddish',
        ], [
            'id'    => static::YORUBA,
            'code'  => 'YO',
            'flag'  => '🇺🇳',
            'label' => 'Yoruba',
        ], [
            'id'    => static::ZULU,
            'code'  => 'ZU',
            'flag'  => '🇿🇦',
            'label' => 'Zulu',
        ]];
    }
}
