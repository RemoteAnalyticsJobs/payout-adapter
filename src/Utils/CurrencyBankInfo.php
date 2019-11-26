<?php

namespace PayoutAdapter\Utils;


class CurrencyBankInfo
{
    protected static $countryISO = [
        'afghanistan' =>'af',
        'aland islands' =>	'ax',
        'albania' =>	'al',
        'algeria' =>	'dz',
        'american samoa' =>	'as',
        'andorra' =>	'ad',
        'angola' =>	'ao',
        'anguilla' =>	'ai',
        'antarctica' =>	'aq',
        'antigua and barbuda',
        'argentina' =>	'ar',
        'armenia' =>	'am',
        'aruba' =>	'aw',
        'australia' =>	'au',
        'austria' =>	'at',
        'azerbaijan' =>	'az',
        'bahamas' =>	'bs',
        'bahrain' =>	'bh',
        'bangladesh' =>	'bd',
        'barbados' =>	'bb',
        'belarus' =>	'by',
        'belgium' =>	'be',
        'belize' =>	'bz',
        'benin' =>	'bj',
        'bermuda' =>	'bm',
        'bhutan' =>	'bt',
        'bolivia' => 'bo',
        'bosnia and herzegovina' =>	'ba',
        'botswana' =>	'bw',
        'bouvet island' =>	'bv',
        'brazil' =>	'br',
        'british indian ocean territory' =>	'io',
        'brunei darussalam' =>	'bn',
        'bulgaria' =>	'bg',
        'burkina faso' =>	'bf',
        'burundi' =>	'bi',
        'cambodia' =>	'kh',
        'cameroon' =>	'cm',
        'canada' =>	'ca',
        'cape verde' =>	'cv',
        'cayman islands' =>	'ky',
        'central african republic' =>	'cf',
        'chad' =>	'td',
        'chile' =>	'cl',
        'china' =>	'cn',
        'christmas island' =>	'cx',
        'cocos (keeling) islands' =>	'cc',
        'colombia' =>	'co',
        'comoros' =>	'km',
        'congo' =>	'cg',
        'congo, democratic republic' =>	'cd',
        'cook islands' =>	'ck',
        'costa rica' =>	'cr',
        'cote d\'ivoire' =>	'ci',
        'croatia' =>	'hr',
        'cuba' =>	'cu',
        'cyprus' =>	'cy',
        'czech republic' =>	'cz',
        'denmark' =>	'dk',
        'djibouti' =>	'dj',
        'dominica' =>	'dm',
        'dominican republic' =>	'do',
        'ecuador' =>	'ec',
        'egypt' =>	'eg',
        'el salvador' =>	'sv',
        'equatorial guinea' =>	'gq',
        'eritrea' =>	'er',
        'estonia' =>	'ee',
        'ethiopia' =>	'et',
        'falkland islands (malvinas)' =>	'fk',
        'faroe islands' =>	'fo',
        'fiji' =>	'fj',
        'finland' =>	'fi',
        'france' =>	'fr',
        'french guiana' =>	'gf',
        'french polynesia' =>	'pf',
        'french southern territories' =>	'tf',
        'gabon' =>	'ga',
        'gambia' =>	'gm',
        'georgia' =>	'ge',
        'germany' =>	'de',
        'ghana' =>	'gh',
        'gibraltar' =>	'gi',
        'greece' =>	'gr',
        'greenland' =>	'gl',
        'grenada' =>	'gd',
        'guadeloupe' =>	'gp',
        'guam' =>	'gu',
        'guatemala' =>	'gt',
        'guernsey' =>	'gg',
        'guinea' =>	'gn',
        'guinea-bissau' =>	'gw',
        'guyana' =>	'gy',
        'haiti' =>	'ht',
        'heard island & mcdonald islands' =>	'hm',
        'holy see (vatican city state)' =>	'va',
        'honduras' =>	'hn',
        'hong kong' =>	'hk',
        'hungary' =>	'hu',
        'iceland' =>	'is',
        'india' =>	'in',
        'indonesia' =>	'id',
        'iran, islamic republic of' =>	'ir',
        'iraq' =>	'iq',
        'ireland' =>	'ie',
        'isle of man' =>	'im',
        'israel' =>	'il',
        'italy' =>	'it',
        'jamaica' =>	'jm',
        'japan' =>	'jp',
        'jersey' =>	'je',
        'jordan' =>	'jo',
        'kazakhstan' =>	'kz',
        'kenya' =>	'ke',
        'kiribati' =>	'ki',
        'korea' =>	'kr',
        'kuwait' =>	'kw',
        'kyrgyzstan' =>	'kg',
        'lao people\'s democratic republic' =>	'la',
        'latvia' =>	'lv',
        'lebanon' =>	'lb',
        'lesotho' =>	'ls',
        'liberia' =>	'lr',
        'libyan arab jamahiriya' =>	'ly',
        'liechtenstein' =>	'li',
        'lithuania' =>	'lt',
        'luxembourg' =>	'lu',
        'macao' =>	'mo',
        'macedonia' =>	'mk',
        'madagascar' =>	'mg',
        'malawi' =>	'mw',
        'malaysia' =>	'my',
        'maldives' =>	'mv',
        'mali' =>	'ml',
        'malta' =>	'mt',
        'marshall islands' =>	'mh',
        'martinique' =>	'mq',
        'mauritania' =>	'mr',
        'mauritius' =>	'mu',
        'mayotte' =>	'yt',
        'mexico' =>	'mx',
        'micronesia, federated states of' =>	'fm',
        'moldova' =>	'md',
        'monaco' =>	'mc',
        'mongolia' =>	'mn',
        'montenegro' =>	'me',
        'montserrat' =>	'ms',
        'morocco' =>	'ma',
        'mozambique' =>	'mz',
        'myanmar' =>	'mm',
        'namibia' =>	'na',
        'nauru' =>	'nr',
        'nepal' =>	'np',
        'netherlands' =>	'nl',
        'netherlands antilles' =>	'an',
        'new caledonia' =>	'nc',
        'new zealand' =>	'nz',
        'nicaragua' =>	'ni',
        'niger' =>	'ne',
        'nigeria' =>	'ng',
        'niue' =>	'nu',
        'norfolk island' =>	'nf',
        'northern mariana islands' =>	'mp',
        'norway' =>	'no',
        'oman' =>	'om',
        'pakistan' =>	'pk',
        'palau' =>	'pw',
        'palestinian territory, occupied' =>	'ps',
        'panama' =>	'pa',
        'papua new guinea' =>	'pg',
        'paraguay' =>	'py',
        'peru' =>	'pe',
        'philippines' =>	'ph',
        'pitcairn' =>	'pn',
        'poland' =>	'pl',
        'portugal' =>	'pt',
        'puerto rico' =>	'pr',
        'qatar' =>	'qa',
        'reunion' =>	're',
        'romania' =>	'ro',
        'russian' =>	'ru',
        'rwanda' =>	'rw',
        'saint barthelemy' =>	'bl',
        'saint helena' =>	'sh',
        'saint kitts and nevis' =>	'kn',
        'saint lucia' =>	'lc',
        'saint martin' =>	'mf',
        'saint pierre and miquelon' =>	'pm',
        'saint vincent and grenadines' =>	'vc',
        'samoa' =>	'ws',
        'san marino' =>	'sm',
        'sao tome and principe' =>	'st',
        'saudi arabia' =>	'sa',
        'senegal' =>	'sn',
        'serbia' =>	'rs',
        'seychelles' =>	'sc',
        'sierra leone' =>	'sl',
        'singapore' =>	'sg',
        'slovakia' =>	'sk',
        'slovenia' =>	'si',
        'solomon islands' =>	'sb',
        'somalia' =>	'so' ,
        'south africa' =>	'za',
        'south georgia and sandwich isl.' =>	'gs',
        'spain' =>	'es',
        'sri lanka' =>	'lk',
        'sudan' =>	'sd',
        'suriname' =>	'sr',
        'svalbard and jan mayen' =>	'sj',
        'swaziland' =>	'sz',
        'sweden' =>	'se',
        'switzerland' =>	'ch',
        'syrian arab republic' =>	'sy',
        'taiwan' =>	'tw',
        'tajikistan' =>	'tj',
        'tanzania' =>	'tz',
        'thailand' =>	'th',
        'timor-leste' =>	'tl',
        'togo' =>	'tg',
        'tokelau' =>	'tk',
        'tonga' =>	'to',
        'trinidad and tobago' =>	'tt',
        'tunisia' =>	'tn',
        'turkey' =>	'tr',
        'turkmenistan' =>	'tm',
        'turks and caicos islands' =>	'tc',
        'tuvalu' =>	'tv',
        'uganda' =>	'ug',
        'ukraine' =>	'ua',
        'united arab emirates' =>	'ae',
        'united kingdom' =>	'gb',
        'united states' =>	'us',
        'united states outlying islands' =>	'um',
        'uruguay' =>	'uy',
        'uzbekistan' =>	'uz',
        'vanuatu' =>	'vu',
        'venezuela' =>	've',
        'viet nam' =>	'vn',
        'virgin islands, british' =>	'vg',
        'virgin islands, u.s.' =>	'vi',
        'wallis and futuna' =>	'wf',
        'western sahara' =>	'eh',
        'yemen' =>	'ye',
        'zambia' =>	'zm',
        'zimbabwe' =>	'zw',
    ];

