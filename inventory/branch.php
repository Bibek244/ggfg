<?php 
require'connection.php';
require"sidebar.php";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Management</title>
</head>
<body>
    <div id="content">
        <div class="container">
            <div class="card mb-4 shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Insert new branch</h3>
                </div>
                <form action="add_branch.php" method ="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="branch_name">Branch Name</label>
                        <input type="text" name="branch_name" id ="branch_name"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Branch address</label>
                        <input type="text" name="location" id ="location"  class="form-control" required>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
            <div class="card  mb-4 shadow ">
            <div class="card-header bg-primary text-white text-center">
                <h3>List of Branches</h3>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" width ="100%" cellspacing= "0">
                        <tr>
                            <th>Branch Name</th>
                        <th>Branch Address</th>
                    </tr>
                    <?php
            $query = "SELECT * FROM branch";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['branch_name']."</td>";
                echo "<td>".$row['location']."</td>";
                echo"</tr>";
            }
                ?>

</table>
</div>
</div>


</div>
        </div>
    </div>
    
</body>
</html>
