<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   


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

if (isset($_POST['jobName'])   &&
      isset($_POST['companyName']) &&
      isset($_POST['salary'])     &&
      isset($_POST['city']) &&
      isset($_POST['description']) &&
      isset($_POST['category'])   &&
      isset($_POST['email']))
  {
    $jobName = get_post($conn, 'jobName');
    $companyName     = get_post($conn, 'companyName');
    $salary     = get_post($conn, 'salary');
    $city     = get_post($conn, 'city');
    $description    = get_post($conn, 'description');
    $category      =get_post($conn, 'category');
    $email  = get_post($conn, 'email');
    $query    = "INSERT INTO jobs VALUES" .
      "('$jobName', '$companyName', '$salary', '$city', '$description', '$category', '$email')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

echo <<<_END



    <div class="container">
      <div class="py-5 text-center">
        <!--img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"-->
        <h2>FindMeAJob.ca</h2>
        <p class="lead">Please enter your job posting information below.</p>
      </div>

      <div class="row">
        
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Job Posting</h4>
          <form action="after-post.html" method="post" id="form1" class="needs-validation" novalidate="">
                <div class="mb-3">
                <label for="jobName">Job Title</label>
                <input type="text" name="jobName" class="form-control" id="jobName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid Job Title is required.
                </div>
              </div>
            
              <div class="mb-3">
                <label for="companyName">Company name</label>
                <input type="text" name="companyName" class="form-control" id="companyName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid Company name is required.
                </div>
              </div>
              
            <div class="mb-3">
                <label for="salary">salary</label>
                <input type="text" name="salary" class="form-control" id="salary" placeholder="ex. 50000" value="" required="">
                <div class="invalid-feedback">
                  Valid Salary is required.
                </div>
              </div>

             <div class="mb-3">
                <label for="city">City</label>
                <select class="custom-select d-block w-100" id="city" name="city" required="">
                  <option value="">Choose...</option>
                  <option>Windsor</option>
                  <option>London</option>
                  <option>Toronto</option>
                  </select>
                <div class="invalid-feedback">
                  Valid City name is required.
                </div>
              </div>
         
             <div class="mb-3">
                <label for="description">Job Description</label>
                <textarea id="description" name="description" class="form-control" required="" form="form1"></textarea>
                <div class="invalid-feedback">
                  Valid description is required.
                </div>
              </div>
            
             <div class="mb-3">
                <label for="category">Job Category</label>
                <select class="custom-select d-block w-100" id="category" name="category" required="">
                  <option value="">Choose...</option>
                  <option>Technology</option>
                  <option>Business</option>
                  <option>Marketing</option>
                  <option>Construction</option>
                  <option>Other</option>
                </select>
                 <div class="invalid-feedback">
                  Valid Category is required.
                </div>
              </div>

            <div class="mb-3">
              <label for="email">Email </label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required="">
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            
              
              
            <hr class="mb-4">
            
            
            

            

            
            
            
            
            <button class="btn btn-primary btn-lg btn-block" type="submit">Post Job</button>
            <p align="center" style="padding-top:20%;"><a href="main.html">Home</a></p>
          </form>
        </div>
      </div>

      
    </div>

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
