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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
    <!--<link href="../assets/css/bootstrap.css" rel="stylesheet">-->
<link href="../creation/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../creation/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../scripts/select.js"> </script>
<script>
function getuserdata(str) {
if (str == "") {
    document.getElementById("database_user").innerHTML = "";
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
            document.getElementById("database_user").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","lobby_search.php?q="+str,true);
    xmlhttp.send();
}
}
</script>
<script> getuserdata('<?= htmlentities($_SESSION['username']); ?>') </script>
<script>
    $(document).ready(function(){
      $(document).on(
        "keypress", '#userTable td', function(e) {
          if (e.which == 13) { // On Return key - "save" cell
            e.preventDefault();
            $(this).prop("contenteditable", false);
          }
      });
        $(document).on(
        "dblclick", '#userTable td', function() {
          $('td').not(this).prop("contenteditable",false);
          $(this).prop("contenteditable", true);
        }
    );
    });
</script>


</head>


<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="../index.php">Terminology <span class="logo_colour"> Creation</span></a></h1>
       <h4><a href="../index.php"> <?php include('logout_button.php');?></a></h4>
                        <!-- <h4><a href="login.php"><span class="logo_colour"> Login</span></a></h4> -->
                        <!-- <h4><a href="register.php"><span class="logo_colour"> Register</span></a></h4> -->
		</div>
		<div id="menu">
			<ul>
				<li ><a href="../index.php" accesskey="4" title="">Homepage</a></li>
				<li><a href="creation/account.html" accesskey="2" title="">My account</a></li>
				<li><a href="creation/about.html" accesskey="3" title="">About Us</a></li>
                <li><a href="creation/feedback.html" accesskey="3" title="">Feedback</a></li>
                <li class="active"><a href="lobby.php" accesskey="1" title="Lobby"> My Lobby </a></li>
			</ul>
		</div>
	</div>
</div>
<div class="wrapper">

	<div id="translate" class="container">
    <button onclick="commit()"> Commit Change(s) </button>
    <INPUT TYPE="submit" VALUE="Update"></INPUT>
<h4>Welcome to the Terminology Creation,<?= htmlentities($_SESSION['username']); ?>!</h4>
<!--main content start-->
               <div class="wrapper5" >
                   <input type="text" id="search1" placeholder="Type your word here" onkeyup="filter_usertable()"> <br>
                   <div id="database_user">

</div>
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
        <!-- place JS scripts at end of page for faster load times -->
<!--
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>

        script for this page
        <script type="text/javascript" src="scripts/triggers.js"></script>
-->

    </body>
</html>
