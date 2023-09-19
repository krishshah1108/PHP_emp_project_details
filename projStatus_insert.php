<?php
include 'crud.php';
$obj = new crud();
if(isset($_POST['submit']))
{
    $maxId = "SELECT MAX(EP_key) FROM project_status";
    $run = $obj->con->query($maxId);
    $output = mysqli_fetch_array($run);
    $EP_KEY = ++$output[0];

    $proj_id = $_POST['proj_id'];
    $proj_status = $_POST['proj_status'];
    $emp_no = $_POST['emp_no'];
    $proj_comDate = $_POST['proj_comDate'];

    $projStatInsert = array($EP_KEY,$proj_id,$proj_status,$emp_no,$proj_comDate);
    $obj -> projStatus_insert($projStatInsert);

    if($obj)
    {
        header("location:projStatus_display.php?recInsert=1");
    }
}


?>