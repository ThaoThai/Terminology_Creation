<?php
//require_once('header.php');

if (isset($_POST['cancel'])){
  header('Location: ../index.php');
     exit;}

$errors = [];
if (isset($_POST['register'])) {
    require_once ("db_connect.php");
    $expected = ['username', 'pwd', 'confirm','fullname','birthday','email','language'];
    // Assign $_POST variables to simple variables and check all fields have values
    foreach ($_POST as $key => $value) {
        if (in_array($key, $expected)) {
            $$key = trim($value);
            if (empty($$key)) {
                $errors[$key] = 'This field requires a value.';
            }
        }
    }
    if(strlen($username)>9){
        $errors['field_name']= ' username must be less than 9 charcters long.';
    }
    // Proceed only if there are no errors
    if (!$errors) {
        if ($pwd != $confirm) {
            $errors['nomatch'] = 'Passwords do not match.';
        } else {
            // Check that the username hasn't already been registered
            $sql = 'SELECT COUNT(*) FROM users WHERE username = :username';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            if ($stmt->fetchColumn() != 0) {
                $errors['failed'] = "$username is already registered. Choose another name.";
            } else {
                try {
                    // Generate a random 8-character user key and insert values into the database
                    $user_key= hash('crc32', microtime(true) . mt_rand() . $username);

                    $sql = 'INSERT INTO users (user_key, username, pwd,fullname,birthday,email,language)
                            VALUES (:key, :username, :pwd,:fullname,:birthday,:email,:language)';
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':key', $user_key);
                    $stmt->bindParam(':username', $username);
                    // Store an encrypted version of the password
                    $stmt->bindValue(':pwd', password_hash($pwd, PASSWORD_DEFAULT));
                    $stmt->bindParam(':fullname', $fullname);
                    $stmt->bindParam(':birthday', $birthday);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':language', $language);
                    $stmt->execute();
                } catch (\PDOException $e) {
                    if (0 === strpos($e->getCode(), '23')) {
                        // If the user key is a duplicate, regenerate, and execute INSERT statement again
                        $user_key = hash('crc32', microtime(true) . mt_rand() . $username);
                        if (!$stmt->execute()) {
                            throw $e;
                        }
                    }
                }
                // The rowCount() method returns 1 if the record is inserted,
                // so redirect the user to the login page
                if ($stmt->rowCount()) {
                    header('Location: login.php');
                    exit;
                }
            }
        }
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

  <style>
  form {
      margin: 0 auto;
      margin-top: 20px;
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
  input[type=password],
  input[type=email],
  input[type=date] {
      color: #777;
      padding-left: 10px;
      margin: 10px;
      margin-top: 12px;
      margin-left: 18px;
      width: 200px;
      height: 25px;
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
  input[type=text]:focus,
  input[type=password]:focus {
      border: 1px solid #a8c9e4;
      box-shadow: inset 0 1.5px 3px rgba(190, 190, 190, .4), 0 0 0 5px #e6f2f9;
  }

  input[type=checkbox] {
      margin-left: 20px;
      margin-top: 30px;
  }
  .check {
      margin-left: 3px;
      font-size: 11px;
      color: #444;
      text-shadow: 0 1px 0 #fff;
  }
  input[type=submit] {
      float: center;
      margin-right: 20px;
      margin-top: 20px;
      width: 100px;
      height: 30px;
  font-size: 12px;
      font-weight: bold;
      color: #fff;
      background-color: #acd6ef; /*IE fallback*/
      background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8));
      background-image: -moz-linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
      background-image: linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
      border-radius: 30px;
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
  }label {
      display: inline-block;
      width: 5em;
      text-align: right;
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

  </style>
</head>
<body id="create">

<div id="header-wrapper">
 <div id="header" class="container">
   <div id="logo">
     <h1><a href="../index.php">Terminology <span class="logo_colour"> Creation</span></a></h1>
         <h4><a href="register.php"><span class="logo_colour"> Register</span></a></h4>
            <h4><a href="login.php"><span class="logo_colour"> Login</span></a></h4>
   </div>
   <div id="menu">
     <ul>
       <li class="active"><a href="../index.php" accesskey="1" title="">Homepage</a></li>
       <li><a href="lobby.php" accesskey="2" title="">My account</a></li>
       <li><a href="../html/about.html" accesskey="3" title="">About Us</a></li>
        <li><a href="../html/feedback.html" accesskey="3" title="">Feedback</a></li>
        <li><a href="lobby.php" accesskey="4" title="Lobby"> My Lobby </a></li>

     </ul>
   </div>
 </div>
</div>
<div class="wrapper">

	<div id="translate" class="container">
        <p> <b>Create Account</b></p>


<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">

    <p>
        <label for="username">Username:</label>

        <input type="text" name="username" id="username"
        <?php
        if (isset($username) && !isset($errors['username'])) {
            echo 'value="' . htmlentities($username) . '">';
        } else {
            echo '>';
        }
        if (isset($errors['username'])) {
            echo $errors['username'];
        } elseif (isset($errors['failed'])) {
            echo $errors['failed'];
        }elseif(isset($errors['field_name'])){
            echo $errors['field_name'];
        }
        ?>
    </p>
    <p>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd">
        <?php
        if (isset($errors['pwd'])) {
            echo $errors['pwd'];
        }
        ?>
    </p>
    <p>
        <label for="confirm">Confirm Password:</label>
        <input type="password" name="confirm" id="confirm">
        <?php
        if (isset($errors['confirm'])) {
            echo $errors['confirm'];
        } elseif (isset($errors['nomatch'])) {
            echo $errors['nomatch'];
        }
        ?>
    </p>

    <p>
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" id="fullname">
        <?php
        if (isset($errors['fullname'])) {
            echo $errors['fullname'];
        } elseif (isset($errors['nomatch'])) {
            echo $errors['nomatch'];
        }
        ?>
    </p>

    <p>
        <label for="birthday">Birthday:</label>
        <input type="date" name="birthday" id="birthday">
        <?php
        if (isset($errors['birthday'])) {
            echo $errors['birthday'];
        } elseif (isset($errors['nomatch'])) {
            echo $errors['nomatch'];
        }
        ?>
    </p>

    <p>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <?php
        if (isset($errors['email'])) {
            echo $errors['email'];
        } elseif (isset($errors['nomatch'])) {
            echo $errors['nomatch'];
        }
        ?>
    </p>
    <p>
        <label for="language">Fluent Language:</label>
        <!-- <input type="text" name="language" id="language"> -->
        <select name="language" id="language" >
           <option> Your Language  </option>
           <option> Azərbaycan dili</option>
           <option> Català</option>
           <option> Español</option>
           <option> vakaViti </option>
           <option>Français</option>
           <option>Gaeilge</option>
           <option>Galego</option>
           <option>ʻŌlelo Hawaiʻi</option>
           <option>Bahasa Indonesia</option>
           <option>Italiano</option>
           <option>Bahasa Melayu</option>
           <option>Português</option>
           <option>Gagana Sāmoa</option>
           <option>Basa Sunda</option>
           <option>Türkmençe</option>
           <option >Türkçe</option>
           <option>Татарча</option>
           <option>Ўзбек</option>
           <option>Vèneto</option>
           <option>Walon</option>

           </select>

        <?php
        if (isset($errors['language'])) {
            echo $errors['language'];
        } elseif (isset($errors['nomatch'])) {
            echo $errors['nomatch'];
        }
        ?>
    </p>


    <p>
        <input type="submit" name="register" id="register" value="Create Account">
        <input type="submit" name="cancel" id="cancel" value="Cancel">
    </p>
</form>
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
