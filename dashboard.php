<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard |K11</title>
    <link rel="stylesheet" href="form.css">
</head>
</html>

<?php
include 'crud.php';
$obj = new crud();
$emp_no="";
if(isset($_POST['login']))
{
    $EMAIL = $_POST['email'];
    $PWD = $_POST['pwd'];
    $flag=0;
    $name = "";
    $output = $obj -> logincheck_empDet();
    while($row = mysqli_fetch_array($output))
    {
        if(($EMAIL==$row['emp_email'])&&($PWD==$row['password']))
        {
            $name = $row['emp_name'];
            $emp_no = $row['emp_no'];
            $flag=1;
        }       
    }

    if($flag==1)
    {
        echo '<div class="msgSucc">
        Login Success <br>
        Welcome '.$name. '!</div>';

        echo '
        <div> 
        <button class="options"><a href="Project_Details.php">Project Details</a></button>&nbsp;&nbsp;&nbsp;
        <button class="options"><a href="Emp_Details.php">Employee Details</a></button>&nbsp;&nbsp;&nbsp;
        <button class="options"><a href="Project_Status.php">Project Status</a></button>
        </div>';

        $imgDis =  "SELECT image FROM emp_details WHERE emp_no = '$emp_no' ";
        $run = $obj->con->query($imgDis);
        $output = mysqli_fetch_array($run);
        if($output[0]=='')
        {
        ?>
        <div class="photo">
        <img src="photoUpload/null.jpg" alt="Profile photo" height="100">
        </div>
        <?php
        }
        else{
        ?>
        <div class="photo">
        <img src="photoUpload/<?php echo $output[0]; ?>" alt="Profile photo" height="100">
        </div>
        <?php  
        }
        ?>
        <?php
        echo "<div class=\"empPro\"><button class=\"options\"><a href=\"profileView.php?emp_no='$emp_no'\">Employee Profile</a></button>";
        echo '<div class="logout" >';
        echo "<button><h3>".'<a href="login_form.php">Log out </a></h3></button>';
        echo "</div>";
        ?>
<?php
    }else{
        header("location:login_form.php?logFai=1");
    }
}
if(isset($_GET['redirect']))
{
        echo '
        <div> 
        <button class="options"><a href="Project_Details.php">Project Details</a></button>&nbsp;&nbsp;&nbsp;
        <button class="options"><a href="Emp_Details.php">Employee Details</a></button>&nbsp;&nbsp;&nbsp;
        <button class="options"><a href="Project_Status.php">Project Status</a></button>
        </div>';
        

        echo "<button><h3>".'<a href="login_form.php">Log Out </a></h3></button>';
}
if(isset($_GET['emp_no']))
{
        $EMP_NO = $_GET['emp_no'];
        echo '
        <div> 
        <button class="options"><a href="Project_Details.php">Project Details</a></button>&nbsp;&nbsp;&nbsp;
        <button class="options"><a href="Emp_Details.php">Employee Details</a></button>&nbsp;&nbsp;&nbsp;
        <button class="options"><a href="Project_Status.php">Project Status</a></button>
        </div>';
        echo "<button><h3>".'<a href="login_form.php">Log Out </a></h3></button>';
        echo "<hr>";
        $imgDis =  "SELECT image FROM emp_details WHERE emp_no = $EMP_NO";
        $run = $obj->con->query($imgDis);
        $output = mysqli_fetch_array($run);
        echo "<div class=\"msgSucc\">Image updated successfully</div>";
        ?>
        <img src="photoUpload/<?php echo $output[0]; ?>" alt="Profile photo" height="100">
        
<?php        
}
?>

