<?php
require_once ("header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>untitled</title>
        <style>
               label {
            display: inline-block;
            width: 10em;
            text-align: right;
            margin-top: 100px;

        }
            </style>
	</head>
	<body><center>
	
<label for='formCountries[]'>Translate From:</label>
<select> 
    <option value="eng">English</option>
    <option value="vi">Vietnamese</option>
    <option value="es">Spanish</option>
    <option value="pl">Polish</option>
    <option value="ru">Russia</option>
    <option value="th">Thai</option>
</select>

 <input type="text" id="word" value="" style="width:198px; height:100px;margin-left: 20px;">  
<br><br>
<label for='formCountries[]'>Translate To:</label>
<select> 
    <option value="eng">English</option>
    <option value="vi">Vietnamese</option>
    <option value="es">Spanish</option>
    <option value="pl">Polish</option>
    <option value="ru">Russia</option>
    <option value="th">Thai</option>
</select>

 <input type="text" id="word1" value="" style="width:198px; height:100px;margin-left: 20px;">  

<br><br>
 <p>
        <input type="submit" name="translate" id="translate" value="Translate">
    </p>


</center>
	</body>

</html>



