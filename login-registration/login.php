<?php 
include_once('connection.php');

    if(isset($_POST['submit']))
    {  
        try
        {
            $name = $_POST['name'];
            $password = md5($_POST['password']);

            $query = "SELECT count(*) as count FROM user WHERE name='$name' AND password='$password'";
            $result = $conn->query($query)->fetch();
            // print_r($result);exit;
            if($result['count'] > 0)
            {
                $_SESSION['userIsLogged'] = 1;
                header('Location: index.php');
            }
            else
            {
                $message = "User or Password not Match";
            }
            
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
           <h3 class='text-center text-primary'>Please Login Here</h3>
           <?php if(isset($message)){echo $message;} ?> 
           <?php if(!isset($_SESSION['userIsLogged'])){?> 
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
                <label class="col-md-3" for=""></label>
                <div class="col-md-7">
                    <input type="submit" class="btn btn-info" name="submit" value="Login">
                </div>
            </div>
            <?php } ?>
           </div>
        </form>
    </div>

    <script src="asset/js/scripts.js"></script>
</body>

</html>