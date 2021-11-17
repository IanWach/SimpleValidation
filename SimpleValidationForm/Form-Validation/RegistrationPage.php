<?php 

 $error =NULL;
  if (isset ($_POST['submit'])){


    //Get From data
     $user = $_POST['username'];
     $mail  = $_POST['email'];
     $pass = $_POST['password'];
     $confirm = $_POST['confirm'];

     
    
 
     if(strlen ($user) < 5 ){
       $error = " Your Username must be at least 5 characters";
       echo $error;
       }
       elseif($pass!=$confirm){
         $error ="The passwords do not match";
         echo $error;
       }
       else{
         //Form is Valid
 
         //Connect to Database
         $db_name="peep";
 
        $mysqli =NEW mysqli ('localhost','root','',$db_name) or die ("error:".mysqli_error($mysqli));
 
         //Clean Data
         $user = $mysqli->real_escape_string($user);
         $mail = $mysqli->real_escape_string($mail);
         $pass = $mysqli->real_escape_string($pass);
         $confirm = $mysqli->real_escape_string($confirm);
         
   
 
         //generate key
         $key = md5( time ().$user);
         $insert=mysqli_query($mysqli,"insert into login  values ('','$user','$mail','$pass','$key') ") or die (mysqli_error($mysqli));
        
         $success=mysqli_query($mysqli,$insert);
         if($insert){
           echo "Successfully inserted";
         }
         else{
           echo "FAILED";
         }
 
         echo $key;
         
       }
  }
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <title>Form Validation</title>
  </head>
  <body>
    <div class="container">
      <div class="content">
        <div class="logo">
          <img src="images/logo.svg" alt="" />
        </div>
        <div class="image"></div>
        <div class="text">
          Start for free & get <br />
          attractive offers today !
        </div>
      </div>
      <form  action="RegistrationPage.php" method="POST" >
        <div class="social">
          <div class="title">Get Started</div>
          <div class="question">
            Already Have an Account? <br />
            <span>Sign In</span>
          </div>

          <div class="btn">
            <div class="btn-1">
              <img
                src="https://img.icons8.com/color/30/000000/google-logo.png"
              />
              Sign Up
            </div>
            <div class="btn-2">
              <img
                src="https://img.icons8.com/ios-filled/30/ffffff/facebook-new.png"
              />
              Sign Up
            </div>
          </div>

          <div class="or">Or</div>
        </div>

        <!-- /** 
          * ! user name Input here
         **/ -->

        <div>
          <label for="username">User Name</label>
          <i class="fas fa-user"></i>
          <input
            type="text"
            name="username"
            id="username"
            placeholder="Wazo Moja"
          />
          <i class="fas fa-exclamation-circle failure-icon"></i>
          <i class="far fa-check-circle success-icon"></i>
          <div class="error"></div>
        </div>

        <!-- /** 
          * ! Email Input here
         **/ -->

        <div>
          <label for="email">Email</label>
          <i class="far fa-envelope"></i>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="wazomojzfcs@gmail.com"
          />
          <i class="fas fa-exclamation-circle failure-icon"></i>
          <i class="far fa-check-circle success-icon"></i>
          <div class="error"></div>
        </div>

        <!-- /** 
          * ! Password Input here
         **/ -->

        <div>
          <label for="password">Password</label>
          <i class="fas fa-lock"></i>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Password here"
          />
          <i class="fas fa-exclamation-circle failure-icon"></i>
          <i class="far fa-check-circle success-icon"></i>
          <div class="error"></div>
        </div>

        <!--Confirm Password-->

        <div>
            <label for="password">Confirm Password</label>
            <i class="fas fa-lock"></i>
            <input
              type="password"
              name="confirm"
              id="confirm"
              placeholder="Re enter Password here"
            />
            <i class="fas fa-exclamation-circle failure-icon"></i>
            <i class="far fa-check-circle success-icon"></i>
            <div class="error"></div>
          </div>
  

        <button type="submit" name="submit" id="submit">Submit</button>
        <h3 style="padding: 30px;"><a style= "color: rgb(11, 103, 241); text-decoration: none" href='login.html'>Have an account?</a></h3>
      </form> 
    </div>
    <?php 
    echo $error;
  //echo "heloo 1";
    ?>
  </body>
  <script src="main.js"></script>
</html>