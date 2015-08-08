<?php

use Cfair\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{

    /**
     * Run the database seeds.
     * 'Andorran Peseta', 'ADP'
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('currencies')->delete();

        Currency::create([ 'currency_name' => 'Andorran Peseta', 'currency_code' => 'ADP' ]);
        Currency::create([ 'currency_name' => 'United Arab Emirates Dirham', 'currency_code' => 'AED' ]);
        Currency::create([ 'currency_name' => 'Afghanistan Afghani', 'currency_code' => 'AFA' ]);
        Currency::create([ 'currency_name' => 'Albanian Lek', 'currency_code' => 'ALL' ]);
        Currency::create([ 'currency_name' => 'Netherlands Antillian Guilder', 'currency_code' => 'ANG' ]);
        Currency::create([ 'currency_name' => 'Angolan Kwanza', 'currency_code' => 'AOK' ]);
        Currency::create([ 'currency_name' => 'Argentine Peso', 'currency_code' => 'ARS' ]);
        Currency::create([ 'currency_name' => 'Australian Dollar', 'currency_code' => 'AUD' ]);
        Currency::create([ 'currency_name' => 'Aruban Florin', 'currency_code' => 'AWG' ]);
        Currency::create([ 'currency_name' => 'Barbados Dollar', 'currency_code' => 'BBD' ]);
        Currency::create([ 'currency_name' => 'Bangladeshi Taka', 'currency_code' => 'BDT' ]);
        Currency::create([ 'currency_name' => 'Bulgarian Lev', 'currency_code' => 'BGN' ]);
        Currency::create([ 'currency_name' => 'Bahraini Dinar', 'currency_code' => 'BHD' ]);
        Currency::create([ 'currency_name' => 'Burundi Franc', 'currency_code' => 'BIF' ]);
        Currency::create([ 'currency_name' => 'Bermudian Dollar', 'currency_code' => 'BMD' ]);
        Currency::create([ 'currency_name' => 'Brunei Dollar', 'currency_code' => 'BND' ]);
        Currency::create([ 'currency_name' => 'Bolivian Boliviano', 'currency_code' => 'BOB' ]);
        Currency::create([ 'currency_name' => 'Brazilian Real', 'currency_code' => 'BRL' ]);
        Currency::create([ 'currency_name' => 'Bahamian Dollar', 'currency_code' => 'BSD' ]);
        Currency::create([ 'currency_name' => 'Bhutan Ngultrum', 'currency_code' => 'BTN' ]);
        Currency::create([ 'currency_name' => 'Burma Kyat', 'currency_code' => 'BUK' ]);
        Currency::create([ 'currency_name' => 'Botswanian Pula', 'currency_code' => 'BWP' ]);
        Currency::create([ 'currency_name' => 'Belize Dollar', 'currency_code' => 'BZD' ]);
        Currency::create([ 'currency_name' => 'Canadian Dollar', 'currency_code' => 'CAD' ]);
        Currency::create([ 'currency_name' => 'Swiss Franc', 'currency_code' => 'CHF' ]);
        Currency::create([ 'currency_name' => 'Chilean Unidades de Fomento', 'currency_code' => 'CLF' ]);
        Currency::create([ 'currency_name' => 'Chilean Peso', 'currency_code' => 'CLP' ]);
        Currency::create([ 'currency_name' => 'Yuan (Chinese) Renminbi', 'currency_code' => 'CNY' ]);
        Currency::create([ 'currency_name' => 'Colombian Peso', 'currency_code' => 'COP' ]);
        Currency::create([ 'currency_name' => 'Costa Rican Colon', 'currency_code' => 'CRC' ]);
        Currency::create([ 'currency_name' => 'Czech Republic Koruna', 'currency_code' => 'CZK' ]);
        Currency::create([ 'currency_name' => 'Cuban Peso', 'currency_code' => 'CUP' ]);
        Currency::create([ 'currency_name' => 'Cape Verde Escudo', 'currency_code' => 'CVE' ]);
        Currency::create([ 'currency_name' => 'Cyprus Pound', 'currency_code' => 'CYP' ]);
        Currency::create([ 'currency_name' => 'Danish Krone', 'currency_code' => 'DKK' ]);
        Currency::create([ 'currency_name' => 'Dominican Peso', 'currency_code' => 'DOP' ]);
        Currency::create([ 'currency_name' => 'Algerian Dinar', 'currency_code' => 'DZD' ]);
        Currency::create([ 'currency_name' => 'Ecuador Sucre', 'currency_code' => 'ECS' ]);
        Currency::create([ 'currency_name' => 'Egyptian Pound', 'currency_code' => 'EGP' ]);
        Currency::create([ 'currency_name' => 'Estonian Kroon (EEK)', 'currency_code' => 'EEK' ]);
        Currency::create([ 'currency_name' => 'Ethiopian Birr', 'currency_code' => 'ETB' ]);
        Currency::create([ 'currency_name' => 'Euro', 'currency_code' => 'EUR' ]);
        Currency::create([ 'currency_name' => 'Fiji Dollar', 'currency_code' => 'FJD' ]);
        Currency::create([ 'currency_name' => 'Falkland Islands Pound', 'currency_code' => 'FKP' ]);
        Currency::create([ 'currency_name' => 'British Pound', 'currency_code' => 'GBP' ]);
        Currency::create([ 'currency_name' => 'Ghanaian Cedi', 'currency_code' => 'GHC' ]);
        Currency::create([ 'currency_name' => 'Gibraltar Pound', 'currency_code' => 'GIP' ]);
        Currency::create([ 'currency_name' => 'Gambian Dalasi', 'currency_code' => 'GMD' ]);
        Currency::create([ 'currency_name' => 'Guinea Franc', 'currency_code' => 'GNF' ]);
        Currency::create([ 'currency_name' => 'Guatemalan Quetzal', 'currency_code' => 'GTQ' ]);
        Currency::create([ 'currency_name' => 'Guinea-Bissau Peso', 'currency_code' => 'GWP' ]);
        Currency::create([ 'currency_name' => 'Guyanan Dollar', 'currency_code' => 'GYD' ]);
        Currency::create([ 'currency_name' => 'Hong Kong Dollar', 'currency_code' => 'HKD' ]);
        Currency::create([ 'currency_name' => 'Honduran Lempira', 'currency_code' => 'HNL' ]);
        Currency::create([ 'currency_name' => 'Haitian Gourde', 'currency_code' => 'HTG' ]);
        Currency::create([ 'currency_name' => 'Hungarian Forint', 'currency_code' => 'HUF' ]);
        Currency::create([ 'currency_name' => 'Indonesian Rupiah', 'currency_code' => 'IDR' ]);
        Currency::create([ 'currency_name' => 'Irish Punt', 'currency_code' => 'IEP' ]);
        Currency::create([ 'currency_name' => 'Israeli Shekel', 'currency_code' => 'ILS' ]);
        Currency::create([ 'currency_name' => 'Indian Rupee', 'currency_code' => 'INR' ]);
        Currency::create([ 'currency_name' => 'Iraqi Dinar', 'currency_code' => 'IQD' ]);
        Currency::create([ 'currency_name' => 'Iranian Rial', 'currency_code' => 'IRR' ]);
        Currency::create([ 'currency_name' => 'Jamaican Dollar', 'currency_code' => 'JMD' ]);
        Currency::create([ 'currency_name' => 'Jordanian Dinar', 'currency_code' => 'JOD' ]);
        Currency::create([ 'currency_name' => 'Japanese Yen', 'currency_code' => 'JPY' ]);
        Currency::create([ 'currency_name' => 'Kenyan Schilling', 'currency_code' => 'KES' ]);
        Currency::create([ 'currency_name' => 'Kampuchean (Cambodian) Riel', 'currency_code' => 'KHR' ]);
        Currency::create([ 'currency_name' => 'Comoros Franc', 'currency_code' => 'KMF' ]);
        Currency::create([ 'currency_name' => 'North Korean Won', 'currency_code' => 'KPW' ]);
        Currency::create([ 'currency_name' => '(South) Korean Won', 'currency_code' => 'KRW' ]);
        Currency::create([ 'currency_name' => 'Kuwaiti Dinar', 'currency_code' => 'KWD' ]);
        Currency::create([ 'currency_name' => 'Cayman Islands Dollar', 'currency_code' => 'KYD' ]);
        Currency::create([ 'currency_name' => 'Lao Kip', 'currency_code' => 'LAK' ]);
        Currency::create([ 'currency_name' => 'Lebanese Pound', 'currency_code' => 'LBP' ]);
        Currency::create([ 'currency_name' => 'Sri Lanka Rupee', 'currency_code' => 'LKR' ]);
        Currency::create([ 'currency_name' => 'Liberian Dollar', 'currency_code' => 'LRD' ]);
        Currency::create([ 'currency_name' => 'Lesotho Loti', 'currency_code' => 'LSL' ]);
        Currency::create([ 'currency_name' => 'Libyan Dinar', 'currency_code' => 'LYD' ]);
        Currency::create([ 'currency_name' => 'Moroccan Dirham', 'currency_code' => 'MAD' ]);
        Currency::create([ 'currency_name' => 'Malagasy Franc', 'currency_code' => 'MGF' ]);
        Currency::create([ 'currency_name' => 'Mongolian Tugrik', 'currency_code' => 'MNT' ]);
        Currency::create([ 'currency_name' => 'Macau Pataca', 'currency_code' => 'MOP' ]);
        Currency::create([ 'currency_name' => 'Mauritanian Ouguiya', 'currency_code' => 'MRO' ]);
        Currency::create([ 'currency_name' => 'Maltese Lira', 'currency_code' => 'MTL' ]);
        Currency::create([ 'currency_name' => 'Mauritius Rupee', 'currency_code' => 'MUR' ]);
        Currency::create([ 'currency_name' => 'Maldive Rufiyaa', 'currency_code' => 'MVR' ]);
        Currency::create([ 'currency_name' => 'Malawi Kwacha', 'currency_code' => 'MWK' ]);
        Currency::create([ 'currency_name' => 'Mexican Peso', 'currency_code' => 'MXP' ]);
        Currency::create([ 'currency_name' => 'Malaysian Ringgit', 'currency_code' => 'MYR' ]);
        Currency::create([ 'currency_name' => 'Mozambique Metical', 'currency_code' => 'MZM' ]);
        Currency::create([ 'currency_name' => 'Namibian Dollar', 'currency_code' => 'NAD' ]);
        Currency::create([ 'currency_name' => 'Nigerian Naira', 'currency_code' => 'NGN' ]);
        Currency::create([ 'currency_name' => 'Nicaraguan Cordoba', 'currency_code' => 'NIO' ]);
        Currency::create([ 'currency_name' => 'Norwegian Kroner', 'currency_code' => 'NOK' ]);
        Currency::create([ 'currency_name' => 'Nepalese Rupee', 'currency_code' => 'NPR' ]);
        Currency::create([ 'currency_name' => 'New Zealand Dollar', 'currency_code' => 'NZD' ]);
        Currency::create([ 'currency_name' => 'Omani Rial', 'currency_code' => 'OMR' ]);
        Currency::create([ 'currency_name' => 'Panamanian Balboa', 'currency_code' => 'PAB' ]);
        Currency::create([ 'currency_name' => 'Peruvian Nuevo Sol', 'currency_code' => 'PEN' ]);
        Currency::create([ 'currency_name' => 'Papua New Guinea Kina', 'currency_code' => 'PGK' ]);
        Currency::create([ 'currency_name' => 'Philippine Peso', 'currency_code' => 'PHP' ]);
        Currency::create([ 'currency_name' => 'Pakistan Rupee', 'currency_code' => 'PKR' ]);
        Currency::create([ 'currency_name' => 'Polish Zloty', 'currency_code' => 'PLN' ]);
        Currency::create([ 'currency_name' => 'Paraguay Guarani', 'currency_code' => 'PYG' ]);
        Currency::create([ 'currency_name' => 'Qatari Rial', 'currency_code' => 'QAR' ]);
        Currency::create([ 'currency_name' => 'Romanian Leu', 'currency_code' => 'RON' ]);
        Currency::create([ 'currency_name' => 'Rwanda Franc', 'currency_code' => 'RWF' ]);
        Currency::create([ 'currency_name' => 'Saudi Arabian Riyal', 'currency_code' => 'SAR' ]);
        Currency::create([ 'currency_name' => 'Solomon Islands Dollar', 'currency_code' => 'SBD' ]);
        Currency::create([ 'currency_name' => 'Seychelles Rupee', 'currency_code' => 'SCR' ]);
        Currency::create([ 'currency_name' => 'Sudanese Pound', 'currency_code' => 'SDP' ]);
        Currency::create([ 'currency_name' => 'Swedish Krona', 'currency_code' => 'SEK' ]);
        Currency::create([ 'currency_name' => 'Singapore Dollar', 'currency_code' => 'SGD' ]);
        Currency::create([ 'currency_name' => 'St. Helena Pound', 'currency_code' => 'SHP' ]);
        Currency::create([ 'currency_name' => 'Sierra Leone Leone', 'currency_code' => 'SLL' ]);
        Currency::create([ 'currency_name' => 'Somali Schilling', 'currency_code' => 'SOS' ]);
        Currency::create([ 'currency_name' => 'Suriname Guilder', 'currency_code' => 'SRG' ]);
        Currency::create([ 'currency_name' => 'Sao Tome and Principe Dobra', 'currency_code' => 'STD' ]);
        Currency::create([ 'currency_name' => 'Russian Ruble', 'currency_code' => 'RUB' ]);
        Currency::create([ 'currency_name' => 'El Salvador Colon', 'currency_code' => 'SVC' ]);
        Currency::create([ 'currency_name' => 'Syrian Potmd', 'currency_code' => 'SYP' ]);
        Currency::create([ 'currency_name' => 'Swaziland Lilangeni', 'currency_code' => 'SZL' ]);
        Currency::create([ 'currency_name' => 'Thai Baht', 'currency_code' => 'THB' ]);
        Currency::create([ 'currency_name' => 'Tunisian Dinar', 'currency_code' => 'TND' ]);
        Currency::create([ 'currency_name' => 'Tongan Paanga', 'currency_code' => 'TOP' ]);
        Currency::create([ 'currency_name' => 'East Timor Escudo', 'currency_code' => 'TPE' ]);
        Currency::create([ 'currency_name' => 'Turkish Lira', 'currency_code' => 'TRY' ]);
        Currency::create([ 'currency_name' => 'Trinidad and Tobago Dollar', 'currency_code' => 'TTD' ]);
        Currency::create([ 'currency_name' => 'Taiwan Dollar', 'currency_code' => 'TWD' ]);
        Currency::create([ 'currency_name' => 'Tanzanian Schilling', 'currency_code' => 'TZS' ]);
        Currency::create([ 'currency_name' => 'Uganda Shilling',  'currency_code' =>'UGX']);
 Currency::create([ 'currency_name' => 'US Dollar',  'currency_code' =>'USD']);
 Currency::create([ 'currency_name' => 'Uruguayan Peso', 'currency_code' =>'UYU']);
 Currency::create([ 'currency_name' => 'Venezualan Bolivar', 'currency_code' =>'VEF']);
 Currency::create([ 'currency_name' => 'Vietnamese Dong', 'currency_code' =>'VND']);
 Currency::create([ 'currency_name' => 'Vanuatu Vatu', 'currency_code' =>'VUV']);
 Currency::create([ 'currency_name' => 'Samoan Tala',  'currency_code' =>'WST']);
 Currency::create([ 'currency_name' => 'CommunautÃ© FinanciÃ¨re Africaine BEAC, Francs', 'currency_code' => 'XAF' ]);
 Currency::create([ 'currency_name' => 'Silver, Ounces', 'currency_code' => 'XAG' ]);
 Currency::create([ 'currency_name' => 'Gold, Ounces', 'currency_code' => 'XAU' ]);
 Currency::create([ 'currency_name' => 'East Caribbean Dollar', 'currency_code' => 'XCD' ]);
 Currency::create([ 'currency_name' => 'International Monetary Fund (IMF) Special Drawing Rights', 'currency_code' => 'XDR' ]);
 Currency::create([ 'currency_name' => 'CommunautÃ© FinanciÃ¨re Africaine BCEAO - Francs', 'currency_code' => 'XOF' ]);
 Currency::create([ 'currency_name' => 'Palladium Ounces', 'currency_code' => 'XPD' ]);
 Currency::create([ 'currency_name' => 'Comptoirs FranÃ§ais du Pacifique Francs', 'currency_code' => 'XPF' ]);
 Currency::create([ 'currency_name' => 'Platinum, Ounces', 'currency_code' => 'XPT' ]);
 Currency::create([ 'currency_name' => 'Democratic Yemeni Dinar', 'currency_code' => 'YDD' ]);
 Currency::create([ 'currency_name' => 'Yemeni Rial', 'currency_code' => 'YER' ]);
 Currency::create([ 'currency_name' => 'New Yugoslavia Dinar', 'currency_code' => 'YUD' ]);
 Currency::create([ 'currency_name' => 'South African Rand', 'currency_code' => 'ZAR' ]);
 Currency::create([ 'currency_name' => 'Zambian Kwacha', 'currency_code' => 'ZMK' ]);
 Currency::create([ 'currency_name' => 'Zaire Zaire', 'currency_code' => 'ZRZ' ]);
 Currency::create([ 'currency_name' => 'Zimbabwe Dollar', 'currency_code' => 'ZWD' ]);
 Currency::create([ 'currency_name' => 'Slovak Koruna', 'currency_code' => 'SKK' ]);
 Currency::create([ 'currency_name' => 'Armenian Dram', 'currency_code' => 'AMD']);
    }

}