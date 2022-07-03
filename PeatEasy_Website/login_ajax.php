<?php
    session_start();
    $uid=$_GET["uidName"];
    $password=$_GET["pwdName"];
    $msg = '';
    if(count($_GET) == 3){
        $msg = $_GET["msgName"];
        include_once("SMS_OK_sms.php");
    }
    include_once("mysql_connection.php");

    $query="select * from users where uid='$uid'";
    $table=mysqli_query($conn,$query);
    $count=mysqli_num_rows($table);

    if($count==0){
        $query="select * from users where email='$uid'";
        $table=mysqli_query($conn,$query);
        $count=mysqli_num_rows($table);
        if($count==0)
            echo "Invalid Uid/Email";
        else
            toThePage($table,$password,$uid,$msg);
    }

    else
        toThePage($table,$password,$uid,$msg);

    function toThePage($table,$password,$uid,$msg){
        while($record=mysqli_fetch_array($table)){
                $type=$record["type"];
                $pwd=$record["password"];
                $mob=$record["mobile"];
            }
            if($password == $pwd){
                $_SESSION["active_user"]=$uid;
                echo $type;
                /*if($type=="doctor")
                    echo "<meta http-equiv = 'refresh' content = '0; url = doctors_profile.php' />";
                else
                    if($type=="pharmacy")
                        echo "<meta http-equiv = 'refresh' content = '0; url = pharmacy_profile.php' />";
                else
                    if($type=="shelter")
                        echo "<meta http-equiv = 'refresh' content = '0; url = shelter_provider_profile.php' />";*/
            }
            else
                if($msg =='forgot_password'){
                    $resp=SendSMS($mob,"User id:".$uid." and password:".$pwd);
                    echo $resp;
                }
                else
                    echo "Invalid Password";
            
    }
?>
