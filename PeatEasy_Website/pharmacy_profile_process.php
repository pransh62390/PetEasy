<?php
    include_once("mysql_connection.php");
    $btn = $_POST["btn"];
    if($btn=="Send")
        doSend($conn);
    else
        if($btn=="Update")
            doUpdate($conn);
    function doSend($conn){
        $uid = $_POST["uid"];
        $firm_name = $_POST["firm_name"];
        $mobile = $_POST["mobile"];
        $shop_address = $_POST["shop_address"];
        $licence = $_POST["licence"];
        $city = $_POST["city"];
        
        $qrcode_name = $uid.'_'.$_FILES["qrcode"]["name"];
        $qrcode_tmp= $_FILES["qrcode"]["tmp_name"];
       
        move_uploaded_file($qrcode_tmp,"uploads/".$qrcode_name);
        
        $query = "insert into pharmacy values('$uid','$firm_name','$mobile','$shop_address','$licence','$city','$qrcode_name')";
        mysqli_query($conn,$query);
        $msg = mysqli_error($conn);
        if($msg=="")
            echo "Record Inserted successfully";
        else
            echo $msg;
    }

    function doUpdate($conn){
        $uid = $_POST["uid"];
        $firm_name = $_POST["firm_name"];
        $mobile = $_POST["mobile"];
        $shop_address = $_POST["shop_address"];
        $licence = $_POST["licence"];
        $city = $_POST["city"];
        
        $qrcode_name = $uid.'_'.$_FILES["qrcode"]["name"];
        $qrcode_tmp= $_FILES["qrcode"]["tmp_name"];
        
        $oldPicName=$_POST["hdnBox"];
        if($qrcode_name=="")
		    $finalPicName=$oldPicName;
        else
        {
            $finalPicName=$qrcode_name;
            move_uploaded_file($qrcode_tmp,"uploads/".$finalPicName);
        }
        
        $uidany=$uid;
        $query="update pharmacy set uid='$uid',firmname='$firm_name',mobile='$mobile',address='$shop_address',city='$city',licence='$licence',qrpic='$qrcode_name' where uid='$uid'";
        mysqli_query($conn,$query);
		$msg=mysqli_error($conn);
		if($msg=="")
            echo "Record Updated Successfully";
		else
			echo $msg;
    }
?>
