<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if (isset($_GET['txtId']))
{
    $id=$_GET['txtId'];
    $name=$_GET['txtName'];
    $loc=$_GET['txtLoc'];

    $servername="localhost";
    $username="root";
    $password="";
    $db="employeebackend";

//1- Create Connection
    $connection=new mysqli($servername,$username,$password,$db);
    if($connection->connect_error)
        die("Error".$connection->connect_errno);

//2-Create Query
    $sql="INSERT INTO DEPARTMENT VALUES($id,'$name','$loc')";







}


?>

<div class="container">
    <h2>New Department</h2>
    <form action="newDept.php">
        <div class="form-group">
            <label for="txtId">Id:</label>
            <input type="text" class="form-control" id="txtId" placeholder="Enter Id" name="txtId" required>
        </div>
        <div class="form-group">
            <label for="txtName">Name:</label>
            <input type="text" class="form-control" id="txtName" placeholder="Department name" name="txtName" required>
        </div>
        <div class="form-group">
            <label for="txtLoc">Location:</label>
            <input type="text" class="form-control" id="txtLoc" placeholder="Department name" name="txtLoc" required>
        </div>


<?php
if (isset($_GET['txtId'])){
if($connection->query($sql)===TRUE)
    echo "<div class='alert alert-success'>Record has been added</div>";
else
    echo "<div class='alert alert-danger'>$connection->error</div>";


}
?>

        <button type="submit" class="btn btn-default">Submit</button>
        <a href="search.php" class="btn btn-info">Back </a>
    </form>
</div>
</body>

</html>

