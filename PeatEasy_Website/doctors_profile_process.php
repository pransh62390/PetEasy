<?php
    include_once("mysql_connection.php");
    $btn = $_POST["btn"];
    if($btn=="Save")
        doSave($conn);
    else
        if($btn=="Update")
            doUpdate($conn);
    function doSave($conn){
        $uid = $_POST["uid"];
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $state = $_POST["state"];
        $city = $_POST["city"];
        $qualification = $_POST["qualification"];
        $exp = $_POST["exp"];
        $specialization = $_POST["specialization"];
        
        $ppic_name = $uid.'_'.$_FILES["ppic"]["name"];
        $docs_name = $uid.'_'.$_FILES["docs"]["name"];
        
        $ppic_tmp= $_FILES["ppic"]["tmp_name"];
        $docs_tmp= $_FILES["docs"]["tmp_name"];
       
        move_uploaded_file($ppic_tmp,"uploads/".$ppic_name);
        move_uploaded_file($ppic_tmp,"uploads/".$docs_name);
        
        $query = "insert into doctors values('$uid','$name','$mobile','$email','$address','$state','$city','$qualification','$exp','$specialization','$ppic_name','$docs_name',current_date())";
        mysqli_query($conn,$query);
        $msg = mysqli_error($conn);
        if($msg==""){
            echo "Record Inserted successfully";
            header("location:citizen-dashboard.php");
        }
        else
            echo $msg;
    }

    function doUpdate($conn){
        $uid = $_POST["uid"];
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $state = $_POST["state"];
        $city = $_POST["city"];
        $qualification = $_POST["qualification"];
        $exp = $_POST["exp"];
        $specialization = $_POST["specialization"];
        
        $oldPicName1=$_POST["hdnBox1"];
        $oldPicName2=$_POST["hdnBox2"];
        
        $ppic_name = $uid.'_'.$_FILES["ppic"]["name"];
        $docs_name = $uid.'_'.$_FILES["docs"]["name"];
        
        $ppic_tmp= $_FILES["ppic"]["tmp_name"];
        $docs_tmp= $_FILES["docs"]["tmp_name"];
        if($ppic_name=="")
		    $finalPicName1=$oldPicName1;
        else
        {
            $finalPicName1=$ppic_name;
            move_uploaded_file($ppic_tmp,"uploads/".$ppic_name);
        }
        
        if($docs_name=="")
		    $finalPicName2=$oldPicName2;
        else
        {
            $finalPicName2=$docs_name;
            move_uploaded_file($ppic_tmp,"uploads/".$finalPicName2);
        }
        
        $query="update doctors set uid='$uid',name='$name',mobile='$mobile',email='$email',address='$address',state='$state',city='$city',qualification='$qualification',exp='$exp',spl='$specialization',ppic='$ppic_name',certpic='$docs_name',dosdate=current_date() where uid='$uid'";
        mysqli_query($conn,$query);
		$msg=mysqli_error($conn);
		if($msg==""){
            echo "Record Updated Successfully";
            header("location:citizen-dashboard.php");
        }
		else
			echo $msg;
    }
?>
