
<!DOCTYPE html>
<html lang="en">
<head>
	 <style>

	 html { height: 100%; width: 100%; }
   body {
     width: 100%; height: 100%;
     margin: 12; padding: 15; border: 15;
     font-family: Verdana, Arial, Helvetica, sans-serif;
     font-size: 13px; line-height: 15px;
     background: #C3C3C3;
    padding-bottom: 20%;
   }

   #header {
   	padding-bottom:12%;
   	margin: 10; padding: 10;
		text-align: center;
    background: url(http://i.imgur.com/is6KRqa.jpg);
    background-size: cover;

   }
   #header h1 { padding: 1em; margin: 0; }
   /*#main {
   	height: 700px; width: 100%;
   	margin: 0; padding: 0;
   	background: #D3D3D3;
   }*/
   #footer {
   	clear: both;
   	height: 2em; margin: 0; padding: 1em;
   	text-align: center;
     background: #1A446C;  color: #D4E6F4;
   }
form {
    margin: 0 auto;
    margin-top: 0px;
}

p a:hover {
    color: #555;
}
input {
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    font-size: 12px;
    outline: none;
}
input[type=text],
input[type=password] {
    color: #777;
    padding-left: 10px;
    margin: 10px;
    margin-top: 0px;
    margin-left: 40px;
    width: 350px;
    height: 100px;
    border: 1px solid #c7d0d2;
    border-radius: 2px;
    box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #f5f7f8;
-webkit-transition: all .4s ease;
    -moz-transition: all .4s ease;
    transition: all .4s ease;
    }
input[type=text]:hover,
input[type=password]:hover {
    border: 1px solid #b6bfc0;
    box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .7), 0 0 0 5px #f5f7f8;
}
input[type=submit] {
    float: right;
    margin-right: 0px;
    margin-top: 0px;
    width: 100px;
    height: 25px;
font-size: 12px;
    font-weight: bold;
    color: #fff;
    background-color: #acd6ef; /*IE fallback*/
    background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8));
    background-image: -moz-linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
    background-image: linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
    border-radius: 0px;
    border: 1px solid #66add6;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
    cursor: pointer;
}
input[type=submit]:hover {
    background-image: -webkit-gradient(linear, left top, left bottom, from(#b6e2ff), to(#6ec2e8));
    background-image: -moz-linear-gradient(top left 90deg, #b6e2ff 0%, #6ec2e8 100%);
    background-image: linear-gradient(top left 90deg, #b6e2ff 0%, #6ec2e8 100%);
}
input[type=submit]:active {
    background-image: -webkit-gradient(linear, left top, left bottom, from(#6ec2e8), to(#b6e2ff));
    background-image: -moz-linear-gradient(top left 90deg, #6ec2e8 0%, #b6e2ff 100%);
    background-image: linear-gradient(top left 90deg, #6ec2e8 0%, #b6e2ff 100%);
}
#create label {
    width: 10em;
}
label[for=remember] {
    width: auto;
}
label[for=color] {
    display: inline;
    width: auto;
    text-align: left;
}
#register {
    margin-left: 12.5em;
}
#revalidate {
    margin-left: 6.5em;
}
/*select{

 width:250px;
 padding:5px;
 border-radius:3px;
}*/
 </style>
		<!-- Bootstrap core CSS-->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<div id="header">
		<h1>Terminology Creation</h1>
	</div>

		 <FORM METHOD="LINK" ACTION="./php/login.php">
          <INPUT TYPE="submit" VALUE="Sign In">
          </Form>
          <FORM METHOD="LINK" ACTION="./php/register.php">
           <INPUT TYPE="submit" VALUE="Sign Up"></form>
						 <FORM METHOD="LINK" ACTION="">
					<INPUT TYPE="submit" VALUE="About Us">
</Form>

    </Form><br>&nbsp

		<div style="display:block;">
    <div class="styped-select">
    <label>Source: </label>
     <select>
      <option value="ach">Nilo-Saharan</option>
      <option value="ach">Eastern Sudanic</option>
      <option value="ach">Nilotic</option>
      <option value="ach">Western</option>
      <option value="ach">Luo</option>
      <option value="ach">Southern</option>
      <option value="af">Indo-European</option>
      <option value="af">Germanic</option>
      <option value="af">Low Saxon-Low Franconian</option>
    </select>
 <label>Target: </label>
     <select multiple>
      <option value="ach">Nilo-Saharan</option>
      <option value="ach">Eastern Sudanic</option>
      <option value="ach">Nilotic</option>
      <option value="ach">Western</option>
      <option value="ach">Luo</option>
      <option value="ach">Southern</option>
      <option value="af">Indo-European</option>
      <option value="af">Germanic</option>
      <option value="af">Low Saxon-Low Franconian</option>
        </select></div>
    <br>
 <label>No. of Similar Languages: </label>
     <select>
      <option value="one">1</option>
      <option value="three">3</option>
      <option value="five">5</option>
      <option value="eight">8</option>
      <option value="thirteen">13</option>
      <option value="twentyone">21</option>
    </select>
<br><br><br>


		<!-- <label>Select Language</label>
		 <select>
		  <option value="ach">ach</option>
		  <option value="adh">adh</option>
		  <option value="af">af</option>
		  <option value="agr">agr</option>
		  <option value="ak">ak</option>
		  <option value="am">am</option>
		  <option value="an">an</option>
		  <option value="anp">anp</option>
		  <option value="arn">arn</option>
		</select><br><br><br> -->
   		<section id="container" >

			<!--main content start-->
			<section id="main-content" style="margin-left: 0px;">
				<section class="wrapper">

					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
						<p>&nbsp&nbsp&nbspType here in English to begin searching</p>
								<form class="form-horizontal" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;">
									<div class="input-group col-sm-11">
										<input id="name" name="name" type="text" class="form-control" placeholder="Search by english keywords..." autocomplete="off"/>
									</div>
								</form>
						</div>

					</div>

					<div class="row mt">
						<div class="col-lg-12">
							<div class="content-panel tablesearch">

								<section id="unseen">
									<table id="resultTable" class="table table-bordered table-hover table-condensed">
										<thead>
											<tr>
												<th class="small">eng</th>
												<th class="small">ach</th>
												<th class="small">adh</th>
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
												<th class="small">bn_IN</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</section>

							</div><!-- /content-panel -->
						</div><!-- /col-lg-4 -->
					</div><!-- /row -->


				</section>
				<!--/wrapper -->
			</section><!-- /MAIN CONTENT -->

			<!--main content end-->

		</section>

		<!-- place JS scripts at end of page for faster load times -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>

		<!--script for this page-->
		<script type="text/javascript" src="scripts/triggers.js"></script>

	</body>
</html>
