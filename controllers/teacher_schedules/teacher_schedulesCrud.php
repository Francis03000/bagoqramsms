<?php

    include_once('../../API/DBCRUDAPI.php');
    
    $DBCRUDAPI = new DBCRUDAPI();

    if(isset($_GET['getData'])){
        $DBCRUDAPI->selectleftjoin("teacher_schedules","users","id","teacher_id",["teacher_schedules.*", "users.*"]);
        $data = $DBCRUDAPI->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($data)){
            $res[] = $datass;
        }
        echo json_encode($res);
    }
    else{
        if(isset($_POST['addNew'])){
            $teacher_id  = $_POST["teacher_id"];
            $prefered_time_from  = $_POST["prefered_time_from"];
            $prefered_time_to  = $_POST["prefered_time_to"];

            $DBCRUDAPI->insert('teacher_schedules',['teacher_id'=>$teacher_id ,'prefered_time_from'=>$prefered_time_from,'prefered_time_to'=>$prefered_time_to]);

             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
            
        }else if(isset($_POST['update'])){
            
            $id = $_POST["id"];
            $teacher_id  = $_POST["teacher_id"];
            $prefered_time_from  = $_POST["prefered_time_from"];
            $prefered_time_to  = $_POST["prefered_time_to"];

            $DBCRUDAPI->update('teacher_schedules',['teacher_id'=>$teacher_id ,'prefered_time_from'=>$prefered_time_from,'prefered_time_to'=>$prefered_time_to],"id='$id'");
             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
        }else if(isset($_POST['delete'])){
            
            $id = $_POST["id"];

            $DBCRUDAPI->delete('teacher_schedules',"id='$id'");
             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }

        }
    }


?>