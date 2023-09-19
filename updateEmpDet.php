<?php
include 'crud.php';
$obj = new crud();
$EMP_NO="";
if(isset($_GET['u_id']))
{
    $EMP_NO = $_GET['u_id'];
}
        $output = $obj->upd_emp_det_old($EMP_NO);
        while ($row = mysqli_fetch_array($output)) 
        {
            
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Details |K11</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<form action="newPage_UpdateEmp.php" method="post">
        <table align="center" border="2">
            <tr>
                <th colspan="2">Update Employee Details</th>
            </tr>
            <input type="hidden" name="emp_no" value="<?php echo $row['emp_no'];?>" >
            <tr>
                <td><label for="e_email">Employee email</label></td>
                <td><input type="email" name="e_email" id="e_email" placeholder="Enter Employee Email" value="<?php echo $row['emp_email'];?>" required></td>
            </tr>
            <tr>
                <td><label for="e_type">Employee type</label></td>
                <td>
                    <input type="radio" name="e_type" group="e_type" value="Project_Manager"
                    <?php
                    if($row['emp_type']=="Project_Manager")
                    {
                        echo "checked";
                    }
                    ?>
                    >Project Manager
                    <input type="radio" name="e_type" group="e_type" value="Regular_Employee"
                    <?php
                    if($row['emp_type']=="Regular_Employee")
                    {
                        echo "checked";
                    }
                    ?>
                    >Regular Employee
                </td>
            </tr>
            <tr>
                <td><label for="e_name">Employee name</label></td>
                <td><input type="text" name="e_name" id="e_name" placeholder="Enter Employee Name" pattern="[A-Za-z]{1,}" title="Only characters allowed" value="<?php echo $row['emp_name'];?>" required></td>
            </tr>
            <tr>
                <td><label for="e_cn">Employee contact number</label></td>
                <td><input type="text" name="e_cn" id="e_cn" placeholder="Enter Employee Contact No" value="<?php echo $row['emp_cn'];?>"required></td>
            </tr>
            <tr>
                <td><label for="e_joinDate">Employee join date</label></td>
                <td><input type="date" name="e_joinDate" id="e_joinDate" value="<?php echo $row['emp_joinDate'];?>" required></td>
            </tr>
            <?php
            $a = $row['emp_workPlace'];
            $split=explode(',',$a);
            ?>
            <tr>
                <td><label for="e_workPlace">Employee work place</label></td>
                <td>
                    <input type="checkbox" name="e_workPlace[]" value="remote_area"
                    <?php
                    if(in_array("remote_area",$split))
                    {
                        echo "checked";
                    }
                    ?>
                    >Remote Area
                    <input type="checkbox" name="e_workPlace[]" value="in_company"
                    <?php
                    if(in_array("in_company",$split))
                    {
                        echo "checked";
                    }
                    ?>
                    >In Company
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <button type="submit" name="update">Update</button>
                </td>
            </tr>
        </table>
        <?php
        $pwd = $row['password'];
        }
        ?>
        <?php
        echo "<h3>Need to change password?</h3>";
        echo "<button><a href=\"pwdChangeEmp.php?id=$EMP_NO\">Click here</a></button>";
        ?>
    </form>
</body>
</html>

