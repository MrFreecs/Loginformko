<?php require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
  <!-- Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <link rel="stylesheet" href="style.css">  

  <link rel="stylesheet" href="signup.css">  

  <title>Login</title>
</head>

<body>
    <style>
        body{
            background-image: url("Image/bck.JPG");
        }
    </style>
    
    <div class="cover">
    <div class="Login"></div>
    <div class="ok">     

        <div class="logo">
            <img src="Image/gold.png" width="290px" height="150px"></div>   
          <form action="login.php" method="post">
            <h3 class="text-center">Login</h3>
            
            <?php if(count ($errors) > 0): ?>
              <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                  <li><?php echo $error; ?></li>
                <?php endforeach; ?>
              </div> 
            <?php endif; ?>

            <div class="form-group">
            <h4><label for="username">Full Name or Email</label/h4>
              <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
            </div>        
            <div class="form-group">
            <h4><label for="password">Password</label/h4>
              <input type="password" name="password" class="form-control form-control-lg">
            </div>  
            <div class="form-group">
            <button type="submit" name= "login-btn" class="btn btn-primary btn-block btn-1g"><h4>login</h4</button>
            </div>                              
            <h4><p class="text-center">Not yet a member? <a href="signup.php">Sign In</a/p/h4>
            <h4><p class="text-center">By using this service, you understood and agree to the GoldenBlue  <a href="">Privacy Policy</a> and  <a href="">Terms And Conditions</h4/a/p>.          


            </form>   
        </div>
      </div>
    </div>

</body>

</html>

<!-- 1:09-->