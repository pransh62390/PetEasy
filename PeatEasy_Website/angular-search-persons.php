<?php
    include_once("mysql_connection.php");
    $page = $_GET["page"];
    $city = $_GET["city"];
    if(count($_GET) == 3)
        $pet = $_GET["pet"];
    function doFetch($conn,$query){
        $table=mysqli_query($conn,$query);
        $ary=array();
        while($record=mysqli_fetch_array($table))
        {
            $ary[]=$record;
        }
        return($ary);
    }

    if($page == "doctors"){
        $query="select * from doctors where city='$city'";
        echo json_encode(doFetch($conn,$query));
    }
    else
        if($page == "pharmacy"){
            $query="select * from pharmacy where city='$city'";
            echo json_encode(doFetch($conn,$query));
        }
    else
        if($page == "shelter"){
            if($pet)
                $query="select * from shelter where city='$city' and selpets like '%$pet%'";
            else
                $query="select * from shelter where city='$city'";
            
            echo json_encode(doFetch($conn,$query));
        }
?>