    /** @var array  */
    public static $countryToCurrency = [
        'afghanistan' => 'AFN',
        'albania' => 'ALL',
        'algeria' => 'DZD',
        'andorra' => 'EUR',
        'angola' => 'AOA',
        'antigua and barbuda' => 'XCD',
        'argentina' => 'ARS',
        'armenia' => 'AMD',
        'australia' => 'AUD',
        'austria' => 'EUR',
        'azerbaijan' => 'AZN',
        'bahamas' => 'BSD',
        'bahrain' => 'BHD',
        'bangladesh' => 'BDT',
        'barbados' => 'BBD',
        'belarus' => 'BYN',
        'belgium' => 'EUR',
        'belize' => 'BZD',
        'benin' => 'XOF',
        'bhutan' => 'BTN',
        'bolivia' => 'BOB',
        'bosnia and herzegovina' => 'BAM',
        'botswana' => 'BWP',
        'brazil' => 'BRL',
        'brunei' => 'BND',
        'bulgaria' => 'BGN',
        'burkina faso' => 'XOF',
        'burundi' => 'BIF',
        'cambodia' => 'KHR',
        'cameroon' => 'XAF',
        'canada' => 'CAD',
        'cape verde' => 'CVE',
        'central african republic' => 'XAF',
        'chad' => 'XAF',
        'chile' => 'CLP',
        'china' => 'CNY',
        'colombia' => 'COP',
        'comoros' => 'KMF',
        'costa rica' => 'CRC',
        'croatia' => 'HRK',
        'cuba' => 'CUP',
        'cyprus' => 'EUR',
        'czech republic' => 'CZK',
        'democratic republic of congo' => 'CDF',
        'denmark' => 'DKK',
        'djibouti' => 'DJF',
        'dominica' => 'XCD',
        'dominican republic' => 'DOP',
        'east timor' => 'USD',
        'ecuador' => 'USD',
        'egypt' => 'EGP',
        'el salvador' => 'USD',
        'equatorial guinea' => 'XAF',
        'eritrea' => 'ERN',
        'estonia' => 'EUR',
        'ethiopia' => 'ETB',
        'fiji' => 'FJD',
        'finland' => 'EUR',
        'france' => 'EUR',
        'gabon' => 'XAF',
        'gambia' => 'GMD',
        'georgia' => 'GEL',
        'germany' => 'EUR',
        'ghana' => 'GHS',
        'greece' => 'EUR',
        'grenada' => 'XCD',
        'guatemala' => 'GTQ',
        'guinea' => 'GNF',
        'guinea-bissau' => 'XOF',
        'guyana' => 'GYD',
        'haiti' => 'HTG',
        'honduras' => 'HNL',
        'hungary' => 'HUF',
        'iceland' => 'ISK',
        'india' => 'INR',
        'indonesia' => 'IDR',
        'iran' => 'IRR',
        'iraq' => 'IQD',
        'ireland' => 'EUR',
        'israel' => 'ILS',
        'italy' => 'EUR',
        'ivory coast' => 'XOF',
        'jamaica' => 'JMD',
        'japan' => 'JPY',
        'jordan' => 'JOD',
        'kazakhstan' => 'KZT',
        'kenya' => 'KES',
        'kiribati' => 'AUD',
        'north korea' => 'KPW',
        'south korea' => 'KRW',
        'kosovo' => 'EUR',
        'kuwait' => 'KWD',
        'kyrgyzstan' => 'KGS',
        'laos' => 'LAK',
        'latvia' => 'EUR',
        'lebanon' => 'LBP',
        'lesotho' => 'LSL',
        'liberia' => 'LRD',
        'libya' => 'LYD',
        'liechtenstein' => 'CHF',
        'lithuania' => 'EUR',
        'luxembourg' => 'EUR',
        'macedonia' => 'MKD',
        'madagascar' => 'MGA',
        'malawi' => 'MWK',
        'malaysia' => 'MYR',
        'maldives' => 'MVR',
        'mali' => 'XOF',
        'malta' => 'EUR',
        'marshall islands' => 'USD',
        'mauritania' => 'MRO',
        'mauritius' => 'MUR',
        'mexico' => 'MXN',
        'micronesia' => 'USD',
        'moldova' => 'MDL',
        'monaco' => 'EUR',
        'mongolia' => 'MNT',
        'montenegro' => 'EUR',
        'morocco' => 'MAD',
        'mozambique' => 'MZN',
        'myanmar' => 'MMK',
        'namibia' => 'NAD',
        'nauru' => 'AUD',
        'nepal' => 'NPR',
        'netherlands' => 'EUR',
        'new zealand' => 'NZD',
        'nicaragua' => 'NIO',
        'niger' => 'XOF',
        'nigeria' => 'NGN',
        'norway' => 'NOK',
        'oman' => 'OMR',
        'pakistan' => 'PKR',
        'palau' => 'USD',
        'palestine' => 'ILS',
        'panama' => 'PAB',
        'papua new guinea' => 'PGK',
        'paraguay' => 'PYG',
        'peru' => 'PEN',
        'philippines' => 'PHP',
        'poland' => 'PLN',
        'portugal' => 'EUR',
        'qatar' => 'QAR',
        'republic of the congo' => 'XAF',
        'romania' => 'RON',
        'russia' => 'RUB',
        'rwanda' => 'RWF',
        'saint kitts and nevis' => 'XCD',
        'saint lucia' => 'XCD',
        'saint vincent and the grenadines' => 'XCD',
        'samoa' => 'WST',
        'san marino' => 'EUR',
        'são tomé and príncipe' => 'STD',
        'saudi arabia' => 'SAR',
        'senegal' => 'XOF',
        'serbia' => 'RSD',
        'seychelles' => 'SCR',
        'sierra leone' => 'SLL',
        'singapore' => 'SGD',
        'slovakia' => 'EUR',
        'slovenia' => 'EUR',
        'solomon islands' => 'SBD',
        'somalia' => 'SOS',
        'south africa' => 'ZAR',
        'south sudan' => 'SSP',
        'spain' => 'EUR',
        'sri lanka' => 'LKR',
        'sudan' => 'SDG',
        'suriname' => 'SRD',
        'swaziland' => 'SZL',
        'sweden' => 'SEK',
        'switzerland' => 'CHF',
        'syria' => 'SYP',
        'taiwan' => 'TWD',
        'tajikistan' => 'TJS',
        'tanzania' => 'TZS',
        'thailand' => 'THB',
        'togo' => 'XOF',
        'tonga' => 'TOP',
        'trinidad and tobago' => 'TTD',
        'tunisia' => 'TND',
        'turkey' => 'TRY',
        'turkmenistan' => 'TMT',
        'tuvalu' => 'AUD',
        'uganda' => 'UGX',
        'ukraine' => 'UAH',
        'united arab emirates' => 'AED',
        'united kingdom' => 'GBP',
        'united states' => 'USD',
        'uruguay' => 'UYU',
        'uzbekistan' => 'UZS',
        'vanuatu' => 'VUV',
        'vatican city' => 'EUR',
        'venezuela' => 'VEF',
        'vietnam' => 'VND',
        'yemen' => 'YER',
        'zambia' => 'ZMW',
        'zimbabwe' => 'USD',
    ];

