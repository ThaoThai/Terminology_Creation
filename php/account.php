<?php
require_once 'db.php';?>
<?php require_once ("authenticate.php");

$errors = [];
if (isset($_POST['changepwd'])) {
    require_once ("db_connect.php");
    $expected = ['currentpwd', 'newpwd', 'confirm'];
    // Assign $_POST variables to simple variables and check all fields have values
    foreach ($_POST as $key => $value) {
        if (in_array($key, $expected)) {
            $$key = trim($value);
            if (empty($$key)) {
                $errors[$key] = 'This field requires a value.';
            }
        }
    }
    // Proceed only if there are no errors
    if (!$errors) {
        if ($newpwd != $confirm) {
            $errors['nomatch'] = 'Passwords do not match.';
        } else{
			$username=$_SESSION['username'];
                   	$currentpwd=$_POST['currentpwd'];
                	$pwd=$_POST['newpwd'];
                    $stmt = $db->prepare('SELECT pwd FROM users WHERE username = :username');
                    $stmt->bindParam(':username', $username);
                    $stmt->execute();
                    $stored = $stmt->fetchColumn();
                 if (password_verify($currentpwd, $stored)) {
                      $sql = ('UPDATE users SET pwd =:pwd WHERE username = :username');
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':username', $username);
                    // Store an encrypted version of the password
                    $stmt->bindValue(':pwd', password_hash($pwd, PASSWORD_DEFAULT));
                     $stmt->execute();

                      header('Location: account.php');
                      exit;

               }else{
        $error = 'Current password doesnot match.';

}
}
}
}?>
<?php
 $errors = [];
if (isset($_POST['savechanges'])) {
    require_once ("db_connect.php");
    $expected = ['fullname', 'birthday','email','language'];
    // Assign $_POST variables to simple variables and check all fields have values
    foreach ($_POST as $key => $value) {
        if (in_array($key, $expected)) {
            $$key = trim($value);
            if (empty($$key)) {
                $errors[$key] = 'This field requires a value.';
            }
        }
    }

if (!$errors) {
                $username=$_SESSION['username'];
              $fullname=$_POST['fullname'];
              $birthday=$_POST['birthday'];
              $email=$_POST['email'];
              $language=$_POST['language'];
              $sql = ('UPDATE users SET username=:username,fullname=:fullname,birthday=:birthday,email=:email,language=:language WHERE username = :username');
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':fullname', $fullname);
                $stmt->bindParam(':birthday', $birthday);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':language', $language);
                $stmt->execute();

                  header('Location: account.php');
                  exit;
                }
              }

 ?>


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
 <link href="../html/default.css" rel="stylesheet" type="text/css" media="all" />
 <link href="../html/fonts.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body id="create">
<div id="header-wrapper">
 <div id="header" class="container">
   <div id="logo">
     <h1><a href="../index.php">Terminology <span class="logo_colour"> Creation</span></a></h1>
         <!-- <h4><a href="register.php"><span class="logo_colour"> </span></a></h4> -->
            <h4><a href="../index.php"> <?php include('logout_button.php');?></a></h4>
   </div>
   <div id="menu">
     <ul>
       <li><a href="../index.php" accesskey="1" title="">Homepage</a></li>
       <li class="active"><a href="account.php" accesskey="1" title="">My account</a></li>
       <li><a href="about.html" accesskey="3" title="">About Us</a></li>
        <li><a href="feedback.html" accesskey="3" title="">Feedback</a></li>
        <li><a href="lobby.php" accesskey="2" title="">My Lobby</a></li>
     </ul>
   </div>
 </div>
</div>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>

<!-- <div id="page"> -->
  <!-- <div class="wrapper">
  	<div id="translate" class="container"> -->
  <?php
$query = "SELECT username,fullname,birthday, email, language FROM users WHERE username = '".$_SESSION['username']."'";
$result = $test_db->query($query);
while($results = $result->fetch_array()) {
  $result_array[] = $results;
    {?>
      <div class="wrapper">
              <div id="info">
                <form action ="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                  <b>Username<b> <br>
                <input type="account" name="username" id="username" value="<?php echo htmlspecialchars($results['username']); ?> "> <br><br>
                <b>Full Name<b> <br>
              <input type="account" name="fullname" id="fullname" value="<?php echo htmlspecialchars($results['fullname']); ?> "> <br><br>
              <b>  Birthday</b><br>
                <input type="account" name="birthday" id="birthday" value="<?php echo htmlspecialchars($results['birthday']); ?> "> <br><br>
                <b>Email </b><br>
                <input type="account" name="email" id ="email" value="<?php echo htmlspecialchars($results['email']); ?> "> <br><br>
              <b>  Language <b><br>
                <input type="account" name="language" id= "language" value="<?php echo htmlspecialchars($results['language']); ?> "> <br><br>
                    <input type="submit" name="savechanges" id="savechanges" value="Save Changes">
                  </form></div>



      <div id ="password">

        <form action ="<?= $_SERVER['PHP_SELF']; ?>" method="post">
          <P>
      <b>Current Password*</b> <br> <input type="password" name="currentpwd" id="currentpwd"
      <?php
      if (isset($currentpwd) && !isset($errors['currentpwd'])) {
          echo 'value="' . htmlentities($currentpwd) . '">';
      } else {
          echo '>';
      }
      if (isset($errors['currentpwd'])) {
          echo $errors['currentpwd'];
      } elseif (isset($errors['failed'])) {
          echo $errors['failed'];
      }
      ?></P><br><br>
      <b>New Password*</b> <br> <input type="password" name="newpwd" id="newpwd">
      <?php
      if (isset($errors['newpwd'])) {
          echo $errors['newpwd'];
      }
      ?><br><br>
      <b>Retype-Password*</b> <br> <input type="password" name="confirm" id="confirm">
      <?php
      if (isset($errors['confirm'])) {
          echo $errors['confirm'];
      } elseif (isset($errors['nomatch'])) {
          echo $errors['nomatch'];
      }
      ?>
<br><br>
      <input type="submit" name="changepwd" id="changepwd" value="Change Password">
          </form>
      </div>


  <?php   }

}?></div></div>
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
