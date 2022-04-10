<?php 
include_once('connection.php');

    if(isset($_POST['submit']))
    {  
        try
        {
            $full_name = $_POST['full_name'];
            $address = $_POST['address'];
            $name = $_POST['name'];
            $password = md5($_POST['password']);
            $birth_date = $_POST['birth_date'];
            $sex = $_POST['sex'];

            $query = "INSERT INTO user (full_name, address, name, password, birth_date, sex) VALUES 
            ('$full_name', '$address', '$name', '$password', '$birth_date', '$sex')";
            $execute = $conn->query($query);
            $message = "Register Successfully";
        }
        catch(Exception $ex)
        {
           echo $ex->getMessage(); 
        }

    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WP-Login</title>
    <link rel="stylesheet" href="asset/css/styles.css">
</head>

<body>
    <div class="container mt-5">
        <form class="card" action="" method="post">
           <div class="card-body">
           <h3 class='text-center text-primary'>Fill for Registration</h3>
           <h5 class='text-center text-success'>
               <?php
                    if(isset($message)){echo $message;}
               ?>
           </h5>
            <div class="row my-2">
                <label class="col-md-3" for="">Full Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="full_name" id="">
                </div>
            </div>
            <div class="row my-2">
                <label class="col-md-3" for="">Address</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="address" id="">
                </div>
            </div>
            <div class="row my-2">
                <label class="col-md-3" for="">User Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="name" id="">
                </div>
            </div>
            <div class="row my-2">
                <label class="col-md-3" for="">Password</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="password" id="">
                </div>
            </div>
            <div class="row my-2">
                <label class="col-md-3" for="">Date of Birth</label>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="birth_date" id="">
                </div>
            </div>
            <div class="row my-2">
                <label class="col-md-3" for="">Select Sex</label>
                <div class="col-md-7">
                    <select id="" name="sex">
                        <option value="Male">Male</option>
                        <option value="Male">Female</option>
                    </select>
                </div>
            </div>
            <div class="row my-2">
                <label class="col-md-3" for=""></label>
                <div class="col-md-7">
                    <input type="submit" class="btn btn-info" name="submit" value="Submit">
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-4">
                    <a href="login.php">If you Register yet Please Login
                        
                    </a>
                </div>
                <div class="col-md-4"></div>
            </div>
           </div>
        </form>
    </div>

    <script src="asset/js/scripts.js"></script>
</body>

</html>