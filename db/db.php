<?php
/**
 * Created by PhpStorm.
 * User: abanna
 * Date: 4/25/2018
 * Time: 8:19 AM
 */
$servername="localhost";
$username="root";
$password="";
$db="employeebackend";

//1- Create Connection
$connection=new mysqli($servername,$username,$password,$db);
if($connection->connect_error)
    die("Error".$connection->connect_errno);

//2-Create Query
$sql="select * FROM Employee";
$result=$connection->query($sql);

//3-Handle Data
while ($row=$result->fetch_assoc())
    echo $row['name']."----".$row['salary']."<br>";

//4- close connection
$connection->close();