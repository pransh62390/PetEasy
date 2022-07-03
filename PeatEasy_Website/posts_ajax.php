<?php
    include_once("mysql_connection.php");
    $btn = $_GET["btnName"];
    $uid = $_GET["uidName"];
    if($btn=="blur")
        onBlur($conn,$uid);
    else
        if($btn=="click")
            onClick($conn,$uid);
    function onBlur($conn,$uid){
        $query="select * from posts where uid='$uid'";

        $table=mysqli_query($conn,$query);

        $count=mysqli_num_rows($table);
        if($count==0)
            echo "Available, you can take it...";

        else
            echo "Already Bookeed";
    }

    function onClick($conn,$uid){
        $contprsn = $_GET["contprsnName"];
        $contno = $_GET["contnoName"];
        $address = $_GET["addressName"];
        $pets = $_GET["petsName"];
        $info = $_GET["infoName"];
        
        $query = "insert into posts values('$uid','$contprsn','$contno','$address','$pets','$info')";
        mysqli_query($conn,$query);
        $msg = mysqli_error($conn);
        if($msg=="")
            echo "Record Inserted Successfully";
        else
            echo $msg;
    }
?>
