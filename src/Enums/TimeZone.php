<?php

namespace System\Enums;

use System\Types\Enum;
use Illuminate\Support\Collection;

enum TimeZone : int
{
    use Enum;

    /**
     * The available cases.
     *
     */
    case AFRICA_ABIDJAN                 = 1;
    case AFRICA_ACCRA                   = 2;
    case AFRICA_ADDIS_ABABA             = 3;
    case AFRICA_ALGIERS                 = 4;
    case AFRICA_ASMARA                  = 5;
    case AFRICA_BAMAKO                  = 6;
    case AFRICA_BANGUI                  = 7;
    case AFRICA_BANJUL                  = 8;
    case AFRICA_BISSAU                  = 9;
    case AFRICA_BLANTYRE                = 10;
    case AFRICA_BRAZZAVILLE             = 11;
    case AFRICA_BUJUMBURA               = 12;
    case AFRICA_CAIRO                   = 13;
    case AFRICA_CASABLANCA              = 14;
    case AFRICA_CEUTA                   = 15;
    case AFRICA_CONAKRY                 = 16;
    case AFRICA_DAKAR                   = 17;
    case AFRICA_DAR_ES_SALAAM           = 18;
    case AFRICA_DJIBOUTI                = 19;
    case AFRICA_DOUALA                  = 20;
    case AFRICA_EL_AAIUN                = 21;
    case AFRICA_FREETOWN                = 22;
    case AFRICA_GABORONE                = 23;
    case AFRICA_HARARE                  = 24;
    case AFRICA_JOHANNESBURG            = 25;
    case AFRICA_JUBA                    = 26;
    case AFRICA_KAMPALA                 = 27;
    case AFRICA_KHARTOUM                = 28;
    case AFRICA_KIGALI                  = 29;
    case AFRICA_KINSHASA                = 30;
    case AFRICA_LAGOS                   = 31;
    case AFRICA_LIBREVILLE              = 32;
    case AFRICA_LOME                    = 33;
    case AFRICA_LUANDA                  = 34;
    case AFRICA_LUBUMBASHI              = 35;
    case AFRICA_LUSAKA                  = 36;
    case AFRICA_MALABO                  = 37;
    case AFRICA_MAPUTO                  = 38;
    case AFRICA_MASERU                  = 39;
    case AFRICA_MBABANE                 = 40;
    case AFRICA_MOGADISHU               = 41;
    case AFRICA_MONROVIA                = 42;
    case AFRICA_NAIROBI                 = 43;
    case AFRICA_NDJAMENA                = 44;
    case AFRICA_NIAMEY                  = 45;
    case AFRICA_NOUAKCHOTT              = 46;
    case AFRICA_OUAGADOUGOU             = 47;
    case AFRICA_PORTO_NOVO              = 48;
    case AFRICA_SAO_TOME                = 49;
    case AFRICA_TRIPOLI                 = 50;
    case AFRICA_TUNIS                   = 51;
    case AFRICA_WINDHOEK                = 52;
    case AMERICA_ADAK                   = 53;
    case AMERICA_ANCHORAGE              = 54;
    case AMERICA_ANGUILLA               = 55;
    case AMERICA_ANTIGUA                = 56;
    case AMERICA_ARAGUAINA              = 57;
    case AMERICA_ARGENTINA_BUENOS_AIRES = 58;
    case AMERICA_ARGENTINA_CATAMARCA    = 59;
    case AMERICA_ARGENTINA_CORDOBA      = 60;
    case AMERICA_ARGENTINA_JUJUY        = 61;
    case AMERICA_ARGENTINA_LA_RIOJA     = 62;
    case AMERICA_ARGENTINA_MENDOZA      = 63;
    case AMERICA_ARGENTINA_RIO_GALLEGOS = 64;
    case AMERICA_ARGENTINA_SALTA        = 65;
    case AMERICA_ARGENTINA_SAN_JUAN     = 66;
    case AMERICA_ARGENTINA_SAN_LUIS     = 67;
    case AMERICA_ARGENTINA_TUCUMAN      = 68;
    case AMERICA_ARGENTINA_USHUAIA      = 69;
    case AMERICA_ARUBA                  = 70;
    case AMERICA_ASUNCION               = 71;
    case AMERICA_ATIKOKAN               = 72;
    case AMERICA_BAHIA                  = 73;
    case AMERICA_BAHIA_BANDERAS         = 74;
    case AMERICA_BARBADOS               = 75;
    case AMERICA_BELEM                  = 76;
    case AMERICA_BELIZE                 = 77;
    case AMERICA_BLANC_SABLON           = 78;
    case AMERICA_BOA_VISTA              = 79;
    case AMERICA_BOGOTA                 = 80;
    case AMERICA_BOISE                  = 81;
    case AMERICA_CAMBRIDGE_BAY          = 82;
    case AMERICA_CAMPO_GRANDE           = 83;
    case AMERICA_CANCUN                 = 84;
    case AMERICA_CARACAS                = 85;
    case AMERICA_CAYENNE                = 86;
    case AMERICA_CAYMAN                 = 87;
    case AMERICA_CHICAGO                = 88;
    case AMERICA_CHIHUAHUA              = 89;
    case AMERICA_CIUDAD_JUAREZ          = 90;
    case AMERICA_COSTA_RICA             = 91;
    case AMERICA_CRESTON                = 92;
    case AMERICA_CUIABA                 = 93;
    case AMERICA_CURACAO                = 94;
    case AMERICA_DANMARKSHAVN           = 95;
    case AMERICA_DAWSON                 = 96;
    case AMERICA_DAWSON_CREEK           = 97;
    case AMERICA_DENVER                 = 98;
    case AMERICA_DETROIT                = 99;
    case AMERICA_DOMINICA               = 100;
    case AMERICA_EDMONTON               = 101;
    case AMERICA_EIRUNEPE               = 102;
    case AMERICA_EL_SALVADOR            = 103;
    case AMERICA_FORT_NELSON            = 104;
    case AMERICA_FORTALEZA              = 105;
    case AMERICA_GLACE_BAY              = 106;
    case AMERICA_GOOSE_BAY              = 107;
    case AMERICA_GRAND_TURK             = 108;
    case AMERICA_GRENADA                = 109;
    case AMERICA_GUADELOUPE             = 110;
    case AMERICA_GUATEMALA              = 111;
    case AMERICA_GUAYAQUIL              = 112;
    case AMERICA_GUYANA                 = 113;
    case AMERICA_HALIFAX                = 114;
    case AMERICA_HAVANA                 = 115;
    case AMERICA_HERMOSILLO             = 116;
    case AMERICA_INDIANA_INDIANAPOLIS   = 117;
    case AMERICA_INDIANA_KNOX           = 118;
    case AMERICA_INDIANA_MARENGO        = 119;
    case AMERICA_INDIANA_PETERSBURG     = 120;
    case AMERICA_INDIANA_TELL_CITY      = 121;
    case AMERICA_INDIANA_VEVAY          = 122;
    case AMERICA_INDIANA_VINCENNES      = 123;
    case AMERICA_INDIANA_WINAMAC        = 124;
    case AMERICA_INUVIK                 = 125;
    case AMERICA_IQALUIT                = 126;
    case AMERICA_JAMAICA                = 127;
    case AMERICA_JUNEAU                 = 128;
    case AMERICA_KENTUCKY_LOUISVILLE    = 129;
    case AMERICA_KENTUCKY_MONTICELLO    = 130;
    case AMERICA_KRALENDIJK             = 131;
    case AMERICA_LA_PAZ                 = 132;
    case AMERICA_LIMA                   = 133;
    case AMERICA_LOS_ANGELES            = 134;
    case AMERICA_LOWER_PRINCES          = 135;
    case AMERICA_MACEIO                 = 136;
    case AMERICA_MANAGUA                = 137;
    case AMERICA_MANAUS                 = 138;
    case AMERICA_MARIGOT                = 139;
    case AMERICA_MARTINIQUE             = 140;
    case AMERICA_MATAMOROS              = 141;
    case AMERICA_MAZATLAN               = 142;
    case AMERICA_MENOMINEE              = 143;
    case AMERICA_MERIDA                 = 144;
    case AMERICA_METLAKATLA             = 145;
    case AMERICA_MEXICO_CITY            = 146;
    case AMERICA_MIQUELON               = 147;
    case AMERICA_MONCTON                = 148;
    case AMERICA_MONTERREY              = 149;
    case AMERICA_MONTEVIDEO             = 150;
    case AMERICA_MONTSERRAT             = 151;
    case AMERICA_NASSAU                 = 152;
    case AMERICA_NEW_YORK               = 153;
    case AMERICA_NOME                   = 154;
    case AMERICA_NORONHA                = 155;
    case AMERICA_NORTH_DAKOTA_BEULAH    = 156;
    case AMERICA_NORTH_DAKOTA_CENTER    = 157;
    case AMERICA_NORTH_DAKOTA_NEW_SALEM = 158;
    case AMERICA_NUUK                   = 159;
    case AMERICA_OJINAGA                = 160;
    case AMERICA_PANAMA                 = 161;
    case AMERICA_PARAMARIBO             = 162;
    case AMERICA_PHOENIX                = 163;
    case AMERICA_PORT_AU_PRINCE         = 164;
    case AMERICA_PORT_OF_SPAIN          = 165;
    case AMERICA_PORTO_VELHO            = 166;
    case AMERICA_PUERTO_RICO            = 167;
    case AMERICA_PUNTA_ARENAS           = 168;
    case AMERICA_RANKIN_INLET           = 169;
    case AMERICA_RECIFE                 = 170;
    case AMERICA_REGINA                 = 171;
    case AMERICA_RESOLUTE               = 172;
    case AMERICA_RIO_BRANCO             = 173;
    case AMERICA_SANTAREM               = 174;
    case AMERICA_SANTIAGO               = 175;
    case AMERICA_SANTO_DOMINGO          = 176;
    case AMERICA_SAO_PAULO              = 177;
    case AMERICA_SCORESBYSUND           = 178;
    case AMERICA_SITKA                  = 179;
    case AMERICA_ST_BARTHELEMY          = 180;
    case AMERICA_ST_JOHNS               = 181;
    case AMERICA_ST_KITTS               = 182;
    case AMERICA_ST_LUCIA               = 183;
    case AMERICA_ST_THOMAS              = 184;
    case AMERICA_ST_VINCENT             = 185;
    case AMERICA_SWIFT_CURRENT          = 186;
    case AMERICA_TEGUCIGALPA            = 187;
    case AMERICA_THULE                  = 188;
    case AMERICA_TIJUANA                = 189;
    case AMERICA_TORONTO                = 190;
    case AMERICA_TORTOLA                = 191;
    case AMERICA_VANCOUVER              = 192;
    case AMERICA_WHITEHORSE             = 193;
    case AMERICA_WINNIPEG               = 194;
    case AMERICA_YAKUTAT                = 195;
    case AMERICA_YELLOWKNIFE            = 196;
    case ANTARCTICA_CASEY               = 197;
    case ANTARCTICA_DAVIS               = 198;
    case ANTARCTICA_DUMONTDURVILLE      = 199;
    case ANTARCTICA_MACQUARIE           = 200;
    case ANTARCTICA_MAWSON              = 201;
    case ANTARCTICA_MCMURDO             = 202;
    case ANTARCTICA_PALMER              = 203;
    case ANTARCTICA_ROTHERA             = 204;
    case ANTARCTICA_SYOWA               = 205;
    case ANTARCTICA_TROLL               = 206;
    case ANTARCTICA_VOSTOK              = 207;
    case ARCTIC_LONGYEARBYEN            = 208;
    case ASIA_ADEN                      = 209;
    case ASIA_ALMATY                    = 210;
    case ASIA_AMMAN                     = 211;
    case ASIA_ANADYR                    = 212;
    case ASIA_AQTAU                     = 213;
    case ASIA_AQTOBE                    = 214;
    case ASIA_ASHGABAT                  = 215;
    case ASIA_ATYRAU                    = 216;
    case ASIA_BAGHDAD                   = 217;
    case ASIA_BAHRAIN                   = 218;
    case ASIA_BAKU                      = 219;
    case ASIA_BANGKOK                   = 220;
    case ASIA_BARNAUL                   = 221;
    case ASIA_BEIRUT                    = 222;
    case ASIA_BISHKEK                   = 223;
    case ASIA_BRUNEI                    = 224;
    case ASIA_CHITA                     = 225;
    case ASIA_CHOIBALSAN                = 226;
    case ASIA_COLOMBO                   = 227;
    case ASIA_DAMASCUS                  = 228;
    case ASIA_DHAKA                     = 229;
    case ASIA_DILI                      = 230;
    case ASIA_DUBAI                     = 231;
    case ASIA_DUSHANBE                  = 232;
    case ASIA_FAMAGUSTA                 = 233;
    case ASIA_GAZA                      = 234;
    case ASIA_HEBRON                    = 235;
    case ASIA_HO_CHI_MINH               = 236;
    case ASIA_HONG_KONG                 = 237;
    case ASIA_HOVD                      = 238;
    case ASIA_IRKUTSK                   = 239;
    case ASIA_JAKARTA                   = 240;
    case ASIA_JAYAPURA                  = 241;
    case ASIA_JERUSALEM                 = 242;
    case ASIA_KABUL                     = 243;
    case ASIA_KAMCHATKA                 = 244;
    case ASIA_KARACHI                   = 245;
    case ASIA_KATHMANDU                 = 246;
    case ASIA_KHANDYGA                  = 247;
    case ASIA_KOLKATA                   = 248;
    case ASIA_KRASNOYARSK               = 249;
    case ASIA_KUALA_LUMPUR              = 250;
    case ASIA_KUCHING                   = 251;
    case ASIA_KUWAIT                    = 252;
    case ASIA_MACAU                     = 253;
    case ASIA_MAGADAN                   = 254;
    case ASIA_MAKASSAR                  = 255;
    case ASIA_MANILA                    = 256;
    case ASIA_MUSCAT                    = 257;
    case ASIA_NICOSIA                   = 258;
    case ASIA_NOVOKUZNETSK              = 259;
    case ASIA_NOVOSIBIRSK               = 260;
    case ASIA_OMSK                      = 261;
    case ASIA_ORAL                      = 262;
    case ASIA_PHNOM_PENH                = 263;
    case ASIA_PONTIANAK                 = 264;
    case ASIA_PYONGYANG                 = 265;
    case ASIA_QATAR                     = 266;
    case ASIA_QOSTANAY                  = 267;
    case ASIA_QYZYLORDA                 = 268;
    case ASIA_RIYADH                    = 269;
    case ASIA_SAKHALIN                  = 270;
    case ASIA_SAMARKAND                 = 271;
    case ASIA_SEOUL                     = 272;
    case ASIA_SHANGHAI                  = 273;
    case ASIA_SINGAPORE                 = 274;
    case ASIA_SREDNEKOLYMSK             = 275;
    case ASIA_TAIPEI                    = 276;
    case ASIA_TASHKENT                  = 277;
    case ASIA_TBILISI                   = 278;
    case ASIA_TEHRAN                    = 279;
    case ASIA_THIMPHU                   = 280;
    case ASIA_TOKYO                     = 281;
    case ASIA_TOMSK                     = 282;
    case ASIA_ULAANBAATAR               = 283;
    case ASIA_URUMQI                    = 284;
    case ASIA_UST_NERA                  = 285;
    case ASIA_VIENTIANE                 = 286;
    case ASIA_VLADIVOSTOK               = 287;
    case ASIA_YAKUTSK                   = 288;
    case ASIA_YANGON                    = 289;
    case ASIA_YEKATERINBURG             = 290;
    case ASIA_YEREVAN                   = 291;
    case ATLANTIC_AZORES                = 292;
    case ATLANTIC_BERMUDA               = 293;
    case ATLANTIC_CANARY                = 294;
    case ATLANTIC_CAPE_VERDE            = 295;
    case ATLANTIC_FAROE                 = 296;
    case ATLANTIC_MADEIRA               = 297;
    case ATLANTIC_REYKJAVIK             = 298;
    case ATLANTIC_SOUTH_GEORGIA         = 299;
    case ATLANTIC_ST_HELENA             = 300;
    case ATLANTIC_STANLEY               = 301;
    case AUSTRALIA_ADELAIDE             = 302;
    case AUSTRALIA_BRISBANE             = 303;
    case AUSTRALIA_BROKEN_HILL          = 304;
    case AUSTRALIA_DARWIN               = 305;
    case AUSTRALIA_EUCLA                = 306;
    case AUSTRALIA_HOBART               = 307;
    case AUSTRALIA_LINDEMAN             = 308;
    case AUSTRALIA_LORD_HOWE            = 309;
    case AUSTRALIA_MELBOURNE            = 310;
    case AUSTRALIA_PERTH                = 311;
    case AUSTRALIA_SYDNEY               = 312;
    case EUROPE_AMSTERDAM               = 313;
    case EUROPE_ANDORRA                 = 314;
    case EUROPE_ASTRAKHAN               = 315;
    case EUROPE_ATHENS                  = 316;
    case EUROPE_BELGRADE                = 317;
    case EUROPE_BERLIN                  = 318;
    case EUROPE_BRATISLAVA              = 319;
    case EUROPE_BRUSSELS                = 320;
    case EUROPE_BUCHAREST               = 321;
    case EUROPE_BUDAPEST                = 322;
    case EUROPE_BUSINGEN                = 323;
    case EUROPE_CHISINAU                = 324;
    case EUROPE_COPENHAGEN              = 325;
    case EUROPE_DUBLIN                  = 326;
    case EUROPE_GIBRALTAR               = 327;
    case EUROPE_GUERNSEY                = 328;
    case EUROPE_HELSINKI                = 329;
    case EUROPE_ISLE_OF_MAN             = 330;
    case EUROPE_ISTANBUL                = 331;
    case EUROPE_JERSEY                  = 332;
    case EUROPE_KALININGRAD             = 333;
    case EUROPE_KIROV                   = 334;
    case EUROPE_KYIV                    = 335;
    case EUROPE_LISBON                  = 336;
    case EUROPE_LJUBLJANA               = 337;
    case EUROPE_LONDON                  = 338;
    case EUROPE_LUXEMBOURG              = 339;
    case EUROPE_MADRID                  = 340;
    case EUROPE_MALTA                   = 341;
    case EUROPE_MARIEHAMN               = 342;
    case EUROPE_MINSK                   = 343;
    case EUROPE_MONACO                  = 344;
    case EUROPE_MOSCOW                  = 345;
    case EUROPE_OSLO                    = 346;
    case EUROPE_PARIS                   = 347;
    case EUROPE_PODGORICA               = 348;
    case EUROPE_PRAGUE                  = 349;
    case EUROPE_RIGA                    = 350;
    case EUROPE_ROME                    = 351;
    case EUROPE_SAMARA                  = 352;
    case EUROPE_SAN_MARINO              = 353;
    case EUROPE_SARAJEVO                = 354;
    case EUROPE_SARATOV                 = 355;
    case EUROPE_SIMFEROPOL              = 356;
    case EUROPE_SKOPJE                  = 357;
    case EUROPE_SOFIA                   = 358;
    case EUROPE_STOCKHOLM               = 359;
    case EUROPE_TALLINN                 = 360;
    case EUROPE_TIRANE                  = 361;
    case EUROPE_ULYANOVSK               = 362;
    case EUROPE_VADUZ                   = 363;
    case EUROPE_VATICAN                 = 364;
    case EUROPE_VIENNA                  = 365;
    case EUROPE_VILNIUS                 = 366;
    case EUROPE_VOLGOGRAD               = 367;
    case EUROPE_WARSAW                  = 368;
    case EUROPE_ZAGREB                  = 369;
    case EUROPE_ZURICH                  = 370;
    case INDIAN_ANTANANARIVO            = 371;
    case INDIAN_CHAGOS                  = 372;
    case INDIAN_CHRISTMAS               = 373;
    case INDIAN_COCOS                   = 374;
    case INDIAN_COMORO                  = 375;
    case INDIAN_KERGUELEN               = 376;
    case INDIAN_MAHE                    = 377;
    case INDIAN_MALDIVES                = 378;
    case INDIAN_MAURITIUS               = 379;
    case INDIAN_MAYOTTE                 = 380;
    case INDIAN_REUNION                 = 381;
    case PACIFIC_APIA                   = 382;
    case PACIFIC_AUCKLAND               = 383;
    case PACIFIC_BOUGAINVILLE           = 384;
    case PACIFIC_CHATHAM                = 385;
    case PACIFIC_CHUUK                  = 386;
    case PACIFIC_EASTER                 = 387;
    case PACIFIC_EFATE                  = 388;
    case PACIFIC_FAKAOFO                = 389;
    case PACIFIC_FIJI                   = 390;
    case PACIFIC_FUNAFUTI               = 391;
    case PACIFIC_GALAPAGOS              = 392;
    case PACIFIC_GAMBIER                = 393;
    case PACIFIC_GUADALCANAL            = 394;
    case PACIFIC_GUAM                   = 395;
    case PACIFIC_HONOLULU               = 396;
    case PACIFIC_KANTON                 = 397;
    case PACIFIC_KIRITIMATI             = 398;
    case PACIFIC_KOSRAE                 = 399;
    case PACIFIC_KWAJALEIN              = 400;
    case PACIFIC_MAJURO                 = 401;
    case PACIFIC_MARQUESAS              = 402;
    case PACIFIC_MIDWAY                 = 403;
    case PACIFIC_NAURU                  = 404;
    case PACIFIC_NIUE                   = 405;
    case PACIFIC_NORFOLK                = 406;
    case PACIFIC_NOUMEA                 = 407;
    case PACIFIC_PAGO_PAGO              = 408;
    case PACIFIC_PALAU                  = 409;
    case PACIFIC_PITCAIRN               = 410;
    case PACIFIC_POHNPEI                = 411;
    case PACIFIC_PORT_MORESBY           = 412;
    case PACIFIC_RAROTONGA              = 413;
    case PACIFIC_SAIPAN                 = 414;
    case PACIFIC_TAHITI                 = 415;
    case PACIFIC_TARAWA                 = 416;
    case PACIFIC_TONGATAPU              = 417;
    case PACIFIC_WAKE                   = 418;
    case PACIFIC_WALLIS                 = 419;
    case UTC                            = 420;

