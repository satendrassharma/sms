<?php
session_start();
if(isset($_SESSION['login'])){
    header('location:../index.php');
}
include "../lib/database.php";
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
                <form action="" method='post'>
                    <div class="form-group">
                        <label for="">username</label>
                        <input class="form-control" type="text" name="username" placeholder="enter username">
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input class="form-control" type="email" name="email" placeholder="enter email">
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input class="form-control" type="password" name="password" placeholder="enter password">
                    </div>
                    <div class="form-group">
                        <label for="">confirm password</label>
                        <input class="form-control" type="password" name="confirmpassword" placeholder="reenter password">
                    </div>

                    <div class="form-group text-center">
                        <input class=" form-control btn btn-success" type="submit" name="submit" value="register">
                        
                    </div>
                    <div class="form-group text-center">
                        <a href="login.php">already register login here!!</a>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['submit'])){
        if(isset($_POST['username']))
         $username=$_POST['username'];
        if(isset($_POST['email']))
         $email=$_POST['email'];
        if(isset($_POST['password']))
         $password=$_POST['password'];
        if(isset($_POST['confirmpassword']))
         $confirmpassword=$_POST['confirmpassword'];
         if($password==$confirmpassword){
             $sql="insert into admin(username,email,password) values('$username','$email','$password')";
             $result=$db->insert($sql);
             if($result){
                 echo"data inserted successfully";
             }
         }
        

    }
}




?>