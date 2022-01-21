<?php
   include('../dbcon.php');
   $rollno=$_POST['rollno'];
   $name=$_POST['name'];
   $city=$_POST['city'];
   $pcon=$_POST['pcon'];
   $std=$_POST['standard'];
   $imagename=$_FILES['simg']['name'];
   $tempname=$_FILES['simg']['tmp_name'];
   $id=$_POST['sid'];
   move_uploaded_file($tempname,'../dataimg/$imagename');
   
   $sql="UPDATE `student` SET `name`='$name',`city`='$city',`rollno`='$rollno',`pcont`='$pcon',`standard`='$std',`image`='$imagename' WHERE `id`='$id' ";
   $run=mysqli_query($con,$sql);
   if($run=true){
       ?>
       <script>
           alert("DATA UPDATED SUCCESSFULLY.");
        </script>
        <?php
        header('location:updatestudent.php');
   }
?>