<?php
require_once 'db.php';

$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_GET['q']);
$search_string = $test_db->real_escape_string($search_string);

$lang= array(
    "az" => array('az','tk','tr','tt','uz'),
    "en" => array('en'),
    "ca" => array('ca','es','gl','pt','fr','wa','vec','it','ga'),
    "es" => array('es','gl','pt','ca','fr','wa','vec','it','ga'),
    "fj" => array('fj','haw','sm','id','ms','su'),
    "fr" => array('fr','wa','vec','ca','es','gl','pt','it','ga'),
    "ga" => array('ga','ca','es','gl','pt','fr','wa','vec','it'),
    "gl" => array('gl','pt','es','ca','fr','wa','vec','it','ga'),
    "haw" => array('haw','sm','fj','id','ms','su'),
    "id" => array('id','ms','su','fj','haw','sm'),
    "it" => array('it','fr','wa','vec','ca','es','gl','pt','ga'),
    "ms" => array('ms','id','su','fj','haw','sm'),
    "pt" => array('pt','gl','es','ca','fr','wa','vec','it','ga'),
    "sm" => array('sm','haw','fj','id','ms','su'),
    "su" => array('su','id',' ms','fj','haw','sm'),
    "tk" => array('tk','tr','az','tt','uz'),
    "tr" => array('tr','tk','az','tt','uz'),
    "tt" => array('tt','uz','az','tk','tr'),
    "uz" => array('uz','tt','az','tk','tr'),
    "vec" => array('vec','fr','wa','ca','es','gl','pt','it','ga'),
    "wa" => array('wa','fr','vec','ca','es','gl','pt','it','ga')
);

$code = array (
    "en" => "English",
    "az"=> "Azərbaycan dili",
    "ca"=> "Català",
    "es"=> "Español",
    "fj"=> "vakaViti" ,
    "fr"=>"Français",
    "ga"=>"Gaeilge",
    "gl"=>"Galego",
    "haw"=>"ʻŌlelo Hawaiʻi",
    "id"=>"Bahasa Indonesia",
    "it"=>"Italiano",
    "ms"=>"Bahasa Melayu",
    "pt"=>"Português",
    "sm"=>"Gagana Sāmoa",
    "su"=>"Basa Sunda",
    "tk"=>"Türkmençe",
    "tr"=>"Türkçe",
    "tt"=>"Татарча",
    "uz"=>"Ўзбек",
    "vec"=>"Vèneto",
    "wa"=>"Walon"
);
//select $searching_string,value(e), from terminlogy2;
$temp = 'en';
foreach($lang[$search_string] as $chr) {
    $temp = $temp.", ".$chr;
}    
$query="SELECT $temp from translation";

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
