<?php
require_once 'db.php';

$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_GET['q']);
$search_string = $test_db->real_escape_string($search_string);

$lang= array(
    "john" => array('az'),
    "kyle" => array('ga'),
    "thao" => array('ca'),
    "jay" => array('es'),

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
    <table id ='userTable'>
    <thead>
    <tr>
    <th>English</th>";
foreach($lang[$search_string] as $chr) {  
    echo "<th>{$code[$chr]}</th>";
}
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
           echo "<tr>";
           echo "<td>" . $results['en'] . "</td>";
        foreach($lang[$search_string] as $chr) {
            echo "<td>" . $results[$chr] . "</td>";
                    }
    }
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
 
    
    

// }
?>
