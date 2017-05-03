<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empdb";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2- Execute Sql Command
$sql = "SELECT empno,ename,sal FROM emp ";
$result = $conn->query($sql);

//3-handle Results
if ($result->num_rows > 0) {
// output data of each row
    ?>
    <table width="100%" border="4">
        <thead>
        <tr>
            <td colspan="3" align="center">
                <h1>Employee Table</h1>
            </td>
        </tr>
        </thead>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Salary</td>
        </tr>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["empno"]."</td><td>".$row["ename"]."</td><td>".$row["sal"]."</td>";



    }
} else {
    echo "0 results";
}
//4-Close connection
$conn->close();
?>
    </table>
