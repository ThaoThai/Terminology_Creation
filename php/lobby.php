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
var x='ajax.php';
    $(function(){
	//acknowledgement message
    var message_status=$('#status');
    $("td[contenteditable=true]").blur(function(){
        var field_userid = $(this).attr("id") ;
        var value = $(this).text() ;

        $.post(x , field_userid + "=" + value, function(data){
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
<!-- <script>
    $(function(){
	//acknowledgement message
    var message_status=$('#status');
    $("td[contenteditable=true]").blur(function(){
        var field_userid = $(this).attr("id") ;
        var value = $(this).text() ;
        $.post('admin_search.php' , field_userid + "=" + value, function(data){
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
</script> -->

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
				<li><a href="about.php" accesskey="3" title="">About Us</a></li>
        <!-- <li><a href="../html/feedback.html" accesskey="4" title="">Feedback</a></li> -->
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


$lang=array(
      "English" => array("en"),
      "Acholi"=>array('ach','bm','tt','bs','fa','hr'),
"Afrikaans"=>array('af','nl','de','da','nb','sv'),
"Akan"=>array('ak','lg','ln','ny','rn','rw'),
"አማርኛ"=>array('am','he','hr','ha'),
"aragonés"=>array('an','ca','es','gl','pt','fr'),
"العربية"=>array('ar','he','am','ha'),
"অসমীয়া"=>array('as','bn','or','gu','hi','ur'),
"Azərbaycan dili"=>array('az','tk','tr','tt','uz','kk'),
"Български"=>array('bg','mk','bs','hr','sl','sr'),
"Bamanankan"=>array('bm','tn','ts','nd','ss','xh'),
"বাংলা"=>array('bn','as','or','gu','hi','ur'),
"brezhoneg"=>array('br','cy','ga','ca','an','es'),
"Bosanski"=>array('bs','hr','sl','sr','bg','mk'),
"Català"=>array('ca','an','es','gl','pt','fr'),
"Cymraeg"=>array('cy','br','ga','ca','an','es'),
"Dansk"=>array('da','nb','sv','is','fo','af'),
"Deutsch"=>array('de','af','nl','da','nb','sv'),
"Dolnoserbski"=>array('dsb','hsb','pl','sk','uk','bs'),
"Español"=>array('es','gl','pt','ca','an','fr'),
"Euskara"=>array('eu'),
"فارسی"=>array('fa','ku','ps','ks','sd','np'),
"Pulaar"=>array('ff','wo','tn','ts','nd','ss'),
"vakaViti"=>array('fj','haw','sm','id','mg','ms'),
"føroyskt"=>array('fo','is','fo','da','nb','sv'),
"Français"=>array('fr','wa','vec','ca','an','es'),
"Gaeilge"=>array('ga','br','cy','ca','an','es'),
"Galego"=>array('gl','pt','es','ca','an','fr'),
"Chawuncu"=>array('gnBO','gnPY'),
"Avañe'ẽ"=>array('gnPY','gnBO'),
"ગુજરાતી"=>array('gu','hi','ur','pa','ks','sd'),
"Hausa"=>array('ha','am','ar','he'),
"'Ōlelo Hawaiʻi"=>array('haw','sm','fj','id','mg','ms'),
"עברית"=>array('he','ar','am','ha'),
"हिंदी"=>array('hi','ur','gu','pa','ks','sd'),
"Hrvatski"=>array('hr','bs','sl','sr','bg','mk'),
"Hornjoserbsce"=>array('hsb','dsb','pl','sk','uk','bs'),
"Kreyòl Ayisyen"=>array('ht','fr','wa'),
"Magyar"=>array('hu'),
"Հայերեն"=>array('hy','sq','uk','bg','mk','bs'),
"Bahasa Indonesia"=>array('id','ms','su','mg','tl','fj'),
"Íslenska"=>array('is','da','nb','sv','af','nl'),
"Italiano"=>array('it','fr','wa','vec','ca','an'),
"қазақ тілі"=>array('kk','az','tk','tr','tt','ug'),
"ខ្មែរ"=>array('km','vi'),
"ಕನ್ನಡ"=>array('kn','ml','ta','te'),
"한국어"=>array('ko'),
"कश्मीरी, كشميري‎"=>array('ks','sd','np','mr','si','as'),
"Kurdî"=>array('ku','fa','ps','ks','sd','np'),
"Oluganda"=>array('lg','rn','rw','nd','ss','xh'),
"Lingála"=>array('ln','tn','ts','nd','ss','xh'),
"Lietuvių"=>array('lt','lv','br','cy','ga','da'),
"Latviešu"=>array('lv','lt','br','cy','ga','da'),
"Malagasy"=>array('mg','id','ms','su','tl','fj'),
"Македонски"=>array('mk','bg','bs','hr','sl','sr'),
"മലയാളം"=>array('ml','ta','kn','te'),
"मराठी"=>array('mr','ks','sd','np','si','as'),
"Bahasa Melayu"=>array('ms','id','su','mg','tl','fj'),
"မြန်မာဘာသာ"=>array('my','ach','az','kn','lg','ln'),
"Norsk bokmål"=>array('nb','da','sv','is','fo','af'),
"isiNdebele"=>array('nd','ss','xh','zu','lg','ln'),
"नेपाली"=>array('np','ks','sd','mr','si','as'),
"Nederlands"=>array('nl','af','de','da','nb','sv'),
"Chicheŵa"=>array('ny','tn','ts','nd','ss','xh'),
"ଓଡ଼ିଆ"=>array('or','as','bn','gu','hi','ur'),
"ਪੰਜਾਬੀ"=>array('pa','gu','hi','ur','ks','sd'),
"Polski"=>array('pl','dsb','hsb','sk','uk','bs'),
"پښﺕﻭ"=>array('ps','fa','ku','ks','sd','np'),
"Português"=>array('pt','gl','es','ca','an','fr'),
"Kirundi"=>array('rn','lg','rw','nd','ss','xh'),
"Română"=>array('ro','it','fr','wa','vec','ca'),
"Ikinyarwanda"=>array('rw','lg','rn','nd','ss','xh'),
"सिन्धी, سنڌي، سندھی‎"=>array('sd','ks','np','mr','si','as'),
"සිංහල"=>array('si','ks','sd','np','mr','as'),
"Slovenčina"=>array('sk','dsb','hsb','pl','uk','bs'),
"Slovenščina"=>array('sl','bs','hr','sr','bg','mk'),
"Gagana Sāmoa"=>array('sm','haw','fj','id','mg','ms'),
"Shqip"=>array('sq','hy','uk','bg','mk','bs'),
"Српски (ћирилица)"=>array('sr','bs','hr','sl','bg','mk'),
"siSwati"=>array('ss','xh','zu','nd','tn','ts'),
"Basa Sunda"=>array('su','id','ms','mg','tl','fj'),
"Svenska"=>array('sv','da','nb','is','fo','af'),
"Kiswahili"=>array('sw','tn','ts','nd','ss','xh'),
"தமிழ்"=>array('ta','ml','kn','te'),
"తెలుగు"=>array('te','kn','ml','ta'),
"Türkmençe"=>array('tk','tr','az','tt','uz','kk'),
"Tagalog"=>array('tl','id','mg','ms','su','fj'),
"Setswana"=>array('tn','ts','nd','ss','xh','zu'),
"Türkçe"=>array('tr','tk','az','tt','uz','kk'),
"Xitsonga"=>array('ts','tn','nd','ss','xh','zu'),
"Татарча"=>array('tt','uz','az','tk','tr','kk'),
"ئۇيغۇرچە"=>array('ug','az','tk','tr','tt','kk'),
"Українська"=>array('uk','bg','mk','bs','hr','sl'),
"ﺍﺭﺩﻭ"=>array('ur','hi','gu','pa','ks','sd'),
"Ўзбек"=>array('uz','tt','az','tk','tr','kk'),
"Vèneto"=>array('vec','fr','wa','ca','an','es'),
"Tiếng Việt"=>array('vi','km'),
"Walon"=>array('wa','fr','vec','ca','an','es'),
"Wolof"=>array('wo','ff','tn','ts','nd','ss'),
"isiXhosa"=>array('xh','ss','zu','nd','tn','ts'),
"Yorùbá"=>array('yo','tn','ts','nd','ss','xh'),
"isiZulu"=>array('zu','ss','xh','nd','tn','ts')

      // "Azərbaycan dili"=>array('az','tk','tr','tt','uz'),
      // "Català"=>  array('gl','pt','fr','wa','vec','it','ga'),
      // "Español"=> array('gl','pt','ca','fr','wa','vec','it','ga'),
      // "vakaViti"=> array('fj','haw','sm','id','ms','su'),
      // "Français"=> array('fr','wa','vec','ca','gl','pt','it','ga'),
      // "Gaeilge"=> array('ga','ca','gl','pt','fr','wa','vec','it'),
      // "Galego"=> array('gl','pt','ca','fr','wa','vec','it','ga'),
      // "ʻŌlelo Hawaiʻi"=> array('haw','sm','fj','id','ms','su'),
      // "Bahasa Indonesia"=> array('id','ms','su','fj','haw','sm'),
      // "Italiano"=> array('it','fr','wa','vec','ca','gl','pt','ga'),
      // "Bahasa Melayu"=> array('ms','id','su','fj','haw','sm'),
      // "Português"=> array('pt','gl','ca','fr','wa','vec','it','ga'),
      // "Gagana Sāmoa"=> array('sm','haw','fj','id','ms','su'),
      // "Basa Sunda"=> array('su','id',' ms','fj','haw','sm'),
      // "Türkmençe"=> array('tk','tr','az','tt','uz'),
      // "Türkçe"=>  array('tr','tk','az','tt','uz'),
      // "Татарча"=> array('tt','uz','az','tk','tr'),
      // "Ўзбек"=> array('uz','tt','az','tk','tr'),
      // "Vèneto"=>  array('vec','fr','wa','ca','gl','pt','it','ga'),
      // "Walon"=> array('wa','fr','vec','ca','gl','pt','it','ga')
  );

$code = array (
    // "en" => "English",
    // "az"=> "Azərbaycan dili",
    // "ca"=> "Català",
    // "es"=> "Español",
    // "fj"=> "vakaViti" ,
    // "fr"=>"Français",
    // "ga"=>"Gaeilge",
    // "gl"=>"Galego",
    // "haw"=>"ʻŌlelo Hawaiʻi",
    // "id"=>"Bahasa Indonesia",
    // "it"=>"Italiano",
    // "ms"=>"Bahasa Melayu",
    // "pt"=>"Português",
    // "sm"=>"Gagana Sāmoa",
    // "su"=>"Basa Sunda",
    // "tk"=>"Türkmençe",
    // "tr"=>"Türkçe",
    // "tt"=>"Татарча",
    // "uz"=>"Ўзбек",
    // "vec"=>"Vèneto",
    // "wa"=>"Walon"

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
$x='';

foreach ($code as $key => $value) {
  if($value==$data_lan){
    $x= $key;
  }
}

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
           echo "<td id=".$x.":".$results['en']." contenteditable='true'>" .$results[$x]. "</td>";

          //  echo "<td>".$lang[$data_lan]."</td>";
              // foreach($lang[$data_lan] as $chr) {
              foreach(array_slice($lang[$data_lan],1) as $chr){

                  //  echo "<td>" . $results[$chr] . "</td>";
                  echo "<td>".$results[$chr]."</td>";
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
