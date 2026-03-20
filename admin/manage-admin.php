<?php include('partials/menu.php')?>

        <!-- Main content section starts -->
         <div class="main-content">
              <div class="wrapper">
                  <h1>Manage Admin</h1>
                  <br><br><br>

                  <?php
                  if(isset($_SESSION['add']))  
                    {
                        echo $_SESSION['add']; // Displaying SESSION Message
                        unset($_SESSION['add']); // Removing SESSION Message
                    }
                    if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }

                        if(isset($_SESSION['update']))
                            {
                                echo $_SESSION['update'];
                                unset($_SESSION['update']);
                            }

                        if(isset($_SESSION['user-not-found']))
                            {
                                echo $_SESSION['user-not-found'];
                                unset($_SESSION['user-not-found']);
                            }
                        if(isset($_SESSION['pwd-not-match']))
                            {
                                echo $_SESSION['pwd-not-match'];
                                unset($_SESSION['pwd-not-match']);
                            }
                        if(isset($_SESSION['change-pwd']))
                            {
                                echo $_SESSION['change-pwd'];
                                unset($_SESSION['change-pwd']);
                            }
                    ?> 
                    <br><br><br>
                  <!-- Button to add Admin -->
                  <a href="add-admin.php" class="btn-primary">Add Admin</a>
                  <br><br><br>

                  <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                      // Query to Get all admin
                        $sql="SELECT * FROM tbl_admin";
                      // Exexute the query
                      $res=mysqli_query($conn,$sql);

                      // Check whether the query is Exexuted of NOT
                      if($res==TRUE)
                        {
                            // Count Rows to check wether we have data in database or not
                            $count= mysqli_num_rows($res); // Function to et all rows in database


                            $sn=1; // create a variable and assign the value

                            // Check the number of rows 
                            if($count>0)
                                {
                                    // We have data in database
                                    while($rows=mysqli_fetch_assoc($res))
                                        {
                                            // using while loop to get all teh data from database.
                                            // and while loop will run as long as we have data in database.

                                            // Get indivdual data
                                            $id=$rows['id'];
                                            $full_name=$rows['full_name'];
                                            $username=$rows['username'];

                                            // Display the values in out table
                                           ?>

                                            <tr>
                                                    <td><?php echo $sn++;?></td>
                                                   <td><?php echo $full_name;?></td>
                                                   <td><?php  echo $username;?></td>
                                                   <td>
                                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                                                      <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                                      <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                                   </td>
                                            </tr>

                                           <?php



                                        
                                        }
                                }
                                else{
                                    // We do not have data in database
                                }

                        }
                    ?>

                 
                  </table>
              </div>
            
         </div>
        <!-- Main content section ends -->

<?php  include('partials/footer.php')?>