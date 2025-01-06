<?php
 $insert = false;
if(isset($_POST['fname'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

 if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
    }
  
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];
    
    $sql = "INSERT INTO `restaurant_data`.`signin` (`fname`,`email`, `password`, `password2`) VALUES ('$name', '$email', '$pass', '$pass2');";
     if($con->query($sql) == true){
    //    echo"successfully inserted";
       $insert = true;
     }else{
       echo"ERROR: $sql <br> $con->error";
     }
     $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
   <link rel="shortcut icon" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* General Styles */
body {
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
}
i{
    top: 20px;
    right: 5vw;
    position: absolute;
    font-size: 25px;
  }
.bg{
  width: 100%;
  position: absolute;
  z-index:-1;
  filter: blur(5px);
}
/* Container Styles */
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

/* Login Box Styles */
.Sign-up-box {
  width: 400px;
  padding: 40px;
  background-color: #ffffff;
  box-shadow: 0 10px 15px rgb(250,120,69);
  border-radius: 10px;
}

.Sign-up-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color:rgb(253,57,8);
  text-align: center;
}

/* Input Field Styles */
.user-box {
  position: relative;
  margin-bottom: 30px;
}

.user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #333;
  border: none;
  border-bottom: 1px solid #ccc;
  outline: none;
}

.user-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #999;
  pointer-events:none;
  transition: 0.5s; 
}

.user-box input:focus ~ label,
.user-box input:valid ~ label {
   top: -20px; 
   left: 0;
   color: rgb(253,57,8);
   font-size: 12px; 
}

/* Submit Button Styles */
.submit-btn {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: rgb(253,57,8);
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: 0.5s;
  margin-top: 40px;
  letter-spacing: 4px;
  border: none;
  background-color: white;
}

.submit-btn:hover {
  background-color: rgb(253,57,8);
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px rgb(253,57,8),
              0 0 25px rgb(253,57,8),
              0 0 50px rgb(253,57,8),
              0 0 100px rgb(253,57,8);
}

.submit-btn span {
  position: absolute;
  display: block;
} 

.submit-btn span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, rgb(253,57,8));
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% { left: -100%; }
  50%, 100% { left: 100%; }
}
.loge-in-option{
  text-align: center;
  padding: 4px;
  margin: 5px;
}
.loge-in-option p{
  color: orange;
  text-decoration: none;
}
</style>
<body>
  <img class="bg" src="bg.png">
  <div>
    <i class="fa fa-xmark" id="hdcross"></i> 
  </div>
  <form action="Sign-in.php" method="post">  
    <div class="container">
        <div class="Sign-up-box">
          <h2>Sign Up</h2>
            <div class="user-box">
              <input type="text" name="fname" pattern="[A-Za-z\s]+" maxlength="10" required/>
              <label for="fname">Enter Full Name</label>
            </div>
            <div class="user-box">
              <input type="email" name="email" title="Email address consists of an email prefix and an email domain. Ex:example@mail.com" required/>
              <label for="email"> Enter Email id</label>
            </div>
            <div class="user-box">
              <input type="password" name="password"  pattern="(?=.*\d)(?=.*[A-Za-z]).{8,}" title="must contain at least one uppercase ,one lowercase letter, and at least 8 or more characters" required>
              <label for="pass"> Create Password</label>
            </div>
            <div class="user-box">
                <input type="password" name="password2"  pattern="(?=.*\d)(?=.*[A-Za-z]).{8,}" title="must contain at least one uppercase ,one lowercase letter, and at least 8 or more characters" required>
                <label for="re-pass">Confirm Password</label>
              </div>
              <button type="submit" class="submit-btn">Submit</button>
            <div class="loge-in-option">
            <a href="http://localhost/cwh/login.php"><p>Already have an account? log in</p></a>
            </div>
        </div>
    </div>
  </form>
      <script>
        // Close button functionality
        document.getElementById("hdcross").addEventListener("click", function() {
          history.back(); // Navigates to the previous page
        });
      </script>
</body>
</html>