<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="../css/bootstrap.min.css" rel="stylesheet">


</head>
<body class="text-center">
<h2>Business Jobs</h2>

<?php // sqltest.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);



 

  


  $query  = "SELECT * FROM jobs WHERE category='Business'";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;

  echo "<form action='sqltest.php' method='post'>";
 echo <<<_END
 
  <table class="table"><thead><tr><th>Job Title</th><th>Company Name</th><th>Salary</th><th>City</th><th>Description</th><th>Category


</th><th>Email</th></tr></thead>
_END;

for ($j = 0 ; $j < $rows ; ++$j)  {   

$result->data_seek($j);

$row = $result->fetch_array(MYSQLI_NUM);

echo "<tr>";

    for ($k = 0 ; $k < 7 ; ++$k)
 echo "<td>$row[$k]</td>";

$k = $k - 1; 
echo <<<_END
<td> 



</td>
_END;

  echo "</tr>";  



} 
echo "</form>";

echo "<table>";


//echo <<<_END
//<form action='sqltest.php' method='post'>
//<input type='checkbox' name='main_check' ></form>
//_END;


  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>

</body>
<footer><a href="main.html">Home</a></footer>
</html>
