<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

 <?php 
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);


echo <<<_END



    <div class="container">
      <div class="py-5 text-center">
      
        <h2>FindMeAJob.ca</h2>
        <p class="lead">Search Jobs by category or by city to find the job that works for you!.</p>
      </div>

      <h4 class="mb-3">Search by City</h4>
          
       <a href="london-jobs.php" class="btn btn-lg btn-secondary">London</a>
       <a href="toronto-jobs.php" class="btn btn-lg btn-secondary">Toronto</a>
       <a href="windsor-jobs.php" class="btn btn-lg btn-secondary">Windsor</a>

            

<hr class="mb-4">

          <h4 class="mb-3">Search by Category</h4>
          
       <a href="tech-jobs.php" class="btn btn-lg btn-secondary">Technology</a>
       <a href="business-jobs.php" class="btn btn-lg btn-secondary">Business</a>
       <a href="marketing-jobs.php" class="btn btn-lg btn-secondary">Marketing</a>
       <a href="construction-jobs.php" class="btn btn-lg btn-secondary">Construction</a>
       <a href="other-jobs.php" class="btn btn-lg btn-secondary">Other</a>

       
                






            <hr class="mb-4">
            
           <a href="main.html" style="padding-top:15%;">Home</a> 
            

            

            
            
            
            
       

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
_END;
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

?> 

</body></html>
