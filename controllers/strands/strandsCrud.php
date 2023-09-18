<?php

include_once('../../API/DBCRUDAPI.php');

$DBCRUDAPI = new DBCRUDAPI();

if (isset($_GET['getData'])) {
    $DBCRUDAPI->select("strands", "*");
    $data = $DBCRUDAPI->sql;
    $res = array();
    while ($datass = mysqli_fetch_assoc($data)) {
        $res[] = $datass;
    }
    echo json_encode($res);
}
// if (isset($_GET['getDataDepart'])) {
//     $id = $_GET['id'];
//     $DBCRUDAPI->selectleftjoin("subjects", "strands", "id", "department_id", ["subjects.subject_name", "subjects.department_id", "strands.strand_name"], "subjects.id = '$id'");
//     $data = $DBCRUDAPI->sql;
//     $res = array();
//     while ($datass = mysqli_fetch_assoc($data)) {
//         $res[] = $datass;
//     }
//     echo json_encode($res);
// }
else {
    if (isset($_POST['addNew'])) {
        $strand_acronym = $_POST["strand_acronym"];
        $strand_name = $_POST["strand_name"];

        $DBCRUDAPI->insert('strands', ['strand_acronym' => $strand_acronym, 'strand_name' => $strand_name]);

        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    } else if (isset($_POST['update'])) {

        $id = $_POST["id"];
        $strand_acronym = $_POST["strand_acronym"];
        $strand_name = $_POST["strand_name"];

        $DBCRUDAPI->update('strands', ['strand_acronym' => $strand_acronym, 'strand_name' => $strand_name], "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else if (isset($_POST['delete'])) {

        $id = $_POST["id"];

        $DBCRUDAPI->delete('strands', "id='$id'");
        if ($DBCRUDAPI) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }

    }
}


?>