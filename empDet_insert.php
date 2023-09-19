<?php
include 'crud.php';
$obj = new crud();

if(isset($_POST['submit']))
{

    $maxId = "SELECT MAX(emp_no) FROM emp_details";
    $run = $obj->con->query($maxId);
    $output = mysqli_fetch_array($run);
    $EMP_NO = ++$output[0];

    $E_EMAIL = $_POST['e_email'];
    $E_TYPE = $_POST['e_type'];
    $E_NAME = $_POST['e_name'];
    $E_CN = $_POST['e_cn'];
    $E_JOINDATE = $_POST['e_joinDate'];
    $E_WORKPLACE = implode(',',$_POST['e_workPlace']);
    $E_PWD = $_POST['pwd'];

    $empInsert = array($EMP_NO,$E_EMAIL,$E_TYPE,$E_NAME,$E_CN,$E_JOINDATE,$E_WORKPLACE,$E_PWD);
    $insSuccess = $obj->empDet_insert($empInsert);
    // if($obj)
    // {
    //     echo "Record inserted successfully";
    // }
    if($insSuccess)
    {
        header("location:login_form.php?msgRegSuc=1");
    }

}

?>