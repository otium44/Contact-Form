<?php 

//check if the user come from request

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//Assign variables

$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
$msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);


// Creating Array of Errors

$formErrors = array();

if (strlen($user) <= 3) {
  $formErrors[] = 'Username must be larger than <strong>3</strong> characherts';
}

if (strlen($msg) <= 10) {
  $formErrors[] = 'Message can\'t be less than <strong>10</strong> characherts';
}
if (empty($formErrors)) {

}

 $headers = 'From:' . $email . '\r\n';

if (empty($formErrors)) {

  mail('yasseralibgy@gmail.com', 'Contact form', $msg, $headers);

  $user = '';
  $email = '';
  $phone = '';
  $msg = '';

  $success = '<div class="alert alert-success">Your message has been sent!</div>';

} 

} // if the request is post


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <!-- Font Awesome Link -->
  <script src="https://kit.fontawesome.com/1e6ed09e58.js" crossorigin="anonymous"></script>
  <!-- CSS File -->
  <link rel="stylesheet" href="css/style.css">
  <title>Contact</title>
</head>
<body>
  <div class="container">
    <div class="head">
      <h1>Contact Me</h1>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <!----------------------------------------------------------------->
        
      <?php if (! empty($formErrors)) { ?>
      <div class="alert alert-danger d-flex align-items-center" role="alert">
      <?php
        foreach ($formErrors as $error) :
        echo $error . '<br>';
        endforeach;
      ?>
     </div>
   <?php } ?>
   <?php if(isset($success)) echo $success; ?>
     <!---------------------------------------------------------------->
      <div class="input">
        <i class="fa-solid fa-user" data-class="fa-user"></i>
        <input type="text" placeholder="Type Your Name" name="username" value="<?php if(isset($user)) echo $user; ?>">
      </div>
      <div class="input">
        <i class="fa-solid fa-envelope" data-class="fa-envelope"></i>
        <input type="email" placeholder="Please Type a Valid Email" name="email" value="<?php if(isset($email)) echo $email; ?>">
      </div>
      <div class="input">
        <i class="fa-solid fa-phone" data-class="fa-phone" id="phone"></i>
        <input type="text" placeholder="Type Your Cell Phone" name="phone" value="<?php if(isset($phone)) echo $phone; ?>">
      </div>
      <div class="input">
        <textarea name="message" placeholder="Your Message"><?php if(isset($msg)) echo $msg; ?></textarea>
      </div>
      <button type="submit" id="btn">
        <i class="fa-solid fa-paper-plane"></i>
        Send Message
      </button>
    </form>
  </div>
  <!-- JavaScript File -->
  <script src="js/main.js"></script>
</body>
</html>