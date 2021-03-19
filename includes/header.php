<?php 
  //By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
  include_once 'session.php' 
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <title>Attendance - <?php echo $title; ?></title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">IT Conference</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav me-auto">
        <a class="nav-link" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="viewrecords.php">View Attendees</a>
      </ul>

      <div class="navbar-nav">
        <?php  
          if(!isset($_SESSION['userid'])) {
        ?>
          <a class="nav-link" href="login.php">Login</a>
        <?php } else { ?>
          <a class="nav-link" href="#">Hello <?php echo $_SESSION['username'] ?>!</a>
          <a class="nav-link" href="logout.php">Logout</a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>
<div class="container">


