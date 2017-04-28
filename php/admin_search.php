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
<link href="../html/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../html/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../scripts/select.js"> </script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(function(){
	//acknowledgement message
    var message_status = $("#database_user");
    $("td[contenteditable=true]").blur(function(){
        var field_userid = $(this).attr("id") ;
        var value = $(this).text() ;
        $.post('saveEdit.php' , field_userid + "=" + value, function(data){
            if(data != '')
			{
				message_status.show();
				message_status.text(data);
				//hide the message
				setTimeout(function(){message_status.hide()},1000);
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
    <!-- <h4><a href="login.php"><span class="logo_colour"> Login</span></a></h4> -->
    <!-- <h4><a href="register.php"><span class="logo_colour"> Register</span></a></h4> -->
		</div>

		<!-- <div id="menu">
			<ul>
				<li class="active"><a href="lobby.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="account.php" accesskey="2" title="">My account</a></li>
				<li><a href="../html/about.html" accesskey="3" title="">About Us</a></li>
        <li><a href="../html/feedback.html" accesskey="4" title="">Feedback</a></li>
        <!-- <li class="active"><a href="lobby.php" accesskey="1" title="Lobby"> My Lobby </a></li> -->
			<!-- </ul> -->
		<!-- </div>  -->
	</div>
</div><br>
<center><h2>Admin</h3></center><br>
<!-- <div class="wrapper"> -->


  <div id ="wrapper">
    <div id="setting">
  </div>
    <div id="container"  >
      <?php
      require_once 'db.php';

      $lang= array(
          "az" => array('az','tk','tr','tt','uz'),
          "en" => array('en'),
          "ca" => array('ca','gl','pt','fr','wa','vec','it','ga'),
          "es" => array('gl','pt','ca','fr','wa','vec','it','ga'),
          "fj" => array('fj','haw','sm','id','ms','su'),
          "fr" => array('fr','wa','vec','ca','gl','pt','it','ga'),
          "ga" => array('ga','ca','gl','pt','fr','wa','vec','it'),
          "gl" => array('gl','pt','ca','fr','wa','vec','it','ga'),
          "haw" => array('haw','sm','fj','id','ms','su'),
          "id" => array('id','ms','su','fj','haw','sm'),
          "it" => array('it','fr','wa','vec','ca','gl','pt','ga'),
          "ms" => array('ms','id','su','fj','haw','sm'),
          "pt" => array('pt','gl','ca','fr','wa','vec','it','ga'),
          "sm" => array('sm','haw','fj','id','ms','su'),
          "su" => array('su','id',' ms','fj','haw','sm'),
          "tk" => array('tk','tr','az','tt','uz'),
          "tr" => array('tr','tk','az','tt','uz'),
          "tt" => array('tt','uz','az','tk','tr'),
          "uz" => array('uz','tt','az','tk','tr'),
          "vec" => array('vec','fr','wa','ca','gl','pt','it','ga'),
          "wa" => array('wa','fr','vec','ca','gl','pt','it','ga')
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

      $query='SELECT * from translation WHERE approved=0';
      $result = $test_db->query($query);
      echo "<div id ='database_user'></div>";
      echo "<table id ='termTable'>
      <tr>";
      foreach($code as $chrs=>$val) {
      echo "<th>".$val."</th>";
      }
      echo "</tr>";

      while($results = $result->fetch_array()) {
      $result_array[] = $results;
             echo "<tr>";
            //  echo "<td>" . $results['en'] . "</td>";
          // foreach($results as $chr) {
          foreach ($code as $chr => $value) {
              echo "<td id=".$chrs.":".$results['en']." contenteditable='true'>" .$results[$chr] . "</td>";
                      }
                    }

              echo "</tr>";
              echo "</table>";


       ?>
       <!-- <br><button id='approved'>Approve</button> -->


</div>
 </div>
</div>
</div>
<!-- <div id="footer">
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
</div> -->
</body>
</html>
