<?php
    include_once("mysql_connection.php");
    $uidValue=$_GET["uidName"];

    $query="select * from doctors where uid='$uidValue'";

    $table=mysqli_query($conn,$query);

    $count=mysqli_num_rows($table);
    if($count==0)
        echo "Available, you can take it...";

    else
        echo "Already Bookeed";
?>
