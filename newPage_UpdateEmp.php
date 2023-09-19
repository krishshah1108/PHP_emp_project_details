<?php
include 'crud.php';
$obj= new crud();
if(isset($_POST['update']))
{
    $emp_no = $_POST['emp_no'];
    $e_email = $_POST['e_email'];
    $e_type = $_POST['e_type'];
    $e_name = $_POST['e_name'];
    $e_cn = $_POST['e_cn'];
    $e_joinDate = $_POST['e_joinDate'];
    $arrUpd = implode(',',$_POST['e_workPlace']);

    $updaArrPar = array($e_email,$e_type,$e_name,$e_cn,$e_joinDate,$arrUpd,$emp_no);
    $obj -> upd_emp_det_new($updaArrPar);
    if($obj)
    {
        header("location:profileView.php?emp_no2='$emp_no'");
    }
}

?>