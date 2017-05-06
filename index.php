
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<script>$('.selectpicker').selectpicker();</script>
<link href="html/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="html/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="scripts/select.js"></script>
<script>
    function showBox()
    {
        document.getElementById("search").style.display = "block";
        }
</script>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","php/search.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

</head>

<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.php">Terminology <span class="logo_colour"> Creation</span></a></h1>
      <h4><a href="php/register.php"><span class="logo_colour"> Register</span></a></h4>
      <h4><a href="php/login.php"><span class="logo_colour"> Login</span></a></h4>

		</div>
		<div id="menu">
			<ul>
				<li class="active"><a href="index.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="php/account.php" accesskey="2" title="">My account</a></li>
				<li><a href="html/about.html" accesskey="3" title="">About Us</a></li>
                <!-- <li><a href="html/feedback.html" accesskey="4" title="">Feedback</a></li> -->
                <li><a href="php/admin.php" accesskey="1" title="">Admin</a></li>
                <!-- <li><a href="php/lobby.php" accesskey="4" title="Lobby"> My Lobby </a></li> -->
			</ul>
		</div>
	</div>
</div>
<div class="wrapper" style="padding-left:20px">
	<div id="translate" class="container">
                Select:
             <select name="users" id="users" onchange="showBox();showUser(this.value)">
                <option value =""> Your Language  </option>
                <option value ="en"> Your Language  </option>
               <option value ="az"> Azərbaycan dili</option>
               <option value="ca"> Català</option>
               <option value ="es"> Español</option>
               <option value="fj"> vakaViti </option>
               <option value="fr">Français</option>
               <option value="ga">Gaeilge</option>
               <option value="gl">Galego</option>
               <option value="haw">ʻŌlelo Hawaiʻi</option>
               <option value="id">Bahasa Indonesia</option>
               <option value="it">Italiano</option>
               <option value="ms">Bahasa Melayu</option>
               <option value="pt">Português</option>
               <option value="sm">Gagana Sāmoa</option>
               <option value="su">Basa Sunda</option>
               <option value="tk">Türkmençe</option>
               <option value="tr">Türkçe</option>
               <option value="tt">Татарча</option>
               <option value="uz">Ўзбек</option>
               <option value="vec">Vèneto</option>
               <option value="wa">Walon</option>

                <!-- <option value ="en">English</option> -->
                <!-- <option value ="ach">Acholi</option>
                <option value ="af">Afrikaans</option>
                <option value ="ak">Akan</option>
                <option value ="am">አማርኛ</option>
                <option value ="an">aragonés</option>
                <option value ="ar">العربية</option>
                <option value ="as">অসমীয়া</option>
                <option value ="az">Azərbaycan dili</option>
                <option value ="bg">Български</option>
                <option value ="bm">Bamanankan</option>
                <option value ="bn">বাংলা</option>
                <option value ="br">brezhoneg</option>
                <option value ="bs">Bosanski</option>
                <option value ="ca">Català</option>
                <option value ="cy">Cymraeg</option>
                <option value ="da">Dansk</option>
                <option value ="de">Deutsch</option>
                <option value ="dsb">Dolnoserbski</option>
                <option value ="es">Español</option>
                <option value ="eu">Euskara</option>
                <option value ="fa">فارسی</option>
                <option value ="ff">Pulaar</option>
                <option value ="fj">vakaViti</option>
                <option value ="fo">føroyskt</option>
                <option value ="fr">Français</option>
                <option value ="ga">Gaeilge</option>
                <option value ="gl">Galego</option>
                <option value ="gnBO">Chawuncu</option>
                <option value ="gnPY">Avañe'ẽ</option>
                <option value ="gu">ગુજરાતી</option>
                <option value ="ha">Hausa</option>
                <option value ="haw">'Ōlelo Hawaiʻi</option>
                <option value ="he">עברית</option>
                <option value ="hi">हिंदी</option>
                <option value ="hr">Hrvatski</option>
                <option value ="hsb">Hornjoserbsce</option>
                <option value ="ht">Kreyòl Ayisyen</option>
                <option value ="hu">Magyar</option>
                <option value ="hy">Հայերեն</option>
                <option value ="id">Bahasa Indonesia</option>
                <option value ="is">Íslenska</option>
                <option value ="it">Italiano</option>
                <option value ="kk">қазақ тілі</option>
                <option value ="km">ខ្មែរ</option>
                <option value ="kn">ಕನ್ನಡ</option>
                <option value ="ko">한국어</option>
                <option value ="ks">कश्मीरी, كشميري‎</option>
                <option value ="ku">Kurdî</option>
                <option value ="lg">Oluganda</option>
                <option value ="ln">Lingála</option>
                <option value ="lt">Lietuvių</option>
                <option value ="lv">Latviešu</option>
                <option value ="mg">Malagasy</option>
                <option value ="mk">Македонски</option>
                <option value ="ml">മലയാളം</option>
                <option value ="mr">मराठी</option>
                <option value ="ms">Bahasa Melayu</option>
                <option value ="my">မြန်မာဘာသာ</option>
                <option value ="nb">Norsk bokmål</option>
                <option value ="nd">isiNdebele</option>
                <option value ="np">नेपाली</option>
                <option value ="nl">Nederlands</option>
                <option value ="ny">Chicheŵa</option>
                <option value ="or">ଓଡ଼ିଆ</option>
                <option value ="pa">ਪੰਜਾਬੀ</option>
                <option value ="pl">Polski</option>
                <option value ="ps">پښﺕﻭ</option>
                <option value ="pt">Português</option>
                <option value ="rn">Kirundi</option>
                <option value ="ro">Română</option>
                <option value ="rw">Ikinyarwanda</option>
                <option value ="sd">सिन्धी, سنڌي،</option>
                <option value ="si">සිංහල</option>
                <option value ="sk">Slovenčina</option>
                <option value ="sl">Slovenščina</option>
                <option value ="sm">Gagana Sāmoa</option>
                <option value ="sq">Shqip</option>
                <option value ="sr">Српски (ћирилица)</option>
                <option value ="ss">siSwati</option>
                <option value ="su">Basa Sunda</option>
                <option value ="sv">Svenska</option>
                <option value ="sw">Kiswahili</option>
                <option value ="ta">தமிழ்</option>
                <option value ="te">తెలుగు</option>
                <option value ="tk">Türkmençe</option>
                <option value ="tl">Tagalog</option>
                <option value ="tn">Setswana</option>
                <option value ="tr">Türkçe</option>
                <option value ="ts">Xitsonga</option>
                <option value ="tt">Татарча</option>
                <option value ="ug">ئۇيغۇرچە</option>
                <option value ="uk">Українська</option>
                <option value ="ur">ﺍﺭﺩﻭ</option>
                <option value ="uz">Ўзбек</option>
                <option value ="vec">Vèneto</option>
                <option value ="vi">Tiếng Việt</option>
                <option value ="wa">Walon</option>
                <option value ="wo">Wolof</option>
                <option value ="xh">isiXhosa</option>
                <option value ="yo">Yorùbá</option>
                <option value ="zu">isiZul</option> -->
                </select>
                <input type="text" id="search" style="display:none" placeholder="Type your word here" onkeyup="filter_table()"> <br><br>
                <div id='txtHint'> </div>

			<!--main content end-->

</div>
</div>

<div id="footer">
	<div class="container">
		<div class="fbox1">
			<span>Developers: Mary Hogan, Bikram Pokhrel, Thao Thai</span>
		</div>
	</div>
</div>
</body>

		<!-- place JS scripts at end of page for faster load times -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--		<script src="assets/js/bootstrap.min.js"></script>-->
		<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>

		<!--script for this page-->
		<script type="text/javascript" src="scripts/triggers.js"></script>


</html>
