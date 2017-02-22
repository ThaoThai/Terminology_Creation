<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<!-- <script>$(document).ready(function(e) {
  $('.selectpicker').selectpicker();
    });</script> -->
		<style>
		input[type=text]
		 {
		    color: #777;
		    padding-left: 10px;
		    margin: 10px;
		    margin-top: -40px;
				/*margin-bottom: 500px;*/
		    margin-left: 400px;
		    width: 350px;
		    height: 75px;
		    border: 1px solid #c7d0d2;
		    border-radius: 2px;
		    box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #f5f7f8;
		-webkit-transition: all .4s ease;
		    -moz-transition: all .4s ease;
		    transition: all .4s ease;
		    }

		</style>
		<link href="assets/css/bootstrap.css" rel="stylesheet">
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
				<li><a href="php/lobby.php" accesskey="2" title="">My account</a></li>
				<li><a href="about.html" accesskey="3" title="">About Us</a></li>
                <li><a href="feedback.html" accesskey="3" title="">Feedback</a></li>
			</ul>
		</div>
	</div>
</div>


<div class="wrapper1">
	<!-- <div id="translate" class="container"> -->
        <h2> Please Translate</h2><br>
				<div id="txtHint"></div>

				<form>
                Source
            <!-- <select class ="selectpicker" data-width="fit"> -->
						<select data-width="fit" name="users" onchange="showUser(this.value)">
				      <option value="adh">Nilo-Saharan</option>
				      <option value="ach">Eastern Sudanic</option>
				      <option value="af">Nilotic</option>
				      <option value="ach">Western</option>
				      <option value="ach">Luo</option>
				      <option value="ak">Southern</option>
				      <option value="am">Indo-European</option>
				      <option value="an">Germanic</option>
				      <option value="anp">Low Saxon-Low Franconian</option>
				    </select>
                <!-- <option value = "en"> English</option>
                <option value = "vi"> Vietnamese</option>
                <option value = "de"> German</option>
                <option value = "es"> Spanish</option>
                <option value = "zu"> Zulu</option> -->
                <!-- </select> -->
                Display Related Lang(s)
                <select>
                <option value ="1"> 1</option>
                    <option value ="1"> 3</option>
                    <option value ="1"> 5</option>
                    <option value ="1"> 8</option>
                    <option value ="1"> 13</option></select>
                Target
                <select data-width="fit">
                  <option> Choose target language(s)</option>
                <option> Vietnamese</option>
                <option> English </option>
							</select>
						    <!-- <input type="translate" name="word" placeholder="Type your word here"> -->


								<section id="container" >
								 <section id="main-content" style="margin-left: 0px;">
									<section class="wrapper">

										<div class="row">
											<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
											<!-- <p>&nbsp&nbsp&nbsp
												Type here in English to begin searching</p> -->
													<form class="form-horizontal" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;">
														<div class="input-group col-sm-11">
															<input id="name" name="name" type="text" class="form-control" placeholder="Search by english keywords..." autocomplete="off"/>
														</div>
													</form>
											</div>

										</div>


        <!-- </form> -->
<!-- </div></div> -->

<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel tablesearch">

			<section id="unseen">
				<table id="resultTable" class="table table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th class="small">eng</th>
							<th class="small">ach</th>
							<!-- <th class="small">adh</th>
							<th class="small">af</th>
							<th class="small">agr</th>
							<th class="small">ak</th>
							<th class="small">am</th>
							<th class="small">an</th>
							<th class="small">anp</th>
							<th class="small">ar</th>
							<th class="small">arn</th>
							<th class="small">as</th>
							<th class="small">aym</th>
							<th class="small">az</th>
							<th class="small">bcl</th>
							<th class="small">bg</th>
							<th class="small">bho</th>
							<th class="small">bm</th>
							<th class="small">bn_BD</th>
							<th class="small">bn_IN</th> -->
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</section>
		</div>
		<!-- /content-panel -->
	</div>
	<!-- /col-lg-4 -->
</div>
<!-- /row -->


</section>
<!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->

<!--main content end-->

</section></div>
</div>


<!-- place JS scripts at end of page for faster load times -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>

<!--script for this page-->
<script type="text/javascript" src="scripts/triggers.js"></script>


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
