<?php 
  $title = 'User Login';

  require_once 'includes/header.php';
  require_once 'db/conn.php';

  // check if form submitted
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // define POST variables
    $email = $_POST['email'];
    $password = $_POST['password'];
    $new_password = md5($password);
    // var_dump($email, $new_password); exit;

    // check for existing user
    $result = $user->getUser($email, $new_password);
    // var_dump($result); exit;
    // if no user, send error message 
    if(!$result) {
      echo '<div class="alert alert-danger">Email or password is incorrect. Please try again. </div>';
    // if the user exists, define session variables and redirect
    } else {
      // var_dump($email); 
      // var_dump($password); 
      // var_dump($result['username']); 
      // exit;
      // var_dump($email, $password, $result['username']); exit;
      $_SESSION['email'] = $email;
      $_SESSION['username'] = $result['username'];
      $_SESSION['userid'] = $result['id'];
      header('Location: viewrecords.php');
    }
  }
?>

<h1 class="text-center"><?php echo $title ?></h1>

<!-- Converting characters into entities are often used to prevent browsers from using it as an HTML element -->
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

    <div class="mb-3">
      <label for="email" class="form-label">Email *</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php if($_SERVER['REQUEST_METHOD'] === 'POST') echo $_POST['email']; ?>">
    </div>

    <div class="mb-3">
      <label for="password">Password: * </label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
  
    <div class="d-grid gap-2">
      <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
    </div>  
  <br>
  <a href="#">Forgot Password</a>
</form>
<br>
<br>
<br>
<br>

<?php include_once 'includes/footer.php' ?>