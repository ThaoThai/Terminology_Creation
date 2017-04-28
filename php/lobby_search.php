<?php
require_once 'db.php';

$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_GET['q']);
$search_string = $test_db->real_escape_string($search_string);
$query = "SELECT * FROM users WHERE username = '".$search_string."'";
$result = $test_db->query($query);
$results = $result->fetch_assoc();
$data_lan= $results['language'];

$lang=array("English" => array("en"),
      "Azərbaycan dili"=>array('az','tk','tr','tt','uz'),
      "Català"=>  array('ca','gl','pt','fr','wa','vec','it','ga'),
      "Español"=> array('gl','pt','ca','fr','wa','vec','it','ga'),
      "vakaViti"=> array('fj','haw','sm','id','ms','su'),
      "Français"=> array('fr','wa','vec','ca','gl','pt','it','ga'),
      "Gaeilge"=> array('ga','ca','gl','pt','fr','wa','vec','it'),
      "Galego"=> array('gl','pt','ca','fr','wa','vec','it','ga'),
      "ʻŌlelo Hawaiʻi"=> array('haw','sm','fj','id','ms','su'),
      "Bahasa Indonesia"=> array('id','ms','su','fj','haw','sm'),
      "Italiano"=> array('it','fr','wa','vec','ca','gl','pt','ga'),
      "Bahasa Melayu"=> array('ms','id','su','fj','haw','sm'),
      "Português"=> array('pt','gl','ca','fr','wa','vec','it','ga'),
      "Gagana Sāmoa"=> array('sm','haw','fj','id','ms','su'),
      "Basa Sunda"=> array('su','id',' ms','fj','haw','sm'),
      "Türkmençe"=> array('tk','tr','az','tt','uz'),
      "Türkçe"=>  array('tr','tk','az','tt','uz'),
      "Татарча"=> array('tt','uz','az','tk','tr'),
      "Ўзбек"=> array('uz','tt','az','tk','tr'),
      "Vèneto"=>  array('vec','fr','wa','ca','gl','pt','it','ga'),
      "Walon"=> array('wa','fr','vec','ca','gl','pt','it','ga')
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
$query="SELECT $temp from translation WHERE approved=1";

    $result = $test_db->query($query);
    echo "<div id='status'></div>";
    echo "<table id ='userTable'>
    <colgroup>
    <col span='2' style='background-color:yellow'>
  </colgroup>
    <thead>
    <tr>
    <th>English</th>";

foreach($lang[$data_lan] as $chr) {
    $head= "<th>{$code[$chr]}</th>";
    echo $head;
}

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
           echo "<tr>";
           echo "<td>" . $results['en'] . "</td>";
              foreach($lang[$data_lan] as $chr) {

                  //  echo "<td>" . $results[$chr] . "</td>";
                  echo "<td id=".$chr.":".$results['en']." contenteditable='true'>".$results[$chr]."</td>";
              }
                }

            echo "</tr>";
            echo "</tbody>";
            echo "</table>";



?>