    /** @var array */
    public static $countryIsoToCurrency = [
        'AF' => 'AFN',
        'AL' => 'ALL',
        'DZ' => 'DZD',
        'AS' => 'USD',
        'AD' => 'EUR',
        'AO' => 'AOA',
        'AI' => 'XCD',
        'AQ' => 'XCD',
        'AG' => 'XCD',
        'AR' => 'ARS',
        'AM' => 'AMD',
        'AW' => 'AWG',
        'AU' => 'AUD',
        'AT' => 'EUR',
        'AZ' => 'AZN',
        'BS' => 'BSD',
        'BH' => 'BHD',
        'BD' => 'BDT',
        'BB' => 'BBD',
        'BY' => 'BYR',
        'BE' => 'EUR',
        'BZ' => 'BZD',
        'BJ' => 'XOF',
        'BM' => 'BMD',
        'BT' => 'BTN',
        'BO' => 'BOB',
        'BA' => 'BAM',
        'BW' => 'BWP',
        'BV' => 'NOK',
        'BR' => 'BRL',
        'IO' => 'USD',
        'BN' => 'BND',
        'BG' => 'BGN',
        'BF' => 'XOF',
        'BI' => 'BIF',
        'KH' => 'KHR',
        'CM' => 'XAF',
        'CA' => 'CAD',
        'CV' => 'CVE',
        'KY' => 'KYD',
        'CF' => 'XAF',
        'TD' => 'XAF',
        'CL' => 'CLP',
        'CN' => 'CNY',
        'HK' => 'HKD',
        'CX' => 'AUD',
        'CC' => 'AUD',
        'CO' => 'COP',
        'KM' => 'KMF',
        'CG' => 'XAF',
        'CD' => 'CDF',
        'CK' => 'NZD',
        'CR' => 'CRC',
        'HR' => 'HRK',
        'CU' => 'CUP',
        'CY' => 'EUR',
        'CZ' => 'CZK',
        'DK' => 'DKK',
        'DJ' => 'DJF',
        'DM' => 'XCD',
        'DO' => 'DOP',
        'EC' => 'ECS',
        'EG' => 'EGP',
        'SV' => 'SVC',
        'GQ' => 'XAF',
        'ER' => 'ERN',
        'EE' => 'EUR',
        'ET' => 'ETB',
        'FK' => 'FKP',
        'FO' => 'DKK',
        'FJ' => 'FJD',
        'FI' => 'EUR',
        'FR' => 'EUR',
        'GF' => 'EUR',
        'TF' => 'EUR',
        'GA' => 'XAF',
        'GM' => 'GMD',
        'GE' => 'GEL',
        'DE' => 'EUR',
        'GH' => 'GHS',
        'GI' => 'GIP',
        'GR' => 'EUR',
        'GL' => 'DKK',
        'GD' => 'XCD',
        'GP' => 'EUR',
        'GU' => 'USD',
        'GT' => 'QTQ',
        'GG' => 'GGP',
        'GN' => 'GNF',
        'GW' => 'GWP',
        'GY' => 'GYD',
        'HT' => 'HTG',
        'HM' => 'AUD',
        'HN' => 'HNL',
        'HU' => 'HUF',
        'IS' => 'ISK',
        'IN' => 'INR',
        'ID' => 'IDR',
        'IR' => 'IRR',
        'IQ' => 'IQD',
        'IE' => 'EUR',
        'IM' => 'GBP',
        'IL' => 'ILS',
        'IT' => 'EUR',
        'JM' => 'JMD',
        'JP' => 'JPY',
        'JE' => 'GBP',
        'JO' => 'JOD',
        'KZ' => 'KZT',
        'KE' => 'KES',
        'KI' => 'AUD',
        'KP' => 'KPW',
        'KR' => 'KRW',
        'KW' => 'KWD',
        'KG' => 'KGS',
        'LA' => 'LAK',
        'LV' => 'EUR',
        'LB' => 'LBP',
        'LS' => 'LSL',
        'LR' => 'LRD',
        'LY' => 'LYD',
        'LI' => 'CHF',
        'LT' => 'EUR',
        'LU' => 'EUR',
        'MK' => 'MKD',
        'MG' => 'MGF',
        'MW' => 'MWK',
        'MY' => 'MYR',
        'MV' => 'MVR',
        'ML' => 'XOF',
        'MT' => 'EUR',
        'MH' => 'USD',
        'MQ' => 'EUR',
        'MR' => 'MRO',
        'MU' => 'MUR',
        'YT' => 'EUR',
        'MX' => 'MXN',
        'FM' => 'USD',
        'MD' => 'MDL',
        'MC' => 'EUR',
        'MN' => 'MNT',
        'ME' => 'EUR',
        'MS' => 'XCD',
        'MA' => 'MAD',
        'MZ' => 'MZN',
        'MM' => 'MMK',
        'NA' => 'NAD',
        'NR' => 'AUD',
        'NP' => 'NPR',
        'NL' => 'EUR',
        'AN' => 'ANG',
        'NC' => 'XPF',
        'NZ' => 'NZD',
        'NI' => 'NIO',
        'NE' => 'XOF',
        'NG' => 'NGN',
        'NU' => 'NZD',
        'NF' => 'AUD',
        'MP' => 'USD',
        'NO' => 'NOK',
        'OM' => 'OMR',
        'PK' => 'PKR',
        'PW' => 'USD',
        'PA' => 'PAB',
        'PG' => 'PGK',
        'PY' => 'PYG',
        'PE' => 'PEN',
        'PH' => 'PHP',
        'PN' => 'NZD',
        'PL' => 'PLN',
        'PT' => 'EUR',
        'PR' => 'USD',
        'QA' => 'QAR',
        'RE' => 'EUR',
        'RO' => 'RON',
        'RU' => 'RUB',
        'RW' => 'RWF',
        'SH' => 'SHP',
        'KN' => 'XCD',
        'LC' => 'XCD',
        'PM' => 'EUR',
        'VC' => 'XCD',
        'WS' => 'WST',
        'SM' => 'EUR',
        'ST' => 'STD',
        'SA' => 'SAR',
        'SN' => 'XOF',
        'RS' => 'RSD',
        'SC' => 'SCR',
        'SL' => 'SLL',
        'SG' => 'SGD',
        'SK' => 'EUR',
        'SI' => 'EUR',
        'SB' => 'SBD',
        'SO' => 'SOS',
        'ZA' => 'ZAR',
        'GS' => 'GBP',
        'SS' => 'SSP',
        'ES' => 'EUR',
        'LK' => 'LKR',
        'SD' => 'SDG',
        'SR' => 'SRD',
        'SJ' => 'NOK',
        'SZ' => 'SZL',
        'SE' => 'SEK',
        'CH' => 'CHF',
        'SY' => 'SYP',
        'TW' => 'TWD',
        'TJ' => 'TJS',
        'TZ' => 'TZS',
        'TH' => 'THB',
        'TG' => 'XOF',
        'TK' => 'NZD',
        'TO' => 'TOP',
        'TT' => 'TTD',
        'TN' => 'TND',
        'TR' => 'TRY',
        'TM' => 'TMT',
        'TC' => 'USD',
        'TV' => 'AUD',
        'UG' => 'UGX',
        'UA' => 'UAH',
        'AE' => 'AED',
        'GB' => 'GBP',
        'US' => 'USD',
        'UM' => 'USD',
        'UY' => 'UYU',
        'UZ' => 'UZS',
        'VU' => 'VUV',
        'VE' => 'VEF',
        'VN' => 'VND',
        'VI' => 'USD',
        'WF' => 'XPF',
        'EH' => 'MAD',
        'YE' => 'YER',
        'ZM' => 'ZMW',
        'ZW' => 'ZWD',
    ];

