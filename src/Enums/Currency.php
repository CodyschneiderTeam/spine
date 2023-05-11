<?php

namespace Caneara\Spine\Enums;

use Caneara\Spine\Types\Enum;

enum Currency : int
{
    use Enum;

    /**
     * The available cases.
     *
     */
    case AFGHAN_AFGHANI                          = 1;
    case ALBANIAN_LEK                            = 2;
    case ALGERIAN_DINAR                          = 3;
    case ANGOLAN_KWANZA                          = 4;
    case ARGENTINE_PESO                          = 5;
    case ARMENIAN_DRAM                           = 6;
    case ARUBAN_FLORIN                           = 7;
    case AUSTRALIAN_DOLLAR                       = 8;
    case AZERBAIJANI_MANAT                       = 9;
    case BAHAMIAN_DOLLAR                         = 10;
    case BAHRAINI_DINAR                          = 11;
    case BANGLADESHI_TAKA                        = 12;
    case BARBADOS_DOLLAR                         = 13;
    case BELARUSIAN_RUBLE                        = 14;
    case BELIZE_DOLLAR                           = 15;
    case BHUTANESE_NGULTRUM                      = 16;
    case BOLIVIANO                               = 17;
    case BOSNIA_AND_HERZEGOVINA_CONVERTIBLE_MARK = 18;
    case BOTSWANA_PULA                           = 19;
    case BRAZILIAN_REAL                          = 20;
    case BRUNEI_DOLLAR                           = 21;
    case BULGARIAN_LEV                           = 22;
    case BURUNDIAN_FRANC                         = 23;
    case CFA_FRANC_BCEAO                         = 24;
    case CFA_FRANC_BEAC                          = 25;
    case CFP_FRANC                               = 26;
    case CAMBODIAN_RIEL                          = 27;
    case CANADIAN_DOLLAR                         = 28;
    case CAPE_VERDE_ESCUDO                       = 29;
    case CAYMAN_ISLANDS_DOLLAR                   = 30;
    case CHILEAN_PESO                            = 31;
    case CHINESE_YUAN                            = 32;
    case COLOMBIAN_PESO                          = 33;
    case COMORO_FRANC                            = 34;
    case CONGOLESE_FRANC                         = 35;
    case COSTA_RICAN_COLON                       = 36;
    case CROATIAN_KUNA                           = 37;
    case CUBAN_PESO                              = 38;
    case CZECH_KORUNA                            = 39;
    case DANISH_KRONE                            = 40;
    case DJIBOUTIAN_FRANC                        = 41;
    case DOMINICAN_PESO                          = 42;
    case EAST_CARIBBEAN_DOLLAR                   = 43;
    case EGYPTIAN_POUND                          = 44;
    case ERITREAN_NAKFA                          = 45;
    case ETHIOPIAN_BIRR                          = 46;
    case EURO                                    = 47;
    case FALKLAND_ISLANDS_POUND                  = 48;
    case FIJI_DOLLAR                             = 49;
    case GAMBIAN_DALASI                          = 50;
    case GEORGIAN_LARI                           = 51;
    case GHANAIAN_CEDI                           = 52;
    case GIBRALTAR_POUND                         = 53;
    case GUATEMALAN_QUETZAL                      = 54;
    case GUINEAN_FRANC                           = 55;
    case GUYANESE_DOLLAR                         = 56;
    case HAITIAN_GOURDE                          = 57;
    case HONDURAN_LEMPIRA                        = 58;
    case HONG_KONG_DOLLAR                        = 59;
    case HUNGARIAN_FORINT                        = 60;
    case ICELANDIC_KRONA                         = 61;
    case INDIAN_RUPEE                            = 62;
    case INDONESIAN_RUPIAH                       = 63;
    case IRANIAN_RIAL                            = 64;
    case IRAQI_DINAR                             = 65;
    case ISRAELI_NEW_SHEKEL                      = 66;
    case JAMAICAN_DOLLAR                         = 67;
    case JAPANESE_YEN                            = 68;
    case JORDANIAN_DINAR                         = 69;
    case KAZAKHSTANI_TENGE                       = 70;
    case KENYAN_SHILLING                         = 71;
    case KUWAITI_DINAR                           = 72;
    case KYRGYZSTANI_SOM                         = 73;
    case LAO_KIP                                 = 74;
    case LEBANESE_POUND                          = 75;
    case LESOTHO_LOTI                            = 76;
    case LIBERIAN_DOLLAR                         = 77;
    case LIBYAN_DINAR                            = 78;
    case LITHUANIAN_LITAS                        = 79;
    case MACANESE_PATACA                         = 80;
    case MACEDONIAN_DENAR                        = 81;
    case MALAGASY_ARIARY                         = 82;
    case MALAWIAN_KWACHA                         = 83;
    case MALAYSIAN_RINGGIT                       = 84;
    case MALDIVIAN_RUFIYAA                       = 85;
    case MAURITANIAN_OUGUIYA                     = 86;
    case MAURITIAN_RUPEE                         = 87;
    case MEXICAN_PESO                            = 88;
    case MOLDOVAN_LEU                            = 89;
    case MONGOLIAN_TUGRIK                        = 90;
    case MOROCCAN_DIRHAM                         = 91;
    case MOZAMBICAN_METICAL                      = 92;
    case MYANMA_KYAT                             = 93;
    case NAMIBIAN_DOLLAR                         = 94;
    case NEPALESE_RUPEE                          = 95;
    case NETHERLANDS_ANTILLEAN_GUILDER           = 96;
    case NEW_TAIWAN_DOLLAR                       = 97;
    case NEW_ZEALAND_DOLLAR                      = 98;
    case NICARAGUAN_CORDOBA                      = 99;
    case NIGERIAN_NAIRA                          = 100;
    case NORTH_KOREAN_WON                        = 101;
    case NORWEGIAN_KRONE                         = 102;
    case OMANI_RIAL                              = 103;
    case PAKISTANI_RUPEE                         = 104;
    case PANAMANIAN_BALBOA                       = 105;
    case PAPUA_NEW_GUINEAN_KINA                  = 106;
    case PARAGUAYAN_GUARANÍ                      = 107;
    case PERUVIAN_NUEVO_SOL                      = 108;
    case PHILIPPINE_PESO                         = 109;
    case POLISH_ZLOTY                            = 110;
    case QATARI_RIYAL                            = 111;
    case ROMANIAN_NEW_LEU                        = 112;
    case RUSSIAN_ROUBLE                          = 113;
    case RWANDAN_FRANC                           = 114;
    case SAINT_HELENA_POUND                      = 115;
    case SAMOAN_TALA                             = 116;
    case SAUDI_RIYAL                             = 117;
    case SERBIAN_DINAR                           = 118;
    case SEYCHELLES_RUPEE                        = 119;
    case SIERRA_LEONEAN_LEONE                    = 120;
    case SINGAPORE_DOLLAR                        = 121;
    case SOLOMON_ISLANDS_DOLLAR                  = 122;
    case SOMALI_SHILLING                         = 123;
    case SOUTH_AFRICAN_RAND                      = 124;
    case SOUTH_KOREAN_WON                        = 125;
    case SRI_LANKAN_RUPEE                        = 126;
    case SUDANESE_POUND                          = 127;
    case SURINAMESE_DOLLAR                       = 128;
    case SWAZI_LILANGENI                         = 129;
    case SWEDISH_KRONA                           = 130;
    case SWISS_FRANC                             = 131;
    case SYRIAN_POUND                            = 132;
    case SAO_TOME_AND_PRINCIPE_DOBRA             = 133;
    case TAJIKISTANI_SOMONI                      = 134;
    case TANZANIAN_SHILLING                      = 135;
    case THAI_BAHT                               = 136;
    case TONGAN_PAANGA                           = 137;
    case TRINIDAD_AND_TOBAGO_DOLLAR              = 138;
    case TUNISIAN_DINAR                          = 139;
    case TURKISH_LIRA                            = 140;
    case TURKMENISTANI_MANAT                     = 141;
    case UGANDAN_SHILLING                        = 142;
    case UKRAINIAN_HRYVNIA                       = 143;
    case UNITED_ARAB_EMIRATES_DIRHAM             = 144;
    case UNITED_KINGDOM_POUND_STERLING           = 145;
    case UNITED_STATES_DOLLAR                    = 146;
    case URUGUAYAN_PESO                          = 147;
    case UZBEKISTAN_SOM                          = 148;
    case VANUATU_VATU                            = 149;
    case VENEZUELAN_BOLIVAR_FUERTE               = 150;
    case VIETNAMESE_DONG                         = 151;
    case YEMENI_RIAL                             = 152;
    case ZAMBIAN_KWACHA                          = 153;

