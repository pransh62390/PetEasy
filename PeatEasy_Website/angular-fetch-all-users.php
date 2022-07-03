<?php
    include_once("mysql_connection.php");
    $page = $_GET["page"];

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
        $query="select * from doctors";
        echo json_encode(doFetch($conn,$query));
    }
    else
        if($page == "pharmacy"){
            $query="select * from pharmacy";
            echo json_encode(doFetch($conn,$query));
        }
    else
        if($page == "shelter"){
            $query="select * from shelter";
            echo json_encode(doFetch($conn,$query));
        }
?>
