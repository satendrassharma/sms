<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location:pages/login.php');
    }
    if(isset($_GET['action'])){
        if($_GET['action']=='logout'){
            session_destroy();
            header('location:pages/login.php');

        }
    }
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
    <link rel="stylesheet" href="inc/bootstrap.min.css">
    <link rel="stylesheet" href="inc/style.css">

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
                        <li><a href="#">home</a></li>
                        <li><a href="index.php?action=logout">logout</a></li>
                        <li><a href="pages/add.php">add</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php 
                if(isset($_GET['action'])){
                    if($_GET['action']=='delete'){
                        $conn1=new mysqli('localhost','root','','sms');
                        $sql1="delete from students where roll='$id'";
                        $result1=$conn1->query($sql1);
                        if($result1){
                            echo "<div class='alert alert-success '>data deleted succefully</div>";
                        }
                    }
                }
               
                
                ?>
                <table class="table table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th scope='col'>roll</th>
                            <th scope='col'>name</th>
                            <th scope='col'>email</th>
                            <th scope='col'>phone</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $conn=new mysqli('localhost','root','','sms');
                    $sql="select * from students";
                    $result=$conn->query($sql);
                    while($row=$result->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $row['roll'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['phone'];?></td>

                            <td>
                                <a href="pages/update.php?id=<?php echo $row['roll'];?>" class="btn btn-primary ">update</a>
                                <a href="index.php?action=delete&id=<?php echo $row['roll'];?>" class="btn btn-warning">delete</a>
                            </td>
                        </tr>
                    <?php }?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <script src="bootstrap-jquery.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>