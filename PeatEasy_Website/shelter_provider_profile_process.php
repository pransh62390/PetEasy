<?php
    include_once("mysql_connection.php");

    function doUpload($conn){
        $uid = $_POST["uid"];
        $cont_prsn = $_POST["cont_prsn"];
        $cont_no = $_POST["cont_no"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $max_days = $_POST["max_days"];
        $slctd_pets = $_POST["slctd_pets"];
        $other_info = $_POST["other_info"];
        
        $pic1_name = $uid.'_'.$_FILES["pic1"]["name"];
        $pic2_name = $uid.'_'.$_FILES["pic2"]["name"];
        $pic3_name = $uid.'_'.$_FILES["pic3"]["name"];
        
        $pic1_tmp= $_FILES["pic1"]["tmp_name"];
        $pic2_tmp= $_FILES["pic2"]["tmp_name"];
        $pic3_tmp= $_FILES["pic3"]["tmp_name"];
       
        move_uploaded_file($pic1_tmp,"uploads/".$pic1_name);
        move_uploaded_file($pic2_tmp,"uploads/".$pic2_name);
        move_uploaded_file($pic3_tmp,"uploads/".$pic3_name);
        
        $query = "insert into shelter values('$uid','$cont_prsn','$cont_no','$address','$city','$max_days','$slctd_pets','$other_info','$pic1_name','$pic2_name','$pic3_name')";
        mysqli_query($conn,$query);
        $msg = mysqli_error($conn);
        if($msg=="")
            echo "Record Inserted successfully";
        else
            echo $msg;
    }
    doUpload($conn);
