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
    <title>Project Details Display |K11</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <table align="center" border="2">
        <tr>
            <th colspan="5">Records Available</th>
        </tr>
        <tr>
            <th>Project Id</th>
            <th>Project Type</th>
            <th>Project Title</th>
            <th>Project Budget</th>
            <th>Project Last Date</th>
        </tr>
        <?php
        $output = $obj->projDet_display();
        while ($row = mysqli_fetch_array($output)) 
        {
        ?>
        <tr>
            <td><?php echo $row['proj_id'];?></td>
            <td><?php echo $row['proj_type'];?></td>
            <td><?php echo $row['proj_title'];?></td>
            <td><?php echo $row['proj_budget'];?></td>
            <td><?php echo $row['proj_lastDate'];?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <button><a href="dashboard.php?redirect=1">Home</a></button>
</body>
</html>