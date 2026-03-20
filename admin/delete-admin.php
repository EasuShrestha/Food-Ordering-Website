<?php

   // Include contants.php file here
   include('../config/constants.php');

// 1. Get the ID of admin to be deleted
  $id=$_GET['id'];

// 2. Create SQL query to delete admin
$sql="DELETE FROM tbl_admin WHERE id=$id";

// Execute the query
$res= mysqli_query($conn,$sql);

// check wether the query executed successfulyy or not
if($res==true)
    {
        // Query Executed successfully and Admin deleted
        // echo "Admin delete";

        // create SESSION variable to display message
        $_SESSION['delete']="<div class='success'>Admin Deleted Successfully.</div>";
        // Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        // Faild to delete admin
        // echo "Failed to delete Admin";

        $_SESSION['delete']="<div class='error'>Failed to delete Admin. Try again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }



// 3. Redirect to manage admin page with message(success/error)



?>