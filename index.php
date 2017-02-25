
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
<link href="default_index.css" rel="stylesheet" type="text/css" media="all" />
<link href="creation/fonts.css" rel="stylesheet" type="text/css" media="all" />
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
                        <h4><a href="php/login.php"><span class="logo_colour"> Login</span></a></h4>
                        <h4><a href="php/register.php"><span class="logo_colour"> Register</span></a></h4>
		</div>
		<div id="menu">
			<ul>
				<li class="active"><a href="index.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="php/creation/account.html" accesskey="2" title="">My account</a></li>
				<li><a href="php/creation/about.html" accesskey="3" title="">About Us</a></li>
                <li><a href="php/creation/feedback.html" accesskey="3" title="">Feedback</a></li>
                <li><a href="php/lobby.php" accesskey="4" title="Lobby"> My Lobby </a></li>
			</ul>
		</div>
	</div>
</div>
<div class="wrapper" style="padding-left:20px">
	<div id="translate" class="container">  
                Select:
             <select name="users" id="users" onchange="showBox();showUser(this.value)">
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

                </select> <br> <br>
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
