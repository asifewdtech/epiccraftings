<?php
    
    if(!function_exists('countries'))
    {
        function countries()
        {
            // return  array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
            return array(
                array("country_code" => "AF", "name" => "Afghanistan", "code" => "93"),
                array("country_code" => "AL", "name" => "Albania", "code" => "355"),
                array("country_code" => "DZ", "name" => "Algeria", "code" => "213"),
                array("country_code" => "AS", "name" => "American Samoa", "code" => "1"),
                array("country_code" => "AD", "name" => "Andorra", "code" => "376"),
                array("country_code" => "AO", "name" => "Angola", "code" => "244"),
                array("country_code" => "AI", "name" => "Anguilla", "code" => "1"),
                array("country_code" => "AG", "name" => "Antigua", "code" => "1"),
                array("country_code" => "AR", "name" => "Argentina", "code" => "54"),
                array("country_code" => "AM", "name" => "Armenia", "code" => "374"),
                array("country_code" => "AW", "name" => "Aruba", "code" => "297"),
                array("country_code" => "AU", "name" => "Australia", "code" => "61"),
                array("country_code" => "AT", "name" => "Austria", "code" => "43"),
                array("country_code" => "AZ", "name" => "Azerbaijan", "code" => "994"),
                array("country_code" => "BH", "name" => "Bahrain", "code" => "973"),
                array("country_code" => "BD", "name" => "Bangladesh", "code" => "880"),
                array("country_code" => "BB", "name" => "Barbados", "code" => "1"),
                array("country_code" => "BY", "name" => "Belarus", "code" => "375"),
                array("country_code" => "BE", "name" => "Belgium", "code" => "32"),
                array("country_code" => "BZ", "name" => "Belize", "code" => "501"),
                array("country_code" => "BJ", "name" => "Benin", "code" => "229"),
                array("country_code" => "BM", "name" => "Bermuda", "code" => "1"),
                array("country_code" => "BT", "name" => "Bhutan", "code" => "975"),
                array("country_code" => "BO", "name" => "Bolivia", "code" => "591"),
                array("country_code" => "BA", "name" => "Bosnia and Herzegovina", "code" => "387"),
                array("country_code" => "BW", "name" => "Botswana", "code" => "267"),
                array("country_code" => "BR", "name" => "Brazil", "code" => "55"),
                array("country_code" => "IO", "name" => "British Indian Ocean Territory", "code" => "246"),
                array("country_code" => "VG", "name" => "British Virgin Islands", "code" => "1"),
                array("country_code" => "BN", "name" => "Brunei", "code" => "673"),
                array("country_code" => "BG", "name" => "Bulgaria", "code" => "359"),
                array("country_code" => "BF", "name" => "Burkina Faso", "code" => "226"),
                array("country_code" => "MM", "name" => "Burma Myanmar", "code" => "95"),
                array("country_code" => "BI", "name" => "Burundi", "code" => "257"),
                array("country_code" => "KH", "name" => "Cambodia", "code" => "855"),
                array("country_code" => "CM", "name" => "Cameroon", "code" => "237"),
                array("country_code" => "CA", "name" => "Canada", "code" => "1"),
                array("country_code" => "CV", "name" => "Cape Verde", "code" => "238"),
                array("country_code" => "KY", "name" => "Cayman Islands", "code" => "1"),
                array("country_code" => "CF", "name" => "Central African Republic", "code" => "236"),
                array("country_code" => "TD", "name" => "Chad", "code" => "235"),
                array("country_code" => "CL", "name" => "Chile", "code" => "56"),
                array("country_code" => "CN", "name" => "China", "code" => "86"),
                array("country_code" => "CO", "name" => "Colombia", "code" => "57"),
                array("country_code" => "KM", "name" => "Comoros", "code" => "269"),
                array("country_code" => "CK", "name" => "Cook Islands", "code" => "682"),
                array("country_code" => "CR", "name" => "Costa Rica", "code" => "506"),
                array("country_code" => "CI", "name" => "Côte d'Ivoire", "code" => "225"),
                array("country_code" => "HR", "name" => "Croatia", "code" => "385"),
                array("country_code" => "CU", "name" => "Cuba", "code" => "53"),
                array("country_code" => "CY", "name" => "Cyprus", "code" => "357"),
                array("country_code" => "CZ", "name" => "Czech Republic", "code" => "420"),
                array("country_code" => "CD", "name" => "Democratic Republic of Congo", "code" => "243"),
                array("country_code" => "DK", "name" => "Denmark", "code" => "45"),
                array("country_code" => "DJ", "name" => "Djibouti", "code" => "253"),
                array("country_code" => "DM", "name" => "Dominica", "code" => "1"),
                array("country_code" => "DO", "name" => "Dominican Republic", "code" => "1"),
                array("country_code" => "EC", "name" => "Ecuador", "code" => "593"),
                array("country_code" => "EG", "name" => "Egypt", "code" => "20"),
                array("country_code" => "SV", "name" => "El Salvador", "code" => "503"),
                array("country_code" => "GQ", "name" => "Equatorial Guinea", "code" => "240"),
                array("country_code" => "ER", "name" => "Eritrea", "code" => "291"),
                array("country_code" => "EE", "name" => "Estonia", "code" => "372"),
                array("country_code" => "ET", "name" => "Ethiopia", "code" => "251"),
                array("country_code" => "FK", "name" => "Falkland Islands", "code" => "500"),
                array("country_code" => "FO", "name" => "Faroe Islands", "code" => "298"),
                array("country_code" => "FM", "name" => "Federated States of Micronesia", "code" => "691"),
                array("country_code" => "FJ", "name" => "Fiji", "code" => "679"),
                array("country_code" => "FI", "name" => "Finland", "code" => "358"),
                array("country_code" => "FR", "name" => "France", "code" => "33"),
                array("country_code" => "GF", "name" => "French Guiana", "code" => "594"),
                array("country_code" => "PF", "name" => "French Polynesia", "code" => "689"),
                array("country_code" => "GA", "name" => "Gabon", "code" => "241"),
                array("country_code" => "GE", "name" => "Georgia", "code" => "995"),
                array("country_code" => "DE", "name" => "Germany", "code" => "49"),
                array("country_code" => "GH", "name" => "Ghana", "code" => "233"),
                array("country_code" => "GI", "name" => "Gibraltar", "code" => "350"),
                array("country_code" => "GR", "name" => "Greece", "code" => "30"),
                array("country_code" => "GL", "name" => "Greenland", "code" => "299"),
                array("country_code" => "GD", "name" => "Grenada", "code" => "1"),
                array("country_code" => "GP", "name" => "Guadeloupe", "code" => "590"),
                array("country_code" => "GU", "name" => "Guam", "code" => "1"),
                array("country_code" => "GT", "name" => "Guatemala", "code" => "502"),
                array("country_code" => "GN", "name" => "Guinea", "code" => "224"),
                array("country_code" => "GW", "name" => "Guinea-Bissau", "code" => "245"),
                array("country_code" => "GY", "name" => "Guyana", "code" => "592"),
                array("country_code" => "HT", "name" => "Haiti", "code" => "509"),
                array("country_code" => "HN", "name" => "Honduras", "code" => "504"),
                array("country_code" => "HK", "name" => "Hong Kong", "code" => "852"),
                array("country_code" => "HU", "name" => "Hungary", "code" => "36"),
                array("country_code" => "IS", "name" => "Iceland", "code" => "354"),
                array("country_code" => "IN", "name" => "India", "code" => "91"),
                array("country_code" => "ID", "name" => "Indonesia", "code" => "62"),
                array("country_code" => "IR", "name" => "Iran", "code" => "98"),
                array("country_code" => "IQ", "name" => "Iraq", "code" => "964"),
                array("country_code" => "IE", "name" => "Ireland", "code" => "353"),
                array("country_code" => "IL", "name" => "Israel", "code" => "972"),
                array("country_code" => "IT", "name" => "Italy", "code" => "39"),
                array("country_code" => "JM", "name" => "Jamaica", "code" => "1"),
                array("country_code" => "JP", "name" => "Japan", "code" => "81"),
                array("country_code" => "JO", "name" => "Jordan", "code" => "962"),
                array("country_code" => "KZ", "name" => "Kazakhstan", "code" => "7"),
                array("country_code" => "KE", "name" => "Kenya", "code" => "254"),
                array("country_code" => "KI", "name" => "Kiribati", "code" => "686"),
                array("country_code" => "XK", "name" => "Kosovo", "code" => "381"),
                array("country_code" => "KW", "name" => "Kuwait", "code" => "965"),
                array("country_code" => "KG", "name" => "Kyrgyzstan", "code" => "996"),
                array("country_code" => "LA", "name" => "Laos", "code" => "856"),
                array("country_code" => "LV", "name" => "Latvia", "code" => "371"),
                array("country_code" => "LB", "name" => "Lebanon", "code" => "961"),
                array("country_code" => "LS", "name" => "Lesotho", "code" => "266"),
                array("country_code" => "LR", "name" => "Liberia", "code" => "231"),
                array("country_code" => "LY", "name" => "Libya", "code" => "218"),
                array("country_code" => "LI", "name" => "Liechtenstein", "code" => "423"),
                array("country_code" => "LT", "name" => "Lithuania", "code" => "370"),
                array("country_code" => "LU", "name" => "Luxembourg", "code" => "352"),
                array("country_code" => "MO", "name" => "Macau", "code" => "853"),
                array("country_code" => "MK", "name" => "Macedonia", "code" => "389"),
                array("country_code" => "MG", "name" => "Madagascar", "code" => "261"),
                array("country_code" => "MW", "name" => "Malawi", "code" => "265"),
                array("country_code" => "MY", "name" => "Malaysia", "code" => "60"),
                array("country_code" => "MV", "name" => "Maldives", "code" => "960"),
                array("country_code" => "ML", "name" => "Mali", "code" => "223"),
                array("country_code" => "MT", "name" => "Malta", "code" => "356"),
                array("country_code" => "MH", "name" => "Marshall Islands", "code" => "692"),
                array("country_code" => "MQ", "name" => "Martinique", "code" => "596"),
                array("country_code" => "MR", "name" => "Mauritania", "code" => "222"),
                array("country_code" => "MU", "name" => "Mauritius", "code" => "230"),
                array("country_code" => "YT", "name" => "Mayotte", "code" => "262"),
                array("country_code" => "MX", "name" => "Mexico", "code" => "52"),
                array("country_code" => "MD", "name" => "Moldova", "code" => "373"),
                array("country_code" => "MC", "name" => "Monaco", "code" => "377"),
                array("country_code" => "MN", "name" => "Mongolia", "code" => "976"),
                array("country_code" => "ME", "name" => "Montenegro", "code" => "382"),
                array("country_code" => "MS", "name" => "Montserrat", "code" => "1"),
                array("country_code" => "MA", "name" => "Morocco", "code" => "212"),
                array("country_code" => "MZ", "name" => "Mozambique", "code" => "258"),
                array("country_code" => "NA", "name" => "Namibia", "code" => "264"),
                array("country_code" => "NR", "name" => "Nauru", "code" => "674"),
                array("country_code" => "NP", "name" => "Nepal", "code" => "977"),
                array("country_code" => "NL", "name" => "Netherlands", "code" => "31"),
                array("country_code" => "AN", "name" => "Netherlands Antilles", "code" => "599"),
                array("country_code" => "NC", "name" => "New Caledonia", "code" => "687"),
                array("country_code" => "NZ", "name" => "New Zealand", "code" => "64"),
                array("country_code" => "NI", "name" => "Nicaragua", "code" => "505"),
                array("country_code" => "NE", "name" => "Niger", "code" => "227"),
                array("country_code" => "NG", "name" => "Nigeria", "code" => "234"),
                array("country_code" => "NU", "name" => "Niue", "code" => "683"),
                array("country_code" => "NF", "name" => "Norfolk Island", "code" => "672"),
                array("country_code" => "KP", "name" => "North Korea", "code" => "850"),
                array("country_code" => "MP", "name" => "Northern Mariana Islands", "code" => "1"),
                array("country_code" => "NO", "name" => "Norway", "code" => "47"),
                array("country_code" => "OM", "name" => "Oman", "code" => "968"),
                array("country_code" => "PK", "name" => "Pakistan", "code" => "92"),
                array("country_code" => "PW", "name" => "Palau", "code" => "680"),
                array("country_code" => "PS", "name" => "Palestine", "code" => "970"),
                array("country_code" => "PA", "name" => "Panama", "code" => "507"),
                array("country_code" => "PG", "name" => "Papua New Guinea", "code" => "675"),
                array("country_code" => "PY", "name" => "Paraguay", "code" => "595"),
                array("country_code" => "PE", "name" => "Peru", "code" => "51"),
                array("country_code" => "PH", "name" => "Philippines", "code" => "63"),
                array("country_code" => "PL", "name" => "Poland", "code" => "48"),
                array("country_code" => "PT", "name" => "Portugal", "code" => "351"),
                array("country_code" => "PR", "name" => "Puerto Rico", "code" => "1"),
                array("country_code" => "QA", "name" => "Qatar", "code" => "974"),
                array("country_code" => "CG", "name" => "Republic of the Congo", "code" => "242"),
                array("country_code" => "RE", "name" => "Réunion", "code" => "262"),
                array("country_code" => "RO", "name" => "Romania", "code" => "40"),
                array("country_code" => "RU", "name" => "Russia", "code" => "7"),
                array("country_code" => "RW", "name" => "Rwanda", "code" => "250"),
                array("country_code" => "BL", "name" => "Saint Barthélemy", "code" => "590"),
                array("country_code" => "SH", "name" => "Saint Helena", "code" => "290"),
                array("country_code" => "KN", "name" => "Saint Kitts and Nevis", "code" => "1"),
                array("country_code" => "MF", "name" => "Saint Martin", "code" => "590"),
                array("country_code" => "PM", "name" => "Saint Pierre and Miquelon", "code" => "508"),
                array("country_code" => "VC", "name" => "Saint Vincent and the Grenadines", "code" => "1"),
                array("country_code" => "WS", "name" => "Samoa", "code" => "685"),
                array("country_code" => "SM", "name" => "San Marino", "code" => "378"),
                array("country_code" => "ST", "name" => "São Tomé and Príncipe", "code" => "239"),
                array("country_code" => "SA", "name" => "Saudi Arabia", "code" => "966"),
                array("country_code" => "SN", "name" => "Senegal", "code" => "221"),
                array("country_code" => "RS", "name" => "Serbia", "code" => "381"),
                array("country_code" => "SC", "name" => "Seychelles", "code" => "248"),
                array("country_code" => "SL", "name" => "Sierra Leone", "code" => "232"),
                array("country_code" => "SG", "name" => "Singapore", "code" => "65"),
                array("country_code" => "SK", "name" => "Slovakia", "code" => "421"),
                array("country_code" => "SI", "name" => "Slovenia", "code" => "386"),
                array("country_code" => "SB", "name" => "Solomon Islands", "code" => "677"),
                array("country_code" => "SO", "name" => "Somalia", "code" => "252"),
                array("country_code" => "ZA", "name" => "South Africa", "code" => "27"),
                array("country_code" => "KR", "name" => "South Korea", "code" => "82"),
                array("country_code" => "ES", "name" => "Spain", "code" => "34"),
                array("country_code" => "LK", "name" => "Sri Lanka", "code" => "94"),
                array("country_code" => "LC", "name" => "St. Lucia", "code" => "1"),
                array("country_code" => "SD", "name" => "Sudan", "code" => "249"),
                array("country_code" => "SR", "name" => "Suriname", "code" => "597"),
                array("country_code" => "SZ", "name" => "Swaziland", "code" => "268"),
                array("country_code" => "SE", "name" => "Sweden", "code" => "46"),
                array("country_code" => "CH", "name" => "Switzerland", "code" => "41"),
                array("country_code" => "SY", "name" => "Syria", "code" => "963"),
                array("country_code" => "TW", "name" => "Taiwan", "code" => "886"),
                array("country_code" => "TJ", "name" => "Tajikistan", "code" => "992"),
                array("country_code" => "TZ", "name" => "Tanzania", "code" => "255"),
                array("country_code" => "TH", "name" => "Thailand", "code" => "66"),
                array("country_code" => "BS", "name" => "The Bahamas", "code" => "1"),
                array("country_code" => "GM", "name" => "The Gambia", "code" => "220"),
                array("country_code" => "TL", "name" => "Timor-Leste", "code" => "670"),
                array("country_code" => "TG", "name" => "Togo", "code" => "228"),
                array("country_code" => "TK", "name" => "Tokelau", "code" => "690"),
                array("country_code" => "TO", "name" => "Tonga", "code" => "676"),
                array("country_code" => "TT", "name" => "Trinidad and Tobago", "code" => "1"),
                array("country_code" => "TN", "name" => "Tunisia", "code" => "216"),
                array("country_code" => "TR", "name" => "Turkey", "code" => "90"),
                array("country_code" => "TM", "name" => "Turkmenistan", "code" => "993"),
                array("country_code" => "TC", "name" => "Turks and Caicos Islands", "code" => "1"),
                array("country_code" => "TV", "name" => "Tuvalu", "code" => "688"),
                array("country_code" => "UG", "name" => "Uganda", "code" => "256"),
                array("country_code" => "UA", "name" => "Ukraine", "code" => "380"),
                array("country_code" => "AE", "name" => "United Arab Emirates", "code" => "971"),
                array("country_code" => "GB", "name" => "United Kingdom", "code" => "44"),
                array("country_code" => "US", "name" => "United States", "code" => "1"),
                array("country_code" => "UY", "name" => "Uruguay", "code" => "598"),
                array("country_code" => "VI", "name" => "US Virgin Islands", "code" => "1"),
                array("country_code" => "UZ", "name" => "Uzbekistan", "code" => "998"),
                array("country_code" => "VU", "name" => "Vanuatu", "code" => "678"),
                array("country_code" => "VA", "name" => "Vatican City", "code" => "39"),
                array("country_code" => "VE", "name" => "Venezuela", "code" => "58"),
                array("country_code" => "VN", "name" => "Vietnam", "code" => "84"),
                array("country_code" => "WF", "name" => "Wallis and Futuna", "code" => "681"),
                array("country_code" => "YE", "name" => "Yemen", "code" => "967"),
                array("country_code" => "ZM", "name" => "Zambia", "code" => "260"),
                array("country_code" => "ZW", "name" => "Zimbabwe", "code" => "263"),
            );
            
            return array(
                'AD'=>array('name'=>'ANDORRA','code'=>'376'),
                'AF'=>array('name'=>'AFGHANISTAN','code'=>'93'),
                'AG'=>array('name'=>'ANTIGUA AND BARBUDA','code'=>'1268'),
                'AI'=>array('name'=>'ANGUILLA','code'=>'1264'),
                'AL'=>array('name'=>'ALBANIA','code'=>'355'),
                'AM'=>array('name'=>'ARMENIA','code'=>'374'),
                'AN'=>array('name'=>'NETHERLANDS ANTILLES','code'=>'599'),
                'AO'=>array('name'=>'ANGOLA','code'=>'244'),
                'AQ'=>array('name'=>'ANTARCTICA','code'=>'672'),
                'AR'=>array('name'=>'ARGENTINA','code'=>'54'),
                'AS'=>array('name'=>'AMERICAN SAMOA','code'=>'1684'),
                'AT'=>array('name'=>'AUSTRIA','code'=>'43'),
                'AU'=>array('name'=>'AUSTRALIA','code'=>'61'),
                'AW'=>array('name'=>'ARUBA','code'=>'297'),
                'AZ'=>array('name'=>'AZERBAIJAN','code'=>'994'),
                'BA'=>array('name'=>'BOSNIA AND HERZEGOVINA','code'=>'387'),
                'BB'=>array('name'=>'BARBADOS','code'=>'1246'),
                'BD'=>array('name'=>'BANGLADESH','code'=>'880'),
                'BE'=>array('name'=>'BELGIUM','code'=>'32'),
                'BF'=>array('name'=>'BURKINA FASO','code'=>'226'),
                'BG'=>array('name'=>'BULGARIA','code'=>'359'),
                'BH'=>array('name'=>'BAHRAIN','code'=>'973'),
                'BI'=>array('name'=>'BURUNDI','code'=>'257'),
                'BJ'=>array('name'=>'BENIN','code'=>'229'),
                'BL'=>array('name'=>'SAINT BARTHELEMY','code'=>'590'),
                'BM'=>array('name'=>'BERMUDA','code'=>'1441'),
                'BN'=>array('name'=>'BRUNEI DARUSSALAM','code'=>'673'),
                'BO'=>array('name'=>'BOLIVIA','code'=>'591'),
                'BR'=>array('name'=>'BRAZIL','code'=>'55'),
                'BS'=>array('name'=>'BAHAMAS','code'=>'1242'),
                'BT'=>array('name'=>'BHUTAN','code'=>'975'),
                'BW'=>array('name'=>'BOTSWANA','code'=>'267'),
                'BY'=>array('name'=>'BELARUS','code'=>'375'),
                'BZ'=>array('name'=>'BELIZE','code'=>'501'),
                'CA'=>array('name'=>'CANADA','code'=>'1'),
                'CC'=>array('name'=>'COCOS (KEELING) ISLANDS','code'=>'61'),
                'CD'=>array('name'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE','code'=>'243'),
                'CF'=>array('name'=>'CENTRAL AFRICAN REPUBLIC','code'=>'236'),
                'CG'=>array('name'=>'CONGO','code'=>'242'),
                'CH'=>array('name'=>'SWITZERLAND','code'=>'41'),
                'CI'=>array('name'=>'COTE D IVOIRE','code'=>'225'),
                'CK'=>array('name'=>'COOK ISLANDS','code'=>'682'),
                'CL'=>array('name'=>'CHILE','code'=>'56'),
                'CM'=>array('name'=>'CAMEROON','code'=>'237'),
                'CN'=>array('name'=>'CHINA','code'=>'86'),
                'CO'=>array('name'=>'COLOMBIA','code'=>'57'),
                'CR'=>array('name'=>'COSTA RICA','code'=>'506'),
                'CU'=>array('name'=>'CUBA','code'=>'53'),
                'CV'=>array('name'=>'CAPE VERDE','code'=>'238'),
                'CX'=>array('name'=>'CHRISTMAS ISLAND','code'=>'61'),
                'CY'=>array('name'=>'CYPRUS','code'=>'357'),
                'CZ'=>array('name'=>'CZECH REPUBLIC','code'=>'420'),
                'DE'=>array('name'=>'GERMANY','code'=>'49'),
                'DJ'=>array('name'=>'DJIBOUTI','code'=>'253'),
                'DK'=>array('name'=>'DENMARK','code'=>'45'),
                'DM'=>array('name'=>'DOMINICA','code'=>'1767'),
                'DO'=>array('name'=>'DOMINICAN REPUBLIC','code'=>'1809'),
                'DZ'=>array('name'=>'ALGERIA','code'=>'213'),
                'EC'=>array('name'=>'ECUADOR','code'=>'593'),
                'EE'=>array('name'=>'ESTONIA','code'=>'372'),
                'EG'=>array('name'=>'EGYPT','code'=>'20'),
                'ER'=>array('name'=>'ERITREA','code'=>'291'),
                'ES'=>array('name'=>'SPAIN','code'=>'34'),
                'ET'=>array('name'=>'ETHIOPIA','code'=>'251'),
                'FI'=>array('name'=>'FINLAND','code'=>'358'),
                'FJ'=>array('name'=>'FIJI','code'=>'679'),
                'FK'=>array('name'=>'FALKLAND ISLANDS (MALVINAS)','code'=>'500'),
                'FM'=>array('name'=>'MICRONESIA, FEDERATED STATES OF','code'=>'691'),
                'FO'=>array('name'=>'FAROE ISLANDS','code'=>'298'),
                'FR'=>array('name'=>'FRANCE','code'=>'33'),
                'GA'=>array('name'=>'GABON','code'=>'241'),
                'GB'=>array('name'=>'UNITED KINGDOM','code'=>'44'),
                'GD'=>array('name'=>'GRENADA','code'=>'1473'),
                'GE'=>array('name'=>'GEORGIA','code'=>'995'),
                'GH'=>array('name'=>'GHANA','code'=>'233'),
                'GI'=>array('name'=>'GIBRALTAR','code'=>'350'),
                'GL'=>array('name'=>'GREENLAND','code'=>'299'),
                'GM'=>array('name'=>'GAMBIA','code'=>'220'),
                'GN'=>array('name'=>'GUINEA','code'=>'224'),
                'GQ'=>array('name'=>'EQUATORIAL GUINEA','code'=>'240'),
                'GR'=>array('name'=>'GREECE','code'=>'30'),
                'GT'=>array('name'=>'GUATEMALA','code'=>'502'),
                'GU'=>array('name'=>'GUAM','code'=>'1671'),
                'GW'=>array('name'=>'GUINEA-BISSAU','code'=>'245'),
                'GY'=>array('name'=>'GUYANA','code'=>'592'),
                'HK'=>array('name'=>'HONG KONG','code'=>'852'),
                'HN'=>array('name'=>'HONDURAS','code'=>'504'),
                'HR'=>array('name'=>'CROATIA','code'=>'385'),
                'HT'=>array('name'=>'HAITI','code'=>'509'),
                'HU'=>array('name'=>'HUNGARY','code'=>'36'),
                'ID'=>array('name'=>'INDONESIA','code'=>'62'),
                'IE'=>array('name'=>'IRELAND','code'=>'353'),
                'IL'=>array('name'=>'ISRAEL','code'=>'972'),
                'IM'=>array('name'=>'ISLE OF MAN','code'=>'44'),
                'IN'=>array('name'=>'INDIA','code'=>'91'),
                'IQ'=>array('name'=>'IRAQ','code'=>'964'),
                'IR'=>array('name'=>'IRAN, ISLAMIC REPUBLIC OF','code'=>'98'),
                'IS'=>array('name'=>'ICELAND','code'=>'354'),
                'IT'=>array('name'=>'ITALY','code'=>'39'),
                'JM'=>array('name'=>'JAMAICA','code'=>'1876'),
                'JO'=>array('name'=>'JORDAN','code'=>'962'),
                'JP'=>array('name'=>'JAPAN','code'=>'81'),
                'KE'=>array('name'=>'KENYA','code'=>'254'),
                'KG'=>array('name'=>'KYRGYZSTAN','code'=>'996'),
                'KH'=>array('name'=>'CAMBODIA','code'=>'855'),
                'KI'=>array('name'=>'KIRIBATI','code'=>'686'),
                'KM'=>array('name'=>'COMOROS','code'=>'269'),
                'KN'=>array('name'=>'SAINT KITTS AND NEVIS','code'=>'1869'),
                'KP'=>array('name'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','code'=>'850'),
                'KR'=>array('name'=>'KOREA REPUBLIC OF','code'=>'82'),
                'KW'=>array('name'=>'KUWAIT','code'=>'965'),
                'KY'=>array('name'=>'CAYMAN ISLANDS','code'=>'1345'),
                'KZ'=>array('name'=>'KAZAKSTAN','code'=>'7'),
                'LA'=>array('name'=>'LAO PEOPLES DEMOCRATIC REPUBLIC','code'=>'856'),
                'LB'=>array('name'=>'LEBANON','code'=>'961'),
                'LC'=>array('name'=>'SAINT LUCIA','code'=>'1758'),
                'LI'=>array('name'=>'LIECHTENSTEIN','code'=>'423'),
                'LK'=>array('name'=>'SRI LANKA','code'=>'94'),
                'LR'=>array('name'=>'LIBERIA','code'=>'231'),
                'LS'=>array('name'=>'LESOTHO','code'=>'266'),
                'LT'=>array('name'=>'LITHUANIA','code'=>'370'),
                'LU'=>array('name'=>'LUXEMBOURG','code'=>'352'),
                'LV'=>array('name'=>'LATVIA','code'=>'371'),
                'LY'=>array('name'=>'LIBYAN ARAB JAMAHIRIYA','code'=>'218'),
                'MA'=>array('name'=>'MOROCCO','code'=>'212'),
                'MC'=>array('name'=>'MONACO','code'=>'377'),
                'MD'=>array('name'=>'MOLDOVA, REPUBLIC OF','code'=>'373'),
                'ME'=>array('name'=>'MONTENEGRO','code'=>'382'),
                'MF'=>array('name'=>'SAINT MARTIN','code'=>'1599'),
                'MG'=>array('name'=>'MADAGASCAR','code'=>'261'),
                'MH'=>array('name'=>'MARSHALL ISLANDS','code'=>'692'),
                'MK'=>array('name'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','code'=>'389'),
                'ML'=>array('name'=>'MALI','code'=>'223'),
                'MM'=>array('name'=>'MYANMAR','code'=>'95'),
                'MN'=>array('name'=>'MONGOLIA','code'=>'976'),
                'MO'=>array('name'=>'MACAU','code'=>'853'),
                'MP'=>array('name'=>'NORTHERN MARIANA ISLANDS','code'=>'1670'),
                'MR'=>array('name'=>'MAURITANIA','code'=>'222'),
                'MS'=>array('name'=>'MONTSERRAT','code'=>'1664'),
                'MT'=>array('name'=>'MALTA','code'=>'356'),
                'MU'=>array('name'=>'MAURITIUS','code'=>'230'),
                'MV'=>array('name'=>'MALDIVES','code'=>'960'),
                'MW'=>array('name'=>'MALAWI','code'=>'265'),
                'MX'=>array('name'=>'MEXICO','code'=>'52'),
                'MY'=>array('name'=>'MALAYSIA','code'=>'60'),
                'MZ'=>array('name'=>'MOZAMBIQUE','code'=>'258'),
                'NA'=>array('name'=>'NAMIBIA','code'=>'264'),
                'NC'=>array('name'=>'NEW CALEDONIA','code'=>'687'),
                'NE'=>array('name'=>'NIGER','code'=>'227'),
                'NG'=>array('name'=>'NIGERIA','code'=>'234'),
                'NI'=>array('name'=>'NICARAGUA','code'=>'505'),
                'NL'=>array('name'=>'NETHERLANDS','code'=>'31'),
                'NO'=>array('name'=>'NORWAY','code'=>'47'),
                'NP'=>array('name'=>'NEPAL','code'=>'977'),
                'NR'=>array('name'=>'NAURU','code'=>'674'),
                'NU'=>array('name'=>'NIUE','code'=>'683'),
                'NZ'=>array('name'=>'NEW ZEALAND','code'=>'64'),
                'OM'=>array('name'=>'OMAN','code'=>'968'),
                'PA'=>array('name'=>'PANAMA','code'=>'507'),
                'PE'=>array('name'=>'PERU','code'=>'51'),
                'PF'=>array('name'=>'FRENCH POLYNESIA','code'=>'689'),
                'PG'=>array('name'=>'PAPUA NEW GUINEA','code'=>'675'),
                'PH'=>array('name'=>'PHILIPPINES','code'=>'63'),
                'PK'=>array('name'=>'PAKISTAN','code'=>'92'),
                'PL'=>array('name'=>'POLAND','code'=>'48'),
                'PM'=>array('name'=>'SAINT PIERRE AND MIQUELON','code'=>'508'),
                'PN'=>array('name'=>'PITCAIRN','code'=>'870'),
                'PR'=>array('name'=>'PUERTO RICO','code'=>'1'),
                'PT'=>array('name'=>'PORTUGAL','code'=>'351'),
                'PW'=>array('name'=>'PALAU','code'=>'680'),
                'PY'=>array('name'=>'PARAGUAY','code'=>'595'),
                'QA'=>array('name'=>'QATAR','code'=>'974'),
                'RO'=>array('name'=>'ROMANIA','code'=>'40'),
                'RS'=>array('name'=>'SERBIA','code'=>'381'),
                'RU'=>array('name'=>'RUSSIAN FEDERATION','code'=>'7'),
                'RW'=>array('name'=>'RWANDA','code'=>'250'),
                'SA'=>array('name'=>'SAUDI ARABIA','code'=>'966'),
                'SB'=>array('name'=>'SOLOMON ISLANDS','code'=>'677'),
                'SC'=>array('name'=>'SEYCHELLES','code'=>'248'),
                'SD'=>array('name'=>'SUDAN','code'=>'249'),
                'SE'=>array('name'=>'SWEDEN','code'=>'46'),
                'SG'=>array('name'=>'SINGAPORE','code'=>'65'),
                'SH'=>array('name'=>'SAINT HELENA','code'=>'290'),
                'SI'=>array('name'=>'SLOVENIA','code'=>'386'),
                'SK'=>array('name'=>'SLOVAKIA','code'=>'421'),
                'SL'=>array('name'=>'SIERRA LEONE','code'=>'232'),
                'SM'=>array('name'=>'SAN MARINO','code'=>'378'),
                'SN'=>array('name'=>'SENEGAL','code'=>'221'),
                'SO'=>array('name'=>'SOMALIA','code'=>'252'),
                'SR'=>array('name'=>'SURINAME','code'=>'597'),
                'ST'=>array('name'=>'SAO TOME AND PRINCIPE','code'=>'239'),
                'SV'=>array('name'=>'EL SALVADOR','code'=>'503'),
                'SY'=>array('name'=>'SYRIAN ARAB REPUBLIC','code'=>'963'),
                'SZ'=>array('name'=>'SWAZILAND','code'=>'268'),
                'TC'=>array('name'=>'TURKS AND CAICOS ISLANDS','code'=>'1649'),
                'TD'=>array('name'=>'CHAD','code'=>'235'),
                'TG'=>array('name'=>'TOGO','code'=>'228'),
                'TH'=>array('name'=>'THAILAND','code'=>'66'),
                'TJ'=>array('name'=>'TAJIKISTAN','code'=>'992'),
                'TK'=>array('name'=>'TOKELAU','code'=>'690'),
                'TL'=>array('name'=>'TIMOR-LESTE','code'=>'670'),
                'TM'=>array('name'=>'TURKMENISTAN','code'=>'993'),
                'TN'=>array('name'=>'TUNISIA','code'=>'216'),
                'TO'=>array('name'=>'TONGA','code'=>'676'),
                'TR'=>array('name'=>'TURKEY','code'=>'90'),
                'TT'=>array('name'=>'TRINIDAD AND TOBAGO','code'=>'1868'),
                'TV'=>array('name'=>'TUVALU','code'=>'688'),
                'TW'=>array('name'=>'TAIWAN, PROVINCE OF CHINA','code'=>'886'),
                'TZ'=>array('name'=>'TANZANIA, UNITED REPUBLIC OF','code'=>'255'),
                'UA'=>array('name'=>'UKRAINE','code'=>'380'),
                'UG'=>array('name'=>'UGANDA','code'=>'256'),
                'US'=>array('name'=>'UNITED STATES','code'=>'1'),
                'UY'=>array('name'=>'URUGUAY','code'=>'598'),
                'UZ'=>array('name'=>'UZBEKISTAN','code'=>'998'),
                'VA'=>array('name'=>'HOLY SEE (VATICAN CITY STATE)','code'=>'39'),
                'VC'=>array('name'=>'SAINT VINCENT AND THE GRENADINES','code'=>'1784'),
                'VE'=>array('name'=>'VENEZUELA','code'=>'58'),
                'VG'=>array('name'=>'VIRGIN ISLANDS, BRITISH','code'=>'1284'),
                'VI'=>array('name'=>'VIRGIN ISLANDS, U.S.','code'=>'1340'),
                'VN'=>array('name'=>'VIET NAM','code'=>'84'),
                'VU'=>array('name'=>'VANUATU','code'=>'678'),
                'WF'=>array('name'=>'WALLIS AND FUTUNA','code'=>'681'),
                'WS'=>array('name'=>'SAMOA','code'=>'685'),
                'XK'=>array('name'=>'KOSOVO','code'=>'383'),
                'YE'=>array('name'=>'YEMEN','code'=>'967'),
                'YT'=>array('name'=>'MAYOTTE','code'=>'262'),
                'ZA'=>array('name'=>'SOUTH AFRICA','code'=>'27'),
                'ZM'=>array('name'=>'ZAMBIA','code'=>'260'),
                'ZW'=>array('name'=>'ZIMBABWE','code'=>'263'),
            );
        }
    }

    if(!function_exists('getDomains'))
    {
        function getDomains()
        {
            return [
                "customizedneons.com",
                "californianeons.com",
                "customneons.net",
                "oneoncrafts.com",
                "oneoncrafts.net",
                "oneoncrafts.biz",
                "oneoncrafts.info",
                "oneoncrafts.org",
                "oneoncrafts.store",
                "manhattanneons.com",
                "montrealneons.com",
                "weddingneonsign.net",
            ];
        }
    }

    