    /** @var array */
    private static $requiredInfo = [
        'AED' => [
            'country' => 'United Arab Emirates',
            'type' => 'emirates',
            'details' => [
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
            'currency' => 'AED',
        ],
        'ARS' => [
            'country' => 'Argentina',
            "currency" => "ARS",
            "type" => "argentina",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "taxId" => [
                    'text' => 'TAX ID',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'AUD' => [
            'country' => 'Australia',
            "type" => "australian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bsbCode" => [
                    'text' => 'BSB Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'BDT' => [
            'country' => 'bangladesh',
            "type" => "bangladesh",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "branchCode" => [
                    'text' => 'Branch Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'BGN' => [
            'country' => 'Bulgaria',
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'BRL' => [
            'country' => 'brazil',
            "type" => "brazil",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "branchCode" => [
                    'type' => 'text',
                    'text' => 'Branch Code',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "accountType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['Checking', 'Savings'],
                ],
                "cpf",
                "phoneNumber",
            ],
        ],
        'CAD' => [
            'country' => 'canada',
            "type" => "canadian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "institutionNumber" => [
                    'type' => 'text',
                    'text' => 'Institution Number',
                ],
                "transitNumber" => [
                    'type' => 'text',
                    'text' => 'Transit Number',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "accountType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['Checking', 'Savings'],
                ],
            ],
        ],
        'CHF' => [
            'country' => 'Switzerland',
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'CLP' => [
            'country' => 'Chile',
            "type" => "chile",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "rut" => [
                    'text' => 'RUT / RUN',
                    'type' => 'text',
                ],
                "accountType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['Checking', 'Savings'],
                ],
                "phoneNumber" => [
                    'text' => 'Phone Number',
                    'type' => 'text',
                ],
            ],
        ],
        'CNY' => [
            'country' => 'china',
            "type" => "chinese_card",
            "PRIVATE_ONLY" => true,
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "cardNumber" => [
                    'text' => 'Card Number',
                    'type' => 'text',
                ],
            ],
        ],
        'CZK' => [
            'country' => 'czech',
            "type" => "czech",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'DKK' => [
            'country' => ['Denmark', 'Greenland', 'Faroe Islands', 'Kingdom of Denmark'],
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'EGP' => [
            'country' => ['egypt', 'Palestine', 'Khedivate of Egypt', 'Palestinian territories'],
            "type" => "egypt_local",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'EUR' => [
            'country' => ['Germany', 'Italy', 'France', 'Spain', 'Portugal', 'Greece', 'Netherlands', 'Austria', 'Belgium', 'Ireland', 'Lithuania', 'cyprus', 'finland', 'Slovakia', 'Slovenia', 'Estonia', 'Malta'],
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'GBP' => [
            "type" => "sort_code",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "sortCode" => [
                    'text' => 'Sort Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'GEL' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'GHS' => [
            "type" => "ghana_local",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'HKD' => [
            "type" => "hongkong",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'HRK' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'HUF' => [
            "type" => "hungarian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'IDR' => [
            "type" => "indonesian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'ILS' => [
            "type" => "israeli_local",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        "INR" => [
            "type" => "indian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "ifscCode" => [
                    'type' => 'text',
                    'text' => 'IFSC Code',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'JPY' => [
            "type" => "japanese",
            "details" => [
                "branchCode" => [
                    'type' => 'text',
                    'text' => 'Branch Code',
                ],
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "accountType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['General', 'Savings', 'Checking'],
                ],
            ],
        ],
        'KES' => [
            "type" => "kenya_local",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'LKR' => [
            "type" => "srilanka",
            "details" => [
                "branchCode" => [
                    'type' => 'text',
                    'text' => 'Branch Code',
                ],
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'MAD' => [
            "type" => "morocco",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'MXN' => [
            "type" => "mexican",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "clabe" => [
                    'type' => 'text',
                    'text' => 'clabe',
                ],
            ],
        ],
        'MYR' => [
            "type" => "malaysian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "swiftCode" => [
                    'type' => 'text',
                    'text' => 'SWIFT Code',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'NGN' => [
            "type" => "nigeria",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'NOK' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'NPR' => [
            "legalType" => "PRIVATE",
            "details" => [
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'NZD' => [
            "type" => "newzealand",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'PEN' => [
            "type" => "peru",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "accountType" => [
                    'type' => 'select',
                    'text' => 'Account Type',
                    'options' => ['CHECKING', 'SAVINGS'],
                ],
                "idDocumentType" => [
                    'type' => 'text',
                    'text' => 'Document Type',
                    'placeholder' => 'DNI',
                ],
                "idDocumentNumber" => [
                    'type' => 'text',
                    'text' => 'Document ID Number',
                    'placeholder' => '09740475',
                ],
                "phoneNumber" => [
                    'type' => 'text',
                    'text' => 'Phone Number',
                    'placeholder' => '9123456789',
                ],
            ],
        ],
        'PHP' => [
            "type" => "philippines",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "address" => [
                    "type" => 'fields',
                    "fields" => [
                        'country' => [
                            'text' => 'Country',
                            'type' => 'text',
                        ],
                        'city' => [
                            'text' => 'City',
                            'type' => 'text',
                        ],
                        'postCode' => [
                            'text' => 'Zip Code / Post Code',
                            'placeholder' => '123456',
                            'type' => 'text',
                        ],
                        'firstLine' => [
                            'text' => 'Street Address',
                            'type' => 'text',
                        ],
                    ],
                ],
            ],
        ],
        'PKR' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'PLN' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'RON' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'RUB' => [
            "type" => "russiarapida",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "russiaRegion",
                "address" => [
                    "type" => 'fields',
                    "fields" => [
                        'country' => [
                            'text' => 'Country',
                            'type' => 'text',
                        ],
                        'city' => [
                            'text' => 'City',
                            'type' => 'text',
                        ],
                        'postCode' => [
                            'text' => 'Zip Code / Post Code',
                            'placeholder' => '123456',
                            'type' => 'text',
                        ],
                        'firstLine' => [
                            'text' => 'Street Address',
                            'type' => 'text',
                        ],
                    ],
                ],
            ],
        ],
        'SEK' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'SGD' => [
            "type" => "singapore",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                    'placeholder' => '104000029',
                ],
                "accountNumber" => [
                    'type' => 'text',
                    'text' => 'Account Number',
                    'placeholder' => '1234567890',
                ],
            ],
        ],
        'THB' => [
            "type" => "thailand",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "address" => [
                    "type" => 'fields',
                    "fields" => [
                        'country' => [
                            'text' => 'Country',
                            'type' => 'text',
                        ],
                        'city' => [
                            'text' => 'City',
                            'type' => 'text',
                        ],
                        'postCode' => [
                            'text' => 'Zip Code / Post Code',
                            'placeholder' => '123456',
                            'type' => 'text',
                        ],
                        'firstLine' => [
                            'text' => 'Street Address',
                            'type' => 'text',
                        ],
                    ],
                ],
            ],
        ],
        'TRY' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'UAH' => [
            "type" => "privatbank",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "phoneNumber" => [
                    'text' => 'Phone Number',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'USD' => [
            "type" => "aba",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "abartn" => [
                    'text' => 'Routing Number',
                    'placeholder' => '104000029',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'placeholder' => '1234567890',
                    'type' => 'text',
                ],
                "accountType" => [
                    "type" => 'select',
                    "options" => ['CHECKING', 'Savings'],
                ],
                "address" => [
                    "type" => 'fields',
                    "fields" => [
                        'country' => [
                            'text' => 'Country',
                            'type' => 'text',
                        ],
                        'city' => [
                            'text' => 'City',
                            'type' => 'text',
                        ],
                        'postCode' => [
                            'text' => 'Zip Code',
                            'placeholder' => '123456',
                            'type' => 'text',
                        ],
                        'firstLine' => [
                            'text' => 'Street Address',
                            'type' => 'text',
                        ],
                    ],
                ],
            ],
        ],
    ];

    /**
     * It will return required information for the given currency
     * @param $currency
     * @return array
     * @throws \Exception
     */
    public static function get(string $currency): array {
        if (!self::isSupported($currency)) {
            throw new \Exception('Provided currency (' . $currency . ') is not supported');
        }
        return self::getCurrencyData($currency) ?? self::getCountryData($currency);
    }

    /**
     * @param string $country
     * @return mixed|null
     */
    public static function getCountryData(string $country) {
        $currency = self::getCountryCurrency($country);
        return self::getCurrencyData($currency);
    }

    /**
     * @param string $country
     * @param bool $returnISO
     * @return mixed|null
     */
    public static function getCountryCurrency(string $country, $returnISO = false) {
        return self::$countryToCurrency[strtolower($country)] ?? null;
    }

    /**
     * @param string $country
     * @return string|null
     */
    public static function getCountryISO(string $country) {
        if (isset(self::$countryISO[strtolower($country)])) {
            return strtoupper(self::$countryISO[strtolower($country)]);
        }
        return null;
    }

    /**
     * @param string $currency
     * @return mixed|null
     */
    public static function getCurrencyData(string $currency) {
        return self::$requiredInfo[strtoupper($currency)] ?? null;
    }

    /**
     * It will check if given currency is supported by transferwise
     * @param string $currency
     * @return bool
     */
    public static function isSupported(string $currency): bool {
        $currencySupport =  isset(self::$requiredInfo[strtoupper($currency)]);

        if (!$currencySupport) {
            $currency = self::getCountryCurrency($currency); // may be instead of currency user passed country
            return isset(self::$requiredInfo[strtoupper($currency)]);
        }
        return $currencySupport;
    }

    /**
     * @param string $countryIsoCode
     * @return mixed|null
     */
    public static function getCountryIsoData(string $countryIsoCode) {
        $currency = self::getCountryISOCurrency($countryIsoCode);
        return self::getCurrencyData($currency);
    }

    /**
     * @param string $countryIsoCode
     * @return mixed
     */
    public static function getCountryISOCurrency(string $countryIsoCode) {
        return self::$countryIsoToCurrency[$countryIsoCode];
    }

}
