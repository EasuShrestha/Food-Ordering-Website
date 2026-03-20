<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
              if(isset($_SESSION['add']))  // checking wether the session is set or not
                {
                    echo $_SESSION['add'];   // Display the session message if SET
                    unset($_SESSION['add']);  // Remove session message
                }
        ?>
        <form action="" method="POST">

              <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

              <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="username" placeholder="Enter Your Username: ">
                </td>
              </tr>

              <tr>
                <td>Password: </td>
                <td>
                    <input type="password" name="password" placeholder="Enter Your password: ">
                </td>
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


<?php include('partials/footer.php') ?>

<?php  
   // process the value from form and save it in Database

   // check whether the button is clicked or not 

   if(isset($_POST['submit']))
    {
        //Button clicked
        // echo "Button Clicked";

        // Get the data from form
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']); // password encryption with md5

        //2. SQL Query to save the data into database
        $sql="INSERT INTO tbl_admin SET
         full_name='$full_name',
         username='$username',
         password='$password'
         ";

       // 3. Execute Query and Save data in Database
        $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));


        // Check wether the(Query is executed) data is insserted or not and  display appropriate message
        if($res==TRUE)
            {
                // DATA Inserted
                // echo "Data Inserted";
                // create a session variable to display message
                $_SESSION['add']="<div class='add-success'>Admin Added Successfully</div>";
                // Redirect Page to manage admin
                header("location:".SITEURL.'admin/manage-admin.php');
            }
            else{
                // Failed to insert data
                // echo "Failed to Insert Data";
                $_SESSION['add']="Failed to Add admin";
                // Redirect Page to add admin
                header("location:".SITEURL.'admin/add-admin.php');
            }


    }

?>