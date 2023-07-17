<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php

session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php"><strong>iForum</strong></a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
      </li>
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
          data-bs-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </li>
    </ul>';

if ($_SESSION["loggedin"] && $_SESSION["loggedin"] == true) {
  echo '<form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <p class="text-light my-2 mx-0 ">' . $_SESSION['signup_email'] . '</p>
      <a role=button href="partials/_logout.php" class="btn btn-danger mx-2" data-bs-target="#signupModal">Logout</a>
      </form>';
} else {
  echo '
    <div class="float-left text-center">
    <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
    <button class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
    </div>';
}

echo '</div>
  </div>
</nav> ';

include("partials/_loginModal.php");
include("partials/_signupModal.php");

if (isset($_GET['signup_success']) && $_GET['signup_success'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Congratulations!</strong> You are Successfully create your account.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} else if (isset($_GET['!signup_success']) && $_GET['signup_success'] == "false") {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Congratulations!</strong> You are Successfully create your account.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
