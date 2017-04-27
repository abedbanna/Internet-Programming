<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php

$username=$_GET['txtUserName'];
$pass=$_GET['txtPassword'];
$role=$_GET['cboRole'];
$fname=$_GET['txtFName'];
$lname=$_GET['txtLName'];
$gender=$_GET['rdoGender'];
$exp=$_GET['txtExp'];
$email=$_GET['txtEmail'];
$url=$_GET['txtUrl'];
$lang=$_GET['chkLang'];

?>
</body>
<table class="table">
    <tr>
<td>Username</td>
        <td>password</td>
        <td>Role</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Gender</td>
        <td>Exp</td>
        <td>Email</td>
        <td>URL</td>
        <td>Language</td>
    </tr>
    <tr>
        <td><?php echo $username;?></td>
        <td><?php echo $pass; ?></td>
        <td><?php
            if($role=="A")
            echo "Admin";
            else
                echo "User";

            ?></td>
        <td><?php echo $fname?></td>
        <td><?php echo $lname?></td>
        <td><?php
            if($gender=="m")
            echo "Male";
            else
                echo "Female";

            ?></td>
        <td><?php echo $exp?></td>
        <td><?php echo $email?></td>
        <td><?php echo $url?></td>
        <td><?php echo $lang?></td>
    </tr>
</table>
</html>
