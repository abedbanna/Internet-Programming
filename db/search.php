<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#txtKey").focus()

        })
    </script>
</head>
<body>

<?php
$servername="localhost";
$username="root";
$password="";
$db="employeebackend";

//1- Create Connection
$connection=new mysqli($servername,$username,$password,$db);
if($connection->connect_error)
    die("Error".$connection->connect_errno);

//2-Create Query

if(isset($_GET['txtKey']))
{
    $sql="select * FROM employee where name like'%".$_GET['txtKey']."%'";

}
    else

{
    $sql="select * FROM Employee";

}
$result=$connection->query($sql);


?>
<form action="search.php">
<div class="container">
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-9">
        <input type="search" id="txtKey"  name="txtKey"
               value=<?php
               if(isset($_GET['txtKey']))
               echo"'".$_GET['txtKey']."'";
               else
                   echo"''";
               ?>
               placeholder="Enter name" class="form-control">

<table class="table table-hover">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Salary</td>
        <td>Dept</td>
    </tr>

       <?php
       //3-Handle Data
       while ($row=$result->fetch_assoc())
           echo "<tr><td>".$row['empno']."</td>".
                "<td>".$row['name']."</td>".
                "<td>".$row['salary']."</td>".
                "<td>".$row['deptno']."</td></tr>";
       ?>


</table>
    </div>
    <div class="col-md-1">
        <input type="submit" class="btn btn-success">
        <a href="newDept.php" class="btn btn-info">New Dept</a>
    </div>
</div>
</div>
</form>
</body>
</html>