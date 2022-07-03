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
        $query="select * from users where uid='$uid'";

        $table=mysqli_query($conn,$query);

        $count=mysqli_num_rows($table);
        if($count==0)
            echo "Available, you can take it...";

        else
            echo "Already Bookeed";
    }

    function onClick($conn,$uid){
        $email = $_GET["emailName"];
        $password = $_GET["pwdName"];
        $mobile = $_GET["mobileName"];
        $type = $_GET["typeName"];
        if($email=="" || $password=="" || $mobile=="" || $type==""){
            echo "Some fields are empty";
            return;
        }
        else{
            $query = "insert into users values('$uid','$email','$password','$mobile','$type',current_date())";
            mysqli_query($conn,$query);
            $msg = mysqli_error($conn);
            if($msg=="")
                echo "Record Inserted Successfully";
            else
                echo $msg;
        }
    }
?>
