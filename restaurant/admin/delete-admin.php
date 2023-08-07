<?php 

    //Include constants.php file here
    include('../config/constants.php');

    //1. get ID Admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute thequery
    $res = mysqli_query($conn,$sql);

    //Check whether Query executed successfully or not
    if($res==TRUE)
    {
        //Query Executed Successfully and Admin Deleted
        //echo "Admin Deleted";
        //Create Session variable to Display Message 
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try again</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. Redirect to Mange Admin page with message (error/success)





?>