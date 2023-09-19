<?php
include 'crud.php';
$obj = new crud();

if(isset($_GET['recInsert']))
{
    echo "<h2 class=\"msgSucc\">New record inserted successfully!</h2>";
}
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
    <table align="center" border="2">
        <tr>
            <th colspan="5">Records Available</th>
        </tr>
        <tr>
            <th>EMP Key</th>
            <th>Project Title</th>
            <th>EMP No</th>
            <th>Project Status</th>
            <th>Project Complete Date</th>
        </tr>
        <?php
        $output = $obj->projStatus_display();
        while ($row = mysqli_fetch_array($output)) 
        {
        ?>
        <tr>
            <td><?php echo $row['EP_key'];?></td>
            <td><?php echo $row['proj_id'];?></td>
            <td><?php echo $row['proj_status'];?></td>
            <td><?php echo $row['emp_no'];?></td>
            <td><?php echo $row['proj_compDate'];?></td>
        </tr>
        <?php
        }
        ?>  
    </table>
    <button><a href="dashboard.php?redirect=1">Home</a></button>
</body>
</html>