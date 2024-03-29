<?php
include('../Models/database.php');
session_start();
$incorrectPassword = false;
$incorrectUsername = false;
if (isset($_POST["btn"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE userName='$username'";
  $result = mysqli_query($conn, $query);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stored_hashed_password = $row['password'];

    if (password_verify($password, $stored_hashed_password)) {
      session_start();

      $_SESSION['username'] = $username;
      // Check if a return URL is stored in the session
      if (isset($_SESSION['return_to'])) {
        $returnTo = $_SESSION['return_to'];
        unset($_SESSION['return_to']); // Remove the stored URL to avoid unwanted redirects
        header("Location: " . $returnTo);
      } else {
        // If there's no stored URL, you can provide a default URL.
        header("Location: home.php");
      }
      exit();
    } else {
      $incorrectPassword = true;
    }
  } else {
    $incorrectUsername = true;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/login.css">
  <link rel="icon" href="../../img/Logo_icon2/1.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

</head>

<body>
  <!--header-->
  <section class="nail-header">
    <div class="nail-miniluxe header_pink">
      <div class="container-fluid text-white text-center" style="height: 30px; line-height:30px;">
        <p>FREE SHIPPING ON ORDERS $50+</p>
      </div>
    </div>
    </div>

    <section class="nail-header">
      <div class="container-fluid py-3">
        <div class="row">
          <div class="col-sm d-none d-md-block">
            <div class="row">
              <div class="col-md-5 "><a href="book_now.php"><button type="button" class="text-white btn-book-now">BOOK
                    NOW</button></a></div>
              <div class="col-md-6 pt-1 p-0 lh-lg"><a href="service.php" style="text-decoration: none; color: black">
                  SERVICE</a></div>
            </div>
          </div>
          <div class="col-sm pt-1 fs-2 text-center">
            <a href="home.php" style="text-decoration: none; color: black;font-size: 40px"><span>NAIL SPA</span></a>
          </div>
          <div class="col-sm d-none d-md-block">
            <div class="row">
              <div class="col-sm">
              </div>
              <div class="col-sm" style="display: flex">
                <div class="col-sm">
                  <a href="" style="text-decoration: none; color: black">
                    <p class="m-0 p-0 fs-5"><i class="bi bi-person-circle"></i></p>
                  </a>
                </div>
              </div>
              <div class="col-sm">
                <a href="" style="text-decoration: none; color: black">
                  <p class="m-0 p-0 fs-5"><i class="bi bi-search"></i></p>
                </a>
              </div>
              <div class="col-sm">
                <a href="" style="text-decoration: none; color: black">
                  <p class="m-0 p-0 fs-5"><i class="bi bi-bag"></i></p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="nail-mainmenu" style="display: flex; justify-content: center; align-items: center;">
      <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item px-2">
                <a class="nav-link dropdown-toggle" href="shop.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                <ul class="dropdown-menu">
                  <?php
                  $sql = "SELECT * FROM Categories";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo '<li class="dropdown-item">';
                      echo '<a class="nav-link" href="Shop.php?CategoryID=' . $row['CategoryID'] . '">' . $row['CategoryName'] . '</a>';
                      echo '</li>';
                    }
                  }
                  ?>
                </ul>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link" aria-current="page" href="library.php">Nairl Art</a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link" aria-current="page" href="policies.php">Policies</a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link" aria-current="page" href="our_difference.php">Our difference</a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link" aria-current="page" href="about_us.php">About Us</a>
              </li>

              <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  More
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="location.php">Location</a></li>
                  <li><a class="dropdown-item" href="contact_us.php">Contact us</a></li>
                  <li><a class="dropdown-item" href="FAQ.php">FAQ</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
    </div>

    <hr>
    <!-- body -->
    <div class="content-for-layout focus-one">
      <section style="background-color: #ffffff">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="login-contrainer">
            <div class="booking-login">
              <div class="text-black                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               px-3 py-4 p-md-5 mx-md-4">
                <h2>Do you want to Book an Appointment?</h2>
                <a href="book_now.php"><button type="button" class="btn-book-now text-white">Book Now</button></a>
              </div>
            </div>
            <div class="customer-login">
              <div>

                <form action="" method="POST">
                  <h2>Do you want to buy our Products?</h2>
                  <div class="form-outline mb-4">
                    <input type="text" id="username" class="form-control" name="username" placeholder="Username" required />
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" required />
                    <br>
                    <a class="text-muted text-black" href="forgotpassword.php">Forgot password?</a>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input class="btn-book-now text-white mb-3" type="submit" name="btn" value="Sign in" />
                  </div>

                </form>

                <div class="d-flex align-items-center justify-content-center pb-4">
                  <p class="mb-0 me-2">Don't you have an account?</p>
                  <a class="btn-book-now text-white" href="register.php">Create acount</a><br>
                </div>

                <div class="d-flex align-items-center justify-content-center pb-4">
                  <a class="text-muted" href="#!">Manage subscriptions</a>
                </div>
              </div>
            </div>

          </div>
      </section>
    </div>

    <!--footer-->
    <footer class="footer" style="color: #fff">
      <section class="nail-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5 my-3">
              <h3 class="p-0 m-0"><span class="fs-1">NAIL SPA</h3>
              <p class="p-0 m-0">Get email updates on all things nails, evens, products and</p>
              <p class="p-0 m-0">launches. No strings attached-you can unsubscribe at any time</p>
              <p>
              <div class="mb-3" style="display:flex">
                <input type="text" class="form-control" placeholder="Your email" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button style="margin-left: 10px;" class=" btn-outline-secondary btn-light caption" type="button" id="button-addon2">Subscribe</button>
              </div>
              </p>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 my-4">
              <div class="row">
                <div class="col-md-6">
                  <ul style="list-style-type: none;">
                    <li class="my-2"><a href="http://localhost/Project_nailart/MVC/Views/Shop.php?CategoryID=1location.php" style="text-decoration: none; color: #fff">SHOP</a></li>
                    <li class="my-2"><a href="service.php" style="text-decoration: none; color: #fff">SERVICES</a></li>
                    <li class="my-2"><a href="location.php" style="text-decoration: none; color: #fff">LOCATIONS</a></li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul style="list-style-type: none;">
                    <li class="my-2"><a href="about_us.php" style="text-decoration: none; color: #fff">ABOUT US</a></li>
                    <li class="my-2"><a href="contact_us.php" style="text-decoration: none; color: #fff">CONTACT US</a></li>
                    <li class="my-2"><a href="FAQ.php" style="text-decoration: none; color: #fff">FAQ</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
    </footer>


    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- <script type="text/javascript" src="./js/home.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
if ($incorrectUsername) {
?>
  <div class="toast show text-center mx-auto" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1000;">
    <div class="toast-header">
      <strong class="me-auto">Error</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body" style='color: red;'>
      Username does not exist.
    </div>
  </div>
<?php
}

if ($incorrectPassword) {
?>
  <div class="toast show text-center mx-auto" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1000;">
    <div class="toast-header">
      <strong class="me-auto">Error</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body" style='color: red;'>
      Password is incorrect.
    </div>
  </div>
<?php
}
?>
<div class="content-for-layout focus-one">
</div>
</body>

</html>