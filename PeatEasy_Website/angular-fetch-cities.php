<?php
    include_once("mysql_connection.php");
    $page = $_GET["page"];
    $tobefetched = $_GET["tobefetched"];

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
        $query="select distinct $tobefetched from doctors";
        echo json_encode(doFetch($conn,$query));
    }
    else
        if($page == "pharmacy"){
            $query="select distinct $tobefetched from pharmacy";
            echo json_encode(doFetch($conn,$query));
        }
    else
        if($page == "shelter"){
            if($tobefetched=='selpets'){
                $query="select distinct $tobefetched from shelter";
                $table=mysqli_query($conn,$query);
                $ary=array();
                while($record=mysqli_fetch_array($table))
                {
                    $ary[]=$record;
                }
                echo json_encode($ary);
            }
            else{
                $query="select distinct $tobefetched from shelter";
                echo json_encode(doFetch($conn,$query));
            }
        }
?>
