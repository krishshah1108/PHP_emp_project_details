<?php
include 'crud.php';
$obj = new crud();
if(isset($_GET['emp_no']))
{
    $EMP_NO = $_GET['emp_no'];
}
if(isset($_GET['emp_no2']))
{
    $EMP_NO = $_GET['emp_no2'];
}
if(isset($_GET['emp_no1']))
{
    $EMP_NO = $_GET['emp_no1'];
    echo "<h3 class=\"msgSucc\">Password updated successfully!</h3>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile View |K11</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <table align="center" border="2">
        <tr>
            <th colspan="8">Records Available</th>
        </tr>
        <tr>
            <th>Emp Email</th>
            <th>Emp Type</th>
            <th>Emp Name</th>
            <th>Emp Contact</th>
            <th>Emp Join Date</th>
            <th>Emp Work Place</th>
            <!-- <th>Password</th> -->
            <th>Opeations</th>
        </tr>
        <?php
        $output = $obj->empDet_display($EMP_NO);
        while ($row = mysqli_fetch_array($output)) 
        {
        ?>
        <tr>
            <td><?php echo $row['emp_email'];?></td>
            <td><?php echo $row['emp_type'];?></td>
            <td><?php echo $row['emp_name'];?></td>
            <td><?php echo $row['emp_cn'];?></td>
            <td><?php echo $row['emp_joinDate'];?></td>
            <td><?php echo $row['emp_workPlace'];?></td>
            <td>
                <button><a href="updateEmpDet.php?u_id=<?php echo $row['emp_no']; ?>">Update</a></button>
                <button><a href="deleteEmpDet.php?d_id=<?php echo $row['emp_no']; ?>">Delete</a></button>
            </td>
            
        </tr>
        <?php
        $emp_no = $row['emp_no'];
        if($row['image']=='')
        {
            echo '
            <br><br>
            <form action="" method="post" enctype="multipart/form-data">
            <label for=""><h2>Profile Photo: </h2></label>
            <input type="file" name="image" id="image">
            <br><br>
            <button type="submit" name="img_submit">Submit</button>
            </form>
            ';
        }
        else{
        ?>
        <div class="photo">
        <label for=""><h2>Current Profile Photo </h2></label>
        <img src="photoUpload/<?php echo $row['image']; ?>" alt="Profile photo" height="100">
            <form action="" method="post" enctype="multipart/form-data">
            <br>
            <h3>Wish to Update?</h3>
            <input type="file" name="image" id="image">
            <br><br><button type="submit" name="img_submit">Update</button>
            </form>
        </div>
        <?php   
        }
        }
        ?>        
    </table>
    <button><a href="dashboard.php?redirect=1">Home</a></button>

    <?php
    if(isset($_POST['img_submit']))
    {
       $imgSucc = $obj->imageUpload($_FILES,$EMP_NO);
    }
    ?>
</body>
</html>