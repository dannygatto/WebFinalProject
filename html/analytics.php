<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 

    <title>FindMeAJob Data</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/cover.css" rel="stylesheet">
  </head>

  <body class="text-center">

<?php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  $tech = "SELECT * FROM jobs WHERE category='Technology'";
  $con = "SELECT * FROM jobs WHERE category='Construction'";
  $bus = "SELECT * FROM jobs WHERE category='Business'";
  $mark = "SELECT * FROM jobs WHERE category='Marketing'";
  $other = "SELECT * FROM jobs WHERE category='Other'";

  $cat1 = $conn->query($tech);
  $cat2 = $conn->query($con);
  $cat3 = $conn->query($bus);
  $cat4 = $conn->query($mark);
  $cat5 = $conn->query($other);

  $cat1num = $cat1->num_rows;
  $cat2num = $cat2->num_rows;
  $cat3num = $cat3->num_rows;
  $cat4num = $cat4->num_rows;
  $cat5num = $cat5->num_rows;



  $win = "SELECT * FROM jobs WHERE city='Windsor'";
  $tor = "SELECT * FROM jobs WHERE city='Toronto'";
  $lon = "SELECT * FROM jobs WHERE city='London'";

  $cat7 = $conn->query($win);
  $cat8 = $conn->query($tor);
  $cat9 = $conn->query($lon);

  $cat7num = $cat7->num_rows;
  $cat8num = $cat8->num_rows;
  $cat9num = $cat9->num_rows;



echo <<<_END
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">FindMeAJob.ca</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="main.html">Home</a>
            <a class="nav-link" href="about-us.html">About Us</a>
            <a class="nav-link active" href="#">Data Analytics</a>
           
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
      <h1>Job Analytics</h1>

<div id="piechart"></div>
<div id="piechart1"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChart1);


function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Categories', 'Number of Entries'],
  ['Technology', $cat1num],
  ['Construction', $cat2num],
  ['Business', $cat3num],
  ['Marketing', $cat4num],
  ['Other', $cat5num]
]);

  
  var options = {'title':'Jobs by Category', 'width':550, 'height':400};

  
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

function drawChart1() {
  var data1 = google.visualization.arrayToDataTable([
  ['Categories', 'Number of Entries'],
  ['Windsor', $cat7num],
  ['Toronto', $cat8num],
  ['London', $cat9num]
]);

  
  var options1 = {'title':'Jobs by City', 'width':550, 'height':400};

  
  var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
  chart1.draw(data1, options1);
}
</script>
      

</main>
       
     

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Find a job easier!</p>
        </div>
      </footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
_END;
$result->close();
$result1->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
  </body>
</html>
