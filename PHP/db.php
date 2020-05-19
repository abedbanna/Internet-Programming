<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empdb";
$id= mysql_escape_string($_GET['txtEmpNo']); // filter the GET input to prevent SQL injection in line 16.
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

#step 2 Execute Sql

$sql = "SELECT empno,ename,sal,comm ,deptno FROM emp where empno=".$id
;
$result = $conn->query($sql);

#3- handle results
if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["empno"]. " - Name: " . $row["ename"]. " salary " . $row["sal"]. "
<br>";
    }
} else {
    echo "0 results";
}
//4- Close Connection
$conn->close();

//json_encode($result);

?>
