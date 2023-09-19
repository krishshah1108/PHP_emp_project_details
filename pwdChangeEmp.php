<?php
include 'crud.php';
$obj = new crud();
if(isset($_GET['id']))
{
    $EMP_NO=$_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password |K11</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form action="" method="post">
        <table align="center" border="2">
            <tr>
                <th><label for="oldPwd">Old Password</label></th>
                <td><input type="password" name="oldPwd" id="oldPwd" required></td>
            </tr>
            <tr>
                <th><label for="newPwd">New Password</label></th>
                <td><input type="password" name="newPwd" id="newPwd" minlength="8" maxlength="15" required></td>
            </tr>
            <tr>
                <th><label for="confPwd">Re-enter new Password</label></th>
                <td><input type="password" name="confPwd" id="confPwd" required></td>
            </tr>
            <tr align="center">
                <td colspan="2"><button type="submit" name="changePwd">Change password</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
if(isset($_POST['changePwd']))
{
    $OLD_PWD = $_POST['oldPwd'];
    $NEW_PWD = $_POST['newPwd'];
    $CONF_PWD = $_POST['confPwd'];
    $flag = 0;
    $output = $obj->upd_emp_det_old($EMP_NO);
    while($row=mysqli_fetch_array($output))
    {
        if($row['password']==$OLD_PWD)
        {
            $flag=1;
        }
    }
    if($flag==0)
    {
        
        echo "<h2 class=\"msgFai\">Old password incorrect</h2>";
    }
    else{
        if($NEW_PWD!=$CONF_PWD)
        {
            echo "<h2 class=\"msgFai\">New password and confirm password not matched !</h2>";
        }
        else{
        $successPwd = $obj->changePwd($NEW_PWD,$EMP_NO);
            if($successPwd)
            {
                header("location:profileView.php?emp_no1='$EMP_NO'");
            }
        }
    }
    
}
?>