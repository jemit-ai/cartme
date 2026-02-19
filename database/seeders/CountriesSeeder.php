<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate first to avoid duplicates on re-seed



        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('countries')->truncate();
        DB::table('product_country')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');



        $countries = [
            ['name' => 'Afghanistan',                      'iso2' => 'AF', 'iso3' => 'AFG', 'phone_code' => '93',  'currency' => 'AFN', 'currency_symbol' => '؋'],
            ['name' => 'Albania',                          'iso2' => 'AL', 'iso3' => 'ALB', 'phone_code' => '355', 'currency' => 'ALL', 'currency_symbol' => 'L'],
            ['name' => 'Algeria',                          'iso2' => 'DZ', 'iso3' => 'DZA', 'phone_code' => '213', 'currency' => 'DZD', 'currency_symbol' => 'د.ج'],
            ['name' => 'Andorra',                          'iso2' => 'AD', 'iso3' => 'AND', 'phone_code' => '376', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Angola',                           'iso2' => 'AO', 'iso3' => 'AGO', 'phone_code' => '244', 'currency' => 'AOA', 'currency_symbol' => 'Kz'],
            ['name' => 'Argentina',                        'iso2' => 'AR', 'iso3' => 'ARG', 'phone_code' => '54',  'currency' => 'ARS', 'currency_symbol' => '$'],
            ['name' => 'Armenia',                          'iso2' => 'AM', 'iso3' => 'ARM', 'phone_code' => '374', 'currency' => 'AMD', 'currency_symbol' => '֏'],
            ['name' => 'Australia',                        'iso2' => 'AU', 'iso3' => 'AUS', 'phone_code' => '61',  'currency' => 'AUD', 'currency_symbol' => '$'],
            ['name' => 'Austria',                          'iso2' => 'AT', 'iso3' => 'AUT', 'phone_code' => '43',  'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Azerbaijan',                       'iso2' => 'AZ', 'iso3' => 'AZE', 'phone_code' => '994', 'currency' => 'AZN', 'currency_symbol' => '₼'],
            ['name' => 'Bahamas',                          'iso2' => 'BS', 'iso3' => 'BHS', 'phone_code' => '1',   'currency' => 'BSD', 'currency_symbol' => '$'],
            ['name' => 'Bahrain',                          'iso2' => 'BH', 'iso3' => 'BHR', 'phone_code' => '973', 'currency' => 'BHD', 'currency_symbol' => '.د.ب'],
            ['name' => 'Bangladesh',                       'iso2' => 'BD', 'iso3' => 'BGD', 'phone_code' => '880', 'currency' => 'BDT', 'currency_symbol' => '৳'],
            ['name' => 'Belarus',                          'iso2' => 'BY', 'iso3' => 'BLR', 'phone_code' => '375', 'currency' => 'BYN', 'currency_symbol' => 'Br'],
            ['name' => 'Belgium',                          'iso2' => 'BE', 'iso3' => 'BEL', 'phone_code' => '32',  'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Belize',                           'iso2' => 'BZ', 'iso3' => 'BLZ', 'phone_code' => '501', 'currency' => 'BZD', 'currency_symbol' => '$'],
            ['name' => 'Benin',                            'iso2' => 'BJ', 'iso3' => 'BEN', 'phone_code' => '229', 'currency' => 'XOF', 'currency_symbol' => 'Fr'],
            ['name' => 'Bhutan',                           'iso2' => 'BT', 'iso3' => 'BTN', 'phone_code' => '975', 'currency' => 'BTN', 'currency_symbol' => 'Nu'],
            ['name' => 'Bolivia',                          'iso2' => 'BO', 'iso3' => 'BOL', 'phone_code' => '591', 'currency' => 'BOB', 'currency_symbol' => 'Bs.'],
            ['name' => 'Bosnia and Herzegovina',           'iso2' => 'BA', 'iso3' => 'BIH', 'phone_code' => '387', 'currency' => 'BAM', 'currency_symbol' => 'KM'],
            ['name' => 'Botswana',                         'iso2' => 'BW', 'iso3' => 'BWA', 'phone_code' => '267', 'currency' => 'BWP', 'currency_symbol' => 'P'],
            ['name' => 'Brazil',                           'iso2' => 'BR', 'iso3' => 'BRA', 'phone_code' => '55',  'currency' => 'BRL', 'currency_symbol' => 'R$'],
            ['name' => 'Brunei',                           'iso2' => 'BN', 'iso3' => 'BRN', 'phone_code' => '673', 'currency' => 'BND', 'currency_symbol' => '$'],
            ['name' => 'Bulgaria',                         'iso2' => 'BG', 'iso3' => 'BGR', 'phone_code' => '359', 'currency' => 'BGN', 'currency_symbol' => 'лв'],
            ['name' => 'Burkina Faso',                     'iso2' => 'BF', 'iso3' => 'BFA', 'phone_code' => '226', 'currency' => 'XOF', 'currency_symbol' => 'Fr'],
            ['name' => 'Burundi',                          'iso2' => 'BI', 'iso3' => 'BDI', 'phone_code' => '257', 'currency' => 'BIF', 'currency_symbol' => 'Fr'],
            ['name' => 'Cambodia',                         'iso2' => 'KH', 'iso3' => 'KHM', 'phone_code' => '855', 'currency' => 'KHR', 'currency_symbol' => '៛'],
            ['name' => 'Cameroon',                         'iso2' => 'CM', 'iso3' => 'CMR', 'phone_code' => '237', 'currency' => 'XAF', 'currency_symbol' => 'Fr'],
            ['name' => 'Canada',                           'iso2' => 'CA', 'iso3' => 'CAN', 'phone_code' => '1',   'currency' => 'CAD', 'currency_symbol' => '$'],
            ['name' => 'Chad',                             'iso2' => 'TD', 'iso3' => 'TCD', 'phone_code' => '235', 'currency' => 'XAF', 'currency_symbol' => 'Fr'],
            ['name' => 'Chile',                            'iso2' => 'CL', 'iso3' => 'CHL', 'phone_code' => '56',  'currency' => 'CLP', 'currency_symbol' => '$'],
            ['name' => 'China',                            'iso2' => 'CN', 'iso3' => 'CHN', 'phone_code' => '86',  'currency' => 'CNY', 'currency_symbol' => '¥'],
            ['name' => 'Colombia',                         'iso2' => 'CO', 'iso3' => 'COL', 'phone_code' => '57',  'currency' => 'COP', 'currency_symbol' => '$'],
            ['name' => 'Costa Rica',                       'iso2' => 'CR', 'iso3' => 'CRI', 'phone_code' => '506', 'currency' => 'CRC', 'currency_symbol' => '₡'],
            ['name' => 'Croatia',                          'iso2' => 'HR', 'iso3' => 'HRV', 'phone_code' => '385', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Cuba',                             'iso2' => 'CU', 'iso3' => 'CUB', 'phone_code' => '53',  'currency' => 'CUP', 'currency_symbol' => '$'],
            ['name' => 'Cyprus',                           'iso2' => 'CY', 'iso3' => 'CYP', 'phone_code' => '357', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Czech Republic',                   'iso2' => 'CZ', 'iso3' => 'CZE', 'phone_code' => '420', 'currency' => 'CZK', 'currency_symbol' => 'Kč'],
            ['name' => 'Denmark',                          'iso2' => 'DK', 'iso3' => 'DNK', 'phone_code' => '45',  'currency' => 'DKK', 'currency_symbol' => 'kr'],
            ['name' => 'Djibouti',                         'iso2' => 'DJ', 'iso3' => 'DJI', 'phone_code' => '253', 'currency' => 'DJF', 'currency_symbol' => 'Fr'],
            ['name' => 'Dominican Republic',               'iso2' => 'DO', 'iso3' => 'DOM', 'phone_code' => '1',   'currency' => 'DOP', 'currency_symbol' => '$'],
            ['name' => 'Ecuador',                          'iso2' => 'EC', 'iso3' => 'ECU', 'phone_code' => '593', 'currency' => 'USD', 'currency_symbol' => '$'],
            ['name' => 'Egypt',                            'iso2' => 'EG', 'iso3' => 'EGY', 'phone_code' => '20',  'currency' => 'EGP', 'currency_symbol' => '£'],
            ['name' => 'El Salvador',                      'iso2' => 'SV', 'iso3' => 'SLV', 'phone_code' => '503', 'currency' => 'USD', 'currency_symbol' => '$'],
            ['name' => 'Estonia',                          'iso2' => 'EE', 'iso3' => 'EST', 'phone_code' => '372', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Ethiopia',                         'iso2' => 'ET', 'iso3' => 'ETH', 'phone_code' => '251', 'currency' => 'ETB', 'currency_symbol' => 'Br'],
            ['name' => 'Finland',                          'iso2' => 'FI', 'iso3' => 'FIN', 'phone_code' => '358', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'France',                           'iso2' => 'FR', 'iso3' => 'FRA', 'phone_code' => '33',  'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Gabon',                            'iso2' => 'GA', 'iso3' => 'GAB', 'phone_code' => '241', 'currency' => 'XAF', 'currency_symbol' => 'Fr'],
            ['name' => 'Georgia',                          'iso2' => 'GE', 'iso3' => 'GEO', 'phone_code' => '995', 'currency' => 'GEL', 'currency_symbol' => '₾'],
            ['name' => 'Germany',                          'iso2' => 'DE', 'iso3' => 'DEU', 'phone_code' => '49',  'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Ghana',                            'iso2' => 'GH', 'iso3' => 'GHA', 'phone_code' => '233', 'currency' => 'GHS', 'currency_symbol' => '₵'],
            ['name' => 'Greece',                           'iso2' => 'GR', 'iso3' => 'GRC', 'phone_code' => '30',  'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Guatemala',                        'iso2' => 'GT', 'iso3' => 'GTM', 'phone_code' => '502', 'currency' => 'GTQ', 'currency_symbol' => 'Q'],
            ['name' => 'Guinea',                           'iso2' => 'GN', 'iso3' => 'GIN', 'phone_code' => '224', 'currency' => 'GNF', 'currency_symbol' => 'Fr'],
            ['name' => 'Haiti',                            'iso2' => 'HT', 'iso3' => 'HTI', 'phone_code' => '509', 'currency' => 'HTG', 'currency_symbol' => 'G'],
            ['name' => 'Honduras',                         'iso2' => 'HN', 'iso3' => 'HND', 'phone_code' => '504', 'currency' => 'HNL', 'currency_symbol' => 'L'],
            ['name' => 'Hungary',                          'iso2' => 'HU', 'iso3' => 'HUN', 'phone_code' => '36',  'currency' => 'HUF', 'currency_symbol' => 'Ft'],
            ['name' => 'Iceland',                          'iso2' => 'IS', 'iso3' => 'ISL', 'phone_code' => '354', 'currency' => 'ISK', 'currency_symbol' => 'kr'],
            ['name' => 'India',                            'iso2' => 'IN', 'iso3' => 'IND', 'phone_code' => '91',  'currency' => 'INR', 'currency_symbol' => '₹'],
            ['name' => 'Indonesia',                        'iso2' => 'ID', 'iso3' => 'IDN', 'phone_code' => '62',  'currency' => 'IDR', 'currency_symbol' => 'Rp'],
            ['name' => 'Iran',                             'iso2' => 'IR', 'iso3' => 'IRN', 'phone_code' => '98',  'currency' => 'IRR', 'currency_symbol' => '﷼'],
            ['name' => 'Iraq',                             'iso2' => 'IQ', 'iso3' => 'IRQ', 'phone_code' => '964', 'currency' => 'IQD', 'currency_symbol' => 'ع.د'],
            ['name' => 'Ireland',                          'iso2' => 'IE', 'iso3' => 'IRL', 'phone_code' => '353', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Israel',                           'iso2' => 'IL', 'iso3' => 'ISR', 'phone_code' => '972', 'currency' => 'ILS', 'currency_symbol' => '₪'],
            ['name' => 'Italy',                            'iso2' => 'IT', 'iso3' => 'ITA', 'phone_code' => '39',  'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Jamaica',                          'iso2' => 'JM', 'iso3' => 'JAM', 'phone_code' => '1',   'currency' => 'JMD', 'currency_symbol' => '$'],
            ['name' => 'Japan',                            'iso2' => 'JP', 'iso3' => 'JPN', 'phone_code' => '81',  'currency' => 'JPY', 'currency_symbol' => '¥'],
            ['name' => 'Jordan',                           'iso2' => 'JO', 'iso3' => 'JOR', 'phone_code' => '962', 'currency' => 'JOD', 'currency_symbol' => 'د.ا'],
            ['name' => 'Kazakhstan',                       'iso2' => 'KZ', 'iso3' => 'KAZ', 'phone_code' => '7',   'currency' => 'KZT', 'currency_symbol' => '₸'],
            ['name' => 'Kenya',                            'iso2' => 'KE', 'iso3' => 'KEN', 'phone_code' => '254', 'currency' => 'KES', 'currency_symbol' => 'Ksh'],
            ['name' => 'Kuwait',                           'iso2' => 'KW', 'iso3' => 'KWT', 'phone_code' => '965', 'currency' => 'KWD', 'currency_symbol' => 'د.ك'],
            ['name' => 'Kyrgyzstan',                       'iso2' => 'KG', 'iso3' => 'KGZ', 'phone_code' => '996', 'currency' => 'KGS', 'currency_symbol' => 'с'],
            ['name' => 'Laos',                             'iso2' => 'LA', 'iso3' => 'LAO', 'phone_code' => '856', 'currency' => 'LAK', 'currency_symbol' => '₭'],
            ['name' => 'Latvia',                           'iso2' => 'LV', 'iso3' => 'LVA', 'phone_code' => '371', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Lebanon',                          'iso2' => 'LB', 'iso3' => 'LBN', 'phone_code' => '961', 'currency' => 'LBP', 'currency_symbol' => 'ل.ل'],
            ['name' => 'Libya',                            'iso2' => 'LY', 'iso3' => 'LBY', 'phone_code' => '218', 'currency' => 'LYD', 'currency_symbol' => 'ل.د'],
            ['name' => 'Lithuania',                        'iso2' => 'LT', 'iso3' => 'LTU', 'phone_code' => '370', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Luxembourg',                       'iso2' => 'LU', 'iso3' => 'LUX', 'phone_code' => '352', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Madagascar',                       'iso2' => 'MG', 'iso3' => 'MDG', 'phone_code' => '261', 'currency' => 'MGA', 'currency_symbol' => 'Ar'],
            ['name' => 'Malaysia',                         'iso2' => 'MY', 'iso3' => 'MYS', 'phone_code' => '60',  'currency' => 'MYR', 'currency_symbol' => 'RM'],
            ['name' => 'Maldives',                         'iso2' => 'MV', 'iso3' => 'MDV', 'phone_code' => '960', 'currency' => 'MVR', 'currency_symbol' => 'Rf'],
            ['name' => 'Mali',                             'iso2' => 'ML', 'iso3' => 'MLI', 'phone_code' => '223', 'currency' => 'XOF', 'currency_symbol' => 'Fr'],
            ['name' => 'Malta',                            'iso2' => 'MT', 'iso3' => 'MLT', 'phone_code' => '356', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Mexico',                           'iso2' => 'MX', 'iso3' => 'MEX', 'phone_code' => '52',  'currency' => 'MXN', 'currency_symbol' => '$'],
            ['name' => 'Moldova',                          'iso2' => 'MD', 'iso3' => 'MDA', 'phone_code' => '373', 'currency' => 'MDL', 'currency_symbol' => 'L'],
            ['name' => 'Mongolia',                         'iso2' => 'MN', 'iso3' => 'MNG', 'phone_code' => '976', 'currency' => 'MNT', 'currency_symbol' => '₮'],
            ['name' => 'Montenegro',                       'iso2' => 'ME', 'iso3' => 'MNE', 'phone_code' => '382', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Morocco',                          'iso2' => 'MA', 'iso3' => 'MAR', 'phone_code' => '212', 'currency' => 'MAD', 'currency_symbol' => 'د.م.'],
            ['name' => 'Mozambique',                       'iso2' => 'MZ', 'iso3' => 'MOZ', 'phone_code' => '258', 'currency' => 'MZN', 'currency_symbol' => 'MT'],
            ['name' => 'Myanmar',                          'iso2' => 'MM', 'iso3' => 'MMR', 'phone_code' => '95',  'currency' => 'MMK', 'currency_symbol' => 'K'],
            ['name' => 'Nepal',                            'iso2' => 'NP', 'iso3' => 'NPL', 'phone_code' => '977', 'currency' => 'NPR', 'currency_symbol' => '₨'],
            ['name' => 'Netherlands',                      'iso2' => 'NL', 'iso3' => 'NLD', 'phone_code' => '31',  'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'New Zealand',                      'iso2' => 'NZ', 'iso3' => 'NZL', 'phone_code' => '64',  'currency' => 'NZD', 'currency_symbol' => '$'],
            ['name' => 'Nicaragua',                        'iso2' => 'NI', 'iso3' => 'NIC', 'phone_code' => '505', 'currency' => 'NIO', 'currency_symbol' => 'C$'],
            ['name' => 'Niger',                            'iso2' => 'NE', 'iso3' => 'NER', 'phone_code' => '227', 'currency' => 'XOF', 'currency_symbol' => 'Fr'],
            ['name' => 'Nigeria',                          'iso2' => 'NG', 'iso3' => 'NGA', 'phone_code' => '234', 'currency' => 'NGN', 'currency_symbol' => '₦'],
            ['name' => 'North Korea',                      'iso2' => 'KP', 'iso3' => 'PRK', 'phone_code' => '850', 'currency' => 'KPW', 'currency_symbol' => '₩'],
            ['name' => 'Norway',                           'iso2' => 'NO', 'iso3' => 'NOR', 'phone_code' => '47',  'currency' => 'NOK', 'currency_symbol' => 'kr'],
            ['name' => 'Oman',                             'iso2' => 'OM', 'iso3' => 'OMN', 'phone_code' => '968', 'currency' => 'OMR', 'currency_symbol' => 'ر.ع.'],
            ['name' => 'Pakistan',                         'iso2' => 'PK', 'iso3' => 'PAK', 'phone_code' => '92',  'currency' => 'PKR', 'currency_symbol' => '₨'],
            ['name' => 'Palestine',                        'iso2' => 'PS', 'iso3' => 'PSE', 'phone_code' => '970', 'currency' => 'ILS', 'currency_symbol' => '₪'],
            ['name' => 'Panama',                           'iso2' => 'PA', 'iso3' => 'PAN', 'phone_code' => '507', 'currency' => 'PAB', 'currency_symbol' => 'B/.'],
            ['name' => 'Papua New Guinea',                 'iso2' => 'PG', 'iso3' => 'PNG', 'phone_code' => '675', 'currency' => 'PGK', 'currency_symbol' => 'K'],
            ['name' => 'Paraguay',                         'iso2' => 'PY', 'iso3' => 'PRY', 'phone_code' => '595', 'currency' => 'PYG', 'currency_symbol' => '₲'],
            ['name' => 'Peru',                             'iso2' => 'PE', 'iso3' => 'PER', 'phone_code' => '51',  'currency' => 'PEN', 'currency_symbol' => 'S/.'],
            ['name' => 'Philippines',                      'iso2' => 'PH', 'iso3' => 'PHL', 'phone_code' => '63',  'currency' => 'PHP', 'currency_symbol' => '₱'],
            ['name' => 'Poland',                           'iso2' => 'PL', 'iso3' => 'POL', 'phone_code' => '48',  'currency' => 'PLN', 'currency_symbol' => 'zł'],
            ['name' => 'Portugal',                         'iso2' => 'PT', 'iso3' => 'PRT', 'phone_code' => '351', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Qatar',                            'iso2' => 'QA', 'iso3' => 'QAT', 'phone_code' => '974', 'currency' => 'QAR', 'currency_symbol' => 'ر.ق'],
            ['name' => 'Romania',                          'iso2' => 'RO', 'iso3' => 'ROU', 'phone_code' => '40',  'currency' => 'RON', 'currency_symbol' => 'lei'],
            ['name' => 'Russia',                           'iso2' => 'RU', 'iso3' => 'RUS', 'phone_code' => '7',   'currency' => 'RUB', 'currency_symbol' => '₽'],
            ['name' => 'Rwanda',                           'iso2' => 'RW', 'iso3' => 'RWA', 'phone_code' => '250', 'currency' => 'RWF', 'currency_symbol' => 'Fr'],
            ['name' => 'Saudi Arabia',                     'iso2' => 'SA', 'iso3' => 'SAU', 'phone_code' => '966', 'currency' => 'SAR', 'currency_symbol' => 'ر.س'],
            ['name' => 'Senegal',                          'iso2' => 'SN', 'iso3' => 'SEN', 'phone_code' => '221', 'currency' => 'XOF', 'currency_symbol' => 'Fr'],
            ['name' => 'Serbia',                           'iso2' => 'RS', 'iso3' => 'SRB', 'phone_code' => '381', 'currency' => 'RSD', 'currency_symbol' => 'din'],
            ['name' => 'Singapore',                        'iso2' => 'SG', 'iso3' => 'SGP', 'phone_code' => '65',  'currency' => 'SGD', 'currency_symbol' => '$'],
            ['name' => 'Slovakia',                         'iso2' => 'SK', 'iso3' => 'SVK', 'phone_code' => '421', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Slovenia',                         'iso2' => 'SI', 'iso3' => 'SVN', 'phone_code' => '386', 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Somalia',                          'iso2' => 'SO', 'iso3' => 'SOM', 'phone_code' => '252', 'currency' => 'SOS', 'currency_symbol' => 'Sh'],
            ['name' => 'South Africa',                     'iso2' => 'ZA', 'iso3' => 'ZAF', 'phone_code' => '27',  'currency' => 'ZAR', 'currency_symbol' => 'R'],
            ['name' => 'South Korea',                      'iso2' => 'KR', 'iso3' => 'KOR', 'phone_code' => '82',  'currency' => 'KRW', 'currency_symbol' => '₩'],
            ['name' => 'South Sudan',                      'iso2' => 'SS', 'iso3' => 'SSD', 'phone_code' => '211', 'currency' => 'SSP', 'currency_symbol' => '£'],
            ['name' => 'Spain',                            'iso2' => 'ES', 'iso3' => 'ESP', 'phone_code' => '34',  'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'Sri Lanka',                        'iso2' => 'LK', 'iso3' => 'LKA', 'phone_code' => '94',  'currency' => 'LKR', 'currency_symbol' => '₨'],
            ['name' => 'Sudan',                            'iso2' => 'SD', 'iso3' => 'SDN', 'phone_code' => '249', 'currency' => 'SDG', 'currency_symbol' => '£'],
            ['name' => 'Sweden',                           'iso2' => 'SE', 'iso3' => 'SWE', 'phone_code' => '46',  'currency' => 'SEK', 'currency_symbol' => 'kr'],
            ['name' => 'Switzerland',                      'iso2' => 'CH', 'iso3' => 'CHE', 'phone_code' => '41',  'currency' => 'CHF', 'currency_symbol' => 'Fr'],
            ['name' => 'Syria',                            'iso2' => 'SY', 'iso3' => 'SYR', 'phone_code' => '963', 'currency' => 'SYP', 'currency_symbol' => '£'],
            ['name' => 'Taiwan',                           'iso2' => 'TW', 'iso3' => 'TWN', 'phone_code' => '886', 'currency' => 'TWD', 'currency_symbol' => '$'],
            ['name' => 'Tajikistan',                       'iso2' => 'TJ', 'iso3' => 'TJK', 'phone_code' => '992', 'currency' => 'TJS', 'currency_symbol' => 'SM'],
            ['name' => 'Tanzania',                         'iso2' => 'TZ', 'iso3' => 'TZA', 'phone_code' => '255', 'currency' => 'TZS', 'currency_symbol' => 'Sh'],
            ['name' => 'Thailand',                         'iso2' => 'TH', 'iso3' => 'THA', 'phone_code' => '66',  'currency' => 'THB', 'currency_symbol' => '฿'],
            ['name' => 'Tunisia',                          'iso2' => 'TN', 'iso3' => 'TUN', 'phone_code' => '216', 'currency' => 'TND', 'currency_symbol' => 'د.ت'],
            ['name' => 'Turkey',                           'iso2' => 'TR', 'iso3' => 'TUR', 'phone_code' => '90',  'currency' => 'TRY', 'currency_symbol' => '₺'],
            ['name' => 'Turkmenistan',                     'iso2' => 'TM', 'iso3' => 'TKM', 'phone_code' => '993', 'currency' => 'TMT', 'currency_symbol' => 'T'],
            ['name' => 'Uganda',                           'iso2' => 'UG', 'iso3' => 'UGA', 'phone_code' => '256', 'currency' => 'UGX', 'currency_symbol' => 'Sh'],
            ['name' => 'Ukraine',                          'iso2' => 'UA', 'iso3' => 'UKR', 'phone_code' => '380', 'currency' => 'UAH', 'currency_symbol' => '₴'],
            ['name' => 'United Arab Emirates',             'iso2' => 'AE', 'iso3' => 'ARE', 'phone_code' => '971', 'currency' => 'AED', 'currency_symbol' => 'د.إ'],
            ['name' => 'United Kingdom',                   'iso2' => 'GB', 'iso3' => 'GBR', 'phone_code' => '44',  'currency' => 'GBP', 'currency_symbol' => '£'],
            ['name' => 'United States',                    'iso2' => 'US', 'iso3' => 'USA', 'phone_code' => '1',   'currency' => 'USD', 'currency_symbol' => '$'],
            ['name' => 'Uruguay',                          'iso2' => 'UY', 'iso3' => 'URY', 'phone_code' => '598', 'currency' => 'UYU', 'currency_symbol' => '$'],
            ['name' => 'Uzbekistan',                       'iso2' => 'UZ', 'iso3' => 'UZB', 'phone_code' => '998', 'currency' => 'UZS', 'currency_symbol' => 'so\'m'],
            ['name' => 'Venezuela',                        'iso2' => 'VE', 'iso3' => 'VEN', 'phone_code' => '58',  'currency' => 'VES', 'currency_symbol' => 'Bs.S'],
            ['name' => 'Vietnam',                          'iso2' => 'VN', 'iso3' => 'VNM', 'phone_code' => '84',  'currency' => 'VND', 'currency_symbol' => '₫'],
            ['name' => 'Yemen',                            'iso2' => 'YE', 'iso3' => 'YEM', 'phone_code' => '967', 'currency' => 'YER', 'currency_symbol' => '﷼'],
            ['name' => 'Zambia',                           'iso2' => 'ZM', 'iso3' => 'ZMB', 'phone_code' => '260', 'currency' => 'ZMW', 'currency_symbol' => 'ZK'],
            ['name' => 'Zimbabwe',                         'iso2' => 'ZW', 'iso3' => 'ZWE', 'phone_code' => '263', 'currency' => 'ZWL', 'currency_symbol' => '$'],
        ];

        // Add timestamps and insert in chunks
        $now = now();
        $rows = array_map(fn($c) => array_merge($c, [
            'created_at' => $now,
            'updated_at' => $now,
        ]), $countries);

        foreach (array_chunk($rows, 50) as $chunk) {
            DB::table('countries')->insert($chunk);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('Countries seeded: ' . count($countries));
    }
}
