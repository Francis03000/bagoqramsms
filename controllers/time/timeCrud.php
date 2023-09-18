<?php

    include_once('../../API/DBCRUDAPI.php');
    
    $DBCRUDAPI = new DBCRUDAPI();
    
    if(isset($_GET['getData'])){
        $DBCRUDAPI->select("sample_time","*");
        $data = $DBCRUDAPI->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($data)){
            $res[] = $datass;
        }
        echo json_encode($res);
    }
    else{
        if(isset($_POST['addNew'])){
            $time_start = $_POST["time_start"];
            $time_end = $_POST["time_end"];
            $sched_index = $_POST["sched_index"];

            $DBCRUDAPI->insert('sample_time',['time_start'=>$time_start,'time_end'=>$time_end,'sched_index'=>$sched_index]);

             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
            
        }else if(isset($_POST['update'])){
            
            $id = $_POST["id"];
            
            $time_start = $_POST["time_start"];
            $time_end = $_POST["time_end"];
            $sched_index = $_POST["sched_index"];

            $DBCRUDAPI->update('sample_time',['time_start'=>$time_start,'time_end'=>$time_end,'sched_index'=>$sched_index],"id='$id'");
             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
        }else if(isset($_POST['delete'])){
            
            $id = $_POST["id"];

            $DBCRUDAPI->delete('sample_time',"id='$id'");
             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }

        }
    }


?>