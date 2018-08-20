<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location:pages/login.php');
}
include "../lib/database.php";
$db=new database();
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sms</title>
    <link rel="stylesheet" href="../inc/bootstrap.min.css">
    <link rel="stylesheet" href="../inc/style.css">
    <link rel="stylesheet" href="../inc/login.css">

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
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 left">
                    <ul>
                        <li><a href="">profile</a></li>
                    </ul>
                </div>
                <div class="col-6 right">
                    <ul>
                        <li><a href="../index.php">home</a></li>
                        <li><a href="../index.php?action=logout">logout</a></li>
                        <li><a href="add.php">add</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row form-wrapper">
            <div class="col-12 col-lg-6">
<?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['update'])){
        
        if(isset($_POST['name']))
         $name=$_POST['name'];
        if(isset($_POST['email']))
         $email=$_POST['email'];
        if(isset($_POST['phonenumber']))
         $phonenumber=$_POST['phonenumber'];
    
        $sql="update students set name='$name',email='$email',phone='$phonenumber' where roll='$id'";
        $result=$db->update($sql);
        if($result){
            echo $result;
        }
         
    }
}
?>
                <form action="" method="post">
                <?php
                    $sql="select * from students where roll='$id'";
                    $result=$db->select($sql);
                    $row=$result->fetch_assoc();
                ?>
                    <div class="form-group">
                        <label for="">name</label>
                        <input class="form-control" type="text" name="name" placeholder="enter name" value="<?php echo $row['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input class="form-control" type="email" name="email" placeholder="enter email" value="<?php echo $row['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="">phone number</label>
                        <input class="form-control" type="number" name="phonenumber" placeholder="enter phone number" value="<?php echo $row['phone']?>">
                    </div>
                    <div class="form-group text-center">
                        <input class=" form-control btn btn-success" type="submit" name="update" value="update">
                        
                    </div>
                   
                    
                </form>
            </div>
        </div>
    </div>








    <script src="../inc/bootstrap-jquery.js"></script>
    <script src="../inc/bootstrap.min.js"></script>
</body>
</html>