<?php
require_once 'db.php';

$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_GET['q']);
$search_string = $test_db->real_escape_string($search_string);
$query = "SELECT * FROM users WHERE username = '".$search_string."'";
$result = $test_db->query($query);
$results = $result->fetch_assoc();
$data_lan= $results['language'];

$lang=array("English" => array("en"),
      "Azərbaycan dili"=> array("az"),
      "Català"=> array("ca"),
      "Español"=> array("es"),
      "vakaViti"=> array("fj") ,
      "Français"=> array("fr"),
      "Gaeilge"=> array("ga"),
      "Galego"=> array("gl"),
      "ʻŌlelo Hawaiʻi"=> array("haw"),
      "Bahasa Indonesia"=> array("id"),
      "Italiano"=> array("it"),
      "Bahasa Melayu"=> array("ms"),
      "Português"=> array("pt"),
      "Gagana Sāmoa"=> array("sm"),
      "Basa Sunda"=> array("su"),
      "Türkmençe"=> array("tk"),
      "Türkçe"=> array("tr"),
      "Татарча"=> array("tt"),
      "Ўзбек"=> array("uz"),
      "Vèneto"=> array("vec"),
      "Walon"=> array("wa")
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

$temp = 'en';
foreach ($lang[$data_lan] as $chr) {
$temp=$temp.",".$chr;
}
$query="SELECT $temp from translation";

    $result = $test_db->query($query);
    echo "
    <table id ='userTable'>
    <thead>
    <tr>
    <th>English</th>";

foreach($lang[$data_lan] as $chr) {
    echo "<th>{$code[$chr]}</th>";
}

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
           echo "<tr>";
           echo "<td>" . $results['en'] . "</td>";
              foreach($lang[$data_lan] as $chr) {
                echo "<td>" . $results[$chr] . "</td>";}
    }
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";

?>
