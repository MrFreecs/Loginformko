<?php

require_once 'vendor/autoload.php';
require_once 'config/constants.php';
require_once 'config/db.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendVerificationEmail($userEmail, $token)
{
    global $mailer;

    $body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify email</title>
</head>
<body>
    <div class="wrapper">
        <p>
          Thank you for signing up on our website. Please click on the link below
          to verify your email.
        </p>
        <a href="http://localhost/USER-VERIFICATION/index.php?token=' . $token . '">
            Verify your email address
        </a>
    </div>
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('Verify your email address'))
      ->setFrom(EMAIL)
      ->setTo($userEmail)
      ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);


if ($result > 0) {
  return true;
} else {
  return false;
}
}

function verifyEmail($token)
{
global $conn;
$sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $user = mysqli_fetch_assoc($result);
  $query = "UPDATE users SET verified=1 WHERE token='$token'";

  if (mysqli_query($conn, $query)) {
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['verified'] = true;
      $_SESSION['message'] = "Your email address has been verified successfully";
      $_SESSION['type'] = 'alert-success';
      header('location: index.php');
      exit(0);
  }
} else {
  echo "User not found!";
}
}

