<?php
include 'crud.php';
$obj = new crud();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Status |K11</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form action="projStatus_insert.php" method="post">
        <table align="center" border="2">
            <tr>
                <th colspan="2">Project Details</th>
            </tr>
            <tr>
                <td><label for="proj_id">Project Title</label></td>
                <td>
                    <select name="proj_id" id="proj_id">
                        <option value="-1">Select Project Title</option>
                        <?php
                        $sqlDrop = "SELECT * FROM project_details";
                        $runSqlDrop = mysqli_query($obj->con,$sqlDrop);
                        while($row = mysqli_fetch_array($runSqlDrop))
                        {
                        ?>
                        <option value="<?php echo $row['proj_id']; ?>"><?php echo $row['proj_title'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="proj_status">Project status</label></td>
                <td>
                    <input type="radio" name="proj_status" group="proj_status" value="Pending">Pending
                    <input type="radio" name="proj_status" group="proj_status" value="Ongoing">Ongoing
                    <input type="radio" name="proj_status" group="proj_status" value="Complete">Complete
                </td>
            </tr>
            <tr>
                <td><label for="emp_no">Employee Email</label></td>
                <td>
                    <select name="emp_no" id="emp_no">
                        <option value="-1">Select Employee Email</option>
                        <?php
                        $Dropdown = "SELECT * FROM emp_details";
                        $runDropdown = mysqli_query($obj->con,$Dropdown);
                        while($r = mysqli_fetch_array($runDropdown))
                        {
                        ?>
                        <option value="<?php echo $r['emp_no']; ?>"><?php echo $r['emp_email'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="proj_comDate">Project completion date</label></td>
                <td><input type="date" name="proj_comDate" id="proj_comDate" required></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <button type="submit" name="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
    <button><a href="projStatus_display.php">Records Available</a></button><br><br>
    <button><a href="dashboard.php?redirect=1">Home</a></button>
</body>
</html>