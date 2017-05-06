<?php
require_once 'db.php';

$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_GET['q']);
$search_string = $test_db->real_escape_string($search_string);

$lang= array(
    "az" => array('az','tk','tr','tt','uz'),
    "en" => array('en'),
    "ca" => array('ca','gl','pt','fr','wa','vec','it','ga'),
    "es" => array('gl','pt','ca','fr','wa','vec','it','ga'),
    "fj" => array('fj','haw','sm','id','ms','su'),
    "fr" => array('fr','wa','vec','ca','gl','pt','it','ga'),
    "ga" => array('ga','ca','gl','pt','fr','wa','vec','it'),
    "gl" => array('gl','pt','ca','fr','wa','vec','it','ga'),
    "haw" => array('haw','sm','fj','id','ms','su'),
    "id" => array('id','ms','su','fj','haw','sm'),
    "it" => array('it','fr','wa','vec','ca','gl','pt','ga'),
    "ms" => array('ms','id','su','fj','haw','sm'),
    "pt" => array('pt','gl','ca','fr','wa','vec','it','ga'),
    "sm" => array('sm','haw','fj','id','ms','su'),
    "su" => array('su','id',' ms','fj','haw','sm'),
    "tk" => array('tk','tr','az','tt','uz'),
    "tr" => array('tr','tk','az','tt','uz'),
    "tt" => array('tt','uz','az','tk','tr'),
    "uz" => array('uz','tt','az','tk','tr'),
    "vec" => array('vec','fr','wa','ca','gl','pt','it','ga'),
    "wa" => array('wa','fr','vec','ca','gl','pt','it','ga')
);

$code = array (
          "en"=>"English",
          "ach" => "Acholi",
          "af" => "Afrikaans",
          "ak" => "Akan",
          "am" => "አማርኛ",
          "an" => "aragonés",
          "ar" => "العربية",
          "as" => "অসমীয়া",
          "az" => "Azərbaycan dili",
          "bg" => "Български",
          "bm" => "Bamanankan",
          "bn" => "বাংলা",
          "br" => "brezhoneg",
          "bs" => "Bosanski",
          "ca" => "Català",
          "cy" => "Cymraeg",
          "da" => "Dansk",
          "de" => "Deutsch",
          "dsb" => "Dolnoserbski",
          "en" => "English",
          "es" => "Español",
          "eu" => "Euskara",
          "fa" => "فارسی",
          "ff" => "Pulaar",
          "fj" => "vakaViti",
          "fo" => "føroyskt",
          "fr" => "Français",
          "ga" => "Gaeilge",
          "gl" => "Galego",
          "gnBO" => "Chawuncu",
          "gnPY" => "Avañe'ẽ",
          "gu" => "ગુજરાતી",
          "ha" => "Hausa",
          "haw" => "'Ōlelo Hawaiʻi",
          "he" => "עברית",
          "hi" => "हिंदी",
          "hr" => "Hrvatski",
          "hsb" => "Hornjoserbsce",
          "ht" => "Kreyòl Ayisyen",
          "hu" => "Magyar",
          "hy" => "Հայերեն",
          "id" => "Bahasa Indonesia",
          "is" => "Íslenska",
          "it" => "Italiano",
          "kk" => "қазақ тілі",
          "km" => "ខ្មែរ",
          "kn" => "ಕನ್ನಡ",
          "ko" => "한국어",
          "ks" => "कश्मीरी, كشميري‎",
          "ku" => "Kurdî",
          "lg" => "Oluganda",
          "ln" => "Lingála",
          "lt" => "Lietuvių",
          "lv" => "Latviešu",
          "mg" => "Malagasy",
          "mk" => "Македонски",
          "ml" => "മലയാളം",
          "mr" => "मराठी",
          "ms" => "Bahasa Melayu",
          "my" => "မြန်မာဘာသာ",
          "nb" => "Norsk bokmål",
          "nd" => "isiNdebele",
          "np" => "नेपाली",
          "nl" => "Nederlands",
          "ny" => "Chicheŵa",
          "or" => "ଓଡ଼ିଆ",
          "pa" => "ਪੰਜਾਬੀ",
          "pl" => "Polski",
          "ps" => "پښﺕﻭ",
          "pt" => "Português",
          "rn" => "Kirundi",
          "ro" => "Română",
          "rw" => "Ikinyarwanda",
          "sd" => "सिन्धी, سنڌي، سندھی‎",
          "si" => "සිංහල",
          "sk" => "Slovenčina",
          "sl" => "Slovenščina",
          "sm" => "Gagana Sāmoa",
          "sq" => "Shqip",
          "sr" => "Српски (ћирилица)",
          "ss" => "siSwati",
          "su" => "Basa Sunda",
          "sv" => "Svenska",
          "sw" => "Kiswahili",
          "ta" => "தமிழ்",
          "te" => "తెలుగు",
          "tk" => "Türkmençe",
          "tl" => "Tagalog",
          "tn" => "Setswana",
          "tr" => "Türkçe",
          "ts" => "Xitsonga",
          "tt" => "Татарча",
          "ug" => "ئۇيغۇرچە",
          "uk" => "Українська",
          "ur" => "ﺍﺭﺩﻭ",
          "uz" => "Ўзбек",
          "vec" => "Vèneto",
          "vi" => "Tiếng Việt",
          "wa" => "Walon",
          "wo" => "Wolof",
          "xh" => "isiXhosa",
          "yo" => "Yorùbá",
          "zu" => "isiZulu"
);
//select $searching_string,value(e), from terminlogy2;
$temp = 'en';
foreach($lang[$search_string] as $chr) {
    $temp = $temp.", ".$chr;
}
$query="SELECT $temp from translation";
// $query="SELECT $temp from terminology2";

    $result = $test_db->query($query);
    echo "
    <table id ='termTable'>
    <tr>
    <th>English</th>";
foreach($lang[$search_string] as $chr) {
    echo "<th>{$code[$chr]}</th>";
}
    echo "</tr>";

	while($results = $result->fetch_array()) {
		$result_array[] = $results;
           echo "<tr>";
           echo "<td>" . $results['en'] . "</td>";
        foreach($lang[$search_string] as $chr) {
            echo "<td>" . $results[$chr] . "</td>";
                    }
    }
            echo "</tr>";
            echo "</table>";




// }
?>
