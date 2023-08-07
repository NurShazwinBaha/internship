<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="warpper">
        <h1>Add Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESION['add'])) //Checking wether the session is set or not
            {
                echo $_SESION['add'];  //Display the session message
                unset($_SESION['add']);  //Remove the session message
            }
        ?>
        
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="fullname" placeholder="Enter Your Name"> </td>
                    <td></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter Your Username"> </td>
                    <td></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"> </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
</div>




<?php include('partials/footer.php'); ?>


<?php 
  //Process the value from form and save it in Database

  //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Click
        //echo "Button Clicked";

        //1.Get Data from form
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5

        //2.SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET 
            fullname = '$fullname',
            username = '$username',
            password = '$password'
        ";

        //3.Executing Query and Saving Data into Database
        $res = mysqli_query($conn,$sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and siplay appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo"Data Inserted";
            //Create seesion variable to display Message
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to Insert Data
            //echo"Failed to Insert Data"
            $_SESSION['add'] = "Failed to Add Admin Successfully";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    
?>