<?php
include 'crud.php';
$obj = new crud();

if(isset($_POST['submit']))
{
    $P_TYPE = $_POST['p_type'];
    $P_TITLE = $_POST['p_title'];
    $P_BUDGET = $_POST['p_budget'];
    $P_LASTDATE = $_POST['p_lastdate'];

    $maxId = "SELECT MAX(proj_id) FROM  project_details";
    $run = $obj->con->query($maxId);
    $output = mysqli_fetch_array($run);
    $PROJ_ID = ++$output[0];

    $projInsert = array($PROJ_ID,$P_TYPE,$P_TITLE,$P_BUDGET,$P_LASTDATE);
    $obj -> projDet_insert($projInsert);

    if($obj)
    {
        header("location:projDet_display.php?recInsert=1");
    }
}

?>