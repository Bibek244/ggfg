<?php
include 'connection.php';
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <style>
    .card  ul{
overflow:hidden;
}
.card  li{
display:inline-block;
}
</style>
</head>
<body>
    
    <div id="content">
        <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <ul>
                    <li>
                        <h4 class="m-2 font-weight-bold text-primary">Employee</h4>
                    </li>
                    <li class="float-right"> 
                        <a type = "button" class='btn btn-primary bg-gradient-primary' href="addemployee.php">Add employee</a>
                    </li>
                </ul>
                </div>
                <div class = "card-body">
                    <div class= "table-responsive">
<table class="table table-bordered"width = "100%" id="dataTable"cellspacing="0" border = "2"> 
    <thead>
        <tr>
            <th>Full name</th>
            <th>Job title</th>
            <th colspan = "3" width="20%">Action</th>
            <tr>
</thead>
<tbody>
<?php
    $sql = 'SELECT fname, Employe_Id,fname,lname ,j.JOB_TITLE FROM employee e
    join job j ON j.JOB_ID = e.JOB_ID';
    $result = mysqli_query($con,$sql) or die (mysqli_error($con));
    
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo "<td>". $row['fname'].' '. $row['lname']. "</td>";
        echo "<td>". $row['JOB_TITLE']."</td>";
        echo"<td> <a  type= 'button' class='btn btn-primary bg-gradient-primary' href ='emp_edit.php?action=edit&id=$row[Employe_Id]'>Edit</a>";
        if($row['JOB_TITLE'] == "Manager"){
            $disable = "disabled";
        }
        else
        $disable = "";
        echo"<td> <a  type= 'button' class='btn btn-danger bg-gradient-danger $disable' onclick = 'return checkDelete()'href ='emp_edit.php?action=delete&id=$row[Employe_Id]'>Delete</a>";
       
echo "</tr>";    
}
    ?>
    </tbody>
</table>
            </div>
</div>
</div>
</div>
</div>
<script>
function checkDelete(){
        return confirm('Are you sure you want to delete this product from record');
    }
    </script>
            </body>
            </html>