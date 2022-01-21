<?php

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $link = mysqli_connect("localhost:3307", "root", "", "student_database");

    if($link===false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $pwd_hash= password_hash($password,PASSWORD_DEFAULT);
    $sql="insert into admin(username,password) values('$username','$pwd_hash')";
    if(mysqli_query($link,$sql)){
        echo "admin added successfully.";
    }else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
}


?>

<html>

<head>
    <meta charset="utf-8">
    <title>add user information...</title>
</head>
<h1 align="center">Create New User Admin</h1><br>

<body>
    <form method="post" action="add_admin_script.php">
        <table align="center" style="padding:5px; " class="table table-bordered table-striped">

            <tr>
                <th>Enter Username</th>
                <td><input type="text" name="username" placeholder="Username" required /></td>
            </tr>
            <tr>
                <th>Enter Password</th>
                <td> <input type="password" name="password" placeholder="password" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" /></td>

            </tr>
        </table>
    </form>
    <center>
        <a href="login.php"><button class="btn btn-primary">Back to Login</button></a>
    </center>
</body>

</html>