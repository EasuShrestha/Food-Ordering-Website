<?php include('partials/menu.php') ?>
  <div class="main-content">
   <div class="wrapper">
    <h1>Update Category</h1>

    <br><br>

    <?php
       // Check whether the id is set or not
       if(isset($_GET['id']))
        {
           //  Get the id and all other details
        //    echo "Getting the data";
        $id= $GET['id'];
        // Create SQL query to get all other details
        $sql= "SELECT * FROM tbl-category WHERE id=$id";

        // Execute the query
        $res= mysqli_query($conn, $sql);

        // Count the rows to check whether the id is valid or not 
        $count= mysqli_num_rows($res);

        if($count==1)
            {
                // get all the data 

            }
        else{
            // redirect to manage category with session message
            $_SESSION['no-category-found']= "<div class='error'>Category not found</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        }
        else
        {
            // redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }

    ?>

    <form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl 30">
        <tr>
            <td>Title:</td>
            <td>
                <input type="text" name="title" value="">
            </td>
        </tr>

        <tr>
            <td>Current Image:</td>
            <td>
                Image will be displayed here
            </td>
        </tr>

        <tr>
            <td>New Image:</td>
            <td>
                <input type="file" name="image">
            </td>
        </tr>

        <tr>
            <td>featured:</td>
            <td>
                <input type="radio" name="featured" value="Yes">Yes
                <input type="radio" name="featured" value="No">No
            </td>
        </tr>

        <tr>
            <td>Active:</td>
            <td>
                <input type="radio" name="active" value="yes">Yes
                <input type="radio" name="active" value="No">No
            </td>
        </tr>

        <tr>
            <td>
            <input type="submit" name="submit" value="update-category" class="btn-secondary">
            </td>
        </tr>
  
    </table>
</form>

   </div>

  </div>


<?php include('partials/footer.php') ?>