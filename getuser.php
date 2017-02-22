<!DOCTYPE html>
<html>
<head>
<style>
table {
   width: 100%;
   border-collapse: collapse;
}

table, td, th {
   border: 1px solid black;
   padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','poker','terminology_creation');
if (!$con) {
   die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"terminology_creation");
$sql="SELECT * FROM app_translation WHERE language_code = '".$q."'";
echo $sql;
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Langauge Code</th>
<th>Title</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
   echo "<tr>";
   echo "<td>" . $row['language_code'] . "</td>";
   echo "<td>" . $row['title'] . "</td>";
  //  echo "<td>" . $row['email'] . "</td>";
  //  echo "<td>" . $row['DateOfBirth'] . "</td>";
  //  echo "<td>" . $row['fluent'] . "</td>";
   echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
