<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php 
            //1.Get ID of Selected Admin
            $id=$_GET['id'];

            //2.Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_admin WHERE id=$id ";

            //3.Execute the Query
            $res=mysqli_query($conn,$sql);

            //Check whether query is executed or not
            if($res==TRUE)
            {
                //Check whether data is available or not
                $count= mysqli_num_rows($res);
                //Check whether have admin data or not
                if($count==1)
                {
                    //Get the details
                    //echo "Admin Available";
                    $row = mysqli_fetch_assoc($res);

                    $fullName = $row['fullName'];
                    $userName = $row['userName'];
                }
                else
                {
                    //Redirect to Manage Admin Page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>

        <form action="" method="POST">
            <table class="tbl=30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                         <input type="text" name="fullName" value="<?php echo $fullName; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td> <input type="text" name="userName" value="<?php echo $userName; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"  > 
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
                
            </table>

        </form>
    </div>
</div>

<?php 
    //Check whether the Submit button is click or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $fullName = $_POST['fullName'];
        $userName = $_POST['userName'];

        //Create a SQL Query to Update Admin
        $sql = "UPDATE tbl_admin SET
        fullName = '$fullName',
        userName = '$userName'
        WHERE id='$id' ";

        //Execute the Query
        $res = mysqli_query($conn,$sql);

        //Check whether the Query is Executed successfully or not
        if($res==TRUE)
        {
            //Query executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='error'>Admin Updated Failed.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>




<?php include('partials/footer.php'); ?>