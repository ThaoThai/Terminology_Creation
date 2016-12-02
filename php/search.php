<?php
require_once 'db.php';
// Output HTML formats
$html = '<tr>';
$html .= '<td class="small">nameString</td>';
$html .= '<td class="small">compString</td>';
$html .= '</tr>';

// Get the Search
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$search_string = $test_db->real_escape_string($search_string);

// Check if length is more than 1 character
if (strlen($search_string) >= 1 && $search_string !== ' ') {
	// Query
	$query = 'SELECT * FROM terminology WHERE eng LIKE "%'.$search_string.'%"';

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
		 $d_comp = $result['vi'];
		
		// Replace the items into above HTML
		$o = str_replace('nameString', $d_name, $html);
		$o = str_replace('compString', $d_comp, $o);
		// Output it
		echo iconv("ISO-8859-1", "UTF-8", $o);//($o,PHP_EOL);
			}
		}else{
		// Replace for no results
		$o = str_replace('nameString', '<span class="label label-danger">No Names Found</span>', $html);
		$o = str_replace('compString', '', $o);
		
		// Output
		echo($o);
	}
}
?>