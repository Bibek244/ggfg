<?php
include 'connection.php';
include'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
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
        <div class = "container">
        
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <ul>
                 <h4 class="m-2 font-weight-bold text-primary">Admin</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered"width = "100%" id="dataTable"cellspacing="0" border = "2"> 
    <thead>
    <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Type</th>
            <th>Action</th>
            <tr>
</thead>
<tbody>
<?php
    $sql = 'SELECT id,username,e.fname,e.lname,t.TYPE
    FROM login l
    join employee e ON e.Employe_Id =  l.Employe_Id
    join type t ON t.TYPE_ID = l.TYPE_ID
    WHERE l.TYPE_ID = 1';
    $result = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['fname'] .'&nbsp' .$row['lname'].'</td>';
        echo '<td>'. $row['username']. '</td>';
        echo '<td>'. $row['TYPE']. '</td>';
        echo"<td><a type= 'button' class='btn btn-primary bg-gradient-primary' href ='account_searchfrm.php?action=edit&id=$row[id]'>Details</a>";
echo "</tr>";    
}
    ?>
    
    </tbody>
</table>
                  </div>
                </div>
        </div>

<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <ul>
                        <li>
                            <h4 class="m-2 font-weight-bold text-primary">Users</h4>
                        </li>
                        <li class="float-right">
                            <a class="btn btn-primary bg-gradient-primary"  href = "addaccount.php"> Add account</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered"width = "100%" id="dataTable"cellspacing="0" border = "2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Type</th>
            <th colspan="2">Action</th>
            <tr>
</thead>
<tbody>
<?php
    $sql = 'SELECT id,username,fname,lname,TYPE,e.Employe_Id
    FROM login l
    join employee e ON e.Employe_Id =  l.Employe_Id
    join type t ON t.TYPE_ID = l.TYPE_ID
    WHERE l.TYPE_ID = 2';
    $result = mysqli_query($con,$sql) or die (mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['fname'] .'&nbsp' .$row['lname'].'</td>';
        echo '<td>'. $row['username']. '</td>';
        echo '<td>'. $row['TYPE']. '</td>';
        echo"<td><a type= 'button' class='btn btn-primary bg-gradient-primary' href ='account_searchfrm.php?action=edit&id=$row[id]'>Details</a>";
        echo"<td><a type= 'button' class='btn btn-danger bg-gradient-danger'onclick ='return checkDelete()' href ='account_searchfrm.php?action=delete&id=$row[id]'>Delete</a>";
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
</div>
<script>
    function checkDelete(){
        return confirm('Are you sure you want to delete this product from record');
    }
</script>
    </body>
    </html>