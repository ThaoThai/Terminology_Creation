<?php
require_once 'db.php';
// Output HTML formats
$html = '<tr>';
$html .= '<td class="small">nameString</td>';
$html .= '<td class="small">compString</td>';
$html .= '<td class="small">zipString</td>';
$html .= '<td class="small">cityString</td>';
$html .= '<td class="small">agrString</td>';
$html .= '<td class="small">akString</td>';
$html .= '<td class="small">amString</td>';
$html .= '<td class="small">anString</td>';
$html .= '<td class="small">amString</td>';
$html .= '<td class="small">anpString</td>';
$html .= '<td class="small">arString</td>';
$html .= '<td class="small">arnString</td>';
$html .= '<td class="small">asString</td>';
$html .= '<td class="small">aymString</td>';
$html .= '<td class="small">azString</td>';
$html .= '<td class="small">bclString</td>';
$html .= '<td class="small">bgString</td>';
$html .= '<td class="small">bhoString</td>';
$html .= '<td class="small">bmString</td>';
$html .= '<td class="small">bn_BDString</td>';

$html .= '</tr>';

// Get the Search
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$search_string = $test_db->real_escape_string($search_string);

// Check if length is more than 1 character
if (strlen($search_string) >= 1 && $search_string !== ' ') {
	//Insert Time Stamp
	//$time = "UPDATE query_data SET timestamp=now() WHERE name='" .$search_string. "'";
	//Count how many times a query occurs
	//$query_count = "UPDATE query_data SET querycount = querycount +1 WHERE name='" .$search_string. "'";
	// Query
	$query = 'SELECT * FROM terminology2 WHERE eng LIKE "'.$search_string.'%"';

	//Timestamp entry of search for later display
	//$time_entry = $test_db->query($time);
	//Count how many times a query occurs
	//$query_count = $test_db->query($query_count);
	// Do the search
	$result = $test_db->query($query);
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
	}

	// Check for results
	if (isset($result_array)) {
		foreach ($result_array as $result) {
		// Output strings and highlight the matches
		 $d_name = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['eng']);
		 $d_comp = $result['ach'];
		 $d_zip = $result['adh'];
		 $d_city = $result['af'];
		 $d_agr= $result['agr'];
		 $d_ak = $result['ak'];
		 $d_am = $result['am'];
		 $d_an= $result['an'];
		 $d_anp = $result['anp'];
		 $d_ar = $result['ar'];
		 $d_arn= $result['arn'];
		 $d_as = $result['as'];
		 $d_aym = $result['aym'];
		 $d_az= $result['az'];
		 $d_bcl = $result['bcl'];
		 $d_bg = $result['bg'];
		 $d_bho= $result['bho'];
		 $d_bm = $result['bm'];
		 $d_bn_BD = $result['bn_BD'];
		 $d_bn_IN = $result['bn_IN'];

		// Replace the items into above HTML
		$o = str_replace('nameString', $d_name, $html);
		$o = str_replace('compString', $d_comp, $o);
		$o = str_replace('zipString', $d_zip, $o);
		$o = str_replace('cityString', $d_city, $o);
		$o = str_replace('agrString', $d_agr, $o);
		$o = str_replace('akString', $d_ak, $o);
		$o = str_replace('amString', $d_am, $o);
		$o = str_replace('anString', $d_agr, $o);
		$o = str_replace('anptring', $d_ak, $o);
		$o = str_replace('arString', $d_am, $o);
		$o = str_replace('arnString', $d_agr, $o);
		$o = str_replace('asString', $d_ak, $o);
		$o = str_replace('aymString', $d_am, $o);
		$o = str_replace('azString', $d_agr, $o);
		$o = str_replace('bclString', $d_ak, $o);
		$o = str_replace('bgString', $d_am, $o);
		$o = str_replace('bhoString', $d_agr, $o);
		$o = str_replace('bmString', $d_ak, $o);
		$o = str_replace('bn_BDString', $d_am, $o);
		$o = str_replace('bn_INString', $d_am, $o);




		// Output it
		echo($o);
			}
		}else{
		// Replace for no results
		$o = str_replace('nameString', '<span class="label label-danger">No Names Found</span>', $html);
		$o = str_replace('compString', '', $o);
		$o = str_replace('zipString', '', $o);
		$o = str_replace('cityString', '', $o);
		$o = str_replace('agrString', '', $o);
		$o = str_replace('akString', '', $o);
		$o = str_replace('amString', '', $o);
		$o = str_replace('anString', '', $o);
		$o = str_replace('anpString', '', $o);
		$o = str_replace('arString', '', $o);
		$o = str_replace('arnString', '', $o);
		$o = str_replace('asString', '', $o);
		$o = str_replace('aymString', '', $o);
		$o = str_replace('azString', '', $o);
		$o = str_replace('bclString', '', $o);
		$o = str_replace('bgString', '', $o);
		$o = str_replace('bhoString', '', $o);
		$o = str_replace('bmString', '', $o);
		$o = str_replace('bn_BDString', '', $o);
		$o = str_replace('bn_INString', '', $o);

		// Output
		echo($o);
	}
}
?>
