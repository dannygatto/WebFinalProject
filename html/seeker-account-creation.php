<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">



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

if (isset($_POST['firstName'])   &&
      isset($_POST['lastName'])    &&
      isset($_POST['email']) &&
      isset($_POST['adrress'])     &&
      isset($_POST['country']) &&
      isset($_POST['province']) &&
      isset($_POST['postalCode']) &&
      isset($_POST['password']))
  {
    $firstName   = get_post($conn, 'firstName');
    $lastName    = get_post($conn, 'lastName');
    $email       = get_post($conn, 'email');
    $adrress     = get_post($conn, 'adrress');
    $country     = get_post($conn, 'country');
    $province    = get_post($conn, 'province');
    $postalCode  = get_post($conn, 'postalCode');
    $password    = get_post($conn, 'password');
    $query    = "INSERT INTO seekers VALUES" .
      "('$firstName', '$lastName', '$email', '$adrress', '$country', '$province', '$postalCode', '$password')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

echo <<<_END

    <div class="container">
      <div class="py-5 text-center">
        <!--img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"-->
        <h2>FindMeAJob.ca</h2>
        <p class="lead">Please enter your personal information below to complete your account creation.</p>
      </div>

      <div class="row">
        
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Job Seeker Creation</h4>
          <form action="seeker-account-creation.php" method="post" class="needs-validation" novalidate="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            

            <div class="mb-3">
              <label for="email">Email </label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" name="adrress" class="form-control" id="address" placeholder="1234 Main St" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <input type="text" name="country" class="form-control" id="country" required="">
                <div class="invalid-feedback">
                Please enter your Country.
              </div>
   </div>
              <div class="col-md-4 mb-3">
                <label for="Province">Province</label>
                <input type="text" name="province" class="form-control" id="province">
                <div class="invalid-feedback">
                  Please provide a valid Province.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="postalCode">Postal Code</label>
                <input type="text" name="postalCode" class="form-control" id="postalCode">
                <div class="invalid-feedback">
                  postal code code required.
                </div>
              </div>
            </div>
         
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" id="password">
                <div class="invalid-feedback">
                  password required.
                </div>
              </div>
          
            <hr class="mb-4">
            
            
            

            

            
            
            
            
            <button class="btn btn-primary btn-lg btn-block" type="submit">Create Account</button>
            <p align="center" style="padding-top:15%;"><a href="main.html">Home</a></p>
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
    <script src="../../dist/js/bootstrap.min.js"></script>
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