    /**
     * Retrieve the available cases as an array.
     *
     */
    public static function toArray() : array
    {
        return [[
            'id'     => static::AFGHAN_AFGHANI,
            'code'   => 'AFN',
            'symbol' => '؋',
            'name'   => 'Afghan afghani',
        ], [
            'id'     => static::ALBANIAN_LEK,
            'code'   => 'ALL',
            'symbol' => 'L',
            'name'   => 'Albanian lek',
        ], [
            'id'     => static::ALGERIAN_DINAR,
            'code'   => 'DZD',
            'symbol' => 'د.ج',
            'name'   => 'Algerian dinar',
        ], [
            'id'     => static::ANGOLAN_KWANZA,
            'code'   => 'AOA',
            'symbol' => 'Kz',
            'name'   => 'Angolan kwanza',
        ], [
            'id'     => static::ARGENTINE_PESO,
            'code'   => 'ARS',
            'symbol' => '$',
            'name'   => 'Argentine peso',
        ], [
            'id'     => static::ARMENIAN_DRAM,
            'code'   => 'AMD',
            'symbol' => 'դր.',
            'name'   => 'Armenian dram',
        ], [
            'id'     => static::ARUBAN_FLORIN,
            'code'   => 'AWG',
            'symbol' => 'ƒ',
            'name'   => 'Aruban florin',
        ], [
            'id'     => static::AUSTRALIAN_DOLLAR,
            'code'   => 'AUD',
            'symbol' => '$',
            'name'   => 'Australian dollar',
        ], [
            'id'     => static::AZERBAIJANI_MANAT,
            'code'   => 'AZN',
            'symbol' => 'm',
            'name'   => 'Azerbaijani manat',
        ], [
            'id'     => static::BAHAMIAN_DOLLAR,
            'code'   => 'BSD',
            'symbol' => '$',
            'name'   => 'Bahamian dollar',
        ], [
            'id'     => static::BAHRAINI_DINAR,
            'code'   => 'BHD',
            'symbol' => '.د.ب',
            'name'   => 'Bahraini dinar',
        ], [
            'id'     => static::BANGLADESHI_TAKA,
            'code'   => 'BDT',
            'symbol' => '৳',
            'name'   => 'Bangladeshi taka',
        ], [
            'id'     => static::BARBADOS_DOLLAR,
            'code'   => 'BBD',
            'symbol' => '$',
            'name'   => 'Barbados dollar',
        ], [
            'id'     => static::BELARUSIAN_RUBLE,
            'code'   => 'BYR',
            'symbol' => 'Br',
            'name'   => 'Belarusian ruble',
        ], [
            'id'     => static::BELIZE_DOLLAR,
            'code'   => 'BZD',
            'symbol' => '$',
            'name'   => 'Belize dollar',
        ], [
            'id'     => static::BHUTANESE_NGULTRUM,
            'code'   => 'BTN',
            'symbol' => 'Nu.',
            'name'   => 'Bhutanese ngultrum',
        ], [
            'id'     => static::BOLIVIANO,
            'code'   => 'BOB',
            'symbol' => 'Bs.',
            'name'   => 'Boliviano',
        ], [
            'id'     => static::BOSNIA_AND_HERZEGOVINA_CONVERTIBLE_MARK,
            'code'   => 'BAM',
            'symbol' => 'КМ',
            'name'   => 'Bosnia and Herzegovina convertible mark',
        ], [
            'id'     => static::BOTSWANA_PULA,
            'code'   => 'BWP',
            'symbol' => 'P',
            'name'   => 'Botswana pula',
        ], [
            'id'     => static::BRAZILIAN_REAL,
            'code'   => 'BRL',
            'symbol' => 'R$',
            'name'   => 'Brazilian real',
        ], [
            'id'     => static::BRUNEI_DOLLAR,
            'code'   => 'BND',
            'symbol' => '$',
            'name'   => 'Brunei dollar',
        ], [
            'id'     => static::BULGARIAN_LEV,
            'code'   => 'BGN',
            'symbol' => 'лв',
            'name'   => 'Bulgarian lev',
        ], [
            'id'     => static::BURUNDIAN_FRANC,
            'code'   => 'BIF',
            'symbol' => 'Fr',
            'name'   => 'Burundian franc',
        ], [
            'id'     => static::CFA_FRANC_BCEAO,
            'code'   => 'XOF',
            'symbol' => 'Fr',
            'name'   => 'CFA franc BCEAO',
        ], [
            'id'     => static::CFA_FRANC_BEAC,
            'code'   => 'XAF',
            'symbol' => 'Fr',
            'name'   => 'CFA franc BEAC',
        ], [
            'id'     => static::CFP_FRANC,
            'code'   => 'XPF',
            'symbol' => 'Fr',
            'name'   => 'CFP franc',
        ], [
            'id'     => static::CAMBODIAN_RIEL,
            'code'   => 'KHR',
            'symbol' => '៛',
            'name'   => 'Cambodian riel',
        ], [
            'id'     => static::CANADIAN_DOLLAR,
            'code'   => 'CAD',
            'symbol' => '$',
            'name'   => 'Canadian dollar',
        ], [
            'id'     => static::CAPE_VERDE_ESCUDO,
            'code'   => 'CVE',
            'symbol' => '$',
            'name'   => 'Cape Verde escudo',
        ], [
            'id'     => static::CAYMAN_ISLANDS_DOLLAR,
            'code'   => 'KYD',
            'symbol' => '$',
            'name'   => 'Cayman Islands dollar',
        ], [
            'id'     => static::CHILEAN_PESO,
            'code'   => 'CLP',
            'symbol' => '$',
            'name'   => 'Chilean peso',
        ], [
            'id'     => static::CHINESE_YUAN,
            'code'   => 'CNY',
            'symbol' => '¥',
            'name'   => 'Chinese yuan',
        ], [
            'id'     => static::COLOMBIAN_PESO,
            'code'   => 'COP',
            'symbol' => '$',
            'name'   => 'Colombian peso',
        ], [
            'id'     => static::COMORO_FRANC,
            'code'   => 'KMF',
            'symbol' => 'Fr',
            'name'   => 'Comoro franc',
        ], [
            'id'     => static::CONGOLESE_FRANC,
            'code'   => 'CDF',
            'symbol' => 'Fr',
            'name'   => 'Congolese franc',
        ], [
            'id'     => static::COSTA_RICAN_COLON,
            'code'   => 'CRC',
            'symbol' => '₡',
            'name'   => 'Costa Rican colon',
        ], [
            'id'     => static::CROATIAN_KUNA,
            'code'   => 'HRK',
            'symbol' => 'kn',
            'name'   => 'Croatian kuna',
        ], [
            'id'     => static::CUBAN_PESO,
            'code'   => 'CUP',
            'symbol' => '$',
            'name'   => 'Cuban peso',
        ], [
            'id'     => static::CZECH_KORUNA,
            'code'   => 'CZK',
            'symbol' => 'Kč',
            'name'   => 'Czech koruna',
        ], [
            'id'     => static::DANISH_KRONE,
            'code'   => 'DKK',
            'symbol' => 'kr',
            'name'   => 'Danish krone',
        ], [
            'id'     => static::DJIBOUTIAN_FRANC,
            'code'   => 'DJF',
            'symbol' => 'Fr',
            'name'   => 'Djiboutian franc',
        ], [
            'id'     => static::DOMINICAN_PESO,
            'code'   => 'DOP',
            'symbol' => '$',
            'name'   => 'Dominican peso',
        ], [
            'id'     => static::EAST_CARIBBEAN_DOLLAR,
            'code'   => 'XCD',
            'symbol' => '$',
            'name'   => 'East Caribbean dollar',
        ], [
            'id'     => static::EGYPTIAN_POUND,
            'code'   => 'EGP',
            'symbol' => 'ج.م',
            'name'   => 'Egyptian pound',
        ], [
            'id'     => static::ERITREAN_NAKFA,
            'code'   => 'ERN',
            'symbol' => 'Nfk',
            'name'   => 'Eritrean nakfa',
        ], [
            'id'     => static::ETHIOPIAN_BIRR,
            'code'   => 'ETB',
            'symbol' => 'Br',
            'name'   => 'Ethiopian birr',
        ], [
            'id'     => static::EURO,
            'code'   => 'EUR',
            'symbol' => '€',
            'name'   => 'Euro',
        ], [
            'id'     => static::FALKLAND_ISLANDS_POUND,
            'code'   => 'FKP',
            'symbol' => '£',
            'name'   => 'Falkland Islands pound',
        ], [
            'id'     => static::FIJI_DOLLAR,
            'code'   => 'FJD',
            'symbol' => '$',
            'name'   => 'Fiji dollar',
        ], [
            'id'     => static::GAMBIAN_DALASI,
            'code'   => 'GMD',
            'symbol' => 'D',
            'name'   => 'Gambian dalasi',
        ], [
            'id'     => static::GEORGIAN_LARI,
            'code'   => 'GEL',
            'symbol' => 'ლ',
            'name'   => 'Georgian lari',
        ], [
            'id'     => static::GHANAIAN_CEDI,
            'code'   => 'GHS',
            'symbol' => '₵',
            'name'   => 'Ghanaian cedi',
        ], [
            'id'     => static::GIBRALTAR_POUND,
            'code'   => 'GIP',
            'symbol' => '£',
            'name'   => 'Gibraltar pound',
        ], [
            'id'     => static::GUATEMALAN_QUETZAL,
            'code'   => 'GTQ',
            'symbol' => 'Q',
            'name'   => 'Guatemalan quetzal',
        ], [
            'id'     => static::GUINEAN_FRANC,
            'code'   => 'GNF',
            'symbol' => 'Fr',
            'name'   => 'Guinean franc',
        ], [
            'id'     => static::GUYANESE_DOLLAR,
            'code'   => 'GYD',
            'symbol' => '$',
            'name'   => 'Guyanese dollar',
        ], [
            'id'     => static::HAITIAN_GOURDE,
            'code'   => 'HTG',
            'symbol' => 'G',
            'name'   => 'Haitian gourde',
        ], [
            'id'     => static::HONDURAN_LEMPIRA,
            'code'   => 'HNL',
            'symbol' => 'L',
            'name'   => 'Honduran lempira',
        ], [
            'id'     => static::HONG_KONG_DOLLAR,
            'code'   => 'HKD',
            'symbol' => '$',
            'name'   => 'Hong Kong dollar',
        ], [
            'id'     => static::HUNGARIAN_FORINT,
            'code'   => 'HUF',
            'symbol' => 'Ft',
            'name'   => 'Hungarian forint',
        ], [
            'id'     => static::ICELANDIC_KRONA,
            'code'   => 'ISK',
            'symbol' => 'kr',
            'name'   => 'Icelandic króna',
        ], [
            'id'     => static::INDIAN_RUPEE,
            'code'   => 'INR',
            'symbol' => '₹',
            'name'   => 'Indian rupee',
        ], [
            'id'     => static::INDONESIAN_RUPIAH,
            'code'   => 'IDR',
            'symbol' => 'Rp',
            'name'   => 'Indonesian rupiah',
        ], [
            'id'     => static::IRANIAN_RIAL,
            'code'   => 'IRR',
            'symbol' => '﷼',
            'name'   => 'Iranian rial',
        ], [
            'id'     => static::IRAQI_DINAR,
            'code'   => 'IQD',
            'symbol' => 'ع.د',
            'name'   => 'Iraqi dinar',
        ], [
            'id'     => static::ISRAELI_NEW_SHEKEL,
            'code'   => 'ILS',
            'symbol' => '₪',
            'name'   => 'Israeli new shekel',
        ], [
            'id'     => static::JAMAICAN_DOLLAR,
            'code'   => 'JMD',
            'symbol' => '$',
            'name'   => 'Jamaican dollar',
        ], [
            'id'     => static::JAPANESE_YEN,
            'code'   => 'JPY',
            'symbol' => '¥',
            'name'   => 'Japanese yen',
        ], [
            'id'     => static::JORDANIAN_DINAR,
            'code'   => 'JOD',
            'symbol' => 'د.ا',
            'name'   => 'Jordanian dinar',
        ], [
            'id'     => static::KAZAKHSTANI_TENGE,
            'code'   => 'KZT',
            'symbol' => '₸',
            'name'   => 'Kazakhstani tenge',
        ], [
            'id'     => static::KENYAN_SHILLING,
            'code'   => 'KES',
            'symbol' => 'Sh',
            'name'   => 'Kenyan shilling',
        ], [
            'id'     => static::KUWAITI_DINAR,
            'code'   => 'KWD',
            'symbol' => 'د.ك',
            'name'   => 'Kuwaiti dinar',
        ], [
            'id'     => static::KYRGYZSTANI_SOM,
            'code'   => 'KGS',
            'symbol' => 'лв',
            'name'   => 'Kyrgyzstani som',
        ], [
            'id'     => static::LAO_KIP,
            'code'   => 'LAK',
            'symbol' => '₭',
            'name'   => 'Lao kip',
        ], [
            'id'     => static::LEBANESE_POUND,
            'code'   => 'LBP',
            'symbol' => 'ل',
            'name'   => 'Lebanese pound',
        ], [
            'id'     => static::LESOTHO_LOTI,
            'code'   => 'LSL',
            'symbol' => 'L',
            'name'   => 'Lesotho loti',
        ], [
            'id'     => static::LIBERIAN_DOLLAR,
            'code'   => 'LRD',
            'symbol' => '$',
            'name'   => 'Liberian dollar',
        ], [
            'id'     => static::LIBYAN_DINAR,
            'code'   => 'LYD',
            'symbol' => 'ل.د',
            'name'   => 'Libyan dinar',
        ], [
            'id'     => static::LITHUANIAN_LITAS,
            'code'   => 'LTL',
            'symbol' => 'Lt',
            'name'   => 'Lithuanian litas',
        ], [
            'id'     => static::MACANESE_PATACA,
            'code'   => 'MOP',
            'symbol' => 'P',
            'name'   => 'Macanese pataca',
        ], [
            'id'     => static::MACEDONIAN_DENAR,
            'code'   => 'MKD',
            'symbol' => 'ден',
            'name'   => 'Macedonian denar',
        ], [
            'id'     => static::MALAGASY_ARIARY,
            'code'   => 'MGA',
            'symbol' => 'Ar',
            'name'   => 'Malagasy ariary',
        ], [
            'id'     => static::MALAWIAN_KWACHA,
            'code'   => 'MWK',
            'symbol' => 'MK',
            'name'   => 'Malawian kwacha',
        ], [
            'id'     => static::MALAYSIAN_RINGGIT,
            'code'   => 'MYR',
            'symbol' => 'RM',
            'name'   => 'Malaysian ringgit',
        ], [
            'id'     => static::MALDIVIAN_RUFIYAA,
            'code'   => 'MVR',
            'symbol' => 'ރ',
            'name'   => 'Maldivian rufiyaa',
        ], [
            'id'     => static::MAURITANIAN_OUGUIYA,
            'code'   => 'MRO',
            'symbol' => 'UM',
            'name'   => 'Mauritanian ouguiya',
        ], [
            'id'     => static::MAURITIAN_RUPEE,
            'code'   => 'MUR',
            'symbol' => '₨',
            'name'   => 'Mauritian rupee',
        ], [
            'id'     => static::MEXICAN_PESO,
            'code'   => 'MXN',
            'symbol' => '$',
            'name'   => 'Mexican peso',
        ], [
            'id'     => static::MOLDOVAN_LEU,
            'code'   => 'MDL',
            'symbol' => 'L',
            'name'   => 'Moldovan leu',
        ], [
            'id'     => static::MONGOLIAN_TUGRIK,
            'code'   => 'MNT',
            'symbol' => '₮',
            'name'   => 'Mongolian tugrik',
        ], [
            'id'     => static::MOROCCAN_DIRHAM,
            'code'   => 'MAD',
            'symbol' => 'د.م.',
            'name'   => 'Moroccan dirham',
        ], [
            'id'     => static::MOZAMBICAN_METICAL,
            'code'   => 'MZN',
            'symbol' => 'MT',
            'name'   => 'Mozambican metical',
        ], [
            'id'     => static::MYANMA_KYAT,
            'code'   => 'MMK',
            'symbol' => 'Ks',
            'name'   => 'Myanma kyat',
        ], [
            'id'     => static::NAMIBIAN_DOLLAR,
            'code'   => 'NAD',
            'symbol' => '$',
            'name'   => 'Namibian dollar',
        ], [
            'id'     => static::NEPALESE_RUPEE,
            'code'   => 'NPR',
            'symbol' => '₨',
            'name'   => 'Nepalese rupee',
        ], [
            'id'     => static::NETHERLANDS_ANTILLEAN_GUILDER,
            'code'   => 'ANG',
            'symbol' => 'ƒ',
            'name'   => 'Netherlands Antillean guilder',
        ], [
            'id'     => static::NEW_TAIWAN_DOLLAR,
            'code'   => 'TWD',
            'symbol' => '$',
            'name'   => 'New Taiwan dollar',
        ], [
            'id'     => static::NEW_ZEALAND_DOLLAR,
            'code'   => 'NZD',
            'symbol' => '$',
            'name'   => 'New Zealand dollar',
        ], [
            'id'     => static::NICARAGUAN_CORDOBA,
            'code'   => 'NIO',
            'symbol' => 'C$',
            'name'   => 'Nicaraguan córdoba',
        ], [
            'id'     => static::NIGERIAN_NAIRA,
            'code'   => 'NGN',
            'symbol' => '₦',
            'name'   => 'Nigerian naira',
        ], [
            'id'     => static::NORTH_KOREAN_WON,
            'code'   => 'KPW',
            'symbol' => '₩',
            'name'   => 'North Korean won',
        ], [
            'id'     => static::NORWEGIAN_KRONE,
            'code'   => 'NOK',
            'symbol' => 'kr',
            'name'   => 'Norwegian krone',
        ], [
            'id'     => static::OMANI_RIAL,
            'code'   => 'OMR',
            'symbol' => 'ر.ع.',
            'name'   => 'Omani rial',
        ], [
            'id'     => static::PAKISTANI_RUPEE,
            'code'   => 'PKR',
            'symbol' => '₨',
            'name'   => 'Pakistani rupee',
        ], [
            'id'     => static::PANAMANIAN_BALBOA,
            'code'   => 'PAB',
            'symbol' => 'B/.',
            'name'   => 'Panamanian balboa',
        ], [
            'id'     => static::PAPUA_NEW_GUINEAN_KINA,
            'code'   => 'PGK',
            'symbol' => 'K',
            'name'   => 'Papua New Guinean kina',
        ], [
            'id'     => static::PARAGUAYAN_GUARANÍ,
            'code'   => 'PYG',
            'symbol' => '₲',
            'name'   => 'Paraguayan guaraní',
        ], [
            'id'     => static::PERUVIAN_NUEVO_SOL,
            'code'   => 'PEN',
            'symbol' => 'S/.',
            'name'   => 'Peruvian nuevo sol',
        ], [
            'id'     => static::PHILIPPINE_PESO,
            'code'   => 'PHP',
            'symbol' => '₱',
            'name'   => 'Philippine peso',
        ], [
            'id'     => static::POLISH_ZLOTY,
            'code'   => 'PLN',
            'symbol' => 'zł',
            'name'   => 'Polish złoty',
        ], [
            'id'     => static::QATARI_RIYAL,
            'code'   => 'QAR',
            'symbol' => 'ر.ق',
            'name'   => 'Qatari riyal',
        ], [
            'id'     => static::ROMANIAN_NEW_LEU,
            'code'   => 'RON',
            'symbol' => 'L',
            'name'   => 'Romanian new leu',
        ], [
            'id'     => static::RUSSIAN_ROUBLE,
            'code'   => 'RUB',
            'symbol' => 'руб.',
            'name'   => 'Russian rouble',
        ], [
            'id'     => static::RWANDAN_FRANC,
            'code'   => 'RWF',
            'symbol' => 'Fr',
            'name'   => 'Rwandan franc',
        ], [
            'id'     => static::SAINT_HELENA_POUND,
            'code'   => 'SHP',
            'symbol' => '£',
            'name'   => 'Saint Helena pound',
        ], [
            'id'     => static::SAMOAN_TALA,
            'code'   => 'WST',
            'symbol' => 'T',
            'name'   => 'Samoan tala',
        ], [
            'id'     => static::SAUDI_RIYAL,
            'code'   => 'SAR',
            'symbol' => 'ر.س',
            'name'   => 'Saudi riyal',
        ], [
            'id'     => static::SERBIAN_DINAR,
            'code'   => 'RSD',
            'symbol' => 'дин.',
            'name'   => 'Serbian dinar',
        ], [
            'id'     => static::SEYCHELLES_RUPEE,
            'code'   => 'SCR',
            'symbol' => '₨',
            'name'   => 'Seychelles rupee',
        ], [
            'id'     => static::SIERRA_LEONEAN_LEONE,
            'code'   => 'SLL',
            'symbol' => 'Le',
            'name'   => 'Sierra leonean leone',
        ], [
            'id'     => static::SINGAPORE_DOLLAR,
            'code'   => 'SGD',
            'symbol' => '$',
            'name'   => 'Singapore dollar',
        ], [
            'id'     => static::SOLOMON_ISLANDS_DOLLAR,
            'code'   => 'SBD',
            'symbol' => '$',
            'name'   => 'Solomon Islands dollar',
        ], [
            'id'     => static::SOMALI_SHILLING,
            'code'   => 'SOS',
            'symbol' => 'Sh',
            'name'   => 'Somali shilling',
        ], [
            'id'     => static::SOUTH_AFRICAN_RAND,
            'code'   => 'ZAR',
            'symbol' => 'R',
            'name'   => 'South African rand',
        ], [
            'id'     => static::SOUTH_KOREAN_WON,
            'code'   => 'KRW',
            'symbol' => '₩',
            'name'   => 'South Korean won',
        ], [
            'id'     => static::SRI_LANKAN_RUPEE,
            'code'   => 'LKR',
            'symbol' => 'Rs',
            'name'   => 'Sri Lankan rupee',
        ], [
            'id'     => static::SUDANESE_POUND,
            'code'   => 'SDG',
            'symbol' => '£',
            'name'   => 'Sudanese pound',
        ], [
            'id'     => static::SURINAMESE_DOLLAR,
            'code'   => 'SRD',
            'symbol' => '$',
            'name'   => 'Surinamese dollar',
        ], [
            'id'     => static::SWAZI_LILANGENI,
            'code'   => 'SZL',
            'symbol' => 'L',
            'name'   => 'Swazi lilangeni',
        ], [
            'id'     => static::SWEDISH_KRONA,
            'code'   => 'SEK',
            'symbol' => 'kr',
            'name'   => 'Swedish krona',
        ], [
            'id'     => static::SWISS_FRANC,
            'code'   => 'CHF',
            'symbol' => 'Fr',
            'name'   => 'Swiss franc',
        ], [
            'id'     => static::SYRIAN_POUND,
            'code'   => 'SYP',
            'symbol' => 'ل.س',
            'name'   => 'Syrian pound',
        ], [
            'id'     => static::SAO_TOME_AND_PRINCIPE_DOBRA,
            'code'   => 'STD',
            'symbol' => 'Db',
            'name'   => 'São Tomé and Príncipe dobra',
        ], [
            'id'     => static::TAJIKISTANI_SOMONI,
            'code'   => 'TJS',
            'symbol' => 'SM',
            'name'   => 'Tajikistani somoni',
        ], [
            'id'     => static::TANZANIAN_SHILLING,
            'code'   => 'TZS',
            'symbol' => 'Sh',
            'name'   => 'Tanzanian shilling',
        ], [
            'id'     => static::THAI_BAHT,
            'code'   => 'THB',
            'symbol' => '฿',
            'name'   => 'Thai baht',
        ], [
            'id'     => static::TONGAN_PAANGA,
            'code'   => 'TOP',
            'symbol' => 'T$',
            'name'   => "Tongan pa'anga",
        ], [
            'id'     => static::TRINIDAD_AND_TOBAGO_DOLLAR,
            'code'   => 'TTD',
            'symbol' => '$',
            'name'   => 'Trinidad and Tobago dollar',
        ], [
            'id'     => static::TUNISIAN_DINAR,
            'code'   => 'TND',
            'symbol' => 'د.ت',
            'name'   => 'Tunisian dinar',
        ], [
            'id'     => static::TURKISH_LIRA,
            'code'   => 'TRY',
            'symbol' => 'T',
            'name'   => 'Turkish lira',
        ], [
            'id'     => static::TURKMENISTANI_MANAT,
            'code'   => 'TMT',
            'symbol' => 'm',
            'name'   => 'Turkmenistani manat',
        ], [
            'id'     => static::UGANDAN_SHILLING,
            'code'   => 'UGX',
            'symbol' => 'Sh',
            'name'   => 'Ugandan shilling',
        ], [
            'id'     => static::UKRAINIAN_HRYVNIA,
            'code'   => 'UAH',
            'symbol' => '₴',
            'name'   => 'Ukrainian hryvnia',
        ], [
            'id'     => static::UNITED_ARAB_EMIRATES_DIRHAM,
            'code'   => 'AED',
            'symbol' => 'د.إ',
            'name'   => 'United Arab Emirates dirham',
        ], [
            'id'     => static::UNITED_KINGDOM_POUND_STERLING,
            'code'   => 'GBP',
            'symbol' => '£',
            'name'   => 'United Kingdom pound sterling',
        ], [
            'id'     => static::UNITED_STATES_DOLLAR,
            'code'   => 'USD',
            'symbol' => '$',
            'name'   => 'United States dollar',
        ], [
            'id'     => static::URUGUAYAN_PESO,
            'code'   => 'UYU',
            'symbol' => '$',
            'name'   => 'Uruguayan peso',
        ], [
            'id'     => static::UZBEKISTAN_SOM,
            'code'   => 'UZS',
            'symbol' => 'лв',
            'name'   => 'Uzbekistan som',
        ], [
            'id'     => static::VANUATU_VATU,
            'code'   => 'VUV',
            'symbol' => 'Vt',
            'name'   => 'Vanuatu vatu',
        ], [
            'id'     => static::VENEZUELAN_BOLIVAR_FUERTE,
            'code'   => 'VEF',
            'symbol' => 'BsF',
            'name'   => 'Venezuelan bolívar fuerte',
        ], [
            'id'     => static::VIETNAMESE_DONG,
            'code'   => 'VND',
            'symbol' => '₫',
            'name'   => 'Vietnamese dong',
        ], [
            'id'     => static::YEMENI_RIAL,
            'code'   => 'YER',
            'symbol' => '﷼',
            'name'   => 'Yemeni rial',
        ], [
            'id'     => static::ZAMBIAN_KWACHA,
            'code'   => 'ZMW',
            'symbol' => 'ZK',
            'name'   => 'Zambian kwacha',
        ]];
    }
}
