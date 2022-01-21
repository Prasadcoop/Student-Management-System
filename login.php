<?php

session_start();
if(isset($_SESSION['uid']))
{
    header('location:admin/admindash.php');
}
?>
<html>

    <title>Admin Login</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 align="center">Admin Login</h1><br>
    <form action="login.php" method="post" class="form-control">
        <table align="center">
            <tr class="form-group">
                <td>Username:</td>
                <td><input class="form-control" type="text" name="uname"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" class="form-control" name="pass"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input name="login" class="btn btn-success" type="submit" value="Login">
                </td>
           </tr> 
            <tr>
                <td colspan="2" align="center" >
                </td>
            </tr>
        </table>
    </form>
    <center>
        <a href="index.php"><button class="btn btn-primary">Back to Homepage</button></a>
        <a href="add_admin_script.php"><button class="btn btn-primary">Create New Admin</button></a>
    </center>
</body>

</html>
?>
<?php
include('dbcon.php');
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($con,$_POST['uname']);
    $password=mysqli_real_escape_string($con,$_POST['pass']);
    $qry="SELECT * FROM `admin` WHERE `username`='$username'";
    
    //check no of rows
    
    $run = mysqli_query($con,$qry);
    
    $row = mysqli_num_rows($run);
//user exist or not
    if($row<1)
    {?>
      <script>
          alter('User not found');
          window.open('login.php','_self')
       </script>
       <?php
    }

    $data=mysqli_fetch_assoc($run);
    $phash=$data['password'];
    if(password_verify($password,$phash))//$password=enter by user and other in database
    {
        $id=$data['id'];
        $_SESSION['uid']=$id;
        header('location:admin/admindash.php');
    }
    else
    { ?>
    <script>
            alert('Username Or Password Dont match');
            window.open('login.php', '_self')
    </script>
   <?php 
   }
}

?>