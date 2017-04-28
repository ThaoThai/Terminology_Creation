<?php //include("header1.php");
require_once 'db.php';
require_once ("authenticate.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />

<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript" charset="utf-8"></script> -->
   <script src="./jquery.tabletoCSV.js" type="text/javascript" charset="utf-8"></script>
   <!-- <script src="http://code.jquery.com/jquery-1.10.2.js"></script> -->
   <script>
       $(function(){
           $("#export").click(function(){
               $("#userTable").tableToCSV();
           });
       });
   </script>

    <!--<link href="../assets/css/bootstrap.css" rel="stylesheet">-->
<link href="../html/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../html/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../scripts/select.js"> </script>
<script>
    $(function(){
	//acknowledgement message
    var message_status=$('#status');
    $("td[contenteditable=true]").blur(function(){
        var field_userid = $(this).attr("id") ;
        var value = $(this).text() ;
        $.post('ajax.php' , field_userid + "=" + value, function(data){
            if(data != '')
			{
				message_status.show();
				message_status.text(data);
				//hide the message
				setTimeout(function(){message_status.hide()},3000);
			}
        });
    });
});
</script>
<style>
#status { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:90%; }
</style>
</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="../index.php">Terminology <span class="logo_colour"> Creation</span></a></h1>
       <h4><a href="../index.php"> <?php include('logout_button.php');?></a></h4>
		</div>
		<div id="menu">
			<ul>
				<li class="active"><a href="lobby.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="account.php" accesskey="2" title="">My account</a></li>
				<li><a href="../html/about.html" accesskey="3" title="">About Us</a></li>
        <li><a href="../html/feedback.html" accesskey="4" title="">Feedback</a></li>
			</ul>
		</div>
	</div>
</div><br><br>
<!-- <div class="wrapper"> -->
  <div id ="wrapper">
    <div id="setting">

	<!-- <div id="translate" class="container"> -->
    <!-- <button onclick="commit()"> Commit Change(s) </button> -->
    <!-- <INPUT TYPE="submit" VALUE="Update"></INPUT> -->
    <!-- <button id="update" >Update</button> -->
     &nbsp; &nbsp;<button id="export" data-export="export" >Export</button>
  </div>
    <div id="container"  >
<p><b>Welcome to the Terminology Creation,<?= htmlentities($_SESSION['username']); ?>!</b></p>
<!--main content start-->
  <div class="wrapper5" >
     <input type="text" id="search1" placeholder="Type your word here" onkeyup="filter_usertable()"> <br>
         <!-- <div id="database_user"></div> -->


<?php
// require_once 'db.php';

$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_SESSION['username']);
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
    <col span='2' style='background-color:orange'>
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
          //  echo "<td>".$lang[$data_lan]."</td>";
              foreach($lang[$data_lan] as $chr) {

                  //  echo "<td>" . $results[$chr] . "</td>";
                  echo "<td id=".$chr.":".$results['en']." contenteditable='true'>".$results[$chr]."</td>";
              }
                }

            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
?>
</div>
</div>
</div>



<div id="footer">
	<div class="container">
		<div class="fbox1">
			<span>Developers:
			<br />Mary Hogan, Bikram Pokhrel, Thao Thai</span>
		</div>
		<div class="fbox1">
			<span class="icon icon-envelope"></span>
			<span>ouremail@slu.edu</span>
		</div>
	</div>
</div>
</body>
</html>
