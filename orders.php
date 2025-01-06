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
    </style>
</head>
<body>
    <div class="x">
         <i class="fa fa-xmark" id="hdcross"></i> 
       </div>
    <div class="container">
    <div class="orders">
        <h2>Your Orders</h2>
        <div class="div_item">
        <ul id="orders-list"></ul>
        <div class="add-item">
            <label for="food-item">Add More Items:</label>
            <select id="food-item">
                <option>-</option>
                <option value="Dal Bati|200">Dal Bati - ₹200</option>
                <option value="Chole Bhature|350">Chole Bhature - ₹350</option>
                <option value="Rajma Chawal|250">Rajma Chawal - ₹250</option>
                <option value="Rabdi|200">Rabdi - ₹200</option>
                <option value="Handvo|250">Handvo - ₹250</option>
                <option value="Dal Bhat|300">Dal Bhat - ₹300</option>
                <option value="Samosa Chaat|200">Samosa Chaat - ₹200</option>
                <option value="Undhiyu|300">Undhiyu - ₹300</option>
                <option value="Raj Kachori|250">Raj Kachori- ₹250</option>
                <option value="Patra|250">Patra - ₹250</option>
            </select>
        </div>
        <p id="total-price">Total: $0</p>
    </div>
    <button class="add-button" onclick="addItem()">Add</button>

    <button class="add-button" onclick="clearOrders()">Clear Orders</button>
    </div>
    
  
    <div class="billing-info">
        <h3>Bill</h3>
        <div class="div_item">
        <p id="gst-amount" value="13.08">GST and restaurant charges: ₹13.08</p>
        <p id="delivery-amount" value="50">Delivery Fee: ₹50</p>
        </div>
        <h2 id="final-bill">Final Bill: ₹0</h2>
        <br><br>
        <a href="payment.html"><button class="button-29" class="pay">Pay</button></a>
    </div>
    </div>
    <div class="btn-33">
 
    <button class="button-33" onclick="openDialog()">Deliver at  <i class="fa fa-map-marker" ></i></button>
    </div>
   
    <div id="address-dialog" class="dialog">
        <div class="dialog-content">
            <span class="close" onclick="closeDialog()">&times;</span>
            <h2>Enter Your Address</h2>
            <form action="orders.php" method="post" id="address-form">
                <div class="user-box">
                <label for="city" name="city">City:</label>
                <select id="city" name="city" required>
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
                <label for="pincode" name="pincode">Pin Code:</label>
                <input type="text" id="pincode" name="pincode" required><br><br>
                </div>
                <div class="user-box">
                <label for="area" name="area">Area:</label>
                <input type="text" id="area" name="area" required><br><br>
                </div>
                <div class="user-box">
                <label for="street" name="street">Street:</label>
                <input type="text" id="street" name="street" required><br><br>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div> 
    <div class="footer">
        <div class="footer-1">
            <div class="logo">
                <img src="C:\xampp\htdocs\cwh\photos\.vscode\rklogo.png" alt="">
            </div>
            <div>
                <address>
                    <p>Email:Ruket130@gmail.com</p>
                    <p>Silver oak university</p>
                    <p>Miss. Ruchi Ketan,<br>Ahemdabad,Gota <br>India</p>
                </address>
            </div>
        </div>
        <div class="footer-2">
            <img src="C:\xampp\htdocs\cwh\photos\.vscode\rk.png" alt="">
            <h2>Powered by <em>Ruchi Ketan</em></h2>
            <p>&copy;Copyright 2024 <br> All Rights Reserved</p>
        </div>
    </div>
    <script>
    // Close button functionality
            document.getElementById("hdcross").addEventListener("click", function() {
          history.back(); // Navigates to the previous page
        });
    </script>
    <script src="javascript.js"></script>
</body>
</html>  