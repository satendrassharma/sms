<?php
session_start();
//echo $_SESSION['DOCUMENT_ROOT'];
include "../lib/database.php";
// header('Content-Type: application/pdf');
// // It will be called downloaded.pdf
// header('Content-Disposition: attachment; filename="downloaded.pdf"');
// // The PDF source is in original.pdf
// readfile('original.pdf');
//echo $_SERVER['PHP_SELF'];
$db=new database();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../inc/bootstrap.min.css">
    <link rel="stylesheet" href="../inc/login.css">
    <title>login</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>student management sytem</p>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row form-wrapper">
            <div class="col-12 col-lg-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">username</label>
                        <input class="form-control" type="text" name="username" placeholder="enter username">
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input class="form-control" type="password" name="password" placeholder="enter password">
                    </div>
                    <div class="form-group text-center">
                        <input class=" form-control btn btn-success" type="submit" name="submit" value="login"    
                    </div>
                    <div class="form-group text-center">
                       <a href="register.php">register first!</a>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
        if(isset($_POST['username']))
            $username=$_POST['username'];
        if(isset($_POST['password']))
            $password=$_POST['password'];
        if(!empty($username) && !empty($password)){
            $sql="select * from admin where username='$username' and password='$password'";
            //echo $sql;
            $result=$db->select($sql);
           if($result){
               $_SESSION['login']=true;
              
               header('location:../index.php');
           }
            //echo $row['email'];
        }

    }

?>