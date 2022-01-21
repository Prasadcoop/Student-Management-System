<?php
function showdetails($standard,$rollno){
    
    include('dbcon.php');
    $sql="SELECT * FROM `student` WHERE `standard`='$standard' AND `rollno`='$rollno'";
    $run=mysqli_query($con,$sql);
    if(mysqli_num_rows($run)>0){
        $data = mysqli_fetch_assoc($run);
        ?>
   <table class="table table-bordered table-striped">
     <tr>
         <th colspan="3">Student Details</th>>
     </tr>
     <tr>
        <td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>"style="max-width:100px;"></td>
        <th>Roll No</th>
        <td align="center"><?php echo $data['rollno']; ?></td>
     </tr>
     <tr>
        <th>Name   </th>
        <td align="center"><?php echo $data['name']; ?></td>
     </tr>
     <tr>
         <th>City</th>
         <td align="center"><?php echo $data['city']; ?></td>
     </tr>
     <tr>
        <th>Parent Contact </th>
        <td align="center"><?php echo $data['pcont']; ?></td>
     </tr>
     <tr>
        <th>Standard </th>
        <td align="center" ><?php echo $data['standard']; ?></td>
     </tr>

   </table>
<?php
    }
    else{
       echo "<script>alert('No Record Found');</scriprt>";
    }
}
?>