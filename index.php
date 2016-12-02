<?php
require_once ("header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!--<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<!--external css-->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

	<!-- Custom styles for this page-->
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<link href="assets/css/table-responsive.css" rel="stylesheet">

</head>


		<section id="container" >

			<!--main content start-->
			<section id="main-content" style="margin-left: 0px;">
				<section class="wrapper">

					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
						<p>Type here in English to begin searching</p>
								<form class="form-horizontal" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;">
									<div class="input-group col-sm-11">
										<input id="name" name="name" type="text" class="form-control" placeholder="Search by english keywords..." autocomplete="off"/>
										<!--<span class="input-group-btn">
											<button type="button" class="btn btn-default btnSearch">
												<span class="glyphicon glyphicon-search"> </span>
											</button> </span>-->
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
												<th class="small">vi</th>
																			
											</tr>
										</thead>
									
										<tbody></tbody>
									</table>
								</section>

							</div><!-- /content-panel -->
						</div><!-- /col-lg-4 -->
					</div><!-- /row -->
					

					<!--<div class="row mt">
						<div class="col-lg-12">
							<h3>Top Searches</h3>
							<p>These results are ranked by popularity in the query_data table. Each time the complete name is entered in the search, a +1 is registered and incremented.</p>
							<div class="content-panel">

								<section id="unseen">
									<table id="resultTable-topsearch" class="table table-bordered table-hover table-condensed">
										<thead>
											<tr>
									
												<th class="small">eng</th>
												<th class="small">vi</th>
																					
											</tr>
										</thead>
									
										<tbody><?php //include 'php/top_search.php' ?></tbody>
									</table>
								</section>

							</div>--><!-- /content-panel -->
						<!--</div>--><!-- /col-lg-4 -->
					<!--</div>--><!-- /row -->

					
			
					<!--<p>
						Check out the full tutorial at <a href="http://lekkerlogic.com/blog/‎?p=16">LekkerLogic.com - PHP MySQL Ajax Live Data Table Tutorial</a>
					</p>-->

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