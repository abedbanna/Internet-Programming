<html>
<head>

</head>
<body>
<?php
echo "<h1>"."Welcome message from server side!!!!"."</h1>";
?>
<p>hi from abed</p>
<?php
$emps=array(
    "R1"=>array(
  "name"=>"scott",
    "id"=>7788,
    "salary"=>1500

),
    "R2"=>array(
        "name"=>"smith",
        "id"=>7878,
        "salary"=>2500

    ),
    "R3"=>array(
        "name"=>"king",
        "id"=>8877,
        "salary"=>5000

    )
);
echo "<h1>".$emps["R3"]['name']."</h1>";
echo "<h1>".$emps["R3"]['id']."</h1>";
echo "<h1>".$emps["R3"]['salary']."</h1>";
//echo "<h1>".$emp['id']."</h1>";
//echo "<h1>".$emp['salary']."</h1>";

/*for($i=0;$i<sizeof($emps);$i++)
    print "<h3>".$emps[$i]."</h3>";
*/
//foreach ($emps as $name)
  //  print "<h3>".$name."</h3>";
echo json_encode($emps);
?>
</body>
</html>


