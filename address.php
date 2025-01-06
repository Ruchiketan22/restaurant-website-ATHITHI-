<?php
 $insert = false;
if(isset($_POST['pincode'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

 if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
    }
//   echo "success connection to db";
     $city = $_POST['city'];
     $pincode = $_POST['pincode'];
     $area = $_POST['area'];
     $street = $_POST['street'];
    
     $sql = " INSERT INTO `restaurant_data`.`address` (`city`,`pincode`, `area`, `street`) VALUES ('$city', '$pincode', '$area', '$street');";

     if($con->query($sql) == true){
       //echo"Address Updated";
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
    <style>
         .x i{
           top: 20px;
           right: 5vw;
           position: absolute;
           font-size: 25px;
        }
        .dialog {
    align-items: center;
    border-radius: 25px;
    box-shadow: 0 10px 15px rgb(250, 120, 69);
    display: block;
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
    background-color: rgb(242 92 33 / 85%);
    overflow: auto;
    width: 450px;
    height: 415px;
}
    </style>
</head>
<body>
<div class="x">
     <i class="fa fa-xmark" id="hdcross"></i> 
</div>
      <!--The address dialog --> 
       <div id="address-dialog" class="dialog">
        <div class="dialog-content">
            <h2>Enter Your Address</h2>
            <form id="address-form">
                <div class="user-box">
                <label for="city">City:</label>
                <select id="city" required>
                    <option>Ahemdabad</option>
                    <option>Bhavnagar</option>
                    <option>Gandhinagar</option>
                    <option>Junagadh</option>
                    <option>Jamnagar</option>
                    <option>Rajkot</option>
                    <option>Surat</option>
                </select>
                </div>
                <br><br>
                <div class="user-box">
                <label for="pin-code">Pin Code:</label>
                <input type="text" id="pin-code" name="pin-code" required><br><br>
                </div>
                <div class="user-box">
                <label for="area">Area:</label>
                <input type="text" id="area" name="area" required><br><br>
                </div>
                <div class="user-box">
                <label for="street">Street:</label>
                <input type="text" id="street" name="street" required><br><br>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
        </div>
        <script>
             document.getElementById("hdcross").addEventListener("click", function() {
        history.back();
      });
        </script>
    <script src="javascript.js"></script>
</body>
</html>