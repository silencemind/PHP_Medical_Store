
<?php


include "db.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Document</title>

    <link href="signin.css" rel="stylesheet">

</head>

<body>


<!-- <div class="container">
<main class="form-signin">
<form>
  <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
  <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

  <div class="form-floating">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
</form>
</main>
</div> -->



  <div class="container-fluid">
      <div class="row no-gutter">

          <div class="col-md-6 d-none d-md-flex bg-image">
            <img src="assets/login_image.jpg" width="1024" height="720"/>
          </div>



          <div class="col-md-6 bg-light">
              <div class="login d-flex align-items-center py-5">


                  <div class="container">
                      <div class="row">
                          <div class="col-lg-10 col-xl-7 mx-auto">
                              <h3 class="display-4">NMS!</h3>
                              <p class="text-muted mb-4">Login Page</p>
                              <form action="" method="POST">
                                  <div class="form-group mb-3">
                                      <input id="inputEmail" type="email" name="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                  </div>
                                  <div class="form-group mb-3">
                                      <input id="inputPassword" type="password" name="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                  </div>
                                  <div class="custom-control custom-checkbox mb-3">
                                      <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                      <label for="customCheck1" class="custom-control-label">Remember password</label>
                                  </div>
                                  <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>

                              </form>
                          </div>
                      </div>
                  </div>

              </div>
          </div>

      </div>
  </div>



</body>
</html>

<?php
  if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "SELECT email,password FROM users WHERE email='".$uname."' AND password='".$password."'";
        echo "$uname , $password";
        $result = mysqli_query($db,$sql_query);
#        $count = $row['cntUser'];

        if( mysqli_num_rows($result) >0  ){

            while(  $row = mysqli_fetch_assoc($result))
            {
              $_SESSION['email'] = $row['email'];
              $_SESSION['password']= $row['password'];

               if ( ($_SESSION['email'] == $uname) && ($_SESSION['password'] == $password ) ){

                 header("location: home.php");
               }

               else {
                 echo "INVALID";
               }
            }
        }


    }

}

?>