    /**
     * Retrieve the PHP code for the instance.
     *
     */
    public function code() : string
    {
        return Collection::make(static::toArray())
            ->firstWhere('id', $this)['code'];
    }

    /**
     * Retrieve the available a cases an array.
     *
     */
    public static function toArray() : array
    {
        return [[
            'id'    => static::AFRICA_ABIDJAN,
            'code'  => 'Africa/Abidjan',
            'label' => 'Abidjan (Africa)',
        ], [
            'id'    => static::AFRICA_ACCRA,
            'code'  => 'Africa/Accra',
            'label' => 'Accra (Africa)',
        ], [
            'id'    => static::AFRICA_ADDIS_ABABA,
            'code'  => 'Africa/Addis_Ababa',
            'label' => 'Addis Ababa (Africa)',
        ], [
            'id'    => static::AFRICA_ALGIERS,
            'code'  => 'Africa/Algiers',
            'label' => 'Algiers (Africa)',
        ], [
            'id'    => static::AFRICA_ASMARA,
            'code'  => 'Africa/Asmara',
            'label' => 'Asmara (Africa)',
        ], [
            'id'    => static::AFRICA_BAMAKO,
            'code'  => 'Africa/Bamako',
            'label' => 'Bamako (Africa)',
        ], [
            'id'    => static::AFRICA_BANGUI,
            'code'  => 'Africa/Bangui',
            'label' => 'Bangui (Africa)',
        ], [
            'id'    => static::AFRICA_BANJUL,
            'code'  => 'Africa/Banjul',
            'label' => 'Banjul (Africa)',
        ], [
            'id'    => static::AFRICA_BISSAU,
            'code'  => 'Africa/Bissau',
            'label' => 'Bissau (Africa)',
        ], [
            'id'    => static::AFRICA_BLANTYRE,
            'code'  => 'Africa/Blantyre',
            'label' => 'Blantyre (Africa)',
        ], [
            'id'    => static::AFRICA_BRAZZAVILLE,
            'code'  => 'Africa/Brazzaville',
            'label' => 'Brazzaville (Africa)',
        ], [
            'id'    => static::AFRICA_BUJUMBURA,
            'code'  => 'Africa/Bujumbura',
            'label' => 'Bujumbura (Africa)',
        ], [
            'id'    => static::AFRICA_CAIRO,
            'code'  => 'Africa/Cairo',
            'label' => 'Cairo (Africa)',
        ], [
            'id'    => static::AFRICA_CASABLANCA,
            'code'  => 'Africa/Casablanca',
            'label' => 'Casablanca (Africa)',
        ], [
            'id'    => static::AFRICA_CEUTA,
            'code'  => 'Africa/Ceuta',
            'label' => 'Ceuta (Africa)',
        ], [
            'id'    => static::AFRICA_CONAKRY,
            'code'  => 'Africa/Conakry',
            'label' => 'Conakry (Africa)',
        ], [
            'id'    => static::AFRICA_DAKAR,
            'code'  => 'Africa/Dakar',
            'label' => 'Dakar (Africa)',
        ], [
            'id'    => static::AFRICA_DAR_ES_SALAAM,
            'code'  => 'Africa/Dar_es_Salaam',
            'label' => 'Dar-es-Salaam (Africa)',
        ], [
            'id'    => static::AFRICA_DJIBOUTI,
            'code'  => 'Africa/Djibouti',
            'label' => 'Djibouti (Africa)',
        ], [
            'id'    => static::AFRICA_DOUALA,
            'code'  => 'Africa/Douala',
            'label' => 'Douala (Africa)',
        ], [
            'id'    => static::AFRICA_EL_AAIUN,
            'code'  => 'Africa/El_Aaiun',
            'label' => 'El Aaiun (Africa)',
        ], [
            'id'    => static::AFRICA_FREETOWN,
            'code'  => 'Africa/Freetown',
            'label' => 'Freetown (Africa)',
        ], [
            'id'    => static::AFRICA_GABORONE,
            'code'  => 'Africa/Gaborone',
            'label' => 'Gaborone (Africa)',
        ], [
            'id'    => static::AFRICA_HARARE,
            'code'  => 'Africa/Harare',
            'label' => 'Harare (Africa)',
        ], [
            'id'    => static::AFRICA_JOHANNESBURG,
            'code'  => 'Africa/Johannesburg',
            'label' => 'Johannesburg (Africa)',
        ], [
            'id'    => static::AFRICA_JUBA,
            'code'  => 'Africa/Juba',
            'label' => 'Juba (Africa)',
        ], [
            'id'    => static::AFRICA_KAMPALA,
            'code'  => 'Africa/Kampala',
            'label' => 'Kampala (Africa)',
        ], [
            'id'    => static::AFRICA_KHARTOUM,
            'code'  => 'Africa/Khartoum',
            'label' => 'Khartoum (Africa)',
        ], [
            'id'    => static::AFRICA_KIGALI,
            'code'  => 'Africa/Kigali',
            'label' => 'Kigali (Africa)',
        ], [
            'id'    => static::AFRICA_KINSHASA,
            'code'  => 'Africa/Kinshasa',
            'label' => 'Kinshasa (Africa)',
        ], [
            'id'    => static::AFRICA_LAGOS,
            'code'  => 'Africa/Lagos',
            'label' => 'Lagos (Africa)',
        ], [
            'id'    => static::AFRICA_LIBREVILLE,
            'code'  => 'Africa/Libreville',
            'label' => 'Libreville (Africa)',
        ], [
            'id'    => static::AFRICA_LOME,
            'code'  => 'Africa/Lome',
            'label' => 'Lome (Africa)',
        ], [
            'id'    => static::AFRICA_LUANDA,
            'code'  => 'Africa/Luanda',
            'label' => 'Luanda (Africa)',
        ], [
            'id'    => static::AFRICA_LUBUMBASHI,
            'code'  => 'Africa/Lubumbashi',
            'label' => 'Lubumbashi (Africa)',
        ], [
            'id'    => static::AFRICA_LUSAKA,
            'code'  => 'Africa/Lusaka',
            'label' => 'Lusaka (Africa)',
        ], [
            'id'    => static::AFRICA_MALABO,
            'code'  => 'Africa/Malabo',
            'label' => 'Malabo (Africa)',
        ], [
            'id'    => static::AFRICA_MAPUTO,
            'code'  => 'Africa/Maputo',
            'label' => 'Maputo (Africa)',
        ], [
            'id'    => static::AFRICA_MASERU,
            'code'  => 'Africa/Maseru',
            'label' => 'Maseru (Africa)',
        ], [
            'id'    => static::AFRICA_MBABANE,
            'code'  => 'Africa/Mbabane',
            'label' => 'Mbabane (Africa)',
        ], [
            'id'    => static::AFRICA_MOGADISHU,
            'code'  => 'Africa/Mogadishu',
            'label' => 'Mogadishu (Africa)',
        ], [
            'id'    => static::AFRICA_MONROVIA,
            'code'  => 'Africa/Monrovia',
            'label' => 'Monrovia (Africa)',
        ], [
            'id'    => static::AFRICA_NAIROBI,
            'code'  => 'Africa/Nairobi',
            'label' => 'Nairobi (Africa)',
        ], [
            'id'    => static::AFRICA_NDJAMENA,
            'code'  => 'Africa/Ndjamena',
            'label' => 'Ndjamena (Africa)',
        ], [
            'id'    => static::AFRICA_NIAMEY,
            'code'  => 'Africa/Niamey',
            'label' => 'Niamey (Africa)',
        ], [
            'id'    => static::AFRICA_NOUAKCHOTT,
            'code'  => 'Africa/Nouakchott',
            'label' => 'Nouakchott (Africa)',
        ], [
            'id'    => static::AFRICA_OUAGADOUGOU,
            'code'  => 'Africa/Ouagadougou',
            'label' => 'Ouagadougou (Africa)',
        ], [
            'id'    => static::AFRICA_PORTO_NOVO,
            'code'  => 'Africa/Porto-Novo',
            'label' => 'Porto-Novo (Africa)',
        ], [
            'id'    => static::AFRICA_SAO_TOME,
            'code'  => 'Africa/Sao_Tome',
            'label' => 'Sao Tome (Africa)',
        ], [
            'id'    => static::AFRICA_TRIPOLI,
            'code'  => 'Africa/Tripoli',
            'label' => 'Tripoli (Africa)',
        ], [
            'id'    => static::AFRICA_TUNIS,
            'code'  => 'Africa/Tunis',
            'label' => 'Tunis (Africa)',
        ], [
            'id'    => static::AFRICA_WINDHOEK,
            'code'  => 'Africa/Windhoek',
            'label' => 'Windhoek (Africa)',
        ], [
            'id'    => static::AMERICA_ADAK,
            'code'  => 'America/Adak',
            'label' => 'Adak (America)',
        ], [
            'id'    => static::AMERICA_ANCHORAGE,
            'code'  => 'America/Anchorage',
            'label' => 'Anchorage (America)',
        ], [
            'id'    => static::AMERICA_ANGUILLA,
            'code'  => 'America/Anguilla',
            'label' => 'Anguilla (America)',
        ], [
            'id'    => static::AMERICA_ANTIGUA,
            'code'  => 'America/Antigua',
            'label' => 'Antigua (America)',
        ], [
            'id'    => static::AMERICA_ARAGUAINA,
            'code'  => 'America/Araguaina',
            'label' => 'Araguaina (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_BUENOS_AIRES,
            'code'  => 'America/Argentina/Buenos_Aires',
            'label' => 'Argentina - Buenos Aires (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_CATAMARCA,
            'code'  => 'America/Argentina/Catamarca',
            'label' => 'Argentina - Catamarca (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_CORDOBA,
            'code'  => 'America/Argentina/Cordoba',
            'label' => 'Argentina - Cordoba (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_JUJUY,
            'code'  => 'America/Argentina/Jujuy',
            'label' => 'Argentina - Jujuy (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_LA_RIOJA,
            'code'  => 'America/Argentina/La_Rioja',
            'label' => 'Argentina - La Rioja (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_MENDOZA,
            'code'  => 'America/Argentina/Mendoza',
            'label' => 'Argentina - Mendoza (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_RIO_GALLEGOS,
            'code'  => 'America/Argentina/Rio_Gallegos',
            'label' => 'Argentina - Rio Gallegos (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_SALTA,
            'code'  => 'America/Argentina/Salta',
            'label' => 'Argentina - Salta (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_SAN_JUAN,
            'code'  => 'America/Argentina/San_Juan',
            'label' => 'Argentina - San Juan (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_SAN_LUIS,
            'code'  => 'America/Argentina/San_Luis',
            'label' => 'Argentina - San Luis (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_TUCUMAN,
            'code'  => 'America/Argentina/Tucuman',
            'label' => 'Argentina - Tucuman (America)',
        ], [
            'id'    => static::AMERICA_ARGENTINA_USHUAIA,
            'code'  => 'America/Argentina/Ushuaia',
            'label' => 'Argentina - Ushuaia (America)',
        ], [
            'id'    => static::AMERICA_ARUBA,
            'code'  => 'America/Aruba',
            'label' => 'Aruba (America)',
        ], [
            'id'    => static::AMERICA_ASUNCION,
            'code'  => 'America/Asuncion',
            'label' => 'Asuncion (America)',
        ], [
            'id'    => static::AMERICA_ATIKOKAN,
            'code'  => 'America/Atikokan',
            'label' => 'Atikokan (America)',
        ], [
            'id'    => static::AMERICA_BAHIA,
            'code'  => 'America/Bahia',
            'label' => 'Bahia (America)',
        ], [
            'id'    => static::AMERICA_BAHIA_BANDERAS,
            'code'  => 'America/Bahia_Banderas',
            'label' => 'Bahia Banderas (America)',
        ], [
            'id'    => static::AMERICA_BARBADOS,
            'code'  => 'America/Barbados',
            'label' => 'Barbados (America)',
        ], [
            'id'    => static::AMERICA_BELEM,
            'code'  => 'America/Belem',
            'label' => 'Belem (America)',
        ], [
            'id'    => static::AMERICA_BELIZE,
            'code'  => 'America/Belize',
            'label' => 'Belize (America)',
        ], [
            'id'    => static::AMERICA_BLANC_SABLON,
            'code'  => 'America/Blanc-Sablon',
            'label' => 'Blanc-Sablon (America)',
        ], [
            'id'    => static::AMERICA_BOA_VISTA,
            'code'  => 'America/Boa_Vista',
            'label' => 'Boa Vista (America)',
        ], [
            'id'    => static::AMERICA_BOGOTA,
            'code'  => 'America/Bogota',
            'label' => 'Bogota (America)',
        ], [
            'id'    => static::AMERICA_BOISE,
            'code'  => 'America/Boise',
            'label' => 'Boise (America)',
        ], [
            'id'    => static::AMERICA_CAMBRIDGE_BAY,
            'code'  => 'America/Cambridge_Bay',
            'label' => 'Cambridge Bay (America)',
        ], [
            'id'    => static::AMERICA_CAMPO_GRANDE,
            'code'  => 'America/Campo_Grande',
            'label' => 'Campo Grande (America)',
        ], [
            'id'    => static::AMERICA_CANCUN,
            'code'  => 'America/Cancun',
            'label' => 'Cancun (America)',
        ], [
            'id'    => static::AMERICA_CARACAS,
            'code'  => 'America/Caracas',
            'label' => 'Caracas (America)',
        ], [
            'id'    => static::AMERICA_CAYENNE,
            'code'  => 'America/Cayenne',
            'label' => 'Cayenne (America)',
        ], [
            'id'    => static::AMERICA_CAYMAN,
            'code'  => 'America/Cayman',
            'label' => 'Cayman (America)',
        ], [
            'id'    => static::AMERICA_CHICAGO,
            'code'  => 'America/Chicago',
            'label' => 'Chicago (America)',
        ], [
            'id'    => static::AMERICA_CHIHUAHUA,
            'code'  => 'America/Chihuahua',
            'label' => 'Chihuahua (America)',
        ], [
            'id'    => static::AMERICA_CIUDAD_JUAREZ,
            'code'  => 'America/Ciudad_Juarez',
            'label' => 'Ciudad Juarez (America)',
        ], [
            'id'    => static::AMERICA_COSTA_RICA,
            'code'  => 'America/Costa_Rica',
            'label' => 'Costa Rica (America)',
        ], [
            'id'    => static::AMERICA_CRESTON,
            'code'  => 'America/Creston',
            'label' => 'Creston (America)',
        ], [
            'id'    => static::AMERICA_CUIABA,
            'code'  => 'America/Cuiaba',
            'label' => 'Cuiaba (America)',
        ], [
            'id'    => static::AMERICA_CURACAO,
            'code'  => 'America/Curacao',
            'label' => 'Curacao (America)',
        ], [
            'id'    => static::AMERICA_DANMARKSHAVN,
            'code'  => 'America/Danmarkshavn',
            'label' => 'Danmarkshavn (America)',
        ], [
            'id'    => static::AMERICA_DAWSON,
            'code'  => 'America/Dawson',
            'label' => 'Dawson (America)',
        ], [
            'id'    => static::AMERICA_DAWSON_CREEK,
            'code'  => 'America/Dawson_Creek',
            'label' => 'Dawson Creek (America)',
        ], [
            'id'    => static::AMERICA_DENVER,
            'code'  => 'America/Denver',
            'label' => 'Denver (America)',
        ], [
            'id'    => static::AMERICA_DETROIT,
            'code'  => 'America/Detroit',
            'label' => 'Detroit (America)',
        ], [
            'id'    => static::AMERICA_DOMINICA,
            'code'  => 'America/Dominica',
            'label' => 'Dominica (America)',
        ], [
            'id'    => static::AMERICA_EDMONTON,
            'code'  => 'America/Edmonton',
            'label' => 'Edmonton (America)',
        ], [
            'id'    => static::AMERICA_EIRUNEPE,
            'code'  => 'America/Eirunepe',
            'label' => 'Eirunepe (America)',
        ], [
            'id'    => static::AMERICA_EL_SALVADOR,
            'code'  => 'America/El_Salvador',
            'label' => 'El Salvador (America)',
        ], [
            'id'    => static::AMERICA_FORT_NELSON,
            'code'  => 'America/Fort_Nelson',
            'label' => 'Fort Nelson (America)',
        ], [
            'id'    => static::AMERICA_FORTALEZA,
            'code'  => 'America/Fortaleza',
            'label' => 'Fortaleza (America)',
        ], [
            'id'    => static::AMERICA_GLACE_BAY,
            'code'  => 'America/Glace_Bay',
            'label' => 'Glace Bay (America)',
        ], [
            'id'    => static::AMERICA_GOOSE_BAY,
            'code'  => 'America/Goose_Bay',
            'label' => 'Goose Bay (America)',
        ], [
            'id'    => static::AMERICA_GRAND_TURK,
            'code'  => 'America/Grand_Turk',
            'label' => 'Grand Turk (America)',
        ], [
            'id'    => static::AMERICA_GRENADA,
            'code'  => 'America/Grenada',
            'label' => 'Grenada (America)',
        ], [
            'id'    => static::AMERICA_GUADELOUPE,
            'code'  => 'America/Guadeloupe',
            'label' => 'Guadeloupe (America)',
        ], [
            'id'    => static::AMERICA_GUATEMALA,
            'code'  => 'America/Guatemala',
            'label' => 'Guatemala (America)',
        ], [
            'id'    => static::AMERICA_GUAYAQUIL,
            'code'  => 'America/Guayaquil',
            'label' => 'Guayaquil (America)',
        ], [
            'id'    => static::AMERICA_GUYANA,
            'code'  => 'America/Guyana',
            'label' => 'Guyana (America)',
        ], [
            'id'    => static::AMERICA_HALIFAX,
            'code'  => 'America/Halifax',
            'label' => 'Halifax (America)',
        ], [
            'id'    => static::AMERICA_HAVANA,
            'code'  => 'America/Havana',
            'label' => 'Havana (America)',
        ], [
            'id'    => static::AMERICA_HERMOSILLO,
            'code'  => 'America/Hermosillo',
            'label' => 'Hermosillo (America)',
        ], [
            'id'    => static::AMERICA_INDIANA_INDIANAPOLIS,
            'code'  => 'America/Indiana/Indianapolis',
            'label' => 'Indiana - Indianapolis (America)',
        ], [
            'id'    => static::AMERICA_INDIANA_KNOX,
            'code'  => 'America/Indiana/Knox',
            'label' => 'Indiana - Knox (America)',
        ], [
            'id'    => static::AMERICA_INDIANA_MARENGO,
            'code'  => 'America/Indiana/Marengo',
            'label' => 'Indiana - Marengo (America)',
        ], [
            'id'    => static::AMERICA_INDIANA_PETERSBURG,
            'code'  => 'America/Indiana/Petersburg',
            'label' => 'Indiana - Petersburg (America)',
        ], [
            'id'    => static::AMERICA_INDIANA_TELL_CITY,
            'code'  => 'America/Indiana/Tell_City',
            'label' => 'Indiana - Tell City (America)',
        ], [
            'id'    => static::AMERICA_INDIANA_VEVAY,
            'code'  => 'America/Indiana/Vevay',
            'label' => 'Indiana - Vevay (America)',
        ], [
            'id'    => static::AMERICA_INDIANA_VINCENNES,
            'code'  => 'America/Indiana/Vincennes',
            'label' => 'Indiana - Vincennes (America)',
        ], [
            'id'    => static::AMERICA_INDIANA_WINAMAC,
            'code'  => 'America/Indiana/Winamac',
            'label' => 'Indiana - Winamac (America)',
        ], [
            'id'    => static::AMERICA_INUVIK,
            'code'  => 'America/Inuvik',
            'label' => 'Inuvik (America)',
        ], [
            'id'    => static::AMERICA_IQALUIT,
            'code'  => 'America/Iqaluit',
            'label' => 'Iqaluit (America)',
        ], [
            'id'    => static::AMERICA_JAMAICA,
            'code'  => 'America/Jamaica',
            'label' => 'Jamaica (America)',
        ], [
            'id'    => static::AMERICA_JUNEAU,
            'code'  => 'America/Juneau',
            'label' => 'Juneau (America)',
        ], [
            'id'    => static::AMERICA_KENTUCKY_LOUISVILLE,
            'code'  => 'America/Kentucky/Louisville',
            'label' => 'Kentucky - Louisville (America)',
        ], [
            'id'    => static::AMERICA_KENTUCKY_MONTICELLO,
            'code'  => 'America/Kentucky/Monticello',
            'label' => 'Kentucky - Monticello (America)',
        ], [
            'id'    => static::AMERICA_KRALENDIJK,
            'code'  => 'America/Kralendijk',
            'label' => 'Kralendijk (America)',
        ], [
            'id'    => static::AMERICA_LA_PAZ,
            'code'  => 'America/La_Paz',
            'label' => 'La Paz (America)',
        ], [
            'id'    => static::AMERICA_LIMA,
            'code'  => 'America/Lima',
            'label' => 'Lima (America)',
        ], [
            'id'    => static::AMERICA_LOS_ANGELES,
            'code'  => 'America/Los_Angeles',
            'label' => 'Los Angeles (America)',
        ], [
            'id'    => static::AMERICA_LOWER_PRINCES,
            'code'  => 'America/Lower_Princes',
            'label' => 'Lower Princes (America)',
        ], [
            'id'    => static::AMERICA_MACEIO,
            'code'  => 'America/Maceio',
            'label' => 'Maceio (America)',
        ], [
            'id'    => static::AMERICA_MANAGUA,
            'code'  => 'America/Managua',
            'label' => 'Managua (America)',
        ], [
            'id'    => static::AMERICA_MANAUS,
            'code'  => 'America/Manaus',
            'label' => 'Manaus (America)',
        ], [
            'id'    => static::AMERICA_MARIGOT,
            'code'  => 'America/Marigot',
            'label' => 'Marigot (America)',
        ], [
            'id'    => static::AMERICA_MARTINIQUE,
            'code'  => 'America/Martinique',
            'label' => 'Martinique (America)',
        ], [
            'id'    => static::AMERICA_MATAMOROS,
            'code'  => 'America/Matamoros',
            'label' => 'Matamoros (America)',
        ], [
            'id'    => static::AMERICA_MAZATLAN,
            'code'  => 'America/Mazatlan',
            'label' => 'Mazatlan (America)',
        ], [
            'id'    => static::AMERICA_MENOMINEE,
            'code'  => 'America/Menominee',
            'label' => 'Menominee (America)',
        ], [
            'id'    => static::AMERICA_MERIDA,
            'code'  => 'America/Merida',
            'label' => 'Merida (America)',
        ], [
            'id'    => static::AMERICA_METLAKATLA,
            'code'  => 'America/Metlakatla',
            'label' => 'Metlakatla (America)',
        ], [
            'id'    => static::AMERICA_MEXICO_CITY,
            'code'  => 'America/Mexico_City',
            'label' => 'Mexico City (America)',
        ], [
            'id'    => static::AMERICA_MIQUELON,
            'code'  => 'America/Miquelon',
            'label' => 'Miquelon (America)',
        ], [
            'id'    => static::AMERICA_MONCTON,
            'code'  => 'America/Moncton',
            'label' => 'Moncton (America)',
        ], [
            'id'    => static::AMERICA_MONTERREY,
            'code'  => 'America/Monterrey',
            'label' => 'Monterrey (America)',
        ], [
            'id'    => static::AMERICA_MONTEVIDEO,
            'code'  => 'America/Montevideo',
            'label' => 'Montevideo (America)',
        ], [
            'id'    => static::AMERICA_MONTSERRAT,
            'code'  => 'America/Montserrat',
            'label' => 'Montserrat (America)',
        ], [
            'id'    => static::AMERICA_NASSAU,
            'code'  => 'America/Nassau',
            'label' => 'Nassau (America)',
        ], [
            'id'    => static::AMERICA_NEW_YORK,
            'code'  => 'America/New_York',
            'label' => 'New York (America)',
        ], [
            'id'    => static::AMERICA_NOME,
            'code'  => 'America/Nome',
            'label' => 'Nome (America)',
        ], [
            'id'    => static::AMERICA_NORONHA,
            'code'  => 'America/Noronha',
            'label' => 'Noronha (America)',
        ], [
            'id'    => static::AMERICA_NORTH_DAKOTA_BEULAH,
            'code'  => 'America/North_Dakota/Beulah',
            'label' => 'North Dakota - Beulah (America)',
        ], [
            'id'    => static::AMERICA_NORTH_DAKOTA_CENTER,
            'code'  => 'America/North_Dakota/Center',
            'label' => 'North Dakota - Center (America)',
        ], [
            'id'    => static::AMERICA_NORTH_DAKOTA_NEW_SALEM,
            'code'  => 'America/North_Dakota/New_Salem',
            'label' => 'North Dakota - New Salem (America)',
        ], [
            'id'    => static::AMERICA_NUUK,
            'code'  => 'America/Nuuk',
            'label' => 'Nuuk (America)',
        ], [
            'id'    => static::AMERICA_OJINAGA,
            'code'  => 'America/Ojinaga',
            'label' => 'Ojinaga (America)',
        ], [
            'id'    => static::AMERICA_PANAMA,
            'code'  => 'America/Panama',
            'label' => 'Panama (America)',
        ], [
            'id'    => static::AMERICA_PARAMARIBO,
            'code'  => 'America/Paramaribo',
            'label' => 'Paramaribo (America)',
        ], [
            'id'    => static::AMERICA_PHOENIX,
            'code'  => 'America/Phoenix',
            'label' => 'Phoenix (America)',
        ], [
            'id'    => static::AMERICA_PORT_AU_PRINCE,
            'code'  => 'America/Port-au-Prince',
            'label' => 'Port-au-Prince (America)',
        ], [
            'id'    => static::AMERICA_PORT_OF_SPAIN,
            'code'  => 'America/Port_of_Spain',
            'label' => 'Port of Spain (America)',
        ], [
            'id'    => static::AMERICA_PORTO_VELHO,
            'code'  => 'America/Porto_Velho',
            'label' => 'Porto Velho (America)',
        ], [
            'id'    => static::AMERICA_PUERTO_RICO,
            'code'  => 'America/Puerto_Rico',
            'label' => 'Puerto Rico (America)',
        ], [
            'id'    => static::AMERICA_PUNTA_ARENAS,
            'code'  => 'America/Punta_Arenas',
            'label' => 'Punta Arenas (America)',
        ], [
            'id'    => static::AMERICA_RANKIN_INLET,
            'code'  => 'America/Rankin_Inlet',
            'label' => 'Rankin Inlet (America)',
        ], [
            'id'    => static::AMERICA_RECIFE,
            'code'  => 'America/Recife',
            'label' => 'Recife (America)',
        ], [
            'id'    => static::AMERICA_REGINA,
            'code'  => 'America/Regina',
            'label' => 'Regina (America)',
        ], [
            'id'    => static::AMERICA_RESOLUTE,
            'code'  => 'America/Resolute',
            'label' => 'Resolute (America)',
        ], [
            'id'    => static::AMERICA_RIO_BRANCO,
            'code'  => 'America/Rio_Branco',
            'label' => 'Rio Branco (America)',
        ], [
            'id'    => static::AMERICA_SANTAREM,
            'code'  => 'America/Santarem',
            'label' => 'Santarem (America)',
        ], [
            'id'    => static::AMERICA_SANTIAGO,
            'code'  => 'America/Santiago',
            'label' => 'Santiago (America)',
        ], [
            'id'    => static::AMERICA_SANTO_DOMINGO,
            'code'  => 'America/Santo_Domingo',
            'label' => 'Santo Domingo (America)',
        ], [
            'id'    => static::AMERICA_SAO_PAULO,
            'code'  => 'America/Sao_Paulo',
            'label' => 'Sao Paulo (America)',
        ], [
            'id'    => static::AMERICA_SCORESBYSUND,
            'code'  => 'America/Scoresbysund',
            'label' => 'Scoresbysund (America)',
        ], [
            'id'    => static::AMERICA_SITKA,
            'code'  => 'America/Sitka',
            'label' => 'Sitka (America)',
        ], [
            'id'    => static::AMERICA_ST_BARTHELEMY,
            'code'  => 'America/St_Barthelemy',
            'label' => 'St Barthelemy (America)',
        ], [
            'id'    => static::AMERICA_ST_JOHNS,
            'code'  => 'America/St_Johns',
            'label' => 'St Johns (America)',
        ], [
            'id'    => static::AMERICA_ST_KITTS,
            'code'  => 'America/St_Kitts',
            'label' => 'St Kitts (America)',
        ], [
            'id'    => static::AMERICA_ST_LUCIA,
            'code'  => 'America/St_Lucia',
            'label' => 'St Lucia (America)',
        ], [
            'id'    => static::AMERICA_ST_THOMAS,
            'code'  => 'America/St_Thomas',
            'label' => 'St Thomas (America)',
        ], [
            'id'    => static::AMERICA_ST_VINCENT,
            'code'  => 'America/St_Vincent',
            'label' => 'St Vincent (America)',
        ], [
            'id'    => static::AMERICA_SWIFT_CURRENT,
            'code'  => 'America/Swift_Current',
            'label' => 'Swift Current (America)',
        ], [
            'id'    => static::AMERICA_TEGUCIGALPA,
            'code'  => 'America/Tegucigalpa',
            'label' => 'Tegucigalpa (America)',
        ], [
            'id'    => static::AMERICA_THULE,
            'code'  => 'America/Thule',
            'label' => 'Thule (America)',
        ], [
            'id'    => static::AMERICA_TIJUANA,
            'code'  => 'America/Tijuana',
            'label' => 'Tijuana (America)',
        ], [
            'id'    => static::AMERICA_TORONTO,
            'code'  => 'America/Toronto',
            'label' => 'Toronto (America)',
        ], [
            'id'    => static::AMERICA_TORTOLA,
            'code'  => 'America/Tortola',
            'label' => 'Tortola (America)',
        ], [
            'id'    => static::AMERICA_VANCOUVER,
            'code'  => 'America/Vancouver',
            'label' => 'Vancouver (America)',
        ], [
            'id'    => static::AMERICA_WHITEHORSE,
            'code'  => 'America/Whitehorse',
            'label' => 'Whitehorse (America)',
        ], [
            'id'    => static::AMERICA_WINNIPEG,
            'code'  => 'America/Winnipeg',
            'label' => 'Winnipeg (America)',
        ], [
            'id'    => static::AMERICA_YAKUTAT,
            'code'  => 'America/Yakutat',
            'label' => 'Yakutat (America)',
        ], [
            'id'    => static::AMERICA_YELLOWKNIFE,
            'code'  => 'America/Yellowknife',
            'label' => 'Yellowknife (America)',
        ], [
            'id'    => static::ANTARCTICA_CASEY,
            'code'  => 'Antarctica/Casey',
            'label' => 'Casey (Antarctica)',
        ], [
            'id'    => static::ANTARCTICA_DAVIS,
            'code'  => 'Antarctica/Davis',
            'label' => 'Davis (Antarctica)',
        ], [
            'id'    => static::ANTARCTICA_DUMONTDURVILLE,
            'code'  => 'Antarctica/DumontDUrville',
            'label' => 'DumontDUrville (Antarctica)',
        ], [
            'id'    => static::ANTARCTICA_MACQUARIE,
            'code'  => 'Antarctica/Macquarie',
            'label' => 'Macquarie (Antarctica)',
        ], [
            'id'    => static::ANTARCTICA_MAWSON,
            'code'  => 'Antarctica/Mawson',
            'label' => 'Mawson (Antarctica)',
        ], [
            'id'    => static::ANTARCTICA_MCMURDO,
            'code'  => 'Antarctica/McMurdo',
            'label' => 'McMurdo (Antarctica)',
        ], [
            'id'    => static::ANTARCTICA_PALMER,
            'code'  => 'Antarctica/Palmer',
            'label' => 'Palmer (Antarctica)',
        ], [
            'id'    => static::ANTARCTICA_ROTHERA,
            'code'  => 'Antarctica/Rothera',
            'label' => 'Rothera (Antarctica)',
        ], [
            'id'    => static::ANTARCTICA_SYOWA,
            'code'  => 'Antarctica/Syowa',
            'label' => 'Syowa (Antarctica)',
        ], [
            'id'    => static::ANTARCTICA_TROLL,
            'code'  => 'Antarctica/Troll',
            'label' => 'Troll (Antarctica)',
        ], [
            'id'    => static::ANTARCTICA_VOSTOK,
            'code'  => 'Antarctica/Vostok',
            'label' => 'Vostok (Antarctica)',
        ], [
            'id'    => static::ARCTIC_LONGYEARBYEN,
            'code'  => 'Arctic/Longyearbyen',
            'label' => 'Longyearbyen (Arctic)',
        ], [
            'id'    => static::ASIA_ADEN,
            'code'  => 'Asia/Aden',
            'label' => 'Aden (Asia)',
        ], [
            'id'    => static::ASIA_ALMATY,
            'code'  => 'Asia/Almaty',
            'label' => 'Almaty (Asia)',
        ], [
            'id'    => static::ASIA_AMMAN,
            'code'  => 'Asia/Amman',
            'label' => 'Amman (Asia)',
        ], [
            'id'    => static::ASIA_ANADYR,
            'code'  => 'Asia/Anadyr',
            'label' => 'Anadyr (Asia)',
        ], [
            'id'    => static::ASIA_AQTAU,
            'code'  => 'Asia/Aqtau',
            'label' => 'Aqtau (Asia)',
        ], [
            'id'    => static::ASIA_AQTOBE,
            'code'  => 'Asia/Aqtobe',
            'label' => 'Aqtobe (Asia)',
        ], [
            'id'    => static::ASIA_ASHGABAT,
            'code'  => 'Asia/Ashgabat',
            'label' => 'Ashgabat (Asia)',
        ], [
            'id'    => static::ASIA_ATYRAU,
            'code'  => 'Asia/Atyrau',
            'label' => 'Atyrau (Asia)',
        ], [
            'id'    => static::ASIA_BAGHDAD,
            'code'  => 'Asia/Baghdad',
            'label' => 'Baghdad (Asia)',
        ], [
            'id'    => static::ASIA_BAHRAIN,
            'code'  => 'Asia/Bahrain',
            'label' => 'Bahrain (Asia)',
        ], [
            'id'    => static::ASIA_BAKU,
            'code'  => 'Asia/Baku',
            'label' => 'Baku (Asia)',
        ], [
            'id'    => static::ASIA_BANGKOK,
            'code'  => 'Asia/Bangkok',
            'label' => 'Bangkok (Asia)',
        ], [
            'id'    => static::ASIA_BARNAUL,
            'code'  => 'Asia/Barnaul',
            'label' => 'Barnaul (Asia)',
        ], [
            'id'    => static::ASIA_BEIRUT,
            'code'  => 'Asia/Beirut',
            'label' => 'Beirut (Asia)',
        ], [
            'id'    => static::ASIA_BISHKEK,
            'code'  => 'Asia/Bishkek',
            'label' => 'Bishkek (Asia)',
        ], [
            'id'    => static::ASIA_BRUNEI,
            'code'  => 'Asia/Brunei',
            'label' => 'Brunei (Asia)',
        ], [
            'id'    => static::ASIA_CHITA,
            'code'  => 'Asia/Chita',
            'label' => 'Chita (Asia)',
        ], [
            'id'    => static::ASIA_CHOIBALSAN,
            'code'  => 'Asia/Choibalsan',
            'label' => 'Choibalsan (Asia)',
        ], [
            'id'    => static::ASIA_COLOMBO,
            'code'  => 'Asia/Colombo',
            'label' => 'Colombo (Asia)',
        ], [
            'id'    => static::ASIA_DAMASCUS,
            'code'  => 'Asia/Damascus',
            'label' => 'Damascus (Asia)',
        ], [
            'id'    => static::ASIA_DHAKA,
            'code'  => 'Asia/Dhaka',
            'label' => 'Dhaka (Asia)',
        ], [
            'id'    => static::ASIA_DILI,
            'code'  => 'Asia/Dili',
            'label' => 'Dili (Asia)',
        ], [
            'id'    => static::ASIA_DUBAI,
            'code'  => 'Asia/Dubai',
            'label' => 'Dubai (Asia)',
        ], [
            'id'    => static::ASIA_DUSHANBE,
            'code'  => 'Asia/Dushanbe',
            'label' => 'Dushanbe (Asia)',
        ], [
            'id'    => static::ASIA_FAMAGUSTA,
            'code'  => 'Asia/Famagusta',
            'label' => 'Famagusta (Asia)',
        ], [
            'id'    => static::ASIA_GAZA,
            'code'  => 'Asia/Gaza',
            'label' => 'Gaza (Asia)',
        ], [
            'id'    => static::ASIA_HEBRON,
            'code'  => 'Asia/Hebron',
            'label' => 'Hebron (Asia)',
        ], [
            'id'    => static::ASIA_HO_CHI_MINH,
            'code'  => 'Asia/Ho_Chi_Minh',
            'label' => 'Ho Chi Minh (Asia)',
        ], [
            'id'    => static::ASIA_HONG_KONG,
            'code'  => 'Asia/Hong_Kong',
            'label' => 'Hong Kong (Asia)',
        ], [
            'id'    => static::ASIA_HOVD,
            'code'  => 'Asia/Hovd',
            'label' => 'Hovd (Asia)',
        ], [
            'id'    => static::ASIA_IRKUTSK,
            'code'  => 'Asia/Irkutsk',
            'label' => 'Irkutsk (Asia)',
        ], [
            'id'    => static::ASIA_JAKARTA,
            'code'  => 'Asia/Jakarta',
            'label' => 'Jakarta (Asia)',
        ], [
            'id'    => static::ASIA_JAYAPURA,
            'code'  => 'Asia/Jayapura',
            'label' => 'Jayapura (Asia)',
        ], [
            'id'    => static::ASIA_JERUSALEM,
            'code'  => 'Asia/Jerusalem',
            'label' => 'Jerusalem (Asia)',
        ], [
            'id'    => static::ASIA_KABUL,
            'code'  => 'Asia/Kabul',
            'label' => 'Kabul (Asia)',
        ], [
            'id'    => static::ASIA_KAMCHATKA,
            'code'  => 'Asia/Kamchatka',
            'label' => 'Kamchatka (Asia)',
        ], [
            'id'    => static::ASIA_KARACHI,
            'code'  => 'Asia/Karachi',
            'label' => 'Karachi (Asia)',
        ], [
            'id'    => static::ASIA_KATHMANDU,
            'code'  => 'Asia/Kathmandu',
            'label' => 'Kathmandu (Asia)',
        ], [
            'id'    => static::ASIA_KHANDYGA,
            'code'  => 'Asia/Khandyga',
            'label' => 'Khandyga (Asia)',
        ], [
            'id'    => static::ASIA_KOLKATA,
            'code'  => 'Asia/Kolkata',
            'label' => 'Kolkata (Asia)',
        ], [
            'id'    => static::ASIA_KRASNOYARSK,
            'code'  => 'Asia/Krasnoyarsk',
            'label' => 'Krasnoyarsk (Asia)',
        ], [
            'id'    => static::ASIA_KUALA_LUMPUR,
            'code'  => 'Asia/Kuala_Lumpur',
            'label' => 'Kuala Lumpur (Asia)',
        ], [
            'id'    => static::ASIA_KUCHING,
            'code'  => 'Asia/Kuching',
            'label' => 'Kuching (Asia)',
        ], [
            'id'    => static::ASIA_KUWAIT,
            'code'  => 'Asia/Kuwait',
            'label' => 'Kuwait (Asia)',
        ], [
            'id'    => static::ASIA_MACAU,
            'code'  => 'Asia/Macau',
            'label' => 'Macau (Asia)',
        ], [
            'id'    => static::ASIA_MAGADAN,
            'code'  => 'Asia/Magadan',
            'label' => 'Magadan (Asia)',
        ], [
            'id'    => static::ASIA_MAKASSAR,
            'code'  => 'Asia/Makassar',
            'label' => 'Makassar (Asia)',
        ], [
            'id'    => static::ASIA_MANILA,
            'code'  => 'Asia/Manila',
            'label' => 'Manila (Asia)',
        ], [
            'id'    => static::ASIA_MUSCAT,
            'code'  => 'Asia/Muscat',
            'label' => 'Muscat (Asia)',
        ], [
            'id'    => static::ASIA_NICOSIA,
            'code'  => 'Asia/Nicosia',
            'label' => 'Nicosia (Asia)',
        ], [
            'id'    => static::ASIA_NOVOKUZNETSK,
            'code'  => 'Asia/Novokuznetsk',
            'label' => 'Novokuznetsk (Asia)',
        ], [
            'id'    => static::ASIA_NOVOSIBIRSK,
            'code'  => 'Asia/Novosibirsk',
            'label' => 'Novosibirsk (Asia)',
        ], [
            'id'    => static::ASIA_OMSK,
            'code'  => 'Asia/Omsk',
            'label' => 'Omsk (Asia)',
        ], [
            'id'    => static::ASIA_ORAL,
            'code'  => 'Asia/Oral',
            'label' => 'Oral (Asia)',
        ], [
            'id'    => static::ASIA_PHNOM_PENH,
            'code'  => 'Asia/Phnom_Penh',
            'label' => 'Phnom Penh (Asia)',
        ], [
            'id'    => static::ASIA_PONTIANAK,
            'code'  => 'Asia/Pontianak',
            'label' => 'Pontianak (Asia)',
        ], [
            'id'    => static::ASIA_PYONGYANG,
            'code'  => 'Asia/Pyongyang',
            'label' => 'Pyongyang (Asia)',
        ], [
            'id'    => static::ASIA_QATAR,
            'code'  => 'Asia/Qatar',
            'label' => 'Qatar (Asia)',
        ], [
            'id'    => static::ASIA_QOSTANAY,
            'code'  => 'Asia/Qostanay',
            'label' => 'Qostanay (Asia)',
        ], [
            'id'    => static::ASIA_QYZYLORDA,
            'code'  => 'Asia/Qyzylorda',
            'label' => 'Qyzylorda (Asia)',
        ], [
            'id'    => static::ASIA_RIYADH,
            'code'  => 'Asia/Riyadh',
            'label' => 'Riyadh (Asia)',
        ], [
            'id'    => static::ASIA_SAKHALIN,
            'code'  => 'Asia/Sakhalin',
            'label' => 'Sakhalin (Asia)',
        ], [
            'id'    => static::ASIA_SAMARKAND,
            'code'  => 'Asia/Samarkand',
            'label' => 'Samarkand (Asia)',
        ], [
            'id'    => static::ASIA_SEOUL,
            'code'  => 'Asia/Seoul',
            'label' => 'Seoul (Asia)',
        ], [
            'id'    => static::ASIA_SHANGHAI,
            'code'  => 'Asia/Shanghai',
            'label' => 'Shanghai (Asia)',
        ], [
            'id'    => static::ASIA_SINGAPORE,
            'code'  => 'Asia/Singapore',
            'label' => 'Singapore (Asia)',
        ], [
            'id'    => static::ASIA_SREDNEKOLYMSK,
            'code'  => 'Asia/Srednekolymsk',
            'label' => 'Srednekolymsk (Asia)',
        ], [
            'id'    => static::ASIA_TAIPEI,
            'code'  => 'Asia/Taipei',
            'label' => 'Taipei (Asia)',
        ], [
            'id'    => static::ASIA_TASHKENT,
            'code'  => 'Asia/Tashkent',
            'label' => 'Tashkent (Asia)',
        ], [
            'id'    => static::ASIA_TBILISI,
            'code'  => 'Asia/Tbilisi',
            'label' => 'Tbilisi (Asia)',
        ], [
            'id'    => static::ASIA_TEHRAN,
            'code'  => 'Asia/Tehran',
            'label' => 'Tehran (Asia)',
        ], [
            'id'    => static::ASIA_THIMPHU,
            'code'  => 'Asia/Thimphu',
            'label' => 'Thimphu (Asia)',
        ], [
            'id'    => static::ASIA_TOKYO,
            'code'  => 'Asia/Tokyo',
            'label' => 'Tokyo (Asia)',
        ], [
            'id'    => static::ASIA_TOMSK,
            'code'  => 'Asia/Tomsk',
            'label' => 'Tomsk (Asia)',
        ], [
            'id'    => static::ASIA_ULAANBAATAR,
            'code'  => 'Asia/Ulaanbaatar',
            'label' => 'Ulaanbaatar (Asia)',
        ], [
            'id'    => static::ASIA_URUMQI,
            'code'  => 'Asia/Urumqi',
            'label' => 'Urumqi (Asia)',
        ], [
            'id'    => static::ASIA_UST_NERA,
            'code'  => 'Asia/Ust-Nera',
            'label' => 'Ust-Nera (Asia)',
        ], [
            'id'    => static::ASIA_VIENTIANE,
            'code'  => 'Asia/Vientiane',
            'label' => 'Vientiane (Asia)',
        ], [
            'id'    => static::ASIA_VLADIVOSTOK,
            'code'  => 'Asia/Vladivostok',
            'label' => 'Vladivostok (Asia)',
        ], [
            'id'    => static::ASIA_YAKUTSK,
            'code'  => 'Asia/Yakutsk',
            'label' => 'Yakutsk (Asia)',
        ], [
            'id'    => static::ASIA_YANGON,
            'code'  => 'Asia/Yangon',
            'label' => 'Yangon (Asia)',
        ], [
            'id'    => static::ASIA_YEKATERINBURG,
            'code'  => 'Asia/Yekaterinburg',
            'label' => 'Yekaterinburg (Asia)',
        ], [
            'id'    => static::ASIA_YEREVAN,
            'code'  => 'Asia/Yerevan',
            'label' => 'Yerevan (Asia)',
        ], [
            'id'    => static::ATLANTIC_AZORES,
            'code'  => 'Atlantic/Azores',
            'label' => 'Azores (Atlantic)',
        ], [
            'id'    => static::ATLANTIC_BERMUDA,
            'code'  => 'Atlantic/Bermuda',
            'label' => 'Bermuda (Atlantic)',
        ], [
            'id'    => static::ATLANTIC_CANARY,
            'code'  => 'Atlantic/Canary',
            'label' => 'Canary (Atlantic)',
        ], [
            'id'    => static::ATLANTIC_CAPE_VERDE,
            'code'  => 'Atlantic/Cape_Verde',
            'label' => 'Cape Verde (Atlantic)',
        ], [
            'id'    => static::ATLANTIC_FAROE,
            'code'  => 'Atlantic/Faroe',
            'label' => 'Faroe (Atlantic)',
        ], [
            'id'    => static::ATLANTIC_MADEIRA,
            'code'  => 'Atlantic/Madeira',
            'label' => 'Madeira (Atlantic)',
        ], [
            'id'    => static::ATLANTIC_REYKJAVIK,
            'code'  => 'Atlantic/Reykjavik',
            'label' => 'Reykjavik (Atlantic)',
        ], [
            'id'    => static::ATLANTIC_SOUTH_GEORGIA,
            'code'  => 'Atlantic/South_Georgia',
            'label' => 'South Georgia (Atlantic)',
        ], [
            'id'    => static::ATLANTIC_ST_HELENA,
            'code'  => 'Atlantic/St_Helena',
            'label' => 'St Helena (Atlantic)',
        ], [
            'id'    => static::ATLANTIC_STANLEY,
            'code'  => 'Atlantic/Stanley',
            'label' => 'Stanley (Atlantic)',
        ], [
            'id'    => static::AUSTRALIA_ADELAIDE,
            'code'  => 'Australia/Adelaide',
            'label' => 'Adelaide (Australia)',
        ], [
            'id'    => static::AUSTRALIA_BRISBANE,
            'code'  => 'Australia/Brisbane',
            'label' => 'Brisbane (Australia)',
        ], [
            'id'    => static::AUSTRALIA_BROKEN_HILL,
            'code'  => 'Australia/Broken_Hill',
            'label' => 'Broken Hill (Australia)',
        ], [
            'id'    => static::AUSTRALIA_DARWIN,
            'code'  => 'Australia/Darwin',
            'label' => 'Darwin (Australia)',
        ], [
            'id'    => static::AUSTRALIA_EUCLA,
            'code'  => 'Australia/Eucla',
            'label' => 'Eucla (Australia)',
        ], [
            'id'    => static::AUSTRALIA_HOBART,
            'code'  => 'Australia/Hobart',
            'label' => 'Hobart (Australia)',
        ], [
            'id'    => static::AUSTRALIA_LINDEMAN,
            'code'  => 'Australia/Lindeman',
            'label' => 'Lindeman (Australia)',
        ], [
            'id'    => static::AUSTRALIA_LORD_HOWE,
            'code'  => 'Australia/Lord_Howe',
            'label' => 'Lord Howe (Australia)',
        ], [
            'id'    => static::AUSTRALIA_MELBOURNE,
            'code'  => 'Australia/Melbourne',
            'label' => 'Melbourne (Australia)',
        ], [
            'id'    => static::AUSTRALIA_PERTH,
            'code'  => 'Australia/Perth',
            'label' => 'Perth (Australia)',
        ], [
            'id'    => static::AUSTRALIA_SYDNEY,
            'code'  => 'Australia/Sydney',
            'label' => 'Sydney (Australia)',
        ], [
            'id'    => static::EUROPE_AMSTERDAM,
            'code'  => 'Europe/Amsterdam',
            'label' => 'Amsterdam (Europe)',
        ], [
            'id'    => static::EUROPE_ANDORRA,
            'code'  => 'Europe/Andorra',
            'label' => 'Andorra (Europe)',
        ], [
            'id'    => static::EUROPE_ASTRAKHAN,
            'code'  => 'Europe/Astrakhan',
            'label' => 'Astrakhan (Europe)',
        ], [
            'id'    => static::EUROPE_ATHENS,
            'code'  => 'Europe/Athens',
            'label' => 'Athens (Europe)',
        ], [
            'id'    => static::EUROPE_BELGRADE,
            'code'  => 'Europe/Belgrade',
            'label' => 'Belgrade (Europe)',
        ], [
            'id'    => static::EUROPE_BERLIN,
            'code'  => 'Europe/Berlin',
            'label' => 'Berlin (Europe)',
        ], [
            'id'    => static::EUROPE_BRATISLAVA,
            'code'  => 'Europe/Bratislava',
            'label' => 'Bratislava (Europe)',
        ], [
            'id'    => static::EUROPE_BRUSSELS,
            'code'  => 'Europe/Brussels',
            'label' => 'Brussels (Europe)',
        ], [
            'id'    => static::EUROPE_BUCHAREST,
            'code'  => 'Europe/Bucharest',
            'label' => 'Bucharest (Europe)',
        ], [
            'id'    => static::EUROPE_BUDAPEST,
            'code'  => 'Europe/Budapest',
            'label' => 'Budapest (Europe)',
        ], [
            'id'    => static::EUROPE_BUSINGEN,
            'code'  => 'Europe/Busingen',
            'label' => 'Busingen (Europe)',
        ], [
            'id'    => static::EUROPE_CHISINAU,
            'code'  => 'Europe/Chisinau',
            'label' => 'Chisinau (Europe)',
        ], [
            'id'    => static::EUROPE_COPENHAGEN,
            'code'  => 'Europe/Copenhagen',
            'label' => 'Copenhagen (Europe)',
        ], [
            'id'    => static::EUROPE_DUBLIN,
            'code'  => 'Europe/Dublin',
            'label' => 'Dublin (Europe)',
        ], [
            'id'    => static::EUROPE_GIBRALTAR,
            'code'  => 'Europe/Gibraltar',
            'label' => 'Gibraltar (Europe)',
        ], [
            'id'    => static::EUROPE_GUERNSEY,
            'code'  => 'Europe/Guernsey',
            'label' => 'Guernsey (Europe)',
        ], [
            'id'    => static::EUROPE_HELSINKI,
            'code'  => 'Europe/Helsinki',
            'label' => 'Helsinki (Europe)',
        ], [
            'id'    => static::EUROPE_ISLE_OF_MAN,
            'code'  => 'Europe/Isle_of_Man',
            'label' => 'Isle of Man (Europe)',
        ], [
            'id'    => static::EUROPE_ISTANBUL,
            'code'  => 'Europe/Istanbul',
            'label' => 'Istanbul (Europe)',
        ], [
            'id'    => static::EUROPE_JERSEY,
            'code'  => 'Europe/Jersey',
            'label' => 'Jersey (Europe)',
        ], [
            'id'    => static::EUROPE_KALININGRAD,
            'code'  => 'Europe/Kaliningrad',
            'label' => 'Kaliningrad (Europe)',
        ], [
            'id'    => static::EUROPE_KIROV,
            'code'  => 'Europe/Kirov',
            'label' => 'Kirov (Europe)',
        ], [
            'id'    => static::EUROPE_KYIV,
            'code'  => 'Europe/Kyiv',
            'label' => 'Kyiv (Europe)',
        ], [
            'id'    => static::EUROPE_LISBON,
            'code'  => 'Europe/Lisbon',
            'label' => 'Lisbon (Europe)',
        ], [
            'id'    => static::EUROPE_LJUBLJANA,
            'code'  => 'Europe/Ljubljana',
            'label' => 'Ljubljana (Europe)',
        ], [
            'id'    => static::EUROPE_LONDON,
            'code'  => 'Europe/London',
            'label' => 'London (Europe)',
        ], [
            'id'    => static::EUROPE_LUXEMBOURG,
            'code'  => 'Europe/Luxembourg',
            'label' => 'Luxembourg (Europe)',
        ], [
            'id'    => static::EUROPE_MADRID,
            'code'  => 'Europe/Madrid',
            'label' => 'Madrid (Europe)',
        ], [
            'id'    => static::EUROPE_MALTA,
            'code'  => 'Europe/Malta',
            'label' => 'Malta (Europe)',
        ], [
            'id'    => static::EUROPE_MARIEHAMN,
            'code'  => 'Europe/Mariehamn',
            'label' => 'Mariehamn (Europe)',
        ], [
            'id'    => static::EUROPE_MINSK,
            'code'  => 'Europe/Minsk',
            'label' => 'Minsk (Europe)',
        ], [
            'id'    => static::EUROPE_MONACO,
            'code'  => 'Europe/Monaco',
            'label' => 'Monaco (Europe)',
        ], [
            'id'    => static::EUROPE_MOSCOW,
            'code'  => 'Europe/Moscow',
            'label' => 'Moscow (Europe)',
        ], [
            'id'    => static::EUROPE_OSLO,
            'code'  => 'Europe/Oslo',
            'label' => 'Oslo (Europe)',
        ], [
            'id'    => static::EUROPE_PARIS,
            'code'  => 'Europe/Paris',
            'label' => 'Paris (Europe)',
        ], [
            'id'    => static::EUROPE_PODGORICA,
            'code'  => 'Europe/Podgorica',
            'label' => 'Podgorica (Europe)',
        ], [
            'id'    => static::EUROPE_PRAGUE,
            'code'  => 'Europe/Prague',
            'label' => 'Prague (Europe)',
        ], [
            'id'    => static::EUROPE_RIGA,
            'code'  => 'Europe/Riga',
            'label' => 'Riga (Europe)',
        ], [
            'id'    => static::EUROPE_ROME,
            'code'  => 'Europe/Rome',
            'label' => 'Rome (Europe)',
        ], [
            'id'    => static::EUROPE_SAMARA,
            'code'  => 'Europe/Samara',
            'label' => 'Samara (Europe)',
        ], [
            'id'    => static::EUROPE_SAN_MARINO,
            'code'  => 'Europe/San_Marino',
            'label' => 'San Marino (Europe)',
        ], [
            'id'    => static::EUROPE_SARAJEVO,
            'code'  => 'Europe/Sarajevo',
            'label' => 'Sarajevo (Europe)',
        ], [
            'id'    => static::EUROPE_SARATOV,
            'code'  => 'Europe/Saratov',
            'label' => 'Saratov (Europe)',
        ], [
            'id'    => static::EUROPE_SIMFEROPOL,
            'code'  => 'Europe/Simferopol',
            'label' => 'Simferopol (Europe)',
        ], [
            'id'    => static::EUROPE_SKOPJE,
            'code'  => 'Europe/Skopje',
            'label' => 'Skopje (Europe)',
        ], [
            'id'    => static::EUROPE_SOFIA,
            'code'  => 'Europe/Sofia',
            'label' => 'Sofia (Europe)',
        ], [
            'id'    => static::EUROPE_STOCKHOLM,
            'code'  => 'Europe/Stockholm',
            'label' => 'Stockholm (Europe)',
        ], [
            'id'    => static::EUROPE_TALLINN,
            'code'  => 'Europe/Tallinn',
            'label' => 'Tallinn (Europe)',
        ], [
            'id'    => static::EUROPE_TIRANE,
            'code'  => 'Europe/Tirane',
            'label' => 'Tirane (Europe)',
        ], [
            'id'    => static::EUROPE_ULYANOVSK,
            'code'  => 'Europe/Ulyanovsk',
            'label' => 'Ulyanovsk (Europe)',
        ], [
            'id'    => static::EUROPE_VADUZ,
            'code'  => 'Europe/Vaduz',
            'label' => 'Vaduz (Europe)',
        ], [
            'id'    => static::EUROPE_VATICAN,
            'code'  => 'Europe/Vatican',
            'label' => 'Vatican (Europe)',
        ], [
            'id'    => static::EUROPE_VIENNA,
            'code'  => 'Europe/Vienna',
            'label' => 'Vienna (Europe)',
        ], [
            'id'    => static::EUROPE_VILNIUS,
            'code'  => 'Europe/Vilnius',
            'label' => 'Vilnius (Europe)',
        ], [
            'id'    => static::EUROPE_VOLGOGRAD,
            'code'  => 'Europe/Volgograd',
            'label' => 'Volgograd (Europe)',
        ], [
            'id'    => static::EUROPE_WARSAW,
            'code'  => 'Europe/Warsaw',
            'label' => 'Warsaw (Europe)',
        ], [
            'id'    => static::EUROPE_ZAGREB,
            'code'  => 'Europe/Zagreb',
            'label' => 'Zagreb (Europe)',
        ], [
            'id'    => static::EUROPE_ZURICH,
            'code'  => 'Europe/Zurich',
            'label' => 'Zurich (Europe)',
        ], [
            'id'    => static::INDIAN_ANTANANARIVO,
            'code'  => 'Indian/Antananarivo',
            'label' => 'Antananarivo (Indian)',
        ], [
            'id'    => static::INDIAN_CHAGOS,
            'code'  => 'Indian/Chagos',
            'label' => 'Chagos (Indian)',
        ], [
            'id'    => static::INDIAN_CHRISTMAS,
            'code'  => 'Indian/Christmas',
            'label' => 'Christmas (Indian)',
        ], [
            'id'    => static::INDIAN_COCOS,
            'code'  => 'Indian/Cocos',
            'label' => 'Cocos (Indian)',
        ], [
            'id'    => static::INDIAN_COMORO,
            'code'  => 'Indian/Comoro',
            'label' => 'Comoro (Indian)',
        ], [
            'id'    => static::INDIAN_KERGUELEN,
            'code'  => 'Indian/Kerguelen',
            'label' => 'Kerguelen (Indian)',
        ], [
            'id'    => static::INDIAN_MAHE,
            'code'  => 'Indian/Mahe',
            'label' => 'Mahe (Indian)',
        ], [
            'id'    => static::INDIAN_MALDIVES,
            'code'  => 'Indian/Maldives',
            'label' => 'Maldives (Indian)',
        ], [
            'id'    => static::INDIAN_MAURITIUS,
            'code'  => 'Indian/Mauritius',
            'label' => 'Mauritius (Indian)',
        ], [
            'id'    => static::INDIAN_MAYOTTE,
            'code'  => 'Indian/Mayotte',
            'label' => 'Mayotte (Indian)',
        ], [
            'id'    => static::INDIAN_REUNION,
            'code'  => 'Indian/Reunion',
            'label' => 'Reunion (Indian)',
        ], [
            'id'    => static::PACIFIC_APIA,
            'code'  => 'Pacific/Apia',
            'label' => 'Apia (Pacific)',
        ], [
            'id'    => static::PACIFIC_AUCKLAND,
            'code'  => 'Pacific/Auckland',
            'label' => 'Auckland (Pacific)',
        ], [
            'id'    => static::PACIFIC_BOUGAINVILLE,
            'code'  => 'Pacific/Bougainville',
            'label' => 'Bougainville (Pacific)',
        ], [
            'id'    => static::PACIFIC_CHATHAM,
            'code'  => 'Pacific/Chatham',
            'label' => 'Chatham (Pacific)',
        ], [
            'id'    => static::PACIFIC_CHUUK,
            'code'  => 'Pacific/Chuuk',
            'label' => 'Chuuk (Pacific)',
        ], [
            'id'    => static::PACIFIC_EASTER,
            'code'  => 'Pacific/Easter',
            'label' => 'Easter (Pacific)',
        ], [
            'id'    => static::PACIFIC_EFATE,
            'code'  => 'Pacific/Efate',
            'label' => 'Efate (Pacific)',
        ], [
            'id'    => static::PACIFIC_FAKAOFO,
            'code'  => 'Pacific/Fakaofo',
            'label' => 'Fakaofo (Pacific)',
        ], [
            'id'    => static::PACIFIC_FIJI,
            'code'  => 'Pacific/Fiji',
            'label' => 'Fiji (Pacific)',
        ], [
            'id'    => static::PACIFIC_FUNAFUTI,
            'code'  => 'Pacific/Funafuti',
            'label' => 'Funafuti (Pacific)',
        ], [
            'id'    => static::PACIFIC_GALAPAGOS,
            'code'  => 'Pacific/Galapagos',
            'label' => 'Galapagos (Pacific)',
        ], [
            'id'    => static::PACIFIC_GAMBIER,
            'code'  => 'Pacific/Gambier',
            'label' => 'Gambier (Pacific)',
        ], [
            'id'    => static::PACIFIC_GUADALCANAL,
            'code'  => 'Pacific/Guadalcanal',
            'label' => 'Guadalcanal (Pacific)',
        ], [
            'id'    => static::PACIFIC_GUAM,
            'code'  => 'Pacific/Guam',
            'label' => 'Guam (Pacific)',
        ], [
            'id'    => static::PACIFIC_HONOLULU,
            'code'  => 'Pacific/Honolulu',
            'label' => 'Honolulu (Pacific)',
        ], [
            'id'    => static::PACIFIC_KANTON,
            'code'  => 'Pacific/Kanton',
            'label' => 'Kanton (Pacific)',
        ], [
            'id'    => static::PACIFIC_KIRITIMATI,
            'code'  => 'Pacific/Kiritimati',
            'label' => 'Kiritimati (Pacific)',
        ], [
            'id'    => static::PACIFIC_KOSRAE,
            'code'  => 'Pacific/Kosrae',
            'label' => 'Kosrae (Pacific)',
        ], [
            'id'    => static::PACIFIC_KWAJALEIN,
            'code'  => 'Pacific/Kwajalein',
            'label' => 'Kwajalein (Pacific)',
        ], [
            'id'    => static::PACIFIC_MAJURO,
            'code'  => 'Pacific/Majuro',
            'label' => 'Majuro (Pacific)',
        ], [
            'id'    => static::PACIFIC_MARQUESAS,
            'code'  => 'Pacific/Marquesas',
            'label' => 'Marquesas (Pacific)',
        ], [
            'id'    => static::PACIFIC_MIDWAY,
            'code'  => 'Pacific/Midway',
            'label' => 'Midway (Pacific)',
        ], [
            'id'    => static::PACIFIC_NAURU,
            'code'  => 'Pacific/Nauru',
            'label' => 'Nauru (Pacific)',
        ], [
            'id'    => static::PACIFIC_NIUE,
            'code'  => 'Pacific/Niue',
            'label' => 'Niue (Pacific)',
        ], [
            'id'    => static::PACIFIC_NORFOLK,
            'code'  => 'Pacific/Norfolk',
            'label' => 'Norfolk (Pacific)',
        ], [
            'id'    => static::PACIFIC_NOUMEA,
            'code'  => 'Pacific/Noumea',
            'label' => 'Noumea (Pacific)',
        ], [
            'id'    => static::PACIFIC_PAGO_PAGO,
            'code'  => 'Pacific/Pago_Pago',
            'label' => 'Pago Pago (Pacific)',
        ], [
            'id'    => static::PACIFIC_PALAU,
            'code'  => 'Pacific/Palau',
            'label' => 'Palau (Pacific)',
        ], [
            'id'    => static::PACIFIC_PITCAIRN,
            'code'  => 'Pacific/Pitcairn',
            'label' => 'Pitcairn (Pacific)',
        ], [
            'id'    => static::PACIFIC_POHNPEI,
            'code'  => 'Pacific/Pohnpei',
            'label' => 'Pohnpei (Pacific)',
        ], [
            'id'    => static::PACIFIC_PORT_MORESBY,
            'code'  => 'Pacific/Port_Moresby',
            'label' => 'Port Moresby (Pacific)',
        ], [
            'id'    => static::PACIFIC_RAROTONGA,
            'code'  => 'Pacific/Rarotonga',
            'label' => 'Rarotonga (Pacific)',
        ], [
            'id'    => static::PACIFIC_SAIPAN,
            'code'  => 'Pacific/Saipan',
            'label' => 'Saipan (Pacific)',
        ], [
            'id'    => static::PACIFIC_TAHITI,
            'code'  => 'Pacific/Tahiti',
            'label' => 'Tahiti (Pacific)',
        ], [
            'id'    => static::PACIFIC_TARAWA,
            'code'  => 'Pacific/Tarawa',
            'label' => 'Tarawa (Pacific)',
        ], [
            'id'    => static::PACIFIC_TONGATAPU,
            'code'  => 'Pacific/Tongatapu',
            'label' => 'Tongatapu (Pacific)',
        ], [
            'id'    => static::PACIFIC_WAKE,
            'code'  => 'Pacific/Wake',
            'label' => 'Wake (Pacific)',
        ], [
            'id'    => static::PACIFIC_WALLIS,
            'code'  => 'Pacific/Wallis',
            'label' => 'Wallis (Pacific)',
        ], [
            'id'    => static::UTC,
            'code'  => 'UTC',
            'label' => 'UTC',
        ]];
    }
}
