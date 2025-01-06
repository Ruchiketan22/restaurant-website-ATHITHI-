<?php
 $insert = false;
if(isset($_POST['username'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

 if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
    }
  
    $username = $_POST['username'];
    $pass = $_POST['password'];
    
    $sql = " INSERT INTO `restaurant_data`.`login` (`username`,`password`) VALUES ('$username', '$pass');";

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
  <title>Login Page</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* General Styles */
body {
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
  background-color: antiquewhite;
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
.login-box {
  width: 400px;
  padding: 40px;
  background-color: #ffffff;
  box-shadow: 0 10px 15px rgb(250,120,69);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: rgb(253,57,8);
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
  <div class="container">
    <div class="login-box">
      <h2>Login</h2>
      <form action="login.php" method="post">
        <div class="user-box">
          <input type="text" name="username" required>
          <label for="username">Username</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required>
          <label for="password">Password</label>
        </div>
        <button type="submit" class="submit-btn">submit</button>
        </a>
        <div class="loge-in-option">
        <p>forgot password?</p>
        <a href="http://localhost/cwh/Sign-in.php"><p>Do not have a account? Sign up</p></a>
        </div>
      </form>
    </div>
  </div>
  <script>
    // Close button functionality
    document.getElementById("hdcross").addEventListener("click", function() {
      history.back(); // Navigates to the previous page
    });
  </script>
</body>
</html>