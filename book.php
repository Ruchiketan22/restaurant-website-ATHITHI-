<?php
 $insert = false;
if(isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

 if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
    }
  
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    
    $sql = " INSERT INTO `restaurant_data`.`book_table` (`name`,`email`, `date`, `time`) VALUES ('$name', '$email', '$date', '$time');";

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
.Sign-up-box {
  width: 400px;
  padding: 40px;
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 10px 15px rgb(250,120,69);
  

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
    
    float: left;
    padding-right: 16px;    
    font-size: larger;  
}

/* Submit Button Styles */
.submit-btn {
  align-items: center;
  display: inline-block;
  padding: 10px 20px;
  color:rgb(253,57,8);
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: 0.5s;
  letter-spacing: 4px;
  border: none;
  background-color: white;
}

.submit-btn:hover {
  background-color:rgb(253,57,8);
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px rgb(253,57,8),
              0 0 25px rgb(253,57,8),
              0 0 50px rgb(253,57,8),
              0 0 100px rgb(253,57,8);
}

/* .submit-btn span {
  position: absolute;
  display: block;
} 

.submit-btn span:nth-child(1){
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
} */
</style>

<body>
  <img class="bg" src="bg.png">
  <div>
    <i class="fa fa-xmark" id="hdcross"></i> 
  </div>
     <?php
      if($insert==true){
       echo "<p>Your table has been booked</p>";
      }
     ?>
    <div id="book_now">
    <form action="book.php" method="post">
    <div class="container">
        <div class="Sign-up-box">
          <h2>Book your table</h2>
            <div class="user-box">
              <label for="name">Name</label>
              <input type="text" name="name" pattern="[A-Za-z\s]+" required>
            </div>
            <div class="user-box">
                <label for="email">Email id</label>
              <input type="email" name="email" title="Email address consists of an email prefix and an email domain. Ex:example@mail.com" required>
            </div>
            <div class="user-box">
                <label for="date">Date</label>
              <input type="date" name="date" placeholder="dd/mm/yyyy" value="" required>
            </div>
            <div class="user-box">
                <label for="time">Time</label>
                <input type="time" name="time"  pattern="hh-mm-ss" placeholder="hh-mm-ss" required>
              </div>
              <button type="submit" class="submit-btn">Book Now</button>
            </div>
            </div>
          </form>
        </div>
      <script src="javascript.js"></script>
</body>
<script>
  // Close button functionality
  document.getElementById("hdcross").addEventListener("click", function() {
    history.back(); // Navigates to the previous page
  });
</script>
</html>