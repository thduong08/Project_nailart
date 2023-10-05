<?php
include('../Models/database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="icon" href="../../img/logo/1.png" type="image/x-icon">
    <link rel="stylesheet" href="css/register.css">
  <title>Create Account</title>
  </head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color: #dca8a8;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><span class="text-warning h1">Mini</span>Luxe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link " href="#services">About Us</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link"><i class="bi bi-person-circle"></i></a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link"><i class="bi bi-search"></i></a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link"><i class="bi bi-bag"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="content-for-layout focus-one">
      <div id="wropper bg-success" style="background-color: #ffffff;">
          <div class="regiter-container" >
              <div class="row justify-content-around" >
                  
                  <h1 class="text-center text-uppercase h3 py-1 ">Create Acount</h1>
                  <form action="" class="col-md-5 bg -light p-3 my-1" method="POST">

                  <div class="form-group mb-4">
                      <input type="text" name="firstname"
                      id="firstname" class="form-control" placeholder="First name" required>
                  </div>
                  <div class="form-group mb-4">
                      <input type="text" name="lastname"
                      id="lastname" class="form-control" placeholder="Last name" required>
                  </div>
                  <div class="form-group mb-4">
                      <input type="email" name="email"
                      id="email" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="form-group mb-4">
                      <input type="text" name="phone"
                      id="phone" class="form-control" placeholder="Phone" required>
                  </div>
                  <div class="form-group mb-4">
                      <input type="text" name="username"
                      id="username" class="form-control" placeholder="Username" required>
                  </div>
                  <div class="form-group mb-4">
                      <input type="password" name="password"
                      id="password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="form-group mb-4">
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                  </div>
                  <div class="text-center pt-1 mb-1 pb-1">
                        <input class="create-register text-white mb-3" type="submit" name="btn"
                          value="Create"/>
                  </div>
                  </form>
                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Do you have an account?</p>
                    <a class="create-register text-white" href="login.php">Sign in</a><br>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </nav>

    <footer class="py-3 " style="background-color: #dca8a8;">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item">
          <a href="#" class="nav-link px-2 text-muted">BOOK NOW</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link px-2 text-muted">SERVICES</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link px-2 text-muted">NAIL ART</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link px-2 text-muted">NAIL CARE</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link px-2 text-muted">ABOUT</a>
        </li>
      </ul>
      <p class="text-center text-muted">
        58 Lê Thanh Nghị, Hai Bà Trưng, Hà Nội
      </p>
      <p class="text-center text-muted">© 2023 Miniluxe, Inc</p>
    </footer>

<?php

  if (isset($_POST["btn"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

     // Check if password and confirm password match
     if ($password !== $confirm_password) {
      echo "<script>alert('Passwords do not match. Please re-enter passwords.');</script>";
      $conn->close();
      exit();
    }

    // Check username exist
    function checkUsername($conn, $username) {
        $check_username_query = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($check_username_query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $stmt->close();
            return true; 
        } else {
            $stmt->close();
            return false; 
        }
    }
    
    // Check mail exist
    function checkEmail($conn, $email) {
        $check_email_query = "SELECT * FROM users WHERE email=?";
        $stmt = $conn->prepare($check_email_query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $stmt->close();
            return true; 
        } else {
            $stmt->close();
            return false; 
    }
  }
    
    // Check phone exist
    function checkPhone($conn, $phone) {
        $check_phone_query = "SELECT * FROM users WHERE phone=?";
        $stmt = $conn->prepare($check_phone_query);
        $stmt->bind_param("s", $phone);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $stmt->close();
            return true; 
        } else {
            $stmt->close();
            return false;
        }
    }
    
    $usernameExists = checkUsername($conn, $username);
    $emailExists = checkEmail($conn, $email);
    $phoneExists = checkPhone($conn, $phone);
    
    if ($usernameExists) {
        echo "<script>alert('Username already exists. Please choose another username.');</script>";
        $conn->close();
        exit();
    }
    
    if ($emailExists) {
        echo "<script>alert('Email already exists. Please choose another email.');</script>";
        $conn->close();
        exit();
    }
    
    if ($phoneExists) {
        echo "<script>alert('Phone number already exists. Please choose another phone number.');</script>";
        $conn->close();
        exit();
    }


    // check username
    if (strlen($username) < 6 || strlen($username) > 36) {
      echo "<script>alert('Username must be between 6 and 36 characters.');</script>";
      exit();
    }
    if (!ctype_alnum($username)) {
      echo "<script>alert('Username can only contain letters and numbers.');</script>";
      exit();
    }

    // Check password 
    if (strlen($password) < 8 || strlen($password) > 36 || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password) || !preg_match('/\d/', $password)) {
      echo "<script>alert('Password must be between 8 and 36 characters and contain at least one special character and one number.');</script>";
      exit();
    }

    // Password encrypted
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (firstname,lastname,email,phone,username,password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $phone, $username, $hashed_password);

    if ($stmt->execute()) {
      echo "<script>alert('Registered successfully!');</script>";
    } else {
      echo "<script>alert('ERROR: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
  }
  ?>
</body>

</html>