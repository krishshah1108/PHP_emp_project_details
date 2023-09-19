<?php
include 'crud.php';
$obj = new crud();
if(isset($_GET['d_id']))
{
    $EMP_NO = $_GET['d_id'];
    $obj -> delEmpDet($EMP_NO);
    if($obj)
    {
        header("location:Emp_details.php?recDel=1");
    }
}
?>